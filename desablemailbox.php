<?

session_start();

include "include/conn.inc";
include "include/header_users.inc";

echo "<br/>\n";

echo "<table border=\"0\" bordercolor=\"green\" align=\"center\">\n";
echo " <tr>";
echo "  <td class=\"small_titulo\" align=\"center\" width=\"500\">";

/*

if(empty($_POST['remove'])){

	$query="SELECT username,name,domain FROM mailbox WHERE username like '%".$_POST['mailbox']."%' and domain='".$_SESSION['domain']."'";
	
	$res=pg_query($query)or die("Err");	
	
	echo "<form action=\"desablemailbox.php\" method=\"POST\">\n";
	echo "<input type=hidden name=desable value=s><br>\n";
	echo "   <table border=\"0\" width=\"500\">\n";

	while($row=pg_fetch_row($res)){
		
			$vlr=array(
			"EMAIL"  => $row[0],
			"NAME"  => $row[1],
			"DOMAIN"  => $row[2]
			);
			
				echo "   <tr>\n";
				echo "    <td>\n";
				echo "     <a class=\"list\"><b>E-mail:</b> ".$vlr[EMAIL]."</a><input type=hidden name=del_user value=".$vlr[EMAIL].">\n";
				echo "    </td>\n";
				echo "    </tr>\n";
				echo "    <tr>\n";
				echo "	    <td width=\"292\"><a class=\"list\"<b>Nome: </b>".$vlr[NAME]."</a></td>\n";
				echo "	  </tr>\n";
				echo "	  <tr>\n";
				echo "	    <td colspan=\"2\"><a class=\"list\"><b>Dom&iacute;nio: </b> $vlr[DOMAIN]</a></td>\n";
//				echo "	  </tr>\n";
//				echo "	  <tr>\n";
//				echo "	    <td><a><b>Admin:</b>". $vlr[ADMIN]."</a><input type=hidden name=admin value=".$vlr[ADMIN]."></td>\n";
				echo "    <td align=right>\n";
				echo "     <input type=submit value=Remover>\n";
				echo "     <input type=button value=Voltar onclick=location=\"logon.php?flag=email&&action=rem\"><br>\n";
				echo "    </td>\n";
				echo "   </tr>\n"; 
				echo "    <td  bgcolor=green align=center colspan=2>\n";
	}
*/
if($_POST['status']=="t") {
	$query="UPDATE mailbox SET active='f' WHERE username='".$_POST['mailbox']."'";
	if(pg_query($query)) {
                echo "<a>Mailbox desativado com sucesso</a><br/><br/>";
                echo "<input type=button value=Voltar onclick=location=\"logon.php?flag=email&&action=ver\"><br/><br/>\n";
	}else{
		echo "Problema";
	}
} else {
	$query="UPDATE mailbox SET active='t' WHERE username='".$_POST['mailbox']."'";
	if(pg_query($query)) {
                echo "<a>Mailbox reativado com sucesso</a><br/><br/>";
                echo "<input type=button value=Voltar onclick=location=\"logon.php?flag=email&&action=ver\"><br/><br/>\n";
	}else{
		echo "Problema";
	}

}

echo "    </td>\n";
echo "   </tr>\n";
echo "   </table>\n";
echo "  </td>\n";
echo " </tr>\n";
echo "</table>\n";
echo "</form>\n";

include "include/footer.php";

?>
