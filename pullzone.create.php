<?php
    date_default_timezone_set('America/Los_Angeles');
    include("lib/xmlrpc.inc");
    $cur = date('c');
    $cur2 = date('u');
    $apiKey = 'qrpttgm01qv10sk58rtarv4vfyk3mn5r';
    $apiUserId = '7318';
    $namespace = 'pullzone';
    $method = 'create';
    $authString = hash('sha256', $cur . ':' . $apiKey . ':' . $method);
    $values['name'] = 'xmlrpc02072012';
    $values['origin'] = 'http://www.example.com';
    $values['vanity_domain'] = 'cdn.domain.com';

    
    $f=new xmlrpcmsg("$namespace.$method", array(
    php_xmlrpc_encode($apiUserId),
    php_xmlrpc_encode($authString), 
    php_xmlrpc_encode($cur), 
    php_xmlrpc_encode($values),
    ));
    print_r(php_xmlrpc_encode($values));

    $c=new xmlrpc_client("/xmlrpc/pullzone", "api.netdna.com", 80,'http11');
    $r=&$c->send($f);
    print_r($r);
?>
