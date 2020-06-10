<?php namespace Console;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Console\AssignmentOperation;

/**
 * Author: Praveenbabu <praveenbabu.it2009@gmail.com>
 */
class CommandCenter extends AssignmentOperation
{
    
    public function configure()
    {
        $this -> setName('helloworld')
            -> setDescription('This app is used to-do string operation and upload in csv file.')
            -> setHelp('This command allows you to keen the inputs.')
           ;
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $this -> getUserInput($input, $output);
        return 1;
    }
}
