<?php
    $login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
    $pass = filter_var(trim($_POST['pass']), FILTER_SANITIZE_STRING);

    $pass = md5($pass."alskdjkl24j10jkdsa32asdasdqwkMKASZZCNWWRADSLLGldldFJFDLL214");

    $mysql = new mysqli('localhost', 'root', 'root', 'register-bd');
    
    $result = $mysql->query("SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$pass'");
    $user = $result->fetch_assoc();
    if (count($user) == 0)
    {
        echo "Такой пользователь не найден";
        exit();
    }
    
    setcookie('user', $user['name'], time() + 3600 * 24 * 7, "/");

    $mysql->close();

    header('Location: /account.php')
?>