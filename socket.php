#!/usr/local/bin/php -q
<?php
error_reporting(E_ALL);

/* Allow the script to hang around waiting for connections. */
set_time_limit(0);

/* Turn on implicit output flushing so we see what we're getting
 * as it comes in. */
ob_implicit_flush();

$address_ = "192.168.0.5";
$port_ = 5252;



if (($sock = socket_create(AF_INET, SOCK_STREAM, SOL_TCP)) === false) {
    echo "socket_create() failed: reason: " . socket_strerror(socket_last_error()) . "\n";
}

if (socket_bind($sock, $address_, $port_) === false) {
    echo "socket_bind() failed: reason: " . socket_strerror(socket_last_error($sock)) . "\n";
}

if (socket_listen($sock, 5) === false) {
    echo "socket_listen() failed: reason: " . socket_strerror(socket_last_error($sock)) . "\n";
}

do {
    if (($msgsock = socket_accept($sock)) === false) {
        echo "socket_accept() failed: reason: " . socket_strerror(socket_last_error($sock)) . "\n";
        break;
    }
    /* Send instructions. */
    //$msg = "A";
    //socket_write($msgsock, $msg, strlen($msg));

    socket_write($msgsock,'connecter ela zao ->>>',strlen('connecter ela zao ->>>'));


    do {
        if (false === ($buf = socket_read($msgsock, 2048, PHP_NORMAL_READ))) {
            echo "socket_read() failed: reason: " . socket_strerror(socket_last_error($msgsock)) . "\n";
            break 2;
        }
        if (!$buf = trim($buf)) {
            continue;
        }
        if(strpos($buf, 'I') !== false){
            echo 'identifiant >>>>>>'.$buf .' bien recu';
            socket_write($msgsock,'U',strlen('I'));

            /*while(true){
                socket_write($msgsock,'A',strlen('I'));
                sleep(15);

            }*/
        }
        if($buf == 'quit'){
            socket_close($msgsock);
            break 2;
        }

        //$talkback = "PHP: You said '$buf'.\n";
        //socket_write($msgsock, $talkback, strlen($talkback));
        //echo "$buf\n";
    } while (true);
    socket_close($msgsock);
} while (true);

socket_close($sock);
?>