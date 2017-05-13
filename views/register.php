<? if (isset($_SESSION['userid'])) { ?> 
	<h2>Ошибка</h2>
	<h4>Вы уже вошли.</h4>
	<p><a class="btn-underline" href="/">На главную</a></p>
<? } else { ?>

<h3>Регистрация</h3>
<div class="dashed-block">
	<label>Имя пользователя<input type="text" class="text-input" id="username"/></label>
	<label>Пароль<input class="text-input" type="password" id="password"/></label>
	<label>Повторите пароль<input class="text-input" type="password" id="repeat_password"/></label>
	<a class="btn btn-register">Зарегистрироваться</a>
	<p id="response" class="response"></p>
</div>

<p>Уже зарегистрированы? <a class="btn-underline" href="/login">Войти</a></p> 

<? } ?> 