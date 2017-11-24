<?

include "include/header_noimage.inc";
include "include/conn.inc";


echo "<table cellpadding=\"0\" cellspacing=\"2\" align=\"center\" width=\"320\" height=\"100\" border=\"1\" >\n";
echo " <tr>\n";
echo "  <td>\n";
echo "   <table align=\"center\" width=\"250\">\n";
echo "    <tr>\n";

if(empty($_POST['action'])) {
		
		include "include/alt_passwd.inc";

}elseif($_POST['action']=="alt") {

	if($_POST['pass']==$_POST['conf_pass']) {
	
		$alt_senha="UPDATE mailbox SET password='".crypt($_POST['pass'])."' WHERE username='".$_POST['email']."'";
		if(pg_query($alt_senha)) {
			echo "<td align=\"center\"><a><b>Senha alterada com sucesso</b></a><br/><br/>\n";
			echo "<input type=\"button\" value=\"Voltar\" onclick=\"self.close()\"></td>\n";
			}else {
				echo "<td class=\"big_titulo\">Erro ao alterar senha<br/><br/>\n";
				echo "<input type=\"button\" value=\"Voltar\" onclick=\"history.back()\"></td>\n";
			}
	}else{
		echo "<td class=\"big_titulo\">As duas senhas não coincidem<br/><br/>\n";
		echo "<input type=\"button\" value=\"Voltar\" onclick=\"history.back()\"></td>\n";
	}
}	

echo "    </tr>\n";
echo "   </table>\n";
echo "  </td>\n";
echo " </tr>\n";
echo "</table>\n";
echo "</form>\n";

pg_close($conn);

?>
