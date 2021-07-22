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

    <?php include 'Menu.php'; ?>;

    <table class="table">
        <thead>
        <tr>
            <th>№</th>
            <th>Имя</a></th>
            <th>E-mail</th>
            <th>Статус</th>
            <th>Правки</th>
            <th>&nbsp;</th>
        </tr>
        </thead>

        <tbody>
        <?php foreach($data['tasks'] as $task) { ?>
            <tr>
                <td><?=$task['id']?></td>
                <td><?=$task['name']?></td>
                <td><?=$task['email']?></td>
                <td><?=($task['status'] ? 'выполнена' : 'активна')?></td>
                <td><?=($task['edit'] ? 'отредактирована' : 'новая')?></td>
                <td><a href="/admin/edit?id=<?=$task['id'];?>" class="show_task">Редактировать</a></td>
            </tr>
        <?php } ?>
        </tbody>

    </table>
</body>

</html>