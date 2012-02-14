<?php
    date_default_timezone_set('America/Los_Angeles');
    include("lib/xmlrpc.inc");
    include("lib/config.inc");
    $namespace = 'pullzone';
    $method = 'update';
    $authString = hash('sha256', $cur . ':' . $apiKey . ':' . $method);
    $id = '34081';
    $values['origin'] = 'http://www.new-origin.com';
    $values['ip'] = '127.0.0.1';
    $values['compress'] = '1'; // Gzip: 1 = Enable | 0 = Disable
    $values['label'] = 'New Label';

    $f=new xmlrpcmsg("$namespace.$method", array(
    php_xmlrpc_encode($apiUserId),
    php_xmlrpc_encode($authString),
    php_xmlrpc_encode($cur),
    php_xmlrpc_encode($id),
    php_xmlrpc_encode($values),
    ));
    print_r(php_xmlrpc_encode($values));

    $c=new xmlrpc_client("/xmlrpc/pullzone", "api.netdna.com", 80,'http11');
    $r=&$c->send($f);
    print_r($r);
?>
