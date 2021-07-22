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

    <h1>Изменить данные задачи №<?=$data['task']['id'];?></h1>
    <form action="/admin/update" method="POST">
      <input type="hidden" name="id" value="<?=$data['task']['id']?>" />

        <div class="form-group">
            <textarea class="form-control" id="text" name="text" rows="5" required><?=$data['task']['text'];?></textarea>
        </div>

        <div class="form-check">
            <input type="checkbox" class="form-check-input" name="status" id="status" value="1" <?=($data['task']['status'] ? ' checked' : '')?>>
            <label class="form-check-label" for="status">отметить как выполненную</label>
        </div>

        <br>
        <button type="submit" class="btn btn-primary">Отправить</button>
    </form>

</div>
</body>

</html>