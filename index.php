<?php include('views/header.php');

// verifica se o usuário está logado
// se sim, manda p home
if (isset($_SESSION['id_usuario'])) {
    header("Location: ./views/home.php");
    exit();
}

if (isset($_POST['login'])) {

    $usuario = mysqli_real_escape_string($conexao, $_POST['email']);
    $senha = mysqli_real_escape_string($conexao, $_POST['senha']);

    $query = "SELECT email, id , nome
                from usuarios 
                where email = '{$usuario}' 
                and senha = '{$senha}'";

    $result = mysqli_query($conexao, $query);
    $rows = mysqli_fetch_assoc($result);
    $idUsuario = $rows['id'];

    $row = mysqli_num_rows($result);

    if (!isset($usuario)) {
        $_SESSION['usuarioInvalido'] = true;
        header('Location: index.php');
    }
    if ($row == 1) {
        $_SESSION['usuario'] = $rows['nome'];
        $_SESSION['email'] = $usuario;
        $_SESSION['id_usuario'] = $idUsuario;
        header("Location: ./views/home.php");
        exit();
    } else {
        $_SESSION['usuarioInvalido'] = true;
        header('Location: index.php');
        exit();
    }
}
?>

<main>
    <div class="container">
        <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 login p-5">
            <h1 class="titulo-login mb-4">Bronze Diary</h1>
            <form method="POST" action="">
                <div class="mb-3">
                <label for="email" class="form-label text-white">Email</label>
                <input name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Email">
                </div>
                <div class="mb-3">
                <label for="password" class="form-label text-white">Senha</label>
                <input type="password" name="senha" class="form-control" id="password" placeholder="*******">
                </div>
                <button type="submit" name ="login" class="btn btn-light">Login</button>
                <span class="text-login">Ainda não possui conta?</span>
                <a class="btn btn-primary" href="/seminario-uniasselvi/views/cadastro.php">Cadastre-se</a>
                <?php if (isset($_SESSION['usuarioInvalido'])) { ?>
                    <div class="alert alert-danger mt-2" role="alert">
                        Preencha todos os campos corretamente.
                    </div>
                <?php } ?>
            </form>
            </div>
            <div class="col-md-6 d-flex align-items-center justify-content-center">
            <img src="/seminario-uniasselvi/assets/img/logo.png" alt="Placeholder Image" class="img-fluid logo-login">
            </div>
        </div>
        </div>
    </div>
</main>

<?php
unset($_SESSION['verificaEmail']);
?>
<?php include('views/footer.php'); ?>