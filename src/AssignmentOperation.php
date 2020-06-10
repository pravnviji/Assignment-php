<?php namespace Console;
use Symfony\Component\Console\Command\Command as SymfonyCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;

/**
 * Author: Praveenbabu <praveenbabu.it2009@gmail.com>
 */
class AssignmentOperation extends SymfonyCommand
{
    
    protected function getUserInput(InputInterface $input, OutputInterface $output)
    {
        $helper = $this -> getHelper('question');
        $default = 'hello world';
        $outputQ = new Question('Please enter the string? DEFAULT - ['. $default .']: ', $default);
        $name = $helper -> ask( $input, $output, $outputQ);
        $arr1 = str_split($name);
        $output -> writeln([
            strtoupper($name),
            implode("", $this -> convertSelectedChar($arr1,1))
        ]);
        $output -> write($this -> createCSV($name));
    }

    private function createCSV($record){
       $csv=array();
       $csv=preg_split('//', $record, -1, PREG_SPLIT_NO_EMPTY);
      // $csv = join(",",$csv);
       $csv = implode(",",$csv);
       $csv_handler = fopen ('csvfile.csv','w');
       fwrite ($csv_handler,$csv);
       fclose ($csv_handler);
       echo 'CSV created';
    }

    private  function convertSelectedChar($text) {
        $array = array();
        foreach ($text as $key => $value){
            if($key == 1 || $key == 3 || $key == 7 || $key == 9 ){
                $value = strtoupper($value);
            }
            $array[] = $value;
            array_push($array);
        }
        return $array;
     }
}
