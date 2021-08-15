<div class="login-block">
    <div class="error-message">
        <?=(isset($error_message) ? $error_message : '')?>
    </div>
    <form id="regform" action="index.php?method=register" method="post">
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
                <td>Повторите пароль</td>
                <td><input type="password" name="password2" placeholder="Пароль"></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center">
                    <input type="submit" value="Зарегистрироваться">
                </td>
            </tr>
        </table>
    </form>
</div>