<?php
date_default_timezone_set('America/Sao_Paulo');

require_once("database/dao/TransactionDataAccessObjectMySQL.php");
require("config/config.php");

$dao = new TransactionDataAccessObjectMySQL($connection);

$transactions = $dao->joinTransactions();

$title = "Dashboard - Controle de Estoque";
$session = "Dashboard";
$session_text = 'Veja todos os pontos <span
class="text-green-500 font-semibold">fortes</span> e <span
class="text-red-500 font-semibold">fracos</span> do seu estoque em questão de segundos.';
?>
<?php

$totalTransactionAmount = 0; 

foreach ($transactions as $transaction) {

    $totalTransactionAmount += $transaction["transaction_amount"];
}

?>
<?php require("views/partials/metadata.php"); ?>
<main class="w-screen">
    <?php require("views/partials/header.php"); ?>
    <section class="mx-auto container my-10">
        <div class="flex items-center justify-between">
            <?php require(dirname(__FILE__) . "/config/session.php"); ?>
        </div>
        <?php require("views/partials/transaction_modal.php"); ?>
        <div class="grid grid-cols-5 mt-10 gap-8">
            <div
                class="w-full bg-blue-200 p-4 shadow-xl rounded-md flex flex-col items-center justify-center border-4 border-blue-300 text-blue-400">
                <h2 class="text-lg font-semibold text-center">Produtos</h2>
                <h1 class="text-xl text-center font-bold">208</h1>
            </div>  
            <div
                class="w-full bg-blue-200 p-4 shadow-xl rounded-md flex flex-col items-center justify-center border-4 border-blue-300 text-blue-400">
                <h2 class="text-lg font-semibold text-center">Receita Total</h2>
            
                <h1 class="text-xl text-center font-bold"><?= "R$" . number_format($totalTransactionAmount, 2, ",", ".") ?></h1>
            </div>
            <div
                class="w-full bg-green-200 p-4 shadow-xl rounded-md flex flex-col items-center justify-center border-4 border-green-300 text-green-500">
                <h2 class="text-lg font-semibold text-center">Favoráveis</h2>
                <h1 class="text-xl text-center font-bold">108</h1>
            </div>
            <div
                class="w-full bg-yellow-200 p-4 shadow-xl rounded-md flex flex-col items-center justify-center border-4 border-yellow-300 text-yellow-500">
                <h2 class="text-lg font-semibold text-center">Atenção</h2>
                <h1 class="text-xl text-center font-bold">90</h1>
            </div>
            <div
                class="w-full bg-red-200 p-4 shadow-xl rounded-md flex flex-col items-center justify-center border-4 border-red-300 text-red-500">
                <h2 class="text-lg font-semibold text-center">Crítico</h2>
                <h1 class="text-xl text-center font-bold">10</h1>
            </div>
        </div>
    </section>
    <section class="my-10 container mx-auto">
        <div>
            <div>
                <h1 class="font-bold text-2xl">Transações</h1>
                <p class="text-gray-500">Todas as transações relacionadas a compras e vendas.</p>
            </div>
            <h1 class="mt-10 text-blue-500 font-bold text-2xl mb-2">Filtros</h1>
            <form action="">
                <div class="grid grid-cols-4 gap-6">
                    <label class="flex flex-col mb-4 text-blue-500 font-regular">
                        Nome do Produto
                        <select name="product_category"
                            class="w-full outline-0 focus:border-blue-500 border-2 border-gray-300 py-2 px-4 rounded-md">
                            <option value="Eletrônicos">Produto 1</option>
                        </select>
                    </label>
                    <label class="flex flex-col mb-4 text-blue-500 font-regular">
                        Tipo de Transação
                        <select
                            class="w-full outline-0 focus:border-blue-500 border-2 border-gray-300 py-2 px-4 rounded-md">
                            <option value="Compra">Compra</option>
                            <option value="Venda">Venda</option>
                        </select>
                    </label>
                    <label class="flex flex-col mb-4 text-blue-500 font-regular">
                        Origem/Destino
                        <select
                            class="w-full outline-0 focus:border-blue-500 border-2 border-gray-300 py-2 px-4 rounded-md">
                            <option value="Compra">Motorola</option>
                            <option value="Venda">Empresa X</option>
                        </select>
                    </label>
                </div>

                <a href="" class="bg-blue-500 py-2 px-4 text-white rounded-md">APLICAR</a>
                <a href="" class="bg-gray-500 py-2 px-4 text-white rounded-md">LIMPAR</a>
            </form>
        </div>
        <div class="overflow-x-scroll min-w-full mx-auto max-h-screen mt-10">
            <div class="flex justify-end items-center w-full'">
                <button id="open_modal" class="bg-blue-500 text-white rounded-md py-2 px-4 flex items-center justify-center font-bold gap-4"><i class="fa fa-plus text-white"></i> Nova Transação</button>
            </div>
                <?php if(sizeof($transactions) > 0): ?>
                    <table class="min-w-full mt-12">
                        <thead class="sticky top-0">
                            <tr class="">
                                <td class="py-2 px-4 bg-black text-white">ID</td>
                                <td class="py-2 px-4 bg-black text-white">Registro</td>
                                <td class="py-2 px-4 bg-black text-white">Produto</td>
                                <td class="py-2 px-4 bg-black text-white">Preço Unitário</td>
                                <td class="py-2 px-4 bg-black text-white">Tipo</td>
                                <td class="py-2 px-4 bg-black text-white">Categoria</td>
                                <td class="py-2 px-4 bg-black text-white">Origem/Destino</td>
                                <td class="py-2 px-4 bg-black text-white">Última Atualização</td>
                                <td class="py-2 px-4 bg-black text-white">Ações</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($transactions as $transaction): ?>
                                <tr class="border-2 even:bg-gray-200">
                                    <td class="py-2 px-4 text-sm"><?= $transaction["product_id"]?></td>
                                    <td class="py-2 px-4 text-sm">
                                    <?php 
                                        $time =  strtotime($transaction["created_at"]);
                                        echo date("d/m/Y", $time);
                                    ?>
                                    </td>
                                    <td class="py-2 px-4 text-sm"><?= $transaction["name"]?></td>
                                    <td class="py-2 px-4 text-sm"><?= "R$" .number_format($transaction["unit_price"] , 2, ",", ".")?></td>
                                    <td class="py-2 px-4 text-sm"><?= $transaction["type"] ? "Venda" : "Compra";?></td>
                                    <td class="py-2 px-4 text-sm"><?= $transaction["category_name"]?></td>
                                    <td class="py-2 px-4 text-sm"><?= $transaction["supplier_name"]?></td>
                                    <td class="py-2 px-4 text-sm">
                                        <?php
                                         $from_database_datetime = $transaction["updated_at"];
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
                                        <a href="" class="bg-red-500 py-2 px-4 text-white rounded-md">Excluir</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <?php require("views/partials/not_found.php"); ?>
                <?php endif; ?>
            </div>
    </section>
</main>
<?php require("views/partials/append.php"); ?>