<?php 
include('./header.php');

$result = false;
if (isset($_POST['cadastro']))  {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

$sql = "INSERT INTO
        usuarios (nome, email, senha)
        VALUES ('$nome','$email','$senha')";

$result = mysqli_query($conexao, $sql);
if($result) {
    $mensagem = "Usuário Cadastrado com sucesso!";
}
else {
    $mensagem = "Erro ao cadastrar usuário";
}
}
?>

<main>
    <div class="container">
        <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 login p-5">
            <h1 class="titulo-login mb-4">Bronze Diary</h1>
            <h3>Crie uma conta</h3>
            <form method="POST" action="">
                <div class="mb-3">
                <label for="email" class="form-label text-white">Nome</label>
                <input name="nome" type="text" class="form-control" id="nome" aria-describedby="emailHelp" placeholder="Email">
                </div>
                <div class="mb-3">
                <label for="email" class="form-label text-white">E-mail</label>
                <input name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Email">
                </div>
                <div class="mb-3">
                <label for="password" class="form-label text-white">Senha</label>
                <input type="password" name="senha" class="form-control" id="password" placeholder="*******">
                </div>
                <div class="mb-3">
                <label for="password" class="form-label text-white">Confirmar senha</label>
                <input type="password"class="form-control" id="password" placeholder="*******">
                </div>
                <button type="submit" name="cadastro" class="btn btn-light">Realizar cadastro</button>
            </form>
            <?php if($result) { ?>
                    <div class="alert alert-primary mt-2" role="alert">
                        <?php echo $mensagem ?>
                    </div>
                <?php } ?>
            </div>
            <div class="col-md-6 d-flex align-items-center justify-content-center">
            <img src="/seminario-uniasselvi/assets/img/logo.png" alt="Placeholder Image" class="img-fluid logo-login">
            </div>
        </div>
        </div>
    </div>
</main>

<?php include('./footer.php'); ?>