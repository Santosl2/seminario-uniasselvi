<?php include('header.php'); 


$query = "SELECT * 
             from postagens p
             join usuarios u on p.id_usuario = u.id
             where p.id_usuario = {$idUsuario}";

$result = mysqli_fetch_all(mysqli_query($conexao, $query), MYSQLI_ASSOC);
?> 

<h1>entrou</h1>

<h3>POSTAGENS</h3>
<?php foreach($result as $postagem) {?>
    <?php echo $postagem['corpo']?> </br>
<?php }?>
 
<?php include('footer.php'); ?>