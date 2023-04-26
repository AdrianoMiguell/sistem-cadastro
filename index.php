<?php
include "./pdo/conexao.php";
$result = $pdo->prepare("SELECT * FROM users");
$result->execute();

if(isset($m)) {
    echo $m;
}
// if(!$result->execute()) {
//     echo "Deu ruim";
//     exit;
// }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">

    <style>
        .divInput, .secInfo {
            display: grid;
            gap: 0 1em;
            text-align: center;
            padding: .25em 0;
        }
        .divInput{
            background-color: #303030;
            grid-template-columns: 8em 1fr;
        }
        .secInfo{
            background-color: #303030;
            grid-template-columns: 1ftr 1fr;
        }
        .divInfo{
            display: flex;
            justify-content: space-evenly;
            align-items: center;
            text-align: center;
        }
    </style>
</head>

<body>
    <main style="margin: 2em;">
        <h1 class="text-center"> Sistema CRUD </h1>

        <form action="./pdo/cadastro.php" method="post">
            <legend> Cadastro do usuario </legend>
            <div class="divInput">
                <label for="nome"> Nome </label>
                <input type="text" id="nome" name="nome">
            </div>
            <div class="divInput">
                <label for="nascimento"> nascimento </label>
                <input type="date" id="nascimento" name="nascimento">
            </div>
            <div class="divInput">
                <label for="email"> email </label>
                <input type="email" id="email" name="email">
            </div>
            <div class="divInput">
                <label for="password"> Senha </label>
                <input type="password" id="password" name="password">
            </div>
            <input type="submit" value="enviar">
        </form>

        <section class="m-5 secInfo">
            <?php
            if (isset($result) && $result->rowCount() != 0) {
                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                    echo "<div class='divInfo'>
                    <h5 class='card-title'> " . $row['nome'] . "</h5>
                    <p class='card-text'> " . $row['idade'] . "</p>
                    </div>";
                }
            }
            else{
                echo "<div class='divInfo'>
                <h5 class='card-title'> Nenhum cadastro realizado </h5>
                </div>";
            }
            ?>
        </section>
    </main>
</body>

</html>