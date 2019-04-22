<?php


namespace Chibi\Console\Commands;


use Chibi\Console\Traits\Colorful;
use Chibi\Console\Traits\Creator;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CreateModel extends Command
{
    use Colorful, Creator;

    /**
     *  The configuration of the command
     *
     */
    public function configure()
    {
        $this->setName('create:model')
            ->addArgument('name', InputArgument::REQUIRED, 'The name of the model')
            ->setDescription('Create model');
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
        $model = $input->getArgument('name');

        if(file_exists($filePath = $this->getAppPath() .  $model . '.php')){
            $output->writeln($this->red(
                "Model {$model} already exists"
            ));
            return;
        }

        $file = file_get_contents(__DIR__ . '/../stubs/model.stub');

        $file = $this->replace($file, $model);

        file_put_contents($filePath, $file);

        $output->writeln($this->green(
            "Model {$model} created successfully"
        ));
    }

    /**
     * Get the default Namespace
     *
     * @return mixed
     */
    public function getDefaultNameSpace()
    {
        return "App";
    }

    /**
     * The handle function
     *
     * @param $string
     * @param $model
     * @return mixed
     */
    public function handle($string, $model)
    {
        $string = str_replace('StubModel', $model, $string);

        return str_replace('table_name', strtolower($model). 's', $string);
    }
}
