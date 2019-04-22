<?php


namespace Chibi\Console\Commands;


use Chibi\Console\Traits\Colorful;
use Chibi\Console\Traits\Creator;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CreateController extends Command
{
    use Colorful, Creator;

    /**
     *  The configuration of the command
     *
     */
    public function configure()
    {
        $this->setName('create:controller')
            ->addArgument('name', InputArgument::REQUIRED, 'The name of the controller')
            ->setDescription('Create controller');
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
        $controller = $input->getArgument('name');

        if(file_exists($filePath = $this->getAppPath() . 'Controllers/'. $controller . '.php')){
            $output->writeln($this->red(
                "Controller {$controller} already exists"
            ));
            return;
        }

        $file = file_get_contents(__DIR__ . '/../stubs/controller.stub');

        $file = $this->replace($file, $controller);

        file_put_contents($filePath, $file);

        $output->writeln($this->green(
            "Controller {$controller} created successfully"
        ));
    }

    /**
     * Get the default Namespace
     *
     * @return mixed
     */
    public function getDefaultNameSpace()
    {
        return "App\Controllers";
    }

    /**
     * The handle function
     *
     * @param $string
     * @param $controller
     * @return mixed
     */
    public function handle($string, $controller)
    {
        return str_replace('StubController', $controller, $string);
    }
}
