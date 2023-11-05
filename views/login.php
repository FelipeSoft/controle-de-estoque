<?php
session_start();
$title = "Login";
?>
<?php require("./partials/metadata.php"); ?>
<main class="min-h-screen w-screen flex items-center justify-center bg-blue-500 flex-col">
    <form action="../app/actions/login_user_action.php" method="POST"
        class="max-w-xl bg-white p-10 rounded-md shadow-xl shadow-blue-700">
        <h1 class="text-blue-500 font-bold text-2xl text-center">Iniciar Sessão</h1>
        <p class="mb-6 text-gray-500 text-center">Informe suas credenciais para prosseguir.</p>
        <?php
            if (isset($_SESSION["flash"])) {
                echo "<div class='w-full h-max bg-red-200 my-4 p-4 text-red-700 border-2 border-red-300 rounded-md'>" . $_SESSION["flash"] . "</div>";
                unset($_SESSION['flash']);
            }
        ?>
        <label class="flex flex-col mb-4 text-blue-500 font-regular">
            E-mail
            <input name="email" type="email" placeholder="ex: john@domain.com"
                class="w-full outline-0 focus:border-blue-500 border-2 border-gray-300 py-2 px-4 rounded-md">
        </label>
        <label class="flex flex-col mb-4 text-blue-500 font-regular">
            Senha
            <input name="password" type="password" placeholder=""
                class="w-full outline-0 focus:border-blue-500 border-2 border-gray-300 py-2 px-4 rounded-md">
        </label>
        <button
            class="bg-blue-500 text-white py-2 px-4 rounded-md w-full font-bold hover:bg-blue-600 hover:shadow-md hover:-translate-y-1 hover:shadow-blue-500 transition-all">ENTRAR</button>
        <p class="mt-6 text-center text-gray-500">Ainda não possui uma conta? <a href="./register.php"
                class="text-blue-500 font-semibold hover:underline">Registre-se</a></p>
    </form>
</main>
<?php require("./partials/append.php"); ?>