<div class="logout">
    <a href="index.php?method=logout">Выйти</a>
</div>
<h2><a href="index.php?method=lk">Личный кабинет</a> пользователя <?=$user->login?></h2>

<table class="user-info">
    <tr>
        <td>Ваш логин</td>
        <td><?=$user->login?></td>
    </tr>
    <tr>
        <td>Ваше имя</td>
        <td><?=$user->name?></td>
    </tr>
    <tr>
        <td>Ваш email</td>
        <td><?=$user->email?></td>
    </tr>
    <tr>
        <td>Ваш баланc</td>
        <td><?=number_format($user->balance,2)?></td>
    </tr>
    <tr>
        <td>Последний вход</td>
        <td><?=date('Y-m-d H:i:s', $user->last_login)?></td>
    </tr>
</table>