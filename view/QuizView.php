<?php
include_once 'DAO/IntervieweeDAO.php';
include_once 'DAO/AuthorQuizDAO.php';
include_once 'DAO/QuizDAO.php';
include_once 'model/MInterviewee.php';
include_once 'model/MUser.php';
include_once 'model/MQuiz.php';
class QuizView {
    private $interviewee;
    private $author;
    private $minterviewee;
    private $id_testing;
    private $status;
    private $id_quiz;
    public $data_testing;
    public $array_questions = array();
    public $status_testing;
    public $title="Прохождение теста"; 
    public $button_click;
    public function __construct(){  
        $this->id_testing = filter_input(INPUT_GET, 'id_testing', FILTER_SANITIZE_SPECIAL_CHARS);
        $this->status = filter_input(INPUT_GET, 'status', FILTER_SANITIZE_SPECIAL_CHARS);
        $this->id_quiz = filter_input(INPUT_GET, 'id_test', FILTER_SANITIZE_SPECIAL_CHARS);
        $this->button_click = filter_input(INPUT_POST, 'button_click', FILTER_SANITIZE_SPECIAL_CHARS);   
        $this->interviewee=new IntervieweeDAO();    
        $this->author = new AuthorQuizDAO();
        $muser = new MUser();
        $muser->setIdUser($_SESSION['id_user']);
        $mquiz = new MQuiz();
        $mquiz->setIdQuiz($this->id_quiz);
        $this->minterviewee = new MInterviewee();
        $this->minterviewee->setUser($muser);
        $this->minterviewee->setTest($mquiz);
        $this->initialize();
    }
    public function initialize(){
        if (isset($this->status) && !empty($this->status)){
            if ($this->status == 'available' || $this->status == 'unfinished'){
                $this->minterviewee->setIdTesting($this->id_testing);
                $this->data_testing=$this->interviewee->getDataOneTesting($this->id_testing);
                $this->array_questions=$this->data_testing->getQuestion();
                    $this->status_testing = "continue_testing";
            }
            elseif ($this->status == 'new_test'){
                 $this->status_testing = "new_testing";
            }
        }
        if (isset($this->button_click) && !empty($this->button_click)){
//            $this->startQuiz();
//            header("Location: quiz.php?status=available&id_testing=".$this->minterviewee->getIdTesting());
        }
    }
    public function startQuiz(){
        $this->interviewee->statusStartQuiz($this->minterviewee);
    }
    public function endQuiz(){
        $this->interviewee->statusEndQuiz($this->minterviewee);
    }
    public function getArrayQuestions(){
        $data_questions=array();
        $temp_array_question=$this->array_question;
        for($i=0; $i<count($this->array_question); $i++){
            $data_questions[$i]['number']=$i+1;
            $data_questions[$i]['data_questions']=$temp_array_question[$i];            
        }
        return $data_questions;
    }
    public function getOneDataQuiz(){
        return $this->author->getListObjQuiz($this->id_quiz);
    }
}
