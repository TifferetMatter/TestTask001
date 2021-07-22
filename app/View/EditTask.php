<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?=$data['title'];?></title>
    <link href="/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
<div class="container">

    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div id="navbar" class="navbar-collapse collapse">

                <ul class="nav navbar-nav navbar-right">
                    <li><a href="/admin/logout">Выход</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <h1>Изменить данные задачи №<?=$data['task']['id'];?></h1>
    <form action="/admin/add" method="POST">
      <input type="hidden" name="id" value="<?=$data['task']['id'];?>" />

        <div class="form-group">
            <textarea class="form-control" id="text" name="text" rows="5" required><?=$data['task']['text'];?></textarea>
        </div>

        <div class="form-check">
            <input type="checkbox" class="form-check-input" name="done" id="done" <?=($data['task']['status'] ? ' checked' : '')?>>
            <label class="form-check-label" for="done">отметить как выполненную</label>
        </div>

        <br>
        <button type="submit" class="btn btn-primary">Отправить</button>
    </form>

</div>
</body>

</html>