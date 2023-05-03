<?php

session_start();
include "./conexao.php";

if (getenv('REQUEST_METHOD') == 'POST' && isset($_POST['nome']) && isset($_POST['nascimento']) && isset($_POST['email']) && isset($_POST['password'])) {

    $nome = $_POST['nome'];
    $nascimento = $_POST['nascimento'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if(gettype($nome) != 'string' || gettype($email) != 'string' || gettype($password) != 'string' || gettype($nascimento) != 'string') {
        header('Location: '.$_SERVER['HTTP_REFERER']);
        return $m = "Tipo invalido";
    }

    $sql = "SELECT * FROM cadastro WHERE nome='" . $nome . "' AND email='" . $email . "'";
    $result = $pdo->prepare($sql);

    if ($result->execute()) {
        if ($result->rowCount() > 0) {
            $row = $result->fetch(PDO::FETCH_ASSOC);
            $id = $row['id'];
            $nome = $row['nome'];
            $idade = $row['idade'];

            $_SESSION['id'] = $id;
            $_SESSION['nome'] = $nome;
            $_SESSION['idade'] = $idade;

            echo "Usuario já existe!";
            echo "<a href='../index.php'> Voltar </a>";
        } else {
            // pegar idade atual

            $data_ago = new DateTime('now');
            $data_nasc = new DateTime($nascimento);

            $interval =  date_diff($data_ago, $data_nasc);
            $idade = $interval->y;
            var_dump($idade);

            $sql = "INSERT INTO `cadastro` (`id`, `nome`, `nascimento`, `idade`, `email`, `password`) VALUES (NULL, '" . $nome . "', '" . $nascimento . "', '" . $idade . "', '" . $email . "', '" . $password . "')";
            $result = $pdo->prepare($sql);
            if ($result->execute()) {
                header("Location: ../index.php");
                return $m = "Tipo invalido";
            } else {
                printf("Error");
            }
        }
    } else {
        print("Error");
        exit;
    }
} else {
    print("Ops, você esqueceu de algo");
    exit;
}



// $sql = "INSERT INTO `cadastro` (`id`, `nome`, `idade`) VALUES (NULL, '" . $nome . "', '" . $idade . "')";
// $result = $pdo->prepare($sql);
// if ($result->execute()) {
//     header("Location: ../index.php");
// } else {
//     printf("Error");
// }

// exit;
