<?php
    date_default_timezone_set('America/Los_Angeles');
    include("lib/xmlrpc.inc");
    $cur = date('c');
    $apiKey = 'api-key';
    $apiUserId = 'user-id';
    $namespace = 'report';
    $method = 'getCacheHitStats';
    $authString = hash('sha256', $cur . ':' . $apiKey . ':' . $method);
    $companyId = 'acmeinc';
    $dateFrom = '2011-05-10';
    $dateTo = '2011-05-12';
    $zoneId = 'zoneid';

    $f=new xmlrpcmsg("$namespace.$method", array(
    	php_xmlrpc_encode($apiUserId),
    	php_xmlrpc_encode($authString),
    	php_xmlrpc_encode($cur),
    	php_xmlrpc_encode($companyId),
    	php_xmlrpc_encode($dateFrom),
    	php_xmlrpc_encode($dateTo),
    	php_xmlrpc_encode($zoneId),
    						));

    $c=new xmlrpc_client("/xmlrpc/report", "api.netdna.com", 80,'http11');
    $r=&$c->send($f);
    print_r($r);
?>
