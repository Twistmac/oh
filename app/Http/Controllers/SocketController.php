<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hoa;

class SocketController extends Controller
{
    //

    public function build(){
        $websocket = new Hoa\Websocket\Server(
            new Hoa\Socket\Server('tcp://'.env('TCP_HOST'))
        );
        $websocket->on('open', function (Hoa\Event\Bucket $bucket) {
            echo 'Connection ouvert', "\n";

            return;
        });
        $websocket->on('message', function (Hoa\Event\Bucket $bucket) {
            $data = $bucket->getData();
            echo '> message ', $data['message'], "\n";
            $bucket->getSource()->send('Bien reçu ====> '.$data['message']);
            echo '< echo', "\n";

            return;
        });
        $websocket->on('close', function (Hoa\Event\Bucket $bucket) {
            echo 'Connection fermé', "\n";

            return;
        });
        $websocket->run();
    }

}
