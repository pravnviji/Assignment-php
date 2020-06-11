<?php
use PHPUnit\Framework\TestCase;
use Console\AssignmentOperation;
use Console\CommandCenter;
use Symfony\Component\Console\Application;

class AssignmentOperationTest extends TestCase
{

  /*
   Below script helps to test the basic unit test. Its working.

    public function testGetFullName(){
        require(getcwd()."../src/AssignmentOperation.php");
        $assignment = new \Console\AssignmentOperation;
        $expected = "Praveen babu";
        $assignment->firstName = "Praveen";
        //echo $assignment;
        $assignment->lastName = "babu";
        $this -> assertEquals('Praveen babu', $assignment -> getFullName());
    }*/

    public  function testGetUserInput(){
      require(getcwd()."../src/AssignmentOperation.php");

      $assignment = new \Console\AssignmentOperation();
      $input ="helloworld";
      $output="";
      $expected = "HELLO WORLD hElLo wOrLd";
      $this->assertEquals($expected, trim($assignment->getUserInput($input,$output)));
    }
}
