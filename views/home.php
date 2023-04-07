<?php include('header.php');


// seleciona todas as postagens e faz um join com a tabela usuarios para trazer o nome do cliente e todas as colunas da tabela postagens
$query = "SELECT p.*, u.nome
             from postagens p
             join usuarios u on p.id_usuario = u.id
             where p.id_usuario = {$idUsuario} ORDER by p.id DESC";

$result = mysqli_fetch_all(mysqli_query($conexao, $query), MYSQLI_ASSOC);

// verifica se foi efetuado um post no botão de publicar
if (isset($_POST['publicar'])) {

    $corpo = mysqli_real_escape_string($conexao, $_POST['corpo']);

    // faz as validações
    if (!$corpo) {
        $_SESSION['messagemErro'] = 'Por favor, insira o corpo da mensagem.';
        header('Location: home.php');
        exit();
    }

    if (strlen($corpo) <= 6) {
        $_SESSION['messagemErro'] = 'Por favor, uma mensagem com mais de 6 caracteres.';
        header('Location: home.php');
        exit();
    }

    // faz a inserção no banco
    $query = "INSERT INTO postagens (id_usuario, corpo) VALUES ('{$_SESSION['id_usuario']}', '{$corpo}')";

    $result = mysqli_query($conexao, $query) or die('Erro ao inserir registro.');
    // esse função captura o último ID inserido
    // se caso for diferente de 0, quer dizer que a inserção ocorreu bem
    $id = mysqli_insert_id($conexao);

    // verifico se o ID é valido, e se sim redireciona para a mesma página
    if ($id) {
        header('Location: home.php');
        exit();
    }
}

// verifica se foi efetuado um post no botão de deletar
if (isset($_POST['deletar'])) {
    $postId = mysqli_real_escape_string($conexao, $_POST['post_id']);

    // verifica se existe uma postagem com o ID recebido
    $querySelectExists = "SELECT p.id FROM postagens p WHERE p.id = '{$postId}'";

    $postExists = mysqli_num_rows(mysqli_query($conexao, $query));

    // se caso não, não deixa deletar
    if (!$postExists) {
        $_SESSION['messagemErro'] = 'Postagem inexistente.';
        header('Location: home.php');
        exit();
    }

    // faz a deleção no banco
    $query = "DELETE FROM postagens WHERE id = '{$postId}'";

    $result = mysqli_query($conexao, $query) or die('Erro ao deletar registro.');

    header('Location: home.php');
    exit();
}

?>
<div class="layout__main">
    <?php if (isset($_SESSION['messagemErro'])) { ?>
    <div class="alert alert-danger mt-2" role="alert">
        <?= $_SESSION['messagemErro']; ?>
    </div>
    <?php } ?>

    <form class="tweet" method="POST" action=''>
        <img class="tweet__author-logo" src="/seminario-uniasselvi/assets/img/bronze girl.jpg" />
        <div class="tweet__main">
            <div class="tweet__header">
                <div class="tweet__header_content">
                    <div class="tweet__author-name">
                        <?= $_SESSION['usuario']; ?>
                    </div>
                    <div class="tweet__author-slug">
                        O que você está pensando?
                    </div>
                </div>

            </div>
            <textarea name="corpo" id="" cols="30" rows="10" placeholder="O que você está pensando?" minlength="6"
                required></textarea>
            <div>
                <button type="submit" name="publicar">Enviar</button>
            </div>
        </div>

    </form>


    <?php foreach ($result as $postagem) {
    ?>
    <form class="tweet" method="POST" action="">
        <img class="tweet__author-logo" src="/seminario-uniasselvi/assets/img/bronze girl.jpg" />
        <div class="tweet__main">
            <div class="tweet__header">
                <div class="tweet__header_content">
                    <div class="tweet__author-name">
                        <?= $postagem['nome']; ?>
                    </div>
                    <div class="tweet__author-slug">

                    </div>
                    <div class="tweet__publish-time">
                        38m
                    </div>
                </div>
                <span class="delete-icon">
                    <input type="hidden" value="<?= $postagem['id']; ?>" name="post_id">
                    <button type="submit" name="deletar"
                        style="border: none;background: transparent;width: min-content">
                        <img id="delete-icon" src="/seminario-uniasselvi/assets/svg/trash.svg"></span>
                </button>
            </div>
            <div class="tweet__content">
                <?= $postagem['corpo']; ?>
            </div>
        </div>
    </form>
    <?php } ?>






</div>



<?php
unset($_SESSION['verificaEmail']);
?>
<?php include('footer.php'); ?>