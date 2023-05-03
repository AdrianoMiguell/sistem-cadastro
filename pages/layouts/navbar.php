<?php
$path = getcwd();
if ($path = "C:\xampp\htdocs\sistem_cadastro") {
    $cad = "./pages/users/view_cad.php";
    $log = "./pages/users/view_login.php";
} else {
    $cad = "../users/view_cad.php";
    $log = "../users/view_login.php";
}
// } else if($path = "C:\xampp\htdocs\sistem_cadastro\"){
?>

<nav class="navbar">
    <div class="container-fluid">
        <a class="navbar-brand text-white" href="#">
            <h1 class="text-center my-5"> Sistema CRUD </h1>
        </a>
        <?php
        if (isset($_SESSION['loggedin'])) :
        ?>
            <div>
                <span> <?php $_SESSION['nome'] ?> </span>
            </div>
        <?php
        else :
        ?>
            <div class="d-flex gap-2">
                <a href="<?php echo $cad ?>" class="btn btn-danger">
                    cadastrar
                </a>
                <a href="<?php echo $log ?>" class="btn btn-success">
                    entrar
                </a>
            </div>
        <?php
        endif;
        ?>
    </div>
</nav>