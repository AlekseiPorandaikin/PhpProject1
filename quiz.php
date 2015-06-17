<?php
session_start();
 try{
include_once 'view/checkOnPage.php';
include_once 'view/QuizView.php';

$quiz_view = new QuizView();
//echo "<pre>";
//var_dump($quiz_view->getOneDataQuiz());
//echo "</pre>";
$smarty->assign('title', $quiz_view->title);
$smarty->assign("status_testing", $quiz_view->status_testing);
$smarty->assign("array_questions", $quiz_view->array_questions);
$smarty->assign("data_one_quiz", $quiz_view->getOneDataQuiz());
$smarty->display('templates/quiz.tpl');
 }
 catch (Exception $e){
    $error= $e->getMessage().'. Строка '.$e->getLine().': '. ' ('. $e->getFile().')';
    echo $error;                            
}
?>
