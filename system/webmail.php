<?

session_start();

//echo $_SESSION['login'];
//echo $_SESSION['senha'];

if($_SESSION['logado']=="sim"){

	 header("location:webmail_logon.php");
	
}else{
		include "include/webmail_login.inc";
}
include "include/footer.php";
?>

