<?php
session_start();
 try{ 
include_once 'view/checkOnPage.php';
include_once 'view/AuthorQuizView.php';
//Обнуляем переменную
unset($_SESSION['id_quiz']);
$author_view=new AuthorQuizView();

    $smarty->assign('title', $author_view->title);
    $smarty->assign('data_quiz',$author_view->getAuthorQuizs());
    
    $smarty->display('templates/author_quiz.tpl');
 }
catch (Exception $e){
    $error= $e->getMessage().'. Строка '.$e->getLine().': '. ' ('. $e->getFile().')';
    echo $error;                            
}
?>
