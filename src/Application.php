<?php

namespace Chibi\Console;

use Chibi\Console\Commands\CreateController;
use Chibi\Console\Commands\RunServer;
use Symfony\Component\Console\Application as BaseApplication;

class Application extends BaseApplication
{
    protected $commands = [
      RunServer::class,
      CreateController::class
    ];

    /**
     * Register commands & run
     *
     * @param array $commands
     * @return \Symfony\Component\Console\Command\Command|void
     * @throws \Exception
     */
    public function console($commands = [])
    {
        $this->commands = array_merge($this->commands, $commands);

        array_walk($this->commands, function ($command) {
            $this->add( new $command);
        });

        $this->run();
    }
}
