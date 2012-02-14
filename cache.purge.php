<?php
    include("lib/xmlrpc.inc");
    include("lib/config.inc");
    $namespace = 'cache';
    $method = 'purge';
    $url = 'http://cdn.86400.io/beta03/app/files/NetDNA-logo-withtagline-wide.png';

    $f=new xmlrpcmsg("$namespace.$method", array(
    php_xmlrpc_encode($apiUserId),
    php_xmlrpc_encode($authString),
    php_xmlrpc_encode($cur),
    php_xmlrpc_encode($url),
    ));
    print_r(php_xmlrpc_encode($values));

    $c=new xmlrpc_client("/xmlrpc/cache", "api.netdna.com", 80,'http11');
    $r=&$c->send($f);
    print_r($r);
?>
