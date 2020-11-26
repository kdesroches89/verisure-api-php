# verisure-api-php
Fork de https://github.com/Cebeerre/VerisureEUAPI en PHP

# Configurations
- PHP 7.4
- Apache 2.4

Liste des modules PHP actifs : 

[PHP Modules]
apc
apcu
calendar
Core
ctype
curl
date
dom
exif
FFI
fileinfo
filter
ftp
gd
gettext
hash
iconv
json
libxml
mbstring
mysqli
mysqlnd
openssl
pcntl
pcre
PDO
pdo_mysql
Phar
posix
readline
Reflection
session
shmop
SimpleXML
sockets
sodium
SPL
standard
sysvmsg
sysvsem
sysvshm
tokenizer
xdebug
xml
xmlreader
xmlwriter
xsl
Zend OPcache
zip
zlib

[Zend Modules]
Xdebug
Zend OPcache


# Installation 
- Editer le config.php

define("URL", "https://mob2217.securitasdirect.es:12010/WebService/ws.do");

// Identifiant du compte verisure
define("LOGIN","login");

// Mot de passe du compte verisure
define("PASSWD", "password");

// numéro installation
define("INSTALL","000000");

// Langue (fr / en)
define("LANG","fr");

// Access Key de http://api.ipstack.com/ (inscription gratuite)
define("KEYIP","XXXXX");

