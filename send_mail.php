<?

function send_mail($addr,$nome,$dom) {
			
			$message="<html>";
			$message.=" <head>";
			$message.="  <title>Bem vindo $nome</title>";
			$message.=" </head>";
			$message.=" <body>";
			$message.=" <h4>Bem vindo $nome</h4>";
			$message.=" <p>Seu novo e-mail é $addr@$dom</p>";

			$msg=file("mensagem.txt");
			foreach($msg as $html){
				        $message.=$html;
			        }
			$message.=" </body>\n";
			$message.="</html>\n";

                        $headers  = "MIME-Version: 1.0\r\n";
                        $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
                        $headers .= "From: PostMailAdmin<admin@$dom>\n";
			

                        /* Enviando mensagem */

                        $subject="Bem vindo!";
                        $to="$addr@$dom";
//			$message = "<h1>Esse é seu novo e-mail: $to</h1>";

                        $fp=fsockopen("localhost",25,$errno, $errstr,1);

                        if (!$fp) {
                           echo "$errstr ($errno)<br />\n";
                        } else {
                           $out = "HELO\r\n";
                           $out .= "MAIL FROM: admin@$dom\r\n";
                           $out .= "RCPT TO:$to\r\n";
                           $out .= "DATA\r\n";
                           $out .= "Subject: $subject\r\n";
                           $out .= "$headers\r\n";
                           $out .= "$message\r\n";
                           $out .= ".\r\n";
                           $out .= "quit\r\n";

                           fputs($fp, $out);
                           while (!feof($fp)) {
                             fgets($fp, 10);
                           }
                           fclose($fp);
		         }

	}
?>
