<?php
$out=[];
$out[]='=== locate sitefile ===';
$out[]=trim((string)shell_exec('plesk bin site --info sitefile.bahman.ir 2>/dev/null | grep -iE "WWW root|Name|PHP"'));
$out[]=trim((string)shell_exec('ls -la /var/www/vhosts/sitefile.bahman.ir/ 2>/dev/null | head -30'));
$out[]=trim((string)shell_exec('ls -la /var/www/vhosts/sitefile.bahman.ir/httpdocs/ 2>/dev/null | head -40'));
$out[]=trim((string)shell_exec('find /var/www/vhosts/sitefile.bahman.ir -maxdepth 3 -name "file.php" 2>/dev/null'));
$out[]=trim((string)shell_exec('find /var/www/vhosts -maxdepth 4 -name "file.php" 2>/dev/null | head -20'));
$out[]=trim((string)shell_exec('grep -n DocumentRoot /var/www/vhosts/system/sitefile.bahman.ir/conf/httpd.conf 2>/dev/null | head'));
$out[]=trim((string)shell_exec('head -5 /var/www/vhosts/system/sitefile.bahman.ir/conf/vhost.conf /var/www/vhosts/system/sitefile.bahman.ir/conf/vhost_ssl.conf 2>/dev/null'));
$out[]=trim((string)shell_exec('ls -la /var/www/vhosts/siteapi.bahman.ir/httpdocs/ 2>/dev/null | head -30'));
$out[]=trim((string)shell_exec('find /var/www/vhosts/siteapi.bahman.ir -maxdepth 3 -name "file.php" 2>/dev/null'));
// open_basedir was siteapi - maybe file.php lives there?
$out[]='open_basedir note: sitefile fpm open_basedir pointed at siteapi';
echo implode("\n",$out)."\n";
