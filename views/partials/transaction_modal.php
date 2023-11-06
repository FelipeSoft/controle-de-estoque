<main id="transaction_modal" class="transition-all hidden opacity-0 z-20 fixed inset-0 bg-white/50 overflow-y-auto items-center justify-center">
    <div class="p-10 bg-white rounded-md shadow-xl">
        <div class="mb-6 flex items-start justify-between w-full gap-8">
            <div>
                <h1 class="text-2xl font-bold text-left">Nova Transação</h1>
                <p class="text-gray-500 text-left w-max text-md break-words">Preencha todos os campos corretamente.</p>
            </div>
            <div>
                <button id="close_modal" class="bg-red-500 rounded-md w-10 h-10 flex items-center justify-center"><i class="fa fa-close text-white"></i></button>
            </div>
        </div>
        <form action="../../app/actions/new_transaction_action.php">
            <label class="flex flex-col mb-4 text-blue-500 font-regular">
                <div class="flex items-center">Nome do Produto <span class="text-red-500 ml-1">*</span></div>
                <select name="transaction_product"
                    class="w-full outline-0 focus:border-blue-500 border-2 border-gray-300 py-2 px-4 rounded-md">
                    <option value="Eletrônicos">Produto 1</option>
                </select>
            </label>
            <label class="flex flex-col mb-4 text-blue-500 font-regular">
                <div class="flex items-center">Tipo de Transação <span class="text-red-500 ml-1">*</span></div>
                <select name="transaction_type"
                    class="w-full outline-0 focus:border-blue-500 border-2 border-gray-300 py-2 px-4 rounded-md">
                    <option value="Compra">Compra</option>
                    <option value="Venda">Venda</option>
                </select>
            </label>
            <label class="flex flex-col mb-4 text-blue-500 font-regular">
                <div class="flex items-center">Origem/Destino <span class="text-red-500 ml-1">*</span></div>
                <select name="transaction_origin"
                    class="w-full outline-0 focus:border-blue-500 border-2 border-gray-300 py-2 px-4 rounded-md">
                    <option value="Compra">Motorola</option>
                    <option value="Venda">Empresa X</option>
                </select>
            </label>
            <button
            class="bg-blue-500 text-white py-2 px-4 rounded-md w-full mt-6 font-bold hover:bg-blue-600 hover:shadow-md hover:-translate-y-1 hover:shadow-blue-500 transition-all">ADICIONAR</button>
        </form>
    </div>
</main>