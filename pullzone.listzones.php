<?php
date_default_timezone_set('America/Los_Angeles');
include("lib/xmlrpc.inc");
$cur = date('c');
$apiKey = 'api-key';
$apiUserId = 'user-id';
$namespace = 'pullzone';
$method = 'listZones';
$authString = hash('sha256', $cur . ':' . $apiKey . ':' . $method);
$zoneid = 'zone-id';
$type = '1';

	$f=new xmlrpcmsg("$namespace.$method", array(
		php_xmlrpc_encode($apiUserId),
		php_xmlrpc_encode($authString), 
		php_xmlrpc_encode($cur), 
		php_xmlrpc_encode($zoneid),
		php_xmlrpc_encode($type),
	));

$c=new xmlrpc_client("/xmlrpc/pullzone", "api.netdna.com", 80,'http11');
$r=&$c->send($f);
print_r($r);

?>
