<?php 
    $login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_STRING);
    $name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
    $pass = filter_var($_POST['pass'], FILTER_SANITIZE_STRING);
    $pass_2 = filter_var($_POST['pass_2'], FILTER_SANITIZE_STRING);

    $errors = array();

    if ($login == '')
    {
        $errors = 'Введите логин!';
    }

    if ($email == '')
    {
        $errors = 'Введите email!';
    }

    if ($name == '')
    {
        $errors = 'Введите имя!';
    }

    if ($pass == '')
    {
        $errors = 'Введите пароль!';
    }

    if ($pass_2 != $pass)
    {
        $errors = 'Введите пароль!';
    }

    if (empty($errors))
    {
        //
    }
    else
    {
        //echo '<div style="color: red">'.array_shift($errors).'</div>'
    }

    if(mb_strlen($login) < 5 || mb_strlen($login) > 90)
    {
        echo "Недопустимая длина логина";
        exit();
    }
    else if(mb_strlen($name) < 3 || mb_strlen($name) > 50)
    {
        echo "Недопустимая длина имени";
        exit();
    }
    else if(mb_strlen($pass) < 2 || mb_strlen($pass) > 6)
    {
        echo "Недопустимая длина пароля (от 2 до 6 символов)";
        exit();
    }

    $pass = md5($pass."alskdjkl24j10jkdsa32asdasdqwkMKASZZCNWWRADSLLGldldFJFDLL214");

    $mysql = new mysqli('localhost', 'root', 'root', 'register-bd');
    $mysql->query("INSERT INTO `users` (`login`, `password`, `name`) VALUES('$login', '$pass', '$name')");
    $mysql->close();

    header('Location: /account.php')
?>