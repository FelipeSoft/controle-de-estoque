<?php
date_default_timezone_set('America/Sao_Paulo');

require_once(dirname(__FILE__) . "../../database/repository/ProductRepository.php");
require_once(dirname(__FILE__) . "../../database/dao/ProductDataAccessObjectMySQL.php");
require("../config/config.php");

$dao = new ProductDataAccessObjectMySQL($connection);
$repository = new ProductRepository($dao);

$products = $repository->getAllProducts();

$title = "Produtos - Controle de Estoque";
$session = "Produtos";
$session_text = "Cadastre os seus produtos disponíveis no seu estoque."
?>

<?php require("partials/metadata.php"); ?>
    <main class="w-screen">
        <?php require("./partials/header.php"); ?>
        <section class="mx-auto container my-10">
            <?php require("../config/session.php"); ?>
            <div class="w-full h-max bg-green-200 mt-8 p-4 text-green-700 border-2 border-green-300 rounded-md">
                Produto cadastrado com sucesso!
            </div>
            <div>
                <h1 class="mt-8 text-blue-500 font-bold text-2xl mb-2">Cadastro de Produtos</h1>
                <form action="../app/actions/insert_product_action.php" class="mb-16">
                    <div class="grid grid-cols-3 gap-6">
                        <label class="flex flex-col mb-4 text-blue-500 font-regular">
                            Custo (R$)
                            <input name="product_cost" type="number" placeholder="ex: 12,78"
                            class="w-full outline-0 focus:border-blue-500 border-2 border-gray-300 py-2 px-4 rounded-md">
                        </label>
                        <label class="flex flex-col mb-4 text-blue-500 font-regular">
                            Preço Unitário (R$)
                            <input name="product_price" type="number" placeholder="ex: 15,78"
                            class="w-full outline-0 focus:border-blue-500 border-2 border-gray-300 py-2 px-4 rounded-md">
                        </label>
                        <label class="flex flex-col mb-4 text-blue-500 font-regular">
                            Categoria
                            <select name="product_category"
                                class="w-full outline-0 focus:border-blue-500 border-2 border-gray-300 py-2 px-4 rounded-md">
                                <option value="Eletrônicos">Eletrônicos</option>
                            </select>
                        </label>
                        <label class="flex flex-col mb-4 text-blue-500 font-regular">
                            Estoque Mínimo
                            <input name="product_min_stock" type="number" placeholder="ex: 20"
                                class="w-full outline-0 focus:border-blue-500 border-2 border-gray-300 py-2 px-4 rounded-md">
                        </label>
                        <label class="flex flex-col mb-4 text-blue-500 font-regular">
                            Fornecedor
                            <select name="product_supplier"
                                class="w-full outline-0 focus:border-blue-500 border-2 border-gray-300 py-2 px-4 rounded-md">
                                <option value="Motorola">Motorola</option>
                                <option value="Empresa">Empresa X</option>
                            </select>
                        </label>
                    </div>

                    <div class="mt-4">
                        <button class="bg-blue-500 py-2 px-4 text-white rounded-md">CADASTRAR</button>
                    </div>
                </form>
            </div>
            <div>
                <h1 class="mt-8 text-blue-500 font-bold text-2xl mb-2">Filtros</h1>
                <form action="">
                    <div class="grid grid-cols-3 gap-6">
                        <label class="flex flex-col mb-4 text-blue-500 font-regular">
                            Nome do Produto
                            <input type="text" placeholder="ex: Impressora RICOH 377"
                                class="w-full outline-0 focus:border-blue-500 border-2 border-gray-300 py-2 px-4 rounded-md">
                        </label>
                        <label class="flex flex-col mb-4 text-blue-500 font-regular">
                            Categoria
                            <select
                                class="w-full outline-0 focus:border-blue-500 border-2 border-gray-300 py-2 px-4 rounded-md">
                                <option value="Eletrônicos">Eletrônicos</option>
                            </select>
                        </label>
                        <label class="flex flex-col mb-4 text-blue-500 font-regular">
                            Fornecedor
                            <select
                                class="w-full outline-0 focus:border-blue-500 border-2 border-gray-300 py-2 px-4 rounded-md">
                                <option value="Motorola">Motorola</option>
                                <option value="Empresa">Empresa X</option>
                            </select>
                        </label>
                    </div>

                    <div class="mt-4">
                        <a href="" class="bg-blue-500 py-2 px-4 text-white rounded-md">APLICAR</a>
                        <a href="" class="bg-gray-500 py-2 px-4 text-white rounded-md">LIMPAR</a>
                    </div>
                </form>
            </div>
            <div class="overflow-x-scroll min-w-full mx-auto max-h-screen mt-10">
                <?php if(sizeof($products) > 0): ?>
                    <table class="min-w-full mt-12">
                        <thead class="sticky top-0">
                            <tr class="">
                                <td class="py-2 px-4 bg-black text-white">ID</td>
                                <td class="py-2 px-4 bg-black text-white">Registro</td>
                                <td class="py-2 px-4 bg-black text-white">Produto</td>
                                <td class="py-2 px-4 bg-black text-white">Custo</td>
                                <td class="py-2 px-4 bg-black text-white">Preço Unitário</td>
                                <td class="py-2 px-4 bg-black text-white">Categoria</td>
                                <td class="py-2 px-4 bg-black text-white">Fornecedor</td>
                                <td class="py-2 px-4 bg-black text-white">Estoque Mínimo</td>
                                <td class="py-2 px-4 bg-black text-white">Estoque Atual</td>
                                <td class="py-2 px-4 bg-black text-white">Última Atualização</td>
                                <td class="py-2 px-4 bg-black text-white">Ações</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($products as $product): ?>
                                <tr class="border-2 even:bg-gray-200">
                                    <td class="py-2 px-4 text-sm"><?= $product->recoverProductId(); ?></td>
                                    <td class="py-2 px-4 text-sm">
                                        <?php 
                                            $timestamp = strtotime($product->recoverCreatedAt());
                                            echo date("d/m/Y", $timestamp);
                                        ?>
                                    </td>
                                    <td class="py-2 px-4 text-sm"><?= $product->recoverName(); ?></td>
                                    <td class="py-2 px-4 text-sm"><?= "R$ " . number_format($product->recoverCost(), 2, ",", "."); ?></td>
                                    <td class="py-2 px-4 text-sm"><?= "R$ " . number_format($product->recoverCost() * 1.5, 2, ",", "."); ?></td>
                                    <td class="py-2 px-4 text-sm">Eletrônicos</td>
                                    <td class="py-2 px-4 text-sm">Dell</td>
                                    <td class="py-2 px-4 text-sm"><?= $product->recoverMinStock(); ?></td>
                                    <td class="py-2 px-4 text-sm">21</td>
                                    <td class="py-2 px-4 text-sm">
                                    <?php
                                        $from_database_datetime = $product->recoverUpdatedAt();
                                        $database_date = DateTime::createFromFormat('Y-m-d H:i:s', $from_database_datetime);
                                        $now = new DateTime();

                                        $interval = $database_date->diff($now);

                                        $hours = $interval->h;
                                        $minutes = $interval->i;
                                        $seconds = $interval->s;

                                        $message = '';

                                        if ($hours > 0) {
                                            $message .= $hours . ' hora' . ($hours > 1 ? 's' : '') . ' atrás';
                                        } elseif ($minutes > 0) {
                                            $message .= $minutes . ' minuto' . ($minutes > 1 ? 's' : '') . ' atrás';
                                        } elseif ($seconds > 0) {
                                            $message .= $seconds . ' segundo' . ($seconds > 1 ? 's' : '') . ' atrás';
                                        }

                                        echo $message;
                                    ?>
                                    </td>
                                    <td class="p-4 flex items-center justify-center gap-2">
                                        <a href="" class="bg-blue-500 py-2 px-4 text-white rounded-md">Editar</a>
                                        <a href="" class="bg-red-500 py-2 px-4 text-white rounded-md">Excluir</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <?php require("partials/not_found.php") ?>
                <?php endif; ?>
            </div>
        </section>
    </main>
<?php require("partials/append.php"); ?>
