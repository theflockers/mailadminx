# mailadminx

WARNING - THE LAST VERSION OF THIS SOFTWARE IS FROM 2003. KEPT HERE JUST FOR HISTORICAL REASONS.

Requerimentos
-------------

## Necessários: 

* Apache com PHP;
* PHP com PostgreSQL;

## Desejáveis (Imagina-se que vc tem isso instalado, pois se não tiver, não há sentido usar esse programa);

* Um servidor de e-mail (Qmail ou Postfix);
* Courier-Authlib, Maildrop e IMAP;

Sequência
---------

Primeiro instalei os servidores com suporte ao PostgreSQL e depois instale o software.
Para instalação do Postfix e Courier-Authlib,Maildrop e IMAP, use o tutorial em http://postmailadmin.codigolivre.org.br.


Instalação
----------

Copie o diretório compactado para o diretório do seu servidor Web.
Por exemplo: 

	cp -r mailadminX /var/www/site/mailadmin
	chmod 755 /var/www/site/mailadmin -R

Entre no diretório, edite o config.php e crie o usuario

	cd /var/www/site/mailadmin
	vi config/config.php

	$host="localhost";
	$db="nome do BD";
	$user="nome do usuário do BD";
	$pass="senha";
	$lang="pt_BR"; //Ajude a traduzir o software!
	$mailbox_base="/var/spool/virtual";
	$mailhost="{IP_DO_MAILHOST:143}";

De Esc e digite :wq!

	php install_user.php

Acesse o browser no endereço devido, logue-se e use.

Em caso de duvidas: theflockers@terra.com.br
