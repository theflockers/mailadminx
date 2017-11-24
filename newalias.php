<?

session_start();

include "include/conn.inc";
include "include/header_users.inc";

echo "<br/><br/>\n";
echo "<table border=\"0\ bordercolor=\"green\" align=\"center\">\n";
echo " <tr>";
echo "  <td class=\"small_titulo\" align=\"center\" width=\"500\">";


if(empty($_POST['alias']) or empty($_POST['alias_to']))
	{
		echo "<br><center><a><b>Faltando Alias ou Redirecionamento</b></a><br><br>\n
		      <input type=submit value=Voltar onclick=history.back()></center>";

	}else{
		$query="SELECT address FROM alias WHERE address='".$_POST['alias']."@".$_SESSION['domain']."'";
		$res=pg_query($query)or die("SELECT Err");
		$row=pg_fetch_row($res);
		if($_POST['alias']==$row[0])
 
			{
				echo "<br><center><a><b>Alias já existe</b></a><br><br>\n
				      <input type=submit value=Voltar onclick=history.back()></center>";
			}else{
				$alias=$_POST['alias']."@".$_SESSION['domain'];
				$alias_to=$_POST['alias_to']."@".$_SESSION['domain'];
				$create=date("Y-m-d H:i:s");
				$insert_alias="INSERT INTO alias(address,goto,domain,created) VALUES('$alias','$alias_to','".$_SESSION['domain']."','$create')";
				if(pg_query($insert_alias)or die("Erro ao adicinar dominio"))
					{
						echo "<br><center><a><b>Alias criado com sucesso</b></a><br><br>\n
								     <input type=submit value=Voltar onclick=location=\"logon.php?flag=alias\"></center><br/>";
					}else{
						echo "<br><center><a><b>Erro ao adicionar Alias</b></a><br><br>\n
	    					      <input type=submit value=Voltar onclick=history.back()></center>";
					}

			}
	}
echo "  </td>\n";
echo " </tr>\n";
echo "</table>\n";

include "include/footer.php";
?>
