<div id="block_header">

<div id="block_header1">
<h3>Начисления. Панель управления </h3>
<p id="link-nav"> <?php echo $_SESSION['urlpage'];?> </p>
</div>

<div id="block_header2">
<p align="right"><a href="administrators.php">Администраторы</a> | <a href="?logout">Выход</a></p>
<p align="right"> Вы - <span> <?php echo $_SESSION['admin_rol'];?> </span></p>
</div>
</div>

<div id="menu">
<ul>
<li><a href="add_administrators.php">Регистрация нового администратора</a></li>
<li><a href="reg_new_user.php">Регистрация нового пользователя</a></li>
<li><a href="payment.php">Платежи</a></li>
<li><a href="Users.php">Пользователи</a></li>
</ul>
</div>
<?php 
/*echo $_SESSION['admin_role']; */
?>