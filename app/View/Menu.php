<nav class="navbar navbar-default">
    <div class="container-fluid">

        <div class="navbar-header">
            <span class="navbar-brand">The Zadachnik</span>
        </div>

        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li <?=('index' == ($data['active'] ?? '') ? 'class=active' : '')?>><a href="/">Список задач</a></li>
                <li <?=('create' == ($data['active'] ?? '') ? 'class=active' : '')?>><a href="/user/create">Создать задачу</a></li>
                <?=(($data['logon'] ?? '') ? '<li><a href="/admin/index">Страница администратора</a></li>' : '')?>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li><?=(($data['logon'] ?? '') ? '<a href="/admin/logout">Выход</a>' : '<a href="/admin/index">Авторизация</a>')?> </li>
            </ul>
        </div>
    </div>
</nav>