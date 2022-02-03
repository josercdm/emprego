<?php

require_once dirname(dirname(dirname(__FILE__))) . '/vendor/autoload.php';

use Modelos\Pusher;

$loop = React\EventLoop\Factory::create();
$pusher = new Pusher();

$context = new React\ZMQ\Context($loop);
$pull = $context->getSocket(ZMQ::SOCKET_PULL);
$pull->bind('tcp://127.0.0.1:5555'); // Binding to 127.0.0.1 means the only client that can connect is itself
$pull->on('message', array($pusher, 'onNotifieEntry'));

$webSock = new React\Socket\Server('0.0.0.0:8123', $loop); // Binding to 0.0.0.0 means remotes can connect
$webServer = new Ratchet\Server\IoServer(
        new Ratchet\Http\HttpServer(
        new Ratchet\WebSocket\WsServer(
        new Ratchet\Wamp\WampServer($pusher))), $webSock);

$loop->run();

