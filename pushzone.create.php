<?php
    include("lib/xmlrpc.inc");
    include("lib/config.inc");
    $namespace = 'pushzone';
    $method = 'create';
    $authString = hash('sha256', $cur . ':' . $apiKey . ':' . $method);
    $values['name'] = 'pushzoneexample';
    $values['password'] = 'sEcuRep@$$w0rd';
    $values['compress'] = '1'; // 1=yes 0=no
    $values['vanity_domain'] = 'push.yourdomain.com'; // cname
    $values['label'] = 'Push Zone Example';

    $f=new xmlrpcmsg("$namespace.$method", array(
    php_xmlrpc_encode($apiUserId),
    php_xmlrpc_encode($authString),
    php_xmlrpc_encode($cur),
    php_xmlrpc_encode($values),
    ));
    print_r(php_xmlrpc_encode($values));

    $c=new xmlrpc_client("/xmlrpc/pushzone", "api.netdna.com", 80,'http11');
    $r=&$c->send($f);
    print_r($r);
?>
