<?php
date_default_timezone_set('America/Los_Angeles');
include("lib/xmlrpc.inc");
include("lib/config.inc");
$namespace = 'customdomain';
$method = 'addCustomDomain';
$authString = hash('sha256', $cur . ':' . $apiKey . ':' . $method);

// Bucket ID
$id=27761;
// Custom Domain to Add:
$domain='test123.netdna.com';
$f=new xmlrpcmsg("$namespace.$method", array(php_xmlrpc_encode($apiUserId), php_xmlrpc_encode($authString), php_xmlrpc_encode($cur), php_xmlrpc_encode($id), php_xmlrpc_encode($domain)));
$c=new xmlrpc_client("/xmlrpc/customdomain", "api.netdna.com", 80,'http11');
$r=&$c->send($f);
print_r($r);
?>
