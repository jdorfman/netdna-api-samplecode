<?php
    // This will only work on a Nginx Pull Zone, not Apache Traffic Server
    date_default_timezone_set('America/Los_Angeles');
    include("lib/xmlrpc.inc");
    include("lib/config.inc");
    $namespace = 'cache';
    $method = 'purgeAllCache';
    $authString = hash('sha256', $cur . ':' . $apiKey . ':' . $method);
    $zone = 'zonename'; // Replace with your zone name


    $f=new xmlrpcmsg("$namespace.$method", array(
    php_xmlrpc_encode($apiUserId),
    php_xmlrpc_encode($authString),
    php_xmlrpc_encode($cur),
    php_xmlrpc_encode($zone),
    ));
    print_r(php_xmlrpc_encode($values));

    $c=new xmlrpc_client("/xmlrpc/cache", "api.netdna.com", 80,'http11');
    $r=&$c->send($f);
    print_r($r);
?>
