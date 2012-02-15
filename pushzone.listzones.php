<?php
    include("lib/xmlrpc.inc");
    include("lib/config.inc");
    $namespace = 'pushzone';
    $method = 'listZones';
    $authString = hash('sha256', $cur . ':' . $apiKey . ':' . $method);

    $f=new xmlrpcmsg("$namespace.$method", array(
    php_xmlrpc_encode($apiUserId),
    php_xmlrpc_encode($authString),
    php_xmlrpc_encode($cur),
    ));
    print_r(php_xmlrpc_encode($values));

    $c=new xmlrpc_client("/xmlrpc/pushzone", "api.netdna.com", 80,'http11');
    $r=&$c->send($f);
    print_r($r);
?>
