<?php

namespace App\Console\Commands;

use Hoa;
use Illuminate\Console\Command;

class StartSocketServer extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'socket:start';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'start the socket server';

    /**
     * Create a new command instance.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $websocket = new Hoa\Websocket\Server(
            new Hoa\Socket\Server('tcp://'.env('TCP_HOST'))
        );
        $websocket->on('open', function (Hoa\Event\Bucket $bucket) {
            echo 'new connection', "\n";

            return;
        });
        $websocket->on('message', function (Hoa\Event\Bucket $bucket) {
            $data = $bucket->getData();
            echo '> message :', $data['message'], "\n";
            $bucket->getSource()->send('bien reçu');
            echo '< echo', "\n";

            return;
        });
        $websocket->on('close', function (Hoa\Event\Bucket $bucket) {
            echo 'connection tapaka', "\n";

            return;
        });
        $websocket->run();
    }
}