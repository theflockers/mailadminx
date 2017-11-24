<?

include "config/config.php";
include "include/conn.inc";
include "include/header_users.inc";

echo "<br/><br/>\n";
echo "<table border=\"0\ bordercolor=\"green\" align=\"center\">\n";
echo " <tr>";
echo "  <td class=\"small_titulo\" align=\"center\" width=\"500\">";

/* Verifica user ou senha estão vazios */
if(empty($_POST['login']) or empty($_POST['senha']) or empty($_POST['name'])) 
	{
		echo "<br><center><a><b>Faltando Usuário, Senha ou nome</b></a><br><br>\n
		      <input type=submit value=Voltar onclick=history.back()></center>";

	}else{
		/* Checa total de mailbox permitidos*/
		$QueryMailboxes="SELECT mailboxes,maxquota FROM domain WHERE domain='".$_POST['domain']."'";
		$Mailboxes=pg_query($QueryMailboxes)or die("SELECT Total Mailboxes err");
		$mbox=pg_fetch_array($Mailboxes);
		
		$QueryTotalMailbox="SELECT count(username) as users,coalesce(sum(quota),0) as quota FROM mailbox WHERE domain='".$_POST['domain']."'";
		$TotalMailbox=pg_query($QueryTotalMailbox)or die("SELECT Total Mailbox criados err");
		$tmbox=pg_fetch_array($TotalMailbox);

		/* Setar a quota total */
		$maxquota=($mbox['maxquota']/1024)/1024;
		$totalquota=($tmbox['quota']/1024)/1024;

		/* Setar o e-mail */
		$email=$_POST['login']."@".$_POST['domain'];

		/* Checa se o não atingiu o número de mailbox permitido para esse domínio */
		if($mbox['mailboxes']>$tmbox['users']) {

			/* Verifica se já não existe o user */
			$query="SELECT username,name FROM mailbox WHERE username='".$_POST['login']."@".$_POST['domain']."'";
			$res=pg_query($query)or die("SELECT Err");
			$row=pg_fetch_row($res);

			if($email==$row[0]) 
				{
					echo "<br><center><a><b>Usuario já existe</b></a><br><br>\n
					      <input type=submit value=Voltar onclick=history.back()><br/><br/></center>";

			/* Se a cota não foi atingida */
			}elseif($_POST['quota']>($maxquota-$totalquota)){
					echo "se ".$_POST['quota'];
					echo " for maior que ";
					echo $maxquota."-".$totalquota;
					echo "<br><center><a><b>Quota exedida, verifique suas contas</b></a><br><br>\n
					      <input type=submit value=Voltar onclick=history.back()><br/><br/></center>";
			}else{
//					$email=$_POST['login']."@".$_POST['domain'];
					$quota=($_POST['quota']*1024)*1024;
					$pass=crypt($_POST['senha']);
	//				echo $num."<br>";
	//				echo $login."<br>";
	//				echo $pass."<br>";
					$create=date("Y-m-d H:i:s");
					$insert_mailbox="INSERT INTO mailbox (username,password,name,maildir,home,quota,domain,created) VALUES('$email','$pass','".$_POST['name']."','$mailbox_base/".$_POST['domain']."/".$_POST['login']."/Maildir/','$mailbox_base/".$_POST['domain']."/".$_POST['login']."/',$quota,'".$_POST['domain']."','$create')";
	
					if(pg_query($insert_mailbox)or die("Erro ao adicinar usuario"))
						{
							include "send_mail.php";
							exec("sudo bin/vuseradd.sh $email $quota");
							send_mail($_POST['login'],$_POST['name'],$_POST['domain']);
							echo "<br><center><a><b>E-mail criado com sucesso</b></a><br><br>\n
								      <input type=submit value=Voltar onclick=location=\"logon.php?flag=email&action=add\"></center><br/>";
						}else{
							echo "<br><center><a><b>Erro ao adicionar E-mail</b></a><br><br>\n
		    					      <input type=submit value=Voltar onclick=history.back()></center>";
					}
	
			}
		}else{
			echo "<br><center><a><b>Número total de mailboxes atingido<br/>Entre em contato com seu provedor de acesso</b></a><br><br>\n
			<input type=submit value=Voltar onclick=history.back()><br/><br/></center>";
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
	
