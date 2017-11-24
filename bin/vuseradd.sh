#!/bin/bash

# usage vuseradd.sh user@domain.com.br

BASE="/var/spool/virtual"
USER=`echo $1 |cut -d@ -f1`
DOMAIN=`echo $1 |cut -d@ -f2`
QUOTA=`echo $2"S"`
if [ -d $BASE/$DOMAIN/$USER ];then
	echo -e "Usuário Existente"
else
	mkdir -p $BASE/$DOMAIN/$USER/
	maildirmake $BASE/$DOMAIN/$USER/Maildir
	maildirmake -q $QUOTA $BASE/$DOMAIN/$USER/Maildir
	maildirmake $BASE/$DOMAIN/$USER/Maildir/.Spam
# Criando .mailfilter
. samples/maildroprc |tr -d "\r" >$BASE/$DOMAIN/$USER/.mailfilter
# OK, continuando
	chown 200:200 $BASE/$DOMAIN -R
	chmod 700 $BASE/$DOMAIN -R
fi
