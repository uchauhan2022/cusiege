<?php	
session_start();
require_once('Assets/php/dbconfig.php'); 

//Choose Table accordingly


$table=$_SESSION['table'];

//Create a query to fetch all the questions

$query = "select * from pre_$table";

//Run the query

$query_result = $dbconfig->query($query);

//Count the number of returned items from the database

$num_questions_returned = $query_result->num_rows;

 

if ($num_questions_returned < 1){

    exit();}

 

//Create an array to hold all the returned questions

$questionsArray = array();

 

//Add all the questions from the result to the questions array

while ($row = $query_result->fetch_assoc()){

    $questionsArray[] = $row;

}

 

//Create an array of Correct answers

$correctAnswerArray = array();
$questions = array();
$text = array();
$choices = array();
$tie = array();
shuffle($questionsArray);
$i=1;
foreach($questionsArray as  $question){

    $correctAnswerArray[$i] = $question['answer'];
	 $questions[$i] = $question['question'];
	$text[$i]=$question['text'];
	$tie[$i]=$question['tie'];
	if($question['text']==0)
	{$choices[$i] = array($question['choice1'], $question['choice2'], $question['choice3'], $question['answer']);
    shuffle($choices[$i]);
	 
	}
$i++;
}
$_SESSION['cans']=$correctAnswerArray;

 $_SESSION['q']=$questions;

$_SESSION['text']=$text;

$_SESSION['tie']=$tie;

$_SESSION['choices']=$choices;  

$_SESSION['numq']=$num_questions_returned;
header('location:play.php');

  ?>

