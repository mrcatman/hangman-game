<h1>Виселица</h1>
<? if (!isset($_SESSION['userid'])) { ?> 
<a href="/login" class="btn">Войти</a>
<a href="/register" class="btn">Зарегистрироваться</a>
<? } else { ?> 
<p class="greeting">Добро пожаловать, <strong><?=$_SESSION['username']?></strong></p>
<a href="/game" class="btn">Начать игру</a>
<? } ?>