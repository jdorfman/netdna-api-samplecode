<?php
date_default_timezone_set('America/Los_Angeles');
include("lib/xmlrpc.inc");
include("lib/config.inc");
$namespace = 'customdomain';
$method = 'removeCustomDomain';
$authString = hash('sha256', $cur . ':' . $apiKey . ':' . $method);

// Zone ID:
$id=27761;
// Custom domain to remove:
$domain='test123.netdna.com';
$f=new xmlrpcmsg("$namespace.$method", array(php_xmlrpc_encode($apiUserId), php_xmlrpc_encode($authString), php_xmlrpc_encode($cur), php_xmlrpc_encode($id), php_xmlrpc_encode($domain)));
$c=new xmlrpc_client("/xmlrpc/customdomain", "api.netdna.com", 80,'http11');
$r=&$c->send($f);
print_r($r);
?>
