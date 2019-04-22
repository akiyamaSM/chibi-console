<?php


namespace Chibi\Console\Commands;


use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Process\Process;

class RunServer extends Command
{
    /**
     *  The configuration of the command
     *
     */
    public function configure()
    {
        $this->setName('run')
            ->addArgument('port', InputArgument::OPTIONAL, 'The port that will be exposed', 80)
            ->setDescription('runs the Webserver');
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
        $output->writeln('<info>We serve you via : http://localhost:' . $input->getArgument('port'). '</info>');
        exec("php -S localhost:{$input->getArgument('port')} -t public/");
    }
}