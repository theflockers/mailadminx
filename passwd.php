<?

include "config/config.php";
include "include/header.inc";
include "include/conn.inc";


echo "<table cellpadding=\"0\" cellspacing=\"2\" align=\"center\" width=\"320\" height=\"100\" border=\"1\" >\n";
echo " <tr>\n";
echo "  <td>\n";

echo "   <table align=\"center\" width=\"250\">\n";
echo "    <tr>\n";

if($_POST['alt']!="yes") {

	echo "	  <form name=\"passwd\" method=\"POST\">\n";
	echo "    <input type=\"hidden\" name=\"alt\" value=\"yes\" />\n";

	echo "     <td height=\"50\" align=\"center\" colspan=\"2\" class=\"big_titulo\">Alteração de Senha</td>\n";
	echo "    </tr>\n";
	echo "    <tr>\n";
	echo "     <td width=\"100\" class=\"small_titulo\">Usuário:</td>\n";
	echo "     <td width=\"150\" class=\"small_titulo\"><input type=\"text\" name=\"user\"  size=\"20\" value=\"".$_GET['user']."\"/></td>\n";
	echo "    </tr>\n";
	echo "    <tr>\n";
	echo "     <td class=\"small_titulo\">Senha:</td>\n";
	echo "     <td class=\"small_titulo\"><input type=\"password\" name=\"pass\" size=\"20\" /></td>\n";
	echo "    </tr>\n";
	echo "    <tr>\n";
	echo "     <td class=\"small_titulo\">Nova Senha:</td>\n";
	echo "     <td class=\"small_titulo\"><input type=\"password\" name=\"newpass\"size=\"20\" /></td>\n";
	echo "    </tr>\n";
	echo "    <tr>\n";
	echo "    <td>&nbsp;</td>\n";
	echo "     <td height=\"50\" class=\"small_titulo\">\n";
	echo "      <input type=\"button\" value=\"Alterar\" onclick=\"alt_senha()\">\n";
	echo "      <input type=\"button\" value=\"Corrigir\" onclick=\"document.passwd.reset()\">\n";
	echo "     </td>\n";
	echo "    </tr>\n";
	echo "   </table>\n";
	echo "  </td>\n";
}
elseif($_POST['alt']=="yes") {


	$query="SELECT username,password FROM mailbox WHERE username='".$_POST['user']."'";

	$res=pg_query($conn,$query)or die("Query error 1");
	$row=pg_fetch_row($res);
	
	$log=$row[0];
	$passwd=$row[1];



	if(trim(crypt($_POST['pass'],$passwd)) == trim($passwd))
		{
	
		$alt_senha="UPDATE mailbox SET password='".crypt($_POST['newpass'])."' WHERE username='".$_POST['user']."'";
		if(pg_query($alt_senha)) {
			echo "<td align=\"center\" class=\"big_titulo\">Senha alterada com sucesso<br/><br/>\n";
			echo "<input type=\"button\" value=\"Voltar\" onclick=\"history.back()\"></td>\n";
		}
			else {
				echo "<td class=\"big_titulo\">Erro ao alterar senha</td>\n";
			}
	}
	else {
		echo "<td align=\"center\" class=\"big_titulo\">Senha incorreta<br/><br/>\n";
		echo "<input type=\"button\" value=\"Voltar\" onclick=\"history.back()\"></td>\n";
	}
}
else 
{
	echo "Erro inesperado\n";
}
echo "    </tr>\n";
echo "   </table>\n";
echo "  </td>\n";
echo " </tr>\n";
echo "</table>\n";
echo "</form>\n";

pg_close($conn);

include "include/footer.php";
?>
