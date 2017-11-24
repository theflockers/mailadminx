<?

session_start();

$ret=$_SESSION['login'];
$_SESSION['logado']='sim';


include "conn.inc";

$query="SELECT username,password,sysadmin FROM admin WHERE username='".$_SESSION['login']."' and active='t'";

$res=pg_query($conn,$query)or die("Query error 1");
$row=pg_fetch_row($res);

	$log=$row[0];
	$pass=$row[1];
	$adm=$row[2];


//	echo $log."<br>";
//	echo $senha."<br>";
//	echo $pass."<br>";

#echo $_SESSION['login'];

if(trim(crypt($_SESSION['senha'],$pass)) == trim($pass))
	{
	
		include "system/principal.inc";
//		include "system/users.inc";	
		if($adm=="t")
			{
//				include "system/adduser.inc";
//				include "system/admin/admin.inc";
				include "menu.php";
//				echo " <input class=\"white\" type=submit value=Encerrar onclick=location=\"logon.php?destroy=s\">";
					if(empty($flag)) {
						include "include/index.inc";
					}
					switch($_REQUEST['flag']) {
					case "domain":
						if(empty($_REQUEST['action'])){
							$_REQUEST['action']="add";
						}
						if($_REQUEST['action']=="add") {
							include "system/add_domain.php";
						}
						if($_REQUEST['action']=="rem") {
							include "system/remuser.php";
						}
						if($_REQUEST['action']=="list") {
							if($_REQUEST['info']=="all"){
								include "system/fulluser.php";
							}else{	
								include "system/listuser.php";
							}
						}	
					break;
					case "filter":
						include "include/filter.inc";
					break;
				}
				
 		}else{
#				echo "Usuário Normal";
//				include "system/normal/user.inc";
				include "user_menu.php";
				echo "  </td>\n </tr>\n <tr>\n";
//				echo "  <input class=\"white\" type=submit value=Encerrar onclick=location=\"logon.php?destroy=s\">";
				switch($_REQUEST['flag']) {
					case "email":
						if(empty($_REQUEST['action'])){
							$_REQUEST['action']="add";
						}
						if($_REQUEST['action']=="add") {	
							include "system/add_mailbox.php";
						}
						if($_REQUEST['action']=="ver") {
							include "system/list_mailbox.php";
						}
						if($_REQUEST['action']=="rem") {
							include "system/remmailbox.php";
						}
						if($_REQUEST['action']=="des") {
							include "system/desable_mailbox.php";
						}
								
					break;					
					case "alias":
						if(empty($_REQUEST['action'])){
							$_REQUEST['action']="add";
						}
						if($_REQUEST['action']=="add") {	
							include "system/add_alias.php";
						}
						if($_REQUEST['action']=="ver") {
							include "system/list_alias.php";
						}
						if($_REQUEST['action']=="rem") {
							include "system/remalias.php";
						}
					break;
//					case "message":
//						include "system/webmail.php";
//					break;

				}	

			}
	
	echo "  </td>";
	echo " </tr>";
	echo "</table>";
	}
	else	 
	{
		$query="SELECT username,password FROM mailbox WHERE username='".$_SESSION['login']."' and active='t'";
		$res=pg_query($conn,$query)or die("Query error 1");
		$row=pg_fetch_row($res);

		$log=$row[0];
		$pass=$row[1];

		pg_close($conn);

		if(trim(crypt($_SESSION['senha'],$pass)) == trim($pass))
			{
				include "system/webmail.php";
			}else{
				session_destroy();
				header("location:index.php?err=Usuario ou senha Invalidos&&login=$ret");
			}
	}
pg_close($conn);

?>
