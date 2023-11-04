<?php
session_start();

require_once("../../domain/interfaces/IUseCase.php");
require_once("../../core/View.php");
final class LoginUserAction extends View{
    public function __construct(
        private readonly IUseCase $usecase,
        public array $args = []
    ) {}
    public function handle() {
        $input_email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
        $input_password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);

        if ($input_email && $input_password) {
            $permissionGranted = $this->usecase->execute([
                "email" => $input_email,
                "password"=> $input_password
            ]);

            if ($permissionGranted) {
                View::render("index");

                $_SESSION['authorization'] = [
                    'status' => true,
                    'logged_user' => [
                        'id' => $permissionGranted["id"],
                        'name' => $permissionGranted["name"],
                        'email' => $permissionGranted["email"],
                        'role' => $permissionGranted["role"]
                    ]
                ];
            };
            
            $_SESSION["flash"] = "E-mail e/ou senha incorretos! Tente novamente.";
            View::redirect("/views/login.php");
        }

        $_SESSION["flash"] = "Dados inválidos! Tente novamente.";
        View::redirect("/views/login.php");
    }
}