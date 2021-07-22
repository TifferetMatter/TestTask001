<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?=$data['title']?></title>
    <link href="/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>

<div class="container">

	<?php include 'Menu.php'; ?>

        <div class="row">
            <div class="col-lg-4"></div>
            <div class="col-lg-4">
            <div id="auth-form" class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Вход для администратора</h3>
                </div>
                <form id="authForm" class="panel-body">
                    <div class="input-group">
                      <span class="input-group-addon">
                        <span class="glyphicon glyphicon-user"></span>
                      </span>
                        <input type="text" id="login" name="login" class="form-control" placeholder="логин">
                    </div>
                    <div class="input-group">
                          <span class="input-group-addon">
                            <span class="glyphicon glyphicon-lock"></span>
                          </span>
                        <input type="password" id="pass" name="pass" class="form-control" placeholder="пароль">
                    </div>
                    <br>
                    <button id="authSubmit" class="btn btn-primary">войти</button>
                </form>
            </div>
        </div>
       <div class="col-lg-4"></div>

        </div>
        </div>
</body>

<script src="/js/jquery.js"></script>
<script>
       $(document).ready(function() {

        $('#authSubmit').on('click', function (e) {

            e.preventDefault();

            $.ajax({
                type: 'POST',
                url: String(window.location).replace('auth', 'login'),
                data: $('#authForm').serialize(),
                dataType: "json",

                beforeSend: function(xhr, opts) {
                    if (($('#login').val() == '') || ($('#pass').val() == '')) {
                        alert('Необходимо указать логин и пароль.');
                        return false;
                    }
                },

                success: function(data) {

                    if ('ok' == data.status)
                    {
                        window.location.replace('/admin/index');
                    }
                    else
                    {
                        alert('Вы указали неверный логин или пароль.');
                    }
                },

                error: function() {
                    alert('К сожалению, по техническим причинам авторизоваться не удалось.');
                }
            });
        });
    });
</script>

</html>