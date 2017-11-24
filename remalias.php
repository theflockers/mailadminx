<?

session_start();

include "include/conn.inc";
include "include/header_users.inc";


echo "<form action=\"remalias.php\" method=\"POST\">\n";
echo "<input type=hidden name=remove value=s><br>\n";
echo "<table border=\"0\" bordercolor=\"green\" align=\"center\">\n";
echo " <tr>";
echo "  <td>";
echo "   <table border=\"0\" width=\"500\">\n";

if(empty($_POST['remove'])){

	$query="SELECT address,goto,domain FROM alias WHERE address like '%".$_POST['email']."%' and domain='".$_SESSION['domain']."'";

	$res=pg_query($query)or die("Err");

	$numrows=pg_num_rows($res) ;
	if($numrows==0) {
		echo "<tr><td class=\"small_titulo\" align=\"center\"><b> Nenhum registro encontrado</b><p /> </td></tr>";
		echo " <tr><td class=\"small_titulo\" align=\"center\"><input type=button value=Voltar onclick=location=\"logon.php?flag=alias&&action=rem\"></td></tr>\n";
	}
	while($row=pg_fetch_array($res)){

		$vlr=array(
		"ADDRESS"  => $row[0],
		"GOTO"  => $row[1],
		"DOMAIN"  => $row[2]
			);
			
			echo "   <tr>\n";
			echo "    <td colspan=\"2\">\n";
			echo "     <a class=\"list\"><b>Alias:</b> ".$vlr[ADDRESS]."</a>"."<input type=hidden name=del_user value=".$vlr[ADDRESS].">\n";
			echo "    </td>\n";
			echo "    </tr>\n";
			echo "    <tr>\n";
			echo "	    <td colspan=\"2\"width=\"350\"><a class=\"list\"><b>Redirecionado para: </b>".$vlr[GOTO]."</a></td>\n";
			echo "	  </tr>\n";
			echo "	  <tr>\n";
			echo "	    <td><a class=\"list\"><b>Dom&iacute;nio: </b> $vlr[DOMAIN]</a></td>\n";
//			echo "	  </tr>\n";
//			echo "	  <tr>\n";
//			echo "	    <td><a><b>Admin:</b>". $vlr[ADMIN]."</a><input type=hidden name=admin value=".$vlr[ADMIN]."></td>\n";
			echo "    <td align=\"right\">\n";
			echo "     <input type=submit value=Remover>\n";
			echo "     <input type=button value=Voltar onclick=location=\"logon.php?flag=alias&&action=rem\"><br>\n";
			echo "    </td>\n";
			echo "   </tr>\n"; 
			echo "    <td  bgcolor=green align=center colspan=2>\n";
			echo "    </td>\n";
			echo "   </tr>\n";
		}
		
}elseif($_POST['remove']=="s"){

	$query="DELETE FROM alias WHERE address='".$_POST['del_user']."'";
	if(pg_query($query)) {
		echo "<tr><td height=\"40\" align=\"center\"><a><b>Alias excluido com sucesso</b></a></td></tr>";
		echo " <tr><td align=\"center\"><input type=button value=Voltar onclick=location=\"logon.php?flag=alias&&action=rem\"></td></tr>\n";
	}else{
		echo "problema";
	}
}

	

echo "   </table>\n";
echo "  </td>\n";
echo " </tr>\n";
echo "</table>\n";
echo "</form>\n";

include "include/footer.php";

?>
