<?php
header('Content-type: text/plain');

//$robotstxt = "/var/www/vh37047/data/www/".$_SERVER['HTTP_HOST']."/robots.txt";
//echo file_get_contents($robotstxt);

$s_host = $_SERVER['HTTP_HOST'];
$mirror = "Host: www.planetaneptuna.ru\n";
$user_agent = "User-Agent: *\n";
$disalows = "
Disallow: /wp-login.php
Disallow: /wp-register.php
Disallow: /xmlrpc.php
Disallow: /template.html
Disallow: /cgi-bin
Disallow: /wp-admin
Disallow: /wp-includes
Disallow: /wp-content/plugins
Disallow: /wp-content/cache
Disallow: /wp-content/themes
Disallow: /wp-trackback
Disallow: /wp-feed
Disallow: /wp-comments
Disallow: */trackback
Disallow: */feed
Disallow: */comments
Disallow: /tag
Disallow: /archive
Disallow: */trackback/
Disallow: */feed/
Disallow: */comments/
Disallow: /?feed=
Disallow: /?s=
Disallow: /?goto=*

";
$sm_ru = "Sitemap: http://www.planetaneptuna.ru/sitemap.xml";
$sm_en = "Sitemap: http://www.planetaneptuna.com/sitemap_en.xml";
$sm_ua = "Sitemap: http://www.planetaneptuna.kiev.ua/sitemap_ua.xml";
$sm_kz = "Sitemap: http://www.planetaneptuna.kz/sitemap_kz.xml";

if ($s_host == 'www.planetaneptuna.ru'){
	print_r("# robots for www.planetaneptuna.ru\n".$mirror.$user_agent.$disalows.$sm_ru);
} 
else if ($s_host == 'www.planetaneptuna.com'){
	print_r("# robots for www.planetaneptuna.com\n".$mirror.$user_agent.$disalows.$sm_en);	
} 
else if ($s_host == 'www.planetaneptuna.kiev.ua'){
	print_r("# robots for www.planetaneptuna.kiev.ua\n".$mirror.$user_agent.$disalows.$sm_ua);	
} 
else if ($s_host == 'www.planetaneptuna.kz'){
	print_r("# robots for www.planetaneptuna.kz\n".$mirror.$user_agent.$disalows.$sm_kz);	
}

?>