<?php
session_start();

require_once("../../domain/interfaces/IUseCase.php");
require_once("../../core/Controller.php");

final class LoginUserController extends Controller{
    public function __construct(
        private readonly IUseCase $usecase
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
                $_SESSION['authorization'] = [
                    'status' => true,
                    'logged_user' => [
                        'id' => $permissionGranted->recoverID(),
                        'name' => $permissionGranted->recoverName(),
                        'email' => $permissionGranted->recoverEmail(),
                        'role' => $permissionGranted->recoverRole()
                    ]
                ];
                Controller::redirect("/index.php");
            } else {
                $_SESSION["flash"] = "E-mail e/ou senha incorretos! Tente novamente.";
                Controller::redirect("/views/login.php");
            }
        }

        $_SESSION["flash"] = "Dados inválidos! Tente novamente.";
        Controller::redirect("/views/login.php");
    }
}
