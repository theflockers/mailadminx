#!/bin/bash

# usage vuseradd.sh user@domain.com.br

BASE="/var/spool/virtual"
USER=`echo $1 |cut -d@ -f1`
DOMAIN=`echo $1 |cut -d@ -f2`
rm -rf $BASE/$DOMAIN/$USER
