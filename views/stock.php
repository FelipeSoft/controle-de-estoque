<?php
$title = "Estoque - Controle de Estoque";
$session = "Estoque";
$session_text = "Gerencie com facilidade todas os produtos do seu estoque."
?>

<?php require("partials/metadata.php"); ?>
    <main class="w-screen">
        <?php require("./partials/header.php"); ?>
        <section class="mx-auto container my-10">
            <?php require("../config/session.php"); ?>
            <div class="overflow-x-scroll min-w-full mx-auto max-h-screen mt-10">
                <table class="min-w-full mt-12" id="stock_table">
                    <thead class="sticky top-0">
                        <tr class="">
                            <td class="py-2 px-4 bg-black text-white">ID</td>
                            <td class="py-2 px-4 bg-black text-white">Registro</td>
                            <td class="py-2 px-4 bg-black text-white">Produto</td>
                            <td class="py-2 px-4 bg-black text-white">Status</td>
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
                        <tr class="even:bg-gray-200">
                            <td class="py-2 px-4 text-sm">1</td>
                            <td class="py-2 px-4 text-sm">21/07/2023</td>
                            <td class="py-2 px-4 text-sm">Notebook I5 8GB RAM SSD 256GB</td>
                            <td class="py-2 px-4 text-sm font-bold">Favorável</td>
                            <td class="py-2 px-4 text-sm">R$ 2.098,71</td>
                            <td class="py-2 px-4 text-sm">R$ 3889,90</td>
                            <td class="py-2 px-4 text-sm">Eletrônicos</td>
                            <td class="py-2 px-4 text-sm">Dell</td>
                            <td class="py-2 px-4 text-sm">10</td>
                            <td class="py-2 px-4 text-sm">21</td>
                            <td class="py-2 px-4 text-sm">20 segundos atrás</td>
                            <td class="p-4 flex items-center justify-center gap-2">
                                <a href="" class="bg-red-500 py-2 px-4 text-white rounded-md">Excluir</a>
                            </td>
                        </tr>
                        <tr class="even:bg-gray-200">
                            <td class="py-2 px-4 text-sm">1</td>
                            <td class="py-2 px-4 text-sm">21/07/2023</td>
                            <td class="py-2 px-4 text-sm">Notebook I5 8GB RAM SSD 256GB</td>
                            <td class="py-2 px-4 text-sm font-bold">Crítico</td>
                            <td class="py-2 px-4 text-sm">R$ 2.098,71</td>
                            <td class="py-2 px-4 text-sm">R$ 3889,90</td>
                            <td class="py-2 px-4 text-sm">Eletrônicos</td>
                            <td class="py-2 px-4 text-sm">Dell</td>
                            <td class="py-2 px-4 text-sm">10</td>
                            <td class="py-2 px-4 text-sm">21</td>
                            <td class="py-2 px-4 text-sm">20 segundos atrás</td>
                            <td class="p-4 flex items-center justify-center gap-2">
                                <a href="" class="bg-red-500 py-2 px-4 text-white rounded-md">Excluir</a>
                            </td>
                        </tr>
                        <tr class="even:bg-gray-200">
                            <td class="py-2 px-4 text-sm">1</td>
                            <td class="py-2 px-4 text-sm">21/07/2023</td>
                            <td class="py-2 px-4 text-sm">Notebook I5 8GB RAM SSD 256GB</td>
                            <td class="py-2 px-4 text-sm font-bold">Atenção</td>
                            <td class="py-2 px-4 text-sm">R$ 2.098,71</td>
                            <td class="py-2 px-4 text-sm">R$ 3889,90</td>
                            <td class="py-2 px-4 text-sm">Eletrônicos</td>
                            <td class="py-2 px-4 text-sm">Dell</td>
                            <td class="py-2 px-4 text-sm">10</td>
                            <td class="py-2 px-4 text-sm">21</td>
                            <td class="py-2 px-4 text-sm">20 segundos atrás</td>
                            <td class="p-4 flex items-center justify-center gap-2">
                                <a href="" class="bg-red-500 py-2 px-4 text-white rounded-md">Excluir</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>
    </main>
<?php require("partials/append.php"); ?>
