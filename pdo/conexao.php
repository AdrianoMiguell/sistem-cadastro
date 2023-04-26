<?php

    $username = "root";
    $password = '';

    try {
        $pdo = New PDO("mysql:host=localhost;dbname=sistem_cadastro;", $username, $password);
    } catch (\Throwable $th) {
        throw $th;
    }
