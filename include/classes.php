<?

/*
* * * * * * * * * * * * * * * * * * * * * * * * * * * * *
*	
*	Classes Diversas para uso do Post-MailAdmin
*	Sem demais milongas.
*
* * * * * * * * * * * * * * * * * * * * * * * * * * * * *
*/

include "conn.inc"; /* Conecta no banco */

/* Cria a classe para resgatar informações
   sobre as contas de usuário  */

class UserInfo
{
	var $query;
	var $username;	/* Username */
	var $password;	/* Password */
	var $nome;	/* Nome Real */
	var $home;	/* User Home */
	var $maildir;   /* Maildir */
	var $quota;	/* User Quota */
	var $domain;	/* @domain */
	var $active;

	function mailbox_info($username,$domain)
	{
		$MboxQuery="SELECT * FROM mailbox WHERE username='$username' AND domain='$domain'";
		$PostQuery=pg_query($MboxQuery);
		$mailbox=pg_fetch_array($PostQuery);
		
		$this->query=$MboxQuery;
		$this->username=$mailbox['username'];
		$this->password=$mailbox['password'];
		$this->nome=$mailbox['name'];
		$this->home=$mailbox['home'];
		$this->maildir=$mailbox['maildir'];
		$this->quota=$mailbox['quota'];
		$this->domain=$mailbox['domain'];
		$this->active=$mailbox['active'];
	}
}

/* Cria a classe para resgatar informações
   sobre o Domínio  */

class DomainInfo
{
	var $domain;
	var $description;
	var $aliases;
	var $mailboxes;
	var $maxquota;
	var $active;

	function dominio_info($dom)
	{
		$DomainQuery="SELECT domain,
			             description,
		              	     aliases,
		                     mailboxes,
			             maxquota,
			             active
		              FROM domain WHERE domain = '$dom'";

		$PostQuery=pg_query($DomainQuery);
		$info=pg_fetch_array($PostQuery);

		$this->domain=$info['domain'];
		$this->description=$info['description'];
		$this->aliases=$info['aliases'];
		$this->mailboxes=$info['mailboxes'];
		$this->maxquota=$info['maxquota'];
		$this->active=$info['active'];
	}	


}
?>
