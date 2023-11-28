<?php
date_default_timezone_set('America/Sao_Paulo');

require_once(dirname(__FILE__) . "../../database/repository/BuyersRepository.php");
require_once(dirname(__FILE__) . "../../database/dao/BuyersDataAccessObjectMySQL.php");
require("../config/config.php");

$dao = new BuyersDataAccessObjectMySQL($connection);
$repository = new BuyersRepository($dao);

$buyers = $repository->getAllBuyers();

$title = "Clientes - Controle de Estoque";
$session = "Clientes";
$session_text = "Cadastre os seus clientes de forma facilitada.";
    
$id = filter_input(INPUT_GET, "buyer_id", FILTER_SANITIZE_STRING);

if ($id) {    
    $buyer = $dao->get($id);
    $name = $buyer["name"];
    $email = $buyer["email"];
    $telephone = $buyer["contact_number"];
}    
?>

<?php require("partials/metadata.php"); ?>
<main class="w-screen">
    <?php require("./partials/header.php"); ?>
    <section class="mx-auto container my-10">
        <?php require("../config/session.php"); ?>
        <?php
        if (isset($_SESSION['flash_buyer'])) {
            echo '<div class="w-full h-max bg-red-200 mt-8 p-4 text-red-700 border-2 border-red-300 rounded-md">' . $_SESSION['flash_buyer'] . '</div>';
            unset($_SESSION['flash_buyer']);
        }
        ?>
        <div>
            <h1 class="mt-8 text-blue-500 font-bold text-2xl mb-2">Cadastro de Clientes</h1>
            <form action="<?= $id ? "../app/actions/edit_buyer.php" : "../app/actions/new_buyer.php" ?>" method="post" class="mb-16">
                <div class="grid grid-cols-3 gap-6">
                    <input type="text" value="<?=$id?>" name="id" hidden>
                    <label class="flex flex-col mb-4 text-blue-500 font-regular">
                        Nome
                        <input value="<?= $name ?? "" ?>" name="buyer_name" type="text" placeholder="ex: Apple Computer"
                            class="w-full outline-0 focus:border-blue-500 border-2 border-gray-300 py-2 px-4 rounded-md">
                    </label>
                    <label class="flex flex-col mb-4 text-blue-500 font-regular">
                        Email
                        <input value="<?= $email ?? "" ?>" name="buyer_email" type="email" placeholder="ex: suporte@gmail.com"
                            class="w-full outline-0 focus:border-blue-500 border-2 border-gray-300 py-2 px-4 rounded-md">
                    </label>
                    <label class="flex flex-col mb-4 text-blue-500 font-regular">
                        Telefone de Contato
                        <input value="<?= $telephone ?? "" ?>" name="buyer_telephone" type="text" placeholder="ex: 19999179999"
                            class="w-full outline-0 focus:border-blue-500 border-2 border-gray-300 py-2 px-4 rounded-md">
                    </label>
                </div>

                <div class="mt-4">
                    <button class="bg-blue-500 py-2 px-4 text-white rounded-md">CADASTRAR / ATUALIZAR</button>
                </div>
            </form>
        </div>
        <div class="overflow-x-scroll min-w-full mx-auto max-h-screen mt-10">
            <?php if (sizeof($buyers) > 0): ?>
                <table class="min-w-full mt-12">
                    <thead class="sticky top-0">
                        <tr class="">
                            <td class="py-2 px-4 bg-black text-white">ID</td>
                            <td class="py-2 px-4 bg-black text-white">Registro</td>
                            <td class="py-2 px-4 bg-black text-white">Cliente</td>
                            <td class="py-2 px-4 bg-black text-white">E-mail</td>
                            <td class="py-2 px-4 bg-black text-white">Telefone de Contato</td>
                            <td class="py-2 px-4 bg-black text-white">Última Atualização</td>
                            <td class="py-2 px-4 bg-black text-white">Ações</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($buyers as $b): ?>
                            <tr class="border-2 even:bg-gray-200">
                                <td class="py-2 px-4 text-sm">
                                    <?= $b->stakeholder_id; ?>
                                </td>
                                <td class="py-2 px-4 text-sm">
                                    <?= $b->created_at; ?>
                                </td>
                                <td class="py-2 px-4 text-sm">
                                    <?= $b->name; ?>
                                </td>
                                <td class="py-2 px-4 text-sm">
                                    <?= $b->email; ?>
                                </td>
                                <td class="py-2 px-4 text-sm">
                                    <?= $b->contact_number; ?>
                                </td>
                                <td class="py-2 px-4 text-sm">
                                    <?php
                                    $from_database_datetime = $b->updated_at;
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
                                    <a href="<?= BASE_URL ?>/views/buyers.php?buyer_id=<?=$b->stakeholder_id?>" class="bg-blue-500 py-2 px-4 text-white rounded-md">Editar</a>
                                    <a href="<?= BASE_URL ?>/app/actions/remove_buyer.php?buyer_id=<?=$b->stakeholder_id?>" class="bg-red-500 py-2 px-4 text-white rounded-md">Excluir</a>
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