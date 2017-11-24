<?

//include "config/config.php";

// Caso folder não estiver setado, vai pra inbox
if(empty($_SESSION['folder'])){
	$_SESSION['folder']="INBOX";
	}

// Opening stream
$mbox=imap_open("$mailhost".$_SESSION['folder'],$_SESSION['login'],$_SESSION['senha'])or die("Erro ao conectar-se");

//Getting Mailbox List
$list=imap_getmailboxes($mbox,"$mailhost","*");

// Msgcount
$total=imap_num_msg($mbox);

// Default font style
$style="font-family: Tahoma, Verdana; font-weight: bold; background-color: #bbbbdd";

// Table with folders
echo "<br/>\n";
echo "<table width=\"98%\" align=\"center\" cellspacing=\"0\" cellpadding=\"4\" border=0>\n";
echo " <tr>\n";
echo "  <td style=\"font-family: Verdana;font-size: 15px; font-weight: bold;background-color: #ddddee\">".$_SESSION['folder']."\n";
echo "  </td>\n";
echo "  <td style=\"background-color: #ddddee\" align=\"right\">";
echo "  <form name=\"folders\" method=\"GET\" action=\"webmail_logon.php\">\n";
//echo "  <inpyt type=\"hidden\" name=\"flag\" value=\"inbox\" />\n";
// Seleciona todas as pastas

$mailbox=array();

for($n=0;$n<count($list);$n++) {
	$value=explode("}",$list[$n]->name);
	array_push($mailbox,$value[1]);
}
// Ordena
	sort($mailbox);
echo "  <span style=\"Color: #000000\"> Pastas:</span> <select name=\"folder\" OnChange=\"document.folders.submit()\">\n";
// Imprime as pastas
	for($n=0;$n<count($mailbox);$n++) {
		echo "    <option value=\"".$mailbox[$n]."\"";
			if($mailbox[$n]==$_SESSION['folder']){
				echo " selected";
		}
		echo "	>".(ereg_replace("INBOX.","",$mailbox[$n]))."</option>\n";
	}

echo "    </select>\n";
echo "   </form>\n";
echo "  </td>\n";
echo " </tr>\n";
echo " <tr>\n";
echo "  <td class=\"item\" colspan=\"2\">\n";

echo "<table style=\"width: 100%;\" cellpadding=\"2\">\n";
echo " <tr>\n";
echo "  <td colspan=\"4\">";

if(empty($init)) {
	$init=$total;
}

$pages=($total/15);
for($x=1;$x<$pages;$x++){
	$x=round($x);
	echo "<a href=webmail_logon.php?page=$init&&folder=".$_SESSION['folder'].">$x</a>\n";
	$init=$init-15;
	if($x==10) {
		echo ">>";
		$x=$pages;
	}
}
echo "  </td>\n";
echo " </tr>\n";

echo " <tr>";
echo "  <td style=\"$style\" width=\"60\"><input type=\"checkbox\" checked\">";
echo "  </td>\n";
echo "  <td style=\"$style\">&nbsp;Assunto";
echo "  </td>\n";
echo "  <td style=\"$style\">&nbsp;De";
echo "  </td>\n";
echo "  <td style=\"$style\" width=\"60\">&nbsp;Data";
echo "  </td>\n";
echo "  <td style=\"$style\" width=\"60\">&nbsp;Tamanho";
echo "  </td>\n";
echo " </tr>\n";

if(empty($page)) {
	$page=$total;
}

echo "<form name=\"mail\" method=\"POST\" action=\"statmsg.php\">\n";
echo "<input type=\"hidden\" name=\"action\" value=\"\">\n";
for($i=$page;$i>$page-15;$i--){
	if($i>0){	
		echo "<tr>";

		$header=imap_headerinfo($mbox,$i,80,140);
//		echo "<pre>\n";
//		print_r($header);
//		echo "</pre>\n";
		if($header->Unseen=='U' or $header->Unseen=='N' or $header->Recent=='N') {
				$style="font-family: Verdana; font-weight: bold; background-color: #aaaaff";
			}else{
				$style="font-family: Verdana";
//				$style="font-family: Verdana; font-weight: bold; background-color: #aaaaff";
		}

		if($header->Flagged=='F') {
			$img="imagens/prior_high.gif";
		}
		if($header->Answered=='A') {
			$img="imagens/msg_answered.gif";
			$style="background-color: #77aaff; font-family: Verdana";
	
		}elseif($header->Unseen=='U' or $header->Unseen=='N' or $header->Recent=='N') {
				$img="imagens/msg_unread.gif";
				$style="font-family: Verdana; font-weight: bold; background-color: #aaaaff";

		}elseif($header->Deleted=='D'){
				$img="imagens/msg_read.gif";
				$style="font-family: Verdana; background-color: #ddddee; text-decoration: line-through;font-style: italic";
		}else{	
				$img="imagens/msg_read.gif";
				$style="font-family: Verdana;background-color: #eeeeff";
		}
//		echo "  <td style=\"$style\"><input type=\"checkbox\" name=\"id\" value=\"".$header->Msgno."\"/>";
		echo "  <td style=\"$style\"><input type=\"checkbox\" name=\"id\" value=\"$i\">";
		echo "   <img src=\"$img\">\n";
		echo "  </td>\n";
		echo " <td style=\"$style\">";
		echo "&nbsp;<a style=\"font-size: 12px; color: #000000; text-decoration: none\" href=\"msg.php?id=$i\">".ereg_replace("\?","",ereg_replace("\_"," ",ereg_replace("\?=","",ereg_replace("=\?ISO-8859-1\?Q\?","",quoted_printable_decode($header->fetchsubject)))))."</a>\n";
//		echo "&nbsp;<a style=\"font-size: 12px; color: #000000; text-decoration: none\" href=\"msg.php?id=$i\">".ereg_replace("_"," ",ereg_replace("=\?.{0,}\?[Qq]\?","",quoted_printable_decode($header->fetchsubject)))."</a>\n";
		echo "  </td>\n";
		echo " <td style=\"$style\">";
		echo "&nbsp;<a style=\"font-size: 12px; color: #000000; text-decoration: none\" href=\"msg.php?id=$i\">".imap_utf8($header->fetchfrom)."</a>\n";
//		echo "&nbsp; <a style=\"color: #000000; text-decoration: none\" href=msg.php?id=$i>".imap_utf8($header->fetchfrom)."</a>\n";
		echo "  </td>\n";
		echo " <td style=\"$style\">";
		echo "&nbsp;<a style=\"font-size: 12px; color: #000000; text-decoration: none\" href=\"msg.php?id=$i\">".date('l j F Y, H:i a',$header->udate)."</a>\n";
		echo "  </td>\n";
		echo " <td style=\"$style; text-align: right\">";
		echo round(($header->Size/1024))."k";
		echo "  </td>\n";
		
		echo " </tr>\n";
		}
	}	
echo "</form>\n";
echo " <tr>\n";
echo "  <td>\n";
echo "  <input type=\"button\" value=\"Excluir\" onclick=\"statmsg('del')\">\n";
echo "  </td>\n";
echo " </tr>\n";
echo "</table>\n";
echo "</form>\n";
echo "  </td>\n";
echo " </tr>\n";
echo "</table>\n";
?>
