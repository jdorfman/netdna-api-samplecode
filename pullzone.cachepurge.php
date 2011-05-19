<?php
date_default_timezone_set('America/Los_Angeles');
include("lib/xmlrpc.inc");
$cur = date('c');
$apiKey = 'api-key';
$apiUserId = 'user-id';
$namespace = 'cache';
$method = 'purge';
$authString = hash('sha256', $cur . ':' . $apiKey . ':' . $method);

// this is the url to purge
$url= 'http://static.example.com/static/images/logo.png';
$f=new xmlrpcmsg("$namespace.$method", array(php_xmlrpc_encode($apiUserId),
php_xmlrpc_encode($authString), php_xmlrpc_encode($cur),
php_xmlrpc_encode($url)));
$c=new xmlrpc_client("/xmlrpc/cache", "api.netdna.com", 80,'http11');
$r=&$c->send($f);
print_r($r);
?>
