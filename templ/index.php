<div class="login-block">
    <?php if (isset($error_message)):?>
    <div class="error-message"><?=$error_message?></div>
    <?php endif;?>
    <form action="index.php?method=login" method="post">
        <table>
            <tr>
                <td>Логин</td>
                <td><input type="text" name="login" placeholder="Логин"></td>
            </tr>
            <tr>
                <td>Пароль</td>
                <td><input type="password" name="password" placeholder="Пароль"></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center">
                    <input type="submit" value="Войти">
                </td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center">
                    <a href="index.php?method=register">Регистрация</a>
                </td>
            </tr>
        </table>
    </form>
</div>
