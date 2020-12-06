*NOTE: THIS PROJECT IS NOT IN ANY WAY ASSOCIATED WITH OR RELATED TO THE SECURITAS DIRECT-VERISURE GROUP COMPANIES. The information here and online is for educational and resource purposes only and therefore the developers do not endorse or condone any inappropriate use of it, and take no legal responsibility for the functionality or security of your alarms and devices.

# verisure-api-php
Fork of https://github.com/Cebeerre/VerisureEUAPI to PHP


# Version 0.2
- Add language Italian , English , Spain

# Version 0.1 
- Activate or deactivate the partial or full alarm
- List sensor material detector
- Send photos by mail


# Configurations
- PHP 7.4
- Apache 2.4

List of active PHP modules : 

* [PHP Modules]
- apc
- apcu 
- calendar
- Core
- ctype
- curl
- date
- dom
- exif
- FFI
- fileinfo
- filter
- ftp
- gd
- gettext
- hash
- iconv
- json
- libxml
- mbstring
- mysqli
- mysqlnd
- openssl
- pcntl
- pcre
- PDO
- pdo_mysql
- Phar
- posix
- readline
- Reflection
- session
- shmop
- SimpleXML
- sockets
- sodium
- SPL
- standard
- sysvmsg
- sysvsem
- sysvshm
- tokenizer
- xdebug
- xml
- xmlreader
- xmlwriter
- xsl
- Zend OPcache
- zip
- zlib

* [Zend Modules]
- Xdebug
- Zend OPcache


# Installation 
- Edit config.php

define("URL", "https://mob2217.securitasdirect.es:12010/WebService/ws.do");

// Login account verisure securitas

define("LOGIN","login");

// Password account verisure securitas

define("PASSWD", "password");

// Installation number account

define("INSTALL","000000");

// Langue (fr / en / es / it)

define("LANG","fr");

// Access Key de http://www.ipstack.com/ (Free subscribe)

define("KEYIP","XXXXX");

- Edit file auth.php for authentication . 
