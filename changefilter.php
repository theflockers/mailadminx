<?

include "include/header_users.inc";

echo "<br/><br/>\n";
echo "     <table border=\"0\ bordercolor=\"green\" align=\"center\">\n";
echo "      <tr>";
echo "       <td class=\"small_titulo\" align=\"center\" width=\"500\">";

$file=fopen("tmp/maildroprc",w);
if(fputs($file,$_POST['text'])){
	copy("tmp/maildroprc","samples/maildroprc");
	echo "<br><center><a><b>Filtro alterado com sucesso</b></a><br><br>\n
              <input type=submit value=Voltar onclick=location=\"logon.php?flag=filter\"></center><br/>";
}else{
	echo "Erro ao criar nova template (cheque as permissões)";
}

echo "       </td>\n";
echo "      </tr>\n";
echo "     </table>\n";
//echo "    </td>\n";
//echo "   </tr>\n";
//echo "  </table>\n";

include "include/footer.php";

?>
