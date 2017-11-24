<?

session_start();


//echo $_SESSION['login'];
//echo $_SESSION['senha'];

if($_SESSION['logado']=="sim"){

	 header("location:logon.php");
	
}else{
		include "include/header_logo.inc";
		include "include/login.inc";
}
include "include/footer.php";
?>

