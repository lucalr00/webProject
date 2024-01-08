<?php
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Here you would typically check these credentials against a database.
    // For simplicity, we're just checking against hardcoded values.
    if($username == 'admin' && $password == 'password') {
        echo 'Login successful.';
        header('Location: investments.html');//prova per entrare nella pagina degli investimenti
        exit;
    } else {
        echo 'Login failed.';
    }
?>
