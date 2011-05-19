<?php
    date_default_timezone_set('America/Los_Angeles');
    include("/path-to/xmlrpc.inc");
    $cur = date('c');
    $apiKey = 'enter-your-api-key';
    $apiUserId = 'enter-your-user-id';
    $namespace = 'user';
    $method = 'listUsers';
    $authString = hash('sha256', $cur . ':' . $apiKey . ':' . $method);
    $values['name'] = 'xmlrpc';
    $values['origin'] = 'http://www.example.com';


    $f=new xmlrpcmsg("$namespace.$method", array(
    php_xmlrpc_encode($apiUserId),
    php_xmlrpc_encode($authString),
    php_xmlrpc_encode($cur),
    ));
    print_r(php_xmlrpc_encode($values));

    $c=new xmlrpc_client("/xmlrpc/user", "api.netdna.com", 80,'http11');
    $r=&$c->send($f);
    print_r($r);
?>
