<?php

    $username = "root";
    $password = '';

    try {
        $pdo = New PDO("mysql:host=localhost;dbname=testedist;", $username, $password);
    } catch (\Throwable $th) {
        throw $th;
    }
