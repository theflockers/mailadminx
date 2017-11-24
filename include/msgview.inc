<?

/* Inicio do bagulho  */

include "config/config.php";

/* Conecta do imap host  */

$mbox=imap_open("$mailhost".$_SESSION['folder'],$_SESSION['login'],$_SESSION['senha'])or die("Erro ao conectar-se");


/* getting headers */

$header=imap_headerinfo($mbox,$_GET['id'],35,35);

/* Estrutura */

$struct=imap_fetchstructure($mbox,$_GET['id']);

/* Partes (não entendi como funciona isso ainda) */

$parts=count($struct->parts);

//echo "<pre>\n";
//print_r($struct);
//echo "</pre>\n";


/* Verifica a existencia do diretório temporário do usuario \
   e caso não houver, cria-o */

if(!file_exists("tmp/".$_SESSION['login']))
	mkdir("tmp/".$_SESSION['login']);

/* Seta o diretorio */

$mytmpdir="tmp/".$_SESSION['login']."/";


/* Iniciando a verificação das partes */

if($parts!=0){
	for($i=0;$i<=$parts;$i++){
		if($struct->parts[$i]->subtype=="PLAIN") {
//			echo "<script>alert('".$struct->parts[$i]->subtype."')</script>";
			$msg=imap_fetchbody($mbox,$_GET['id'],1);
			echo "<tr>\n";
			echo " <td colspan=\"2\">\n";
			echo "  <pre>";
			echo     quoted_printable_decode($msg);
			echo "  </pre>\n";
			echo " </td>\n";
			echo "</tr>\n";
		}
		elseif($struct->parts[$i]->subtype=="GIF"){	
//		echo "<script>alert('".$struct->parts[$i]->subtype."')</script>";
//			print_r($struct->parts[$i]);
			
			$msg=imap_fetchbody($mbox,$_GET['id'],$i);
//			echo $msg;
			$file=$mytmpdir.$struct->parts[$i]->dparameters[0]->value;
			$name_file=$struct->parts[$i]->dparameters[0]->value;
//			$name_file=$struct->parts[$i]->dparameters[0]->value;
			$fp=fopen($file,w);
			fputs($fp,base64_decode($msg));
						
			echo "<tr >\n";
			echo " <td style=\"background-color: #ddddee\">\n";
			echo "  <span style=\"color: #000000\">\n";

			if($i==1){
				echo "Anexos: ";
				}

			echo "</span>\n";
			echo " </td>\n";
			echo " <td style=\"background-color: #ddddff\">\n";
			echo "  <img src=\"imagens/attach.gif\" align=\"middle\">&nbsp;&nbsp;\n";
			echo "  <a style=\"color: #000000\" href=\"$file\">$name_file</a>\n";
			echo " </td>\n";
			echo "</tr>\n";

		}
		elseif($struct->parts[$i]->subtype=="MSWORD"){	
//		echo "<script>alert('".$struct->parts[$i]->subtype."')</script>";
//			print_r($struct->parts[$i]);
			
			$msg=imap_fetchbody($mbox,$_GET['id'],2);
//			echo $msg;
			$name_file=ereg_replace("\?","",ereg_replace("\_"," ",ereg_replace("\?=","",ereg_replace("=\?ISO-8859-1\?Q\?","",quoted_printable_decode($struct->parts[$i]->dparameters[0]->value)))));
			$file=$mytmpdir.$name_file;
//			$name_file=$struct->parts[$i]->dparameters[0]->value;

//			$name_file=$struct->parts[$i]->dparameters[0]->value;
			$fp=fopen($file,w);
			fputs($fp,base64_decode($msg));
						
			echo "<tr >\n";
			echo " <td style=\"background-color: #ddddee\">\n";
			echo "  <span style=\"color: #000000\">\n";

			if($i==1){
				echo "Anexos: ";
				}

			echo "</span>\n";
			echo " </td>\n";
			echo " <td style=\"background-color: #ddddff\">\n";
			echo "  <img src=\"imagens/attach.gif\" align=\"middle\">&nbsp;&nbsp;\n";
			echo "  <a style=\"color: #000000\" href=\"$file\">$name_file</a>\n";
			echo " </td>\n";
			echo "</tr>\n";

		}
		elseif($struct->parts[$i]->subtype=="VND.SUN.XML.WRITER"){	
//		echo "<script>alert('".$struct->parts[$i]->subtype."')</script>";
//			print_r($struct->parts[$i]);
			
			$msg=imap_fetchbody($mbox,$_GET['id'],2);
//			echo $msg;
			$name_file=ereg_replace("\?","",ereg_replace("\_"," ",ereg_replace("\?=","",ereg_replace("=\?ISO-8859-1\?Q\?","",quoted_printable_decode($struct->parts[$i]->dparameters[0]->value)))));
			$file=$mytmpdir.$name_file;
//			$name_file=$struct->parts[$i]->dparameters[0]->value;

//			$name_file=$struct->parts[$i]->dparameters[0]->value;
			$fp=fopen($file,w);
			fputs($fp,base64_decode($msg));
						
			echo "<tr >\n";
			echo " <td style=\"background-color: #ddddee\">\n";
			echo "  <span style=\"color: #000000\">\n";

			if($i==1){
				echo "Anexos: ";
				}

			echo "</span>\n";
			echo " </td>\n";
			echo " <td style=\"background-color: #ddddff\">\n";
			echo "  <img src=\"imagens/attach.gif\" align=\"middle\">&nbsp;&nbsp;\n";
			echo "  <a style=\"color: #000000\" href=\"$file\">$name_file</a>\n";
			echo " </td>\n";
			echo "</tr>\n";

		}


		elseif($struct->parts[$i]->subtype=="JPEG"){	
//		echo "<script>alert('".$struct->parts[$i]->subtype."')</script>";
//			print_r($struct->parts[$i]);
			$msg=imap_fetchbody($mbox,$_GET['id'],$i);
			$file=$mytmpdir.ereg_replace("<","",ereg_replace(">","",$struct->parts[$i]->dparameters[0]->value));
			$name_file=ereg_replace("<","",ereg_replace(">","",$struct->parts[$i]->dparameters[0]->value));
//			$name_file=$struct->parts[$i]->dparameters['value'];
//			echo $msg;
//			echo $file;
			$fp=fopen("$file",w);
			fputs($fp,base64_decode($msg));
///			echo "<img src=\"$file\"><br/>\n";
			echo "<tr>\n";
			echo " <td style=\"background-color: #ddddee\">\n";
			echo "  <span style=\"color: #000000\">\n";

			if($i==1){
				echo "Anexos: ";
				}

			echo "</span>\n";
			echo " </td>\n";
			echo " <td style=\"background-color: #ddddff; height: 5px;\">\n";
			echo "  <img src=\"imagens/attach.gif\" align=\"middle\">&nbsp;&nbsp;\n";
			echo "  <a style=\"color: #000000\" href=\"$file\">$name_file</a>\n";
			echo " </td>\n";
			echo "</tr>\n";

		}

		elseif($struct->parts[$i]->subtype=="HTML"){	
//			echo "<script>alert('".$struct->parts[$i]->subtype."')</script>";
////			echo "<pre>".print_r($struct->parts[$i])."</pre>";
			$msg=imap_fetchbody($mbox,$_GET['id'],1);
//			$file=$mytmpdir."unnamed.htm";
//			$fp=fopen($file,w);
//			fputs($fp,$msg);
//			fclose($fp);
			echo "<tr>\n";
			echo " <td colspan=\"2\">\n";
//			echo " <a href=\"".$file."\">unnamed.htm</a>";
			echo quoted_printable_decode($msg);
//			include "tmp/unnamed.htm";
			echo " </td>\n";
			echo "</tr>\n";
			
			
		}
		elseif($struct->parts[$i]->subtype=="ALTERNATIVE"){
			$altparts=count($struct->parts[$i]->parts);
//			echo "<script>alert('".$struct->parts[$i]->subtype."')</script>";
			for($n=0;$n<$altparts;$n++){
				if($struct->parts[$i]->parts[$n]->subtype=="PLAIN") {
					echo "<script>alert('".$struct->parts[$i]->parts[$n]->subtype."')</script>";
//					echo "<!--";
					$msg=imap_fetchbody($mbox,$_GET['id'],1.1);
					echo "<tr>\n";
					echo " <td colspan=\"2\">\n";
					echo quoted_printable_decode($msg);
					echo " </td>\n";
					echo "</tr>\n";
//					echo "-->\n";
				}
				elseif($struct->parts[$i]->parts[$n]->subtype=="HTML"){	
//					echo "<script>alert('".$struct->parts[$i]->parts[$n]->subtype."')</script>";
					$msg=imap_fetchbody($mbox,$_GET['id'],"1.2");
					$file="tmp/unnamed.htm";
					$fp=fopen($file,w);
					fputs($fp,$msg);
					echo "<tr>\n";
					echo " <td colspan=\"2\">\n";
					echo " <a href=\"".$file."\">unnamed.htm</a>";
					echo " </td>\n";
					echo "</tr>\n";
		
//					include "tmp/unamed.htm";
					//echo quoted_printable_decode($msg);
				}
			}
		}
	}
}else{
	$msg=imap_fetchbody($mbox,$_GET['id'],1);

	if($struct->subtype=="PLAIN") {
		echo "<tr>\n";
		echo " <td colspan=\"2\">\n";
		echo "  <pre style=\"font-size:12px;\">\n";
		echo "    ".quoted_printable_decode($msg);
		echo "  </pre>\n";
		echo " </td>\n";
		echo "</tr>\n";

	}else{
		echo "<tr>\n";
		echo " <td colspan=\"2\">\n";
		echo "  <pre style=\"font-size:12px;\">\n";
		echo "    ".quoted_printable_decode($msg);
		echo "  </pre>\n";
		echo " </td>\n";
		echo "</tr>\n";
	}
	
}

?>
