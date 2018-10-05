<?php
/**
 * Created by PhpStorm.
 * User: Philips ADNWEB
 * Date: 04/10/2018
 * Time: 14:07
 */

namespace App\Model;
use Hoa;


class MyServer extends Hoa\Socket\Connection\Handler
{
    protected function _run (Hoa\Socket\Node $node)
    {
        $connection = $node->getConnection();
        $line       = $connection->readLine();

        if (empty($line)) {
            $connection->disconnect();
            return;
        }

        echo '< ', $line, "\n";
        $this->send(strtoupper($line));

        return;
    }

    protected function _send ($message, Hoa\Socket\Node $node)
    {
        return $node->getConnection()->writeLine($message);
    }
}