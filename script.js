function alt_senha() {

	if(document.passwd.user.value=="" ||
	   document.passwd.pass.value==""  ||
	   document.passwd.newpass.value=="" ) {
		alert("Preencha corretamente os campos")
	} else {
		document.passwd.submit()
	}


}

function close_and_reload(msg) {
	alert(msg)
        opener.location.reload(true)
        self.close()

}

function check_form() {

        if(document.alias.email.value=="") {
                alert("Preencha o e-mail")
	}else{
		document.alias.submit()
        }
}

function check_alias_form() {

        if(document.alias.alias.value=="" ||
	   document.alias.alias_to.value=="") {
                alert("Preencha corretamente os campos")
	}else{
		document.alias.submit()
        }
}

function check_mailbox_form() {

        if(document.mailbox.login.value=="" ||
           document.mailbox.senha.value=="" ||
           document.mailbox.name.value=="") {
                alert("Preencha corretamente os campos")
        }else{
                document.mailbox.submit()
        }
}

function check_domain_form() {

        if(document.domain.domain.value=="" ||
           document.domain.desc.value=="" ||
           document.domain.adm_login.value=="" ||
           document.domain.adm_senha.value=="") {
                alert("Preencha corretamente os campos")
        }else{
                document.domain.submit()
        }
}

function statmsg(act) {
	if(act=="del") {
		if(confirm("Tem certeza que deseja excluir a(s) mensagem(s) selecionada(s)?")){
			document.mail.action.value="del"
			document.mail.submit()
		}
	}
}
