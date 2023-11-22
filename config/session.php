<?php
session_start();

require_once(dirname(__FILE__) . "/config.php");
require_once(dirname(__FILE__) . "../../core/Controller.php");

if(!isset($_SESSION["authorization"])) {
    Controller::redirect("/views/login.php");
}

$logged_user = explode(" ", $_SESSION['authorization']['logged_user']['name'])[0];
?>
<div class="flex items-center justify-between w-full">
    <div class="w-full h-full">
        <h1 class="font-bold text-5xl"><?= $session ?? null ?></h1>
        <p class="text-gray-500 mt-2 text-lg"><?= $session_text ?? null ?></p>
    </div>
    <div class="w-full h-full text-right flex items-center justify-center gap-8">
        <p class="text-2xl font-bold w-full">Olá, <?= $logged_user . "!" ?? "Visitante" . "!" ?></p>
        <a href="http://127.0.0.1:8050/"
            class="bg-blue-500 text-white py-2 px-4 rounded-md w-max flex items-center justify-center gap-4 font-bold hover:bg-blue-600 hover:shadow-md hover:-translate-y-1 hover:shadow-blue-500 transition-all"><i
                class="fa fa-gears"></i>Analise Vendas</a>
    </div>
</div>