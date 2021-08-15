$(document).ready(function (e) {
	$('#regform').submit(function (e) {
		var login = $('#regform').find('input[name=login]').val();
		if (login.length < 3 || login.length >50) {
			$('.error-message').text('Логин должен быть от 3 до 50 символов');
			return false;
		}
		var password1 = $('#regform').find('input[name=password]').val();
		var password2 = $('#regform').find('input[name=password2]').val();
		if (password1.length < 3 || password1.length >50) {
			$('.error-message').text('Пароль должен быть от 3 до 50 символов');
			return false;
		}
		if  (password1 != password2) {
			$('.error-message').text('Пароль и подтверждение не совпадают');
			return false;
		}
	});
});