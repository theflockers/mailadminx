<?

include "config/config.php";
include "lang/$lang.inc";

echo "<input class=\"white\" type=submit value=\" ".$menu['000']." \" onclick=location=\"logon.php?flag=email\">&nbsp;";
echo "<input class=\"white\" type=submit value=\" ".$menu['004']." \" onclick=location=\"logon.php?flag=alias\">&nbsp;";
echo "<input class=\"white\" type=submit value=\" ".$menu['008']." \" onclick=location=\"logon.php?flag=vacation\">";

?>
