<?php include('views/header.php');

$conexao = mysqli_connect($hostname, $user, $password, $database) or die ('Não foi possível conectar');

if (isset($_POST['login'])) {
    
    $usuario = mysqli_real_escape_string($conexao, $_POST['email']);
    $senha = mysqli_real_escape_string($conexao, $_POST['senha']);
    
    $query = "select email from usuarios where email = '{$usuario}' and senha = '{$senha}'";
    
    $result = mysqli_query($conexao, $query);
    
    $row = mysqli_num_rows($result);

    if(!isset($usuario)){
        $_SESSION['usuarioInvalido'] = true;  
        header('Location: index.php');
    }
    if($row == 1) {
        $_SESSION['usuario'] = $usuario;
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
    <div class="container height d-flex justify-content-center align-items-center" style="height: 100vh">
        <div class="card" style="max-width: 600px;width: 100%">
            <article class="card-body">
                <h4 class="card-title text-center mb-4 mt-1">Logue-se na SocialMedia</h4>
                <hr>
                <!-- <p class="text-success text-center">MENSAGEM DE ERRO</p> -->
                <form method="POST" action="">
                    <div class="form-group mb-4">
                        <label for="email">E-mail</label>
                        <input name="email" class=" form-control" id="email" placeholder="Email" type="email">
                    </div>
 
                    <div class="form-group mb-4">
                        <label for="password">Senha</label>
                        <input class="form-control" name="senha" id="password" placeholder="******" type="password">
                    </div>
 
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block" name="login"> Login </button>
                    </div>
                    <?php if(isset($_SESSION['usuarioInvalido'])) {?>
                            <div class="alert alert-danger mt-2" role="alert">
                                Preencha todos os campos corretamente.
                            </div>
                    <?php } ?>
                </form>
            </article>
        </div>
</main>

<?php
    unset($_SESSION['verificaEmail']); 
?>
<?php include('views/footer.php'); ?>