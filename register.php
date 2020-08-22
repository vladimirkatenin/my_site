<!DOCTYPE html>
<html lang="ru">
<?php require "db.php"; ?>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Сайт-резюме Владимира Катенина</title>
    <link rel="icon" href="images/favicon.ico" type="image/x-icon" />

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous" />

    <!-- JS scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <style>
    .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    @media (min-width: 768px) {
        .bd-placeholder-img-lg {
            font-size: 3.5rem;
        }
    }
    </style>

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet" />
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample08"
                aria-controls="navbarsExample08" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-md-center" id="navbarsExample08">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.html">Главная</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link transition" href="index.html#cv">Резюме</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link">Java/Scala/Kt, С++, Py, DL/ML/CV/NLP</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Личный кабинет<span class="sr-only">(current)</span></a>
                        <!-- disabled -->
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#">Книжная полка</a>
                        <!-- disabled -->
                    </li>
                    <li class="nav-item">
                        <a class="nav-link transition" href="competitions.html">Соревнования</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <main role="main">
        <div class="py-5 cv-bg" style="min-height: 100vh;">
            <div class="container"
                style="padding: 80px 10px 0 10px; display:flex; flex-direction: column; justify-content: center; align-items: center;">
                <div class="stroke">
                    <?php if ($_COOKIE['user'] == ''): ?>
                    <h1 style="font-size: 40px;">Регистрация</h1><br>
                    <div class="text-center">
                        <form action="php-auth/check.php" method="post" class="justify-content-center">
                            <input type="text" class="form-control" name="login" id="login"
                                placeholder="Введите логин" required><br>
                            <input type="email" class="form-control" name="email" id="email"
                                placeholder="Введите почту" required><br>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Введите имя" required><br>
                            <input type="password" class="form-control" name="pass" id="pass"
                                placeholder="Введите пароль" required><br>
                            <input type="password" class="form-control" name="pass_2" id="pass_2"
                                placeholder="Введите пароль ещё раз" required><br>
                            <button class="btn btn-primary btn-lg btn-block stroke"
                                type="submit">Зарегистрироваться</button>
                                <?php echo '<div style="color: red">'.array_shift($errors).'</div>';?>
                        </form>
                        
                    </div>
                    <?php else: ?>
                    <h2>Вы уже зарегистрированы. Чтобы выйти из аккаунта, нажмите <a href="php-auth/exit.php">здесь</a>.
                    </h2>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </main>

    <footer class="text-muted bg-dark" style="text-align: center;">
        <div class="container">
            <p>
                v0.4.1 от 22.08.2020
                <br>Сделано на Bootstrap
            </p>
        </div>
    </footer>
    <script type="text/javascript">
    $(".sliding-link").click(function(e) {
        e.preventDefault();
        var aid = $(this).attr("href");
        $("html,body").animate({
            scrollTop: $(aid).offset().top
        }, "slow");
    });
    </script>
    <script type="text/javascript">
    var myHash = location.hash; //получаем значение хеша
    location.hash = ""; //очищаем хеш
    if (myHash[1] != undefined) {
        //проверяем, есть ли в хеше какое-то значение
        $("html, body").animate({
            scrollTop: $(myHash).offset().top
        }, 1000); //скроллим за секунду
    }
    </script>
</body>

</html>