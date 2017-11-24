<?

session_start();

if($_POST['logon_screen']=="yes") {
	$_SESSION['login']=$_POST['login'];
	$_SESSION['senha']=$_POST['senha'];
	$dom=explode("@",$_POST['login']);
	$_SESSION['domain']=$dom[1];
	}

//echo $login.$senha;

if($_REQUEST['destroy']=="s"){

		session_destroy();
		header("location:index.php");

	}else{
		include "include/logon.inc";
	}
include "include/footer.php";
?>
