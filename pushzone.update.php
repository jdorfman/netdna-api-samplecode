<?php
    include("lib/xmlrpc.inc");
    include("lib/config.inc");
    $namespace = 'pushzone';
    $method = 'update';
    $authString = hash('sha256', $cur . ':' . $apiKey . ':' . $method);
    $id = '34866'; // Push Zone ID
    $values['password'] = 'SecuRePa$$w0rdUpdate';
    $values['compress'] = '0'; // 1=yes 0=no
    $values['label'] = 'Update Push Label';

    $f=new xmlrpcmsg("$namespace.$method", array(
    php_xmlrpc_encode($apiUserId),
    php_xmlrpc_encode($authString),
    php_xmlrpc_encode($cur),
    php_xmlrpc_encode($id),
    php_xmlrpc_encode($values),
    ));
    print_r(php_xmlrpc_encode($values));

    $c=new xmlrpc_client("/xmlrpc/pushzone", "api.netdna.com", 80,'http11');
    $r=&$c->send($f);
    print_r($r);
?>
