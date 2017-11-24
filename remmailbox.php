<?

session_start();

include "include/conn.inc";
include "include/header_users.inc";
echo "<br/>\n";
echo "<table border=\"0\ bordercolor=\"green\" align=\"center\">\n";
echo " <tr>";
echo "  <td class=\"small_titulo\" align=\"center\" width=\"500\">";

if(empty($_POST['remove'])){

	$query="SELECT username,name,domain FROM mailbox WHERE username like '%".$_POST['email']."%' and domain='".$_SESSION['domain']."'";
	
	$res=pg_query($query)or die("Err");

	$Affected=pg_affected_rows($res);
	
	echo "<form action=\"remmailbox.php\" method=\"POST\">\n";
	echo "<input type=hidden name=remove value=s>\n";
	echo "   <table border=\"0\" width=\"400\">\n";

	while($row=pg_fetch_row($res)){
		
			$vlr=array(
			"EMAIL"  => $row[0],
			"NAME"  => $row[1],
			"DOMAIN"  => $row[2]
			);
			
				echo "   <tr>\n";
				echo "    <td style=\"height: 30px;\" colspan=\"2\" align=\"center\">\n";
				echo "    <span style=\"color: #000000;\">Tem certeza que deseja remover o seguinte mailbox?</span>\n";
				echo "    </td>\n";
				echo "   </tr>\n";
				echo "   <tr>\n";
				echo "    <td colspan=\"2\">\n";
				echo "     <a class=\"list\"><b>E-mail:</b> ".$vlr[EMAIL]."</a><input type=hidden name=del_user value=".$vlr[EMAIL].">\n";
				echo "    </td>\n";
				echo "    </tr>\n";
				echo "    <tr>\n";
				echo "	    <td width=\"292\" colspan=\"2\"><a class=\"list\"<b>Nome: </b>".$vlr[NAME]."</a></td>\n";
				echo "	  </tr>\n";
				echo "	  <tr>\n";
				echo "	    <td><a class=\"list\"><b>Dom&iacute;nio: </b> $vlr[DOMAIN]</a></td>\n";
//				echo "	  </tr>\n";
//				echo "	  <tr>\n";
//				echo "	    <td><a><b>Admin:</b>". $vlr[ADMIN]."</a><input type=hidden name=admin value=".$vlr[ADMIN]."></td>\n";
				echo "    <td align=right>\n";
				echo "     <input type=submit value=\"Sim\">\n";
				echo "     <input type=button value=\"N&atilde;o\" onclick=location=\"logon.php?flag=email&&action=rem\"><br>\n";
				echo "    </td>\n";
				echo "   </tr>\n"; 
				echo "    <td  bgcolor=green align=center colspan=2>\n";
	}

}elseif($_POST['remove']=="s"){
	
	$query="DELETE FROM mailbox WHERE username='".$_POST['del_user']."'";
	$u2rem=$_POST['del_user'];
	if(pg_query($query)) {
		echo exec("sudo bin/vuserdel.sh $u2rem");
                echo "<br/><br/><a>Mailbox excluido com sucesso</a><br/><br/>";
                echo "<input type=button value=Voltar onclick=location=\"logon.php?flag=email&&action=rem\"><br/><br/>\n";
	}else{
		echo "problema";
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
