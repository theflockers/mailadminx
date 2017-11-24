# mailadminx
Requerimentos
-------------

- Necess�rios: 

* Apache com PHP;
* PHP com PostgreSQL;

- Desej�veis (Imagina-se que vc tem isso instalado, pois se n�o tiver, n�o h� sentido usar esse programa);

* Um servidor de e-mail (Qmail ou Postfix);
* Courier-Authlib, Maildrop e IMAP;

Sequ�ncia
---------

Primeiro instalei os servidores com suporte ao PostgreSQL e depois instale o software.
Para instala��o do Postfix e Courier-Authlib,Maildrop e IMAP, use o tutorial em http://postmailadmin.codigolivre.org.br.


Instala��o
----------

Copie o diret�rio compactado para o diret�rio do seu servidor Web.
Por exemplo: 

	cp -r mailadminX /var/www/site/mailadmin
	chmod 755 /var/www/site/mailadmin -R

Entre no diret�rio, edite o config.php e crie o usuario

	cd /var/www/site/mailadmin
	vi config/config.php

	$host="localhost";
	$db="nome do BD";
	$user="nome do usu�rio do BD";
	$pass="senha";
	$lang="pt_BR"; //Ajude a traduzir o software!
	$mailbox_base="/var/spool/virtual";
	$mailhost="{IP_DO_MAILHOST:143}";

De Esc e digite :wq!

	php install_user.php

Acesse o browser no endere�o devido, logue-se e use.

Em caso de duvidas: theflockers@terra.com.br
