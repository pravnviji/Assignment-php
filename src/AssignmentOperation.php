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
    public $upperString;
    public $mixedString;

    /* Allow user to keen the input
    * @param ( String:input, String:output)
    */
    public function getUserInput(InputInterface $input, OutputInterface $output)
    {
        $helper = $this -> getHelper('question');
        $default = 'hello world';
        $outputQ = new Question('Please enter the string? DEFAULT - ['. $default .']: ', $default);
        $name = $helper -> ask( $input, $output, $outputQ);
        $upperString = strtoupper($name);
        $mixedString =implode("", $this -> convertSelectedChar(str_split($name)));
        $output -> writeln([
            trim($upperString),
            trim($mixedString)
        ]);

        $output -> write($this -> createCSV($name, $output));
    }

     /* Fn helps to create CSV file
    * @param ( String:record, String:output)
    */
    public function createCSV($record , $output){
       $csv=array();
       $csv=preg_split('//', $record, -1, PREG_SPLIT_NO_EMPTY);
       $csv = implode(",",$csv);
       $csv_handler = fopen ('csvfile.csv','w');
       fwrite ($csv_handler,trim($csv));
       fclose ($csv_handler);
       $output -> write("CSV created");
    }

    /* Fn helps to convert the selected index of char
    * @param ( Array:text)
    */
    public function convertSelectedChar($text) {
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

     
 /*   Below script helps to test the basic unit test

    public $firstName ;
    public $lastName ;

    public function getFullName(){
        echo "getFullname";
        return trim("$this->firstName $this->lastName");
    }
    */
}
