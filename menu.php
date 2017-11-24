<?
//width=260,height=180,scrollbars=no
if($_REQUEST['flag']=="domain")
	{
	echo "<p>\n";
	echo "<input class=\"menu\" type=\"button\" onclick=location=\"logon.php?flag=domain&&action=add\" value=\"Adicionar Dom&iacute;nios\" />\n";
	echo "<input class=\"menu\" type=\"button\" onclick=location=\"logon.php?flag=domain&&action=rem\" value=\"Remover Dom&iacute;nios\" />\n";
	echo "<input class=\"menu\" type=\"button\" onclick=location=\"logon.php?flag=domain&&action=list\" value=\"Listar Dom&iacute;nios\" />\n";
	echo "</p>\n";
//	echo "<a href=# onclick=window.open('system/adduser.php','','scrollbars=no')> => Editar Dom&iacute;nios</a><br>\n";
}
?>
