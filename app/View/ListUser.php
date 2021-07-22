<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html" charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?=$data['title']?></title>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/datatables.css" rel="stylesheet">
</head>

<body>
<div class="container">
    <?php include 'Menu.php'; ?>

    <h1>Список задач</h1>
    <table id="taskList" class="display">

        <thead>
        <tr>
            <th>№</th>
            <th>Имя</th>
            <th>E-mail</th>
            <th>Статус</th>
            <th>Дата</th>
        </tr>
        </thead>

        <tbody>
        <?php foreach($data['tasks'] as $task) { ?>
            <tr data-taskId="<?=$task['id']?>">
                <td><?=$task['id']?></td>
                <td><?=$task['name']?></td>
                <td><?=$task['email']?></td>
                <td><?=($task['status'] ? 'выполнена' : 'активна')?></td>
                <td><?=($task['edit'] ? 'отредактирована' : 'новая')?></td>
            </tr>
        <?php } ?>
        </tbody>

    </table>

    <div class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Просмотр задачи</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <b>Имя пользователя:</b> <span id="nameContainer"></span><br />
                    <b>Email:</b> <span id="emailContainer"></span><br />
                    <b>Текст:</b> <span id="textContainer"></span><br />
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                </div>
            </div>
        </div>
    </div>

	<?php include 'Footer.php'; ?>
</div>


</body>
<script src="/js/jquery.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/datatables.js"></script>
<script type="text/javascript">
    $(document).ready(function(){

        $('#taskList').DataTable({
            searching: false,
            lengthChange: false,
            paging: true,
            pageLength: 3,
            pagingType: 'simple_numbers',
            language: {
                info: 'страница _PAGE_ из _PAGES_',
                paginate: {
                    first:    '«',
                    previous: '‹',
                    next:     '›',
                    last:     '»'
                },
            }
        });

        $('#taskList tbody').on( 'click', 'tr', function () {
            const taskId = $(this).attr('data-taskId');
            $.ajax({
                url: '/user/json',
                type: 'post',
                dataType: 'json',
                data: 'id='+taskId,
                success: function(msg) {
                    if ('' != msg)
                    {
                        $('#nameContainer').html(msg.name);
                        $('#emailContainer').html(msg.email);
                        $('#textContainer').html(msg.text);
                        $('.modal').modal('show');
                    }
                    console.log(msg['name']);
                }
            });
        });
    });
</script>
</html>