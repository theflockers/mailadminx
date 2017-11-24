<?

include "include/conn.inc";
include "include/header.inc";

echo "<br/>\n";
echo "<table border=\"0\" bordercolor=\"green\" align=\"center\">\n";
	echo " <tr>";
	echo "  <td>";
	echo "   <table border=\"0\" width=\"500\">\n";

if(empty($_POST['remove'])){

	$query="SELECT username,domains FROM domain_admins WHERE domains='".$_POST['domain']."'";
	
	$res=pg_query($query)or die("Err");
	
	echo "<form action=\"remdomain.php\" method=\"POST\">\n";
	echo "<input type=hidden name=remove value=s><br>\n";
	
        $numrows=pg_num_rows($res) ;
        if($numrows==0) {
                echo "<tr><td align=\"center\"><a><b> Nenhum registro encontrado</b></a><p/> </td></tr>";
                echo " <tr><td align=\"center\"><input type=button value=Voltar onclick=location=\"logon.php?flag=domain&&action=rem\"></td></tr>\n";
        }




	while($row=pg_fetch_row($res)){
		
			$vlr=array(
			"ADMIN"  => $row[0],
			"DOMAIN"  => $row[1]
			);

			$query2="SELECT description,created FROM domain WHERE domain='".$vlr[DOMAIN]."'";
			$res2=pg_query($query2)or die("Query 2 error");
			$row2=pg_fetch_row($res2);

//				echo "<a>".$query2."<a>";
//				echo "<a>".$vlr[COD]."<a>";
//				echo "<a>".$row2[0]."<a><br>";
				
			
				echo "   <tr>\n";
				echo "    <td>\n";
				echo "     <a><b>Dom&iacute;nio:</b> ".$vlr[DOMAIN]."</a>"."<input type=hidden name=del_user value=".$vlr[DOMAIN].">\n";
				echo "    </td>\n";
				echo "	    <td width=292><a><b>Descri&ccedil;&atilde;o: </b>".$row2[0]."</a></td>\n";
				echo "	  </tr>\n";
				echo "	  <tr>\n";
				echo "	    <td colspan=2><a><b>Criado: </b> $row2[1]</a></td>\n";
				echo "	  </tr>\n";
				echo "	  <tr>\n";
				echo "	    <td><a><b>Admin:</b>". $vlr[ADMIN]."</a><input type=hidden name=admin value=".$vlr[ADMIN]."></td>\n";
				echo "    <td align=right>\n";
				echo "     <input type=submit value=Remover>\n";
				echo "     <input type=button value=Voltar onclick=location=\"logon.php?flag=domain&&action=rem\"><br>\n";
				echo "    </td>\n";
				echo "   </tr>\n"; 
				echo "    <td  bgcolor=green align=center colspan=2>\n";
				echo "    </td>\n";
				echo "   </tr>\n";
	}

}elseif($_POST['remove']=="s"){

	$query="DELETE FROM domain WHERE domain='".$_POST['del_user']."'";
	$query2="DELETE FROM domain_admins WHERE domains='".$_POST['del_user']."'";
	$query3="DELETE FROM admin WHERE username='".$_POST['admin']."'";
	$query4="UPDATE mailbox set active='f' domain='".$_POST['del_user']."'";
	if(pg_query($query)) {
		pg_query($query2)or die("Pau");
		pg_query($query3)or die("Pau");
		echo "<tr><td height=\"40\" align=\"center\"><a>Dominio excluido com sucesso</a></td></tr>";
		echo " <tr><td align=\"center\"><input type=button value=Voltar onclick=location=\"logon.php?flag=domain&&action=rem\"></td></tr>\n";

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
