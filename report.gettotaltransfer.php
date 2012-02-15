<?php
    include("lib/xmlrpc.inc");
    include("lib/config.inc");
    $namespace = 'report';
    $method = 'getTotalTransfer';
    $authString = hash('sha256', $cur . ':' . $apiKey . ':' . $method);
    $zoneId = '21826';
    $type = '2'; //1=today, 2=current hour, 3=date range
    $dateFrom = '2012-02-01';
    $dateTo = '2012-02-14';

    $f=new xmlrpcmsg("$namespace.$method", array(
    php_xmlrpc_encode($apiUserId),
    php_xmlrpc_encode($authString),
    php_xmlrpc_encode($cur),
    php_xmlrpc_encode($zoneId),
    php_xmlrpc_encode($type),
    php_xmlrpc_encode($dateFrom),
    php_xmlrpc_encode($dateTo),
    ));

    $c=new xmlrpc_client("/xmlrpc/report", "api.netdna.com", 80,'http11');
    $r=&$c->send($f);
    print_r($r);
?>
