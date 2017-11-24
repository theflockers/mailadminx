<?

include "include/conn.inc";
include "include/header.inc";

echo "<br/><br/>\n";
echo "<table border=\"0\ bordercolor=\"green\" align=\"center\">\n";
echo " <tr>";
echo "  <td class=\"small_titulo\" align=\"center\" width=\"500\">";

if(empty($_POST['adm_login']) or empty($_POST['adm_senha']) or empty($_POST['domain'])) 
	{
		echo "<br><center><a><b>Faltando Usuário, Senha ou flag Admin</b></a><br><br>\n
		      <input type=submit value=Voltar onclick=history.back()></center>";

	}else{
		$query="SELECT domain FROM domain WHERE domain='".$_POST['domain']."'";
		$res=pg_query($query)or die("SELECT Err");
		$row=pg_fetch_row($res);
		if($_POST['domain']==$row[0]) 
			{
				echo "<br><center><a><b>Dominio já existe</b></a><br><br>\n
				      <input type=submit value=Voltar onclick=history.back()></center>";
			}else{
				
				$pass=crypt($_POST['adm_senha']);

				$create=date("Y-m-d H:i:s");
				$insert_domain="INSERT INTO domain (domain,description,created,aliases,mailboxes,maxquota) VALUES('".$_POST['domain']."','".ereg_replace("'","\'",$_POST['desc'])."','$create',".$_POST['alias'].",".$_POST['mboxes'].",".(($_POST['quota']*1024)*1024).")";
				$insert_admin="INSERT INTO admin (username,password,created) VALUES('".$_POST['adm_login']."@".$_POST['domain']."','$pass','$create')";
				$insert_domain_admins="INSERT INTO domain_admins (username,domains,created) VALUES('".$_POST['adm_login']."@".$_POST['domain']."','".$_POST['domain']."','$create')";
				if(pg_query($insert_domain)or die("Erro ao adicinar dominio"))
					{
						pg_query($insert_admin)or die("Erro ao adicionar admin"); 
						pg_query($insert_domain_admins)or die("Erro ao adicionar domain_admins");
							echo "<br><center><a><b>Dominio criado com sucesso</b></a><br><br>\n
							      <input type=submit value=Voltar onclick=location=\"logon.php?flag=domain&action=add\"></center><br/>";
					}else{
						echo "<br><center><a><b>Erro ao adicionar dominio</b></a><br><br>\n
	    					      <input type=submit value=Voltar onclick=history.back()></center>";
					}

			}
	}

echo "     </td>\n";
echo "    </tr>\n";
echo "   </table>\n";
echo "  </td>\n";
echo " </tr>\n";
echo "</table>\n";

include "include/footer.php";

?>
	
