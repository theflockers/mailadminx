<?

session_start();

$ret=$_SESSION['login'];
$_SESSION['logado']='sim';

echo $_SESSION['senha'];
echo $_SESSION['login'];


include "conn.inc";

$query="SELECT username,password,sysadmin FROM admin WHERE username='".$_SESSION['login']."'";

$res=pg_query($conn,$query)or die("Query error 1");
$row=pg_fetch_row($res);

	$log=$row[0];
	$pass=$row[1];
	$adm=$row[2];

pg_close($conn);

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
				include "system/admin/admin.inc";
				include "menu.php";
				echo " <input class=\"white\" type=submit value=Encerrar onclick=location=\"logon.php?destroy=s\">";
				if($action=="add") {
					include "system/add_domain.php";
				}
				if($action=="rem") {
					include "system/remuser.php";
				}
				if($action=="list") {
					if($info=="all"){
						include "system/fulluser.php";
					}else{	
						include "system/listuser.php";
					}
				}	
			}else{
#				echo "Usuário Normal";
				include "system/normal/user.inc";
				include "user_menu.php";
				echo "  <input class=\"white\" type=submit value=Encerrar onclick=location=\"logon.php?destroy=s\">";
				switch($flag) {
					case "email":
						if($action=="add") {	
							include "system/add_mailbox.php";
						}
						if($action=="ver") {
							include "system/list_mailbox.php";
						}
						if($action=="rem") {
							include "system/remmailbox.php";
						}
									
					break;					
					case "alias":
						if($action=="add") {	
							include "system/add_alias.php";
						}
						if($action=="ver") {
							include "system/list_alias.php";
						}
						if($action=="rem") {
							include "system/remalias.php";
						}
					break;
				}	

			}
	
	echo "  </td>";
	echo " </tr>";
	echo "</table>";
	}
	else	 
	{
		session_destroy();
		header("location:index.php?err=Usuario ou senha Invalidos&&login=$ret");
	}
?>

