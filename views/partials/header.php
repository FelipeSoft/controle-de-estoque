<?php
$BASE_URL = "http://localhost/controle-de-estoque";
?>
<header class="w-full bg-blue-500 h-20">
    <nav class="container mx-auto flex items-center justify-between h-full">
        <h1 class="text-4xl font-semibold text-white bg-black rounded-md p-1">Stock<span
                class="text-blue-500">.io</span></h1>
        <div class="flex items-center h-full gap-8">
            <ul class="h-full flex items-center justify-center">
                <li class="ml-5 h-full flex items-center justify-center"><a
                        class="text-white flex items-center justify-center px-4 text-lg hover:bg-white hover:text-blue-500 transition-all h-full"
                        href="<?= $BASE_URL ?>/">Dashboard</a></li>
                <li class="ml-5 h-full flex items-center justify-center"><a
                        class="text-white flex items-center justify-center px-4 text-lg hover:bg-white hover:text-blue-500 transition-all h-full"
                        href="<?= $BASE_URL ?>/views/products.php">Produtos</a></li>
                <li class="ml-5 h-full flex items-center justify-center"><a
                        class="text-white flex items-center justify-center px-4 text-lg hover:bg-white hover:text-blue-500 transition-all h-full"
                        href="<?= $BASE_URL ?>/views/buyers.php">Clientes</a></li>
                <li class="ml-5 h-full flex items-center justify-center"><a
                        class="text-white flex items-center justify-center px-4 text-lg hover:bg-white hover:text-blue-500 transition-all h-full"
                        href="<?= $BASE_URL ?>/views/suppliers.php">Fornecedores</a></li>
                <li class="ml-5 h-full flex items-center justify-center"><a
                        class="text-red-500 font-semibold flex items-center justify-center px-4 text-lg hover:bg-red-500 hover:text-white transition-all h-full"
                        href="<?= $BASE_URL ?>/app/actions/logout_user_action.php">Sair</a></li>
            </ul>
        </div>
    </nav>
</header>