<?php
    if (session_status() != PHP_SESSION_ACTIVE){
        session_start();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>БЛОГ</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/post/">ПОСТЫ<span class="sr-only">(current)</span></a>
                </li>
            </ul>
            <div id="LoginContainer">
                <?php
                    if (session_status() != PHP_SESSION_ACTIVE){
                        session_start();
                    }
                    if (isset($_SESSION['isAuth'])) {
                        echo '<a href="" id="logOut"> Вихід </a>';
                    } else {
                        echo '<a href="" data-toggle="modal" data-target="#AuthUser"> Регистрация</a>';
                        echo '<span class="text-primary"> / </span>';
                        echo '<a href="" data-toggle="modal" data-target="#LoginUser"> Авторизуватися</a>';
                    }
                ?>
            </div>
        </div>
    </nav>
    <div id='MassageContainer'>
        <?php
            if (session_status() != PHP_SESSION_ACTIVE){
                session_start();
            }
            if (isset($_SESSION['error'])){
            ?>
            <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
            <p></p>
                <?=$_SESSION['error']?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php
                unset($_SESSION['error']);
            }
            if (isset($_SESSION['success'])){
            ?>
            <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                <?=$_SESSION['success']?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php
                unset($_SESSION['success']);
            }
            if (session_status() != PHP_SESSION_ACTIVE){
                session_start();
            }
        ?>
    </div>
    
    <!-- Modal -->
<div class="modal fade" id="LoginUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Авторизоваться</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Электронная почта</label>
                    <input type="email" class="form-control" id="EmailAuth" aria-describedby="emailHelp" name="email" required>
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Пароль</label>
                    <input type="password" class="form-control" id="PasswordAuth" name="Password" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                <button type="submit-button" class="btn btn-primary" id='Login'>Авторизоваться</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="AuthUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Регистрация</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <div class="modal-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Электронная почта</label>
                    <input type="email" class="form-control" id="EmailCreate" aria-describedby="emailHelp" name="email" required>
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Пароль</label>
                    <input type="password" class="form-control" id="PasswordCreate" name="Password" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                <button type="button" class="btn btn-primary" id='Create'>Регистрация</button>
            </div>
        </div>
    </div>
</div>
