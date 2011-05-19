<?php
    date_default_timezone_set('America/Los_Angeles');
    include("path-to/xmlrpc.inc");
    $cur = date('c');
    $apiKey = 'api-key';
    $apiUserId = 'user-id';
    $namespace = 'vodzone';
    $method = 'update';
    $authString = hash('sha256', $cur . ':' . $apiKey . ':' . $method);
    $id = 'enter-your-id';
    $values['name'] = 'vodzoneupdate';
    $values['password'] = 'password123';


    $f=new xmlrpcmsg("$namespace.$method", array(
    php_xmlrpc_encode($apiUserId),
    php_xmlrpc_encode($authString),
    php_xmlrpc_encode($cur),
    php_xmlrpc_encode($id),
    php_xmlrpc_encode($values),
    ));
    print_r(php_xmlrpc_encode($values));

    $c=new xmlrpc_client("/xmlrpc/vodzone", "api.netdna.com", 80,'http11');
    $r=&$c->send($f);
    print_r($r);
?>
