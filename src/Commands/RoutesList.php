<?php


namespace Chibi\Console\Commands;


use Chibi\AppObjectManager;
use Chibi\Console\Traits\Colorful;
use Chibi\Router\Router;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class RoutesList extends Command
{
    use Colorful;

    /**
     *  The configuration of the command
     *
     */
    public function configure()
    {
        $this->setName('routes')
            ->addArgument('method', InputArgument::OPTIONAL, 'The method of the routes', 'all')
            ->setDescription('Print the route list');
    }

    /**
     * The code to be executed
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int|null|void
     */
    public function execute(InputInterface $input, OutputInterface $output)
    {
        $om = AppObjectManager::getInstance();
        $router = $om->resolve(Router::class);

        require_once __DIR__ . '/../../../../bases.php';
        require_once __DIR__ . '/../../../../app/Http/routes.php';
        dd(
            $router
        );
    }
}
