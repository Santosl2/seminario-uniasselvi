<?php include('views/header.php');


if (isset($_POST['login'])) {
    // efetuar sistema de login
    $_SESSION['user'] = 'teste';
    header("Location: ./views/home.php");
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
                        <input name="" class=" form-control" id="email" placeholder="Email" type="email">
 
                    </div>
 
                    <div class="form-group mb-4">
                        <label for="password">Senha</label>
                        <input class="form-control" id="password" placeholder="******" type="password">
 
                    </div>
 
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block" name="login"> Login </button>
                    </div>
                </form>
            </article>
        </div>
</main>

<?php include('views/footer.php'); ?>