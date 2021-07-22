<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html" charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?=$data['title']?></title>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<div class="container">

    <?php include 'Menu.php'; ?>
    <h1>Создание задачи</h1>

    <form action="/user/add" method="POST" enctype="multipart/form-data">

        <div class="form-group">
            <label for="nameInput">Имя пользователя</label>
            <input type="text" name="name" class="form-control" id="nameInput" aria-describedby="nameHelp" placeholder="John Smith" required />
        </div>

        <div class="form-group">
            <label for="emailInput">E-mail</label>
            <input type="email" name="email" class="form-control" id="emailInput" aria-describedby="emailHelp" placeholder="mail@gmail.com" required />
        </div>

        <div class="form-group">
            <label for="exampleFormControlTextarea1">Текст задачи</label>
            <textarea class="form-control" id="text" name="text" rows="3" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Отправить</button>
    </form>
</div>

</body>

</html>