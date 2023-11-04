<?php
$session = "Clientes";
$session_text = "Cadastre os seus clientes de forma facilitada."
?>

<?php require("partials/metadata.php"); ?>
    <main class="w-screen">
        <?php require("./partials/header.php"); ?>
        <section class="mx-auto container my-10">
            <?php require("partials/session.php"); ?>
            <div class="w-full h-max bg-green-200 mt-8 p-4 text-green-700 border-2 border-green-300 rounded-md">
                Cliente cadastrado com sucesso!
            </div>
            <div>
                <h1 class="mt-8 text-blue-500 font-bold text-2xl mb-2">Cadastro de Clientes</h1>
                <form action="" class="mb-16">
                    <div class="grid grid-cols-3 gap-6">
                        <label class="flex flex-col mb-4 text-blue-500 font-regular">
                            Nome
                            <input type="text" placeholder="ex: Apple Computer"
                                class="w-full outline-0 focus:border-blue-500 border-2 border-gray-300 py-2 px-4 rounded-md">
                        </label>
                        <label class="flex flex-col mb-4 text-blue-500 font-regular">
                            Email
                            <input type="email" placeholder="ex: suporte@gmail.com"
                            class="w-full outline-0 focus:border-blue-500 border-2 border-gray-300 py-2 px-4 rounded-md">
                        </label>
                        <label class="flex flex-col mb-4 text-blue-500 font-regular">
                            Telefone de Contato
                            <input type="text" placeholder="ex: 19999179999"
                            class="w-full outline-0 focus:border-blue-500 border-2 border-gray-300 py-2 px-4 rounded-md">
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
                            Nome
                            <input type="text" placeholder="ex: Apple Computer"
                                class="w-full outline-0 focus:border-blue-500 border-2 border-gray-300 py-2 px-4 rounded-md">
                        </label>
                        <label class="flex flex-col mb-4 text-blue-500 font-regular">
                            Email
                            <input type="email" placeholder="ex: suporte@gmail.com"
                            class="w-full outline-0 focus:border-blue-500 border-2 border-gray-300 py-2 px-4 rounded-md">
                        </label>
                        <label class="flex flex-col mb-4 text-blue-500 font-regular">
                            Telefone de Contato
                            <input type="text" placeholder="ex: 19999179999"
                            class="w-full outline-0 focus:border-blue-500 border-2 border-gray-300 py-2 px-4 rounded-md">
                        </label>
                    </div>

                    <div class="mt-4">
                        <a href="" class="bg-blue-500 py-2 px-4 text-white rounded-md">APLICAR</a>
                        <a href="" class="bg-gray-500 py-2 px-4 text-white rounded-md">LIMPAR</a>
                    </div>
                </form>
            </div>
            <div class="overflow-x-scroll min-w-full mx-auto max-h-screen mt-10">
                <table class="min-w-full mt-12">
                    <thead class="sticky top-0">
                        <tr class="">
                            <td class="py-2 px-4 bg-black text-white">ID</td>
                            <td class="py-2 px-4 bg-black text-white">Registro</td>
                            <td class="py-2 px-4 bg-black text-white">Fornecedor</td>
                            <td class="py-2 px-4 bg-black text-white">E-mail</td>
                            <td class="py-2 px-4 bg-black text-white">Telefone de Contato</td>
                            <td class="py-2 px-4 bg-black text-white">Última Atualização</td>
                            <td class="py-2 px-4 bg-black text-white">Ações</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-2">
                            <td class="py-2 px-4 text-sm">1</td>
                            <td class="py-2 px-4 text-sm">21/07/2023</td>
                            <td class="py-2 px-4 text-sm">Motorola</td>
                            <td class="py-2 px-4 text-sm">suporte@motorola.com.br</td>
                            <td class="py-2 px-4 text-sm">(19) 99999-8888</td>
                            <td class="py-2 px-4 text-sm">1 ano atrás</td>
                            <td class="p-4 flex items-center justify-center gap-2">
                                <a href="" class="bg-blue-500 py-2 px-4 text-white rounded-md">Editar</a>
                                <a href="" class="bg-red-500 py-2 px-4 text-white rounded-md">Excluir</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>
    </main>
<?php require("partials/append.php"); ?>
