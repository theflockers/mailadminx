<?

session_start();


include "include/header_webmail.inc";


$mbox=imap_open("$mailhost".$_SESSION['folder'],$_SESSION['login'],$_SESSION['senha'])or die("Erro ao conectar-se");

$header=imap_headerinfo($mbox,$_GET['id'],80,140);
$struct=imap_fetchstructure($mbox,$_GET['id']);
$parts=count($struct->parts);
echo "<br/>\n";
echo "<table align=\"center\" style=\"background-color: #ddddee; width: 98%;\" cellpadding=\"0\" cellspacing=\"4\" >\n";
echo " <tr>\n";
echo "  <td style=\"font-family: verdana; font-size: 11px; font-weight: bold\" valign=\"top\">\n";

// Intra Table

echo "<table style=\"background-color: #ddddee; width: 100%;\" cellspacing=\"1\" cellpadding=\"5\">\n";
echo " <tr>\n";
echo "  <td colspan=\"2\" style=\"font-family: verdana; font-size: 14px; font-weight: bold;background-color: #bbbbdd\">\n";
echo    $_SESSION['folder'].":";
echo "	 ".ereg_replace("\?","",ereg_replace("\_"," ",ereg_replace("\?=","",ereg_replace("=\?ISO-8859-1\?Q\?","",quoted_printable_decode($header->fetchsubject)))))." - ".date('j F Y, H:i a',$header->udate)." (".$_GET['id'].") <img align=\"middle\" src=imagens/msg_read.gif /></td>\n";
echo " </tr>\n";
echo " <tr>\n";
echo "  <td style=\"background-color: #bbbbdd; width: 100px;font-family: verdana; font-weight: bold\">\n";
echo "   De:\n";
echo "  </td>\n";
echo "  <td style=\"font-family: verdana; font-size: 12px;\">\n";
echo "	 ".$header->fetchfrom."</td>\n";
echo " </tr>\n";
echo " <tr>\n";
echo "  <td style=\"background-color: #bbbbdd; font-family: verdana; font-weight: bold\">\n";
echo "   Para:\n";
echo "  </td>\n";
echo "  <td style=\"font-family: verdana; font-size: 12px;\">\n";
echo "	".$header->toaddress."</td>\n";
echo " </tr>\n";
echo " <tr>\n";
echo "  <td style=\"background-color: #bbbbdd; font-family: verdana; font-weight: bold\">\n";
echo "   Cc:\n";
echo "  </td>\n";
echo "  <td style=\"font-family: verdana; font-size: 12px;\">\n";
echo "	".$header->ccaddress."</td>\n";
echo " </tr>\n";
echo " <tr>\n";
echo "  <td style=\"background-color: #bbbbdd; font-family: verdana; font-weight: bold\">\n";
echo "   Assunto:\n";
echo "  </td>\n";
echo "  <td style=\"font-family: verdana; font-size: 12px;\">\n";
echo "	".ereg_replace("\?","",ereg_replace("\_"," ",ereg_replace("\?=","",ereg_replace("=\?ISO-8859-1\?Q\?","",quoted_printable_decode($header->fetchsubject)))))."</td>\n";
echo " </tr>\n";
include "include/msgview.inc";
//echo " <tr>\n";
//echo "  <td colspan=\"2\">\n";
//echo "   <iframe style=\"background-color: #eeeeef; border: solid 1px #AAAAAA\" width=\"100%\" height=\"320\" frameborder=\"0\" src=\"msgview.php?id=".$_GET['id']."\"></iframe>\n";
//echo "  </td>\n";
//echo " </tr>\n";
echo "</table>\n";

// End intra table
echo "  </td>\n";
echo " </tr>\n";
echo "</table>\n";
?>
