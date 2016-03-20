<?php
 session_start();
 if($_SESSION['auth_admin']=="yes_auth")
 {
	define('payments', true);
   
    if(isset($_GET["logout"]))
    {
        unset($_SESSION['auth_admin']);
        header("Location: login.php");
    }
    $_SESSION['urlpage'] = "<a href='index.php'>Главная</a>";
    
    include("include/bd_conect.php");
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html" />
    <link href="css/reset.css" rel="stylesheet" type="text/css" />
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    
    
  
	<title>Панель управления</title>
</head>
<body>
<div id="block-body">
<?php
	include("include/block_header.php");
?>
<div id="block-content">
<div id="block-parameters">
<p id="title_page"></p>
</div>
</div>
</div>
</body>
</html>

<?php

}
else{
     header("Location: login.php");
}
?>

