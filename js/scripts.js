$(document).ready(function(){
	
	$('body').on('click', ".btn-register", function(e){
		$('#response').html('Загрузка...');
		var username = $('#username').val();
		var password = $('#password').val();
		var repeat_password = $('#repeat_password').val();
		if (password!=repeat_password) {
			$('#response').html('Пароли не совпадают');
		} else {
			if (username=='' || password=='') {
				$('#response').html('Имя пользователя или пароль не может быть пустым');
			} else {
				$.post('/user/handleregister', {'username':username,'password':password}, function(data) {
					data = JSON.parse(data);
					$('#response').html(data.text);
					if (data.success) {
						setTimeout(function() {
							window.location.replace('/');
						},1000);
					}
				})
			}
		}
	})
	
	
	$('body').on('click', ".btn-login", function(e){
		$('#response').html('Загрузка...');
		var username = $('#username').val();
		var password = $('#password').val();
		$.post('/user/handlelogin', {'username':username,'password':password}, function(data) {
			data = JSON.parse(data);
			$('#response').html(data.text);
			if (data.success) {
				setTimeout(function() {
					window.location.replace('/');
				},1000);
			}
		})
	})
})