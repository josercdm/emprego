<?php

namespace Modelos;

use Modelos\CadastrarModel;
use Ratchet\ConnectionInterface;
use Ratchet\Wamp\WampServerInterface;
use Ratchet\ComponentInterface;

class Pusher implements WampServerInterface {

    protected $subscribedTopics = array();
    protected $notification = array();
    protected $connections;

    public function __construct() {
        $this->connections = new \SplObjectStorage;
    }

    public function onSubscribe(ConnectionInterface $conn, $topic) {
        $this->subscribedTopics[$topic->getId()] = $topic;
    }

    public function onUnSubscribe(ConnectionInterface $conn, $topic) {
        
    }

    public function onOpen(ConnectionInterface $conn) {
        $this->connections->attach($conn);

// Store the new connection to send messages to later
        $this->clients[$conn->resourceId] = $conn;
        $conn->send(json_encode(['type' => 'Bem-vindo!']));
        echo "New connection! ({$conn->resourceId})\n";
    }

    public function onClose(ConnectionInterface $conn) {
        $this->connections->detach($conn);
    }

    public function onCall(ConnectionInterface $conn, $id, $topic, array $params) {
// In this application if clients send data it's because the user hacked around in console
        $conn->callError($id, $topic, 'You are not allowed to make calls')->close();
    }

    public function onPublish(ConnectionInterface $conn, $topic, $event, array $exclude, array $eligible) {
        $cd = new CadastrarModel();
        $readOnline = $cd->readOnline(1);
        
        $json = array(
            'status' => count($readOnline),
            'userData' => $readOnline,
            'close' => $event['closed'],
            'userid' => $event['userid']
                
        );

        $topic->broadcast($json, $exclude);
    }

    public function onNotifieEntry($entry) {
        
    }

    public function onError(ConnectionInterface $conn, \Exception $e) {
        
    }

}
