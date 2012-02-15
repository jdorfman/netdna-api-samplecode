<?php
    include("lib/xmlrpc.inc");
    include("lib/config.inc");
    $namespace = 'user';
    $method = 'update';
    $authString = hash('sha256', $cur . ':' . $apiKey . ':' . $method);
    $id = '7385'; // User ID, run user.listusers.php
    $values['firstname'] = 'Samir';
    $values['lastname'] = 'Nagheenanajar';
    $values['email'] = 's.nagheenanajar@pcloadletter.com';
    $values['phone'] = '3235555555';
    $values['password'] = 'n3wP@$$w0rd';

    $f=new xmlrpcmsg("$namespace.$method", array(
    php_xmlrpc_encode($apiUserId),
    php_xmlrpc_encode($authString),
    php_xmlrpc_encode($cur),
    php_xmlrpc_encode($id),
    php_xmlrpc_encode($values),
    ));
    print_r(php_xmlrpc_encode($values));

    $c=new xmlrpc_client("/xmlrpc/user", "api.netdna.com", 80,'http11');
    $r=&$c->send($f);
    print_r($r);
?>
