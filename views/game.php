<? if (!$gameData['logged_in']) {?>
	<h2>Ошибка</h2>
	<h4>Войдите на сайт, чтобы начать игру.</h4>
	<p><a class="btn-underline" href="/login">Вход</a></p>
<? } else { ?>
	<? if (!$gameData['game_started']) {?>
		<p>Вы еще не начали игру</p>
	<? } else { ?>
		<p>Вы начали игру</p>
	<? } ?>
<? } ?>