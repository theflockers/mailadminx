<?

include "config/config.php";
include "lang/$lang.inc";


if($_REQUEST['flag']=="email")
	{
   echo "<p align=\"center\"> <!-- &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>".$menu['000'].": </span-->";
//	echo "   <blockquote>\n";
   echo "   <input class=\"menu\"type=\"button\" onclick=location=\"logon.php?flag=email&&action=add\" value=\"".$menu['001']."\">\n";
  echo "    <input class=\"menu\" type=\"button\" onclick=location=\"logon.php?flag=email&&action=ver\" value=\"".$menu['002']."\">\n";
  echo "    <input class=\"menu\" type=\"button\" onclick=location=\"logon.php?flag=email&&action=rem\" value=\"".$menu['003']."\">\n";
//	echo "    <a href=logon.php?flag=email&&action=add> ".$menu['001']."</a>\n";	
//	echo "    <a href=logon.php?flag=email&&action=ver> ".$menu['002']."</a>\n";
//	echo "    <a href=logon.php?flag=email&&action=rem> ".$menu['003']."</a><br>\n";
	echo "</p>\n";
//	echo "   </blockquote>\n";
}
if($_REQUEST['flag']=="alias")
	{
//	echo "<p><span>".$menu['004']."</span>";
//	echo "<blockquote>\n";
//	echo "<a href=logon.php?flag=alias&&action=add>=> ".$menu['005']."</a>\n";
//	echo "<a href=logon.php?flag=alias&&action=ver>=> ".$menu['006']."</a>\n";
//	echo "<a href=logon.php?flag=alias&&action=rem>=> ".$menu['007']."</a><br>\n";
//	echo "</blockquote>\n";
   echo "<p align=\"center\"> <!-- &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>".$menu['000'].": </span-->";
//	echo "   <blockquote>\n";
   echo "   <input class=\"menu\"type=\"button\" onclick=location=\"logon.php?flag=alias&&action=add\" value=\"".$menu['005']."\">\n";
  echo "    <input class=\"menu\" type=\"button\" onclick=location=\"logon.php?flag=alias&&action=ver\" value=\"".$menu['006']."\">\n";
  echo "    <input class=\"menu\" type=\"button\" onclick=location=\"logon.php?flag=alias&&action=rem\" value=\"".$menu['007']."\">\n";
  echo "</p>\n";

}

?>
