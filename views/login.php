<?php require("./partials/metadata.php"); ?>
    <main class="min-h-screen w-screen flex items-center justify-center bg-blue-500 flex-col">
        <form action="" method="POST" class="max-w-xl bg-white p-10 rounded-md shadow-xl shadow-blue-700">
            <h1 class="text-blue-500 font-bold text-2xl text-center">Iniciar Sessão</h1>
            <p class="mb-6 text-gray-500 text-center">Informe suas credenciais para prosseguir.</p>
            <label class="flex flex-col mb-4 text-blue-500 font-regular">
                E-mail
                <input type="email" placeholder="ex: john@domain.com" class="w-full outline-0 focus:border-blue-500 border-2 border-gray-300 py-2 px-4 rounded-md">
                <span class="text-red-500 opacity-0">Preencha o campo corretamente!</span>
            </label>
            <label class="flex flex-col mb-4 text-blue-500 font-regular">
                Senha
                <input type="password" placeholder="" class="w-full outline-0 focus:border-blue-500 border-2 border-gray-300 py-2 px-4 rounded-md">
                <span class="text-red-500 opacity-0">Preencha o campo corretamente!</span>
            </label>
            <button class="bg-blue-500 text-white py-2 px-4 rounded-md w-full font-bold hover:bg-blue-600 hover:shadow-md hover:-translate-y-1 hover:shadow-blue-500 transition-all">ENTRAR</button>
            <p class="mt-6 text-center text-gray-500">Ainda não possui uma conta? <a href="./register.php" class="text-blue-500 font-semibold hover:underline">Registre-se</a></p>
        </form>
    </main>
<?php require("./partials/append.php"); ?>
