<?

session_start();

//Setando as seções
$ret=$_SESSION['login'];
$_SESSION['logado']='sim';
$_SESSION['folder']=$_GET['folder'];

//incluindo cabeçalho HTML
include "include/header_webmail.inc";
include "config/config.php";

if(empty($_REQUEST['flag'])) {
		$_REQUEST['flag']="inbox";
}

switch($_REQUEST['flag']) {
	case "inbox":
		include "system/inbox.php";
	break;
	case "quarentena":
		echo "xi";
//		include "system/quarentena.php";
	break;
}

?>
