<?php
session_start();

require_once("../../domain/interfaces/IUseCase.php");
require_once("../../core/View.php");
final class RegisterUserAction extends View{
    public function __construct(
        private readonly IUseCase $usecase,
        public array $args = []
    ) {}
    public function handle() {
        $input_name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_SPECIAL_CHARS);
        $input_email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
        $input_password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);

        if ($input_name && $input_email && $input_password) {
            $attempt = $this->usecase->execute([
                "name" => $input_name,
                "email" => $input_email,
                "password"=> $input_password
            ]);

            if ($attempt) {
                View::render("index");

                $_SESSION['authorization'] = [
                    'status' => true,
                    'logged_user' => [
                        'id' => $attempt["id"],
                        'name' => $attempt["name"],
                        'email' => $attempt["email"],
                        'role' => $attempt["role"]
                    ]
                ];
            } else {
                $_SESSION["flash"] = "Dados inválidos! Tente novamente.";
                View::redirect("/views/login.php");
            }
        }

        $_SESSION["flash"] = "Dados inválidos! Tente novamente.";
        View::redirect("/views/login.php");
    }
}