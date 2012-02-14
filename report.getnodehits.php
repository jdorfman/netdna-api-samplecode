<?php
    include("lib/xmlrpc.inc");
    include("lib/config.inc"); 
    $namespace = 'report';
    $method = 'getNodeHits';
    $authString = hash('sha256', $cur . ':' . $apiKey . ':' . $method);
    $dateFrom = '2012-01-10';
    $dateTo = '2012-02-10';
    $zoneId = '21826'; // Replace with your Zone ID 

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
