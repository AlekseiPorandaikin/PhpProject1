<?php
include_once 'DAO/AuthorQuizDAO.php';
include_once 'model/MAuthorQuiz.php';
include_once 'DAO/QuizDAO.php';     
include_once 'view/AdministrationView.php';
include_once 'model/MUser.php';
include_once 'model/MQuiz.php';
include_once 'model/MInterviewee.php';
include_once 'DAO/IntervieweeDAO.php';
class AuthorQuizView {
    public $title="Меню автора тестов";
    public $id_author;
    private $mauthor;
    private $author;
    public $link_click;
    public $deactivate_quiz;
    public $activate_quiz;
    public $id_quiz;
    public function __construct(){
        $this->id_author = $_SESSION['id_user'];
        $this->mauthor= new MAuthorQuiz();
        $this->mauthor->setIdUser($this->id_author);
        $this->author= new AuthorQuizDAO();
        $this->link_click = filter_input(INPUT_GET, 'link_click', FILTER_SANITIZE_SPECIAL_CHARS);
        $this->id_quiz = filter_input(INPUT_GET, 'id_quiz', FILTER_SANITIZE_SPECIAL_CHARS);
        $this->deactivate_quiz=filter_input(INPUT_POST, 'deactivate_quiz', FILTER_SANITIZE_SPECIAL_CHARS);
        $this->activate_quiz=filter_input(INPUT_POST, 'activate_quiz', FILTER_SANITIZE_SPECIAL_CHARS);
        $this->initialize();
    }
    public function initialize(){
        if(isset($this->deactivate_quiz)  && !empty($this->deactivate_quiz)){
            $this->setStatusQuiz($this->deactivate_quiz, 0);
        }
        elseif(isset($this->activate_quiz)  && !empty($this->activate_quiz)){
            $this->setStatusQuiz($this->activate_quiz, 1);
        }
        if (isset($this->link_click) && !empty($this->link_click)){
            if ($this->link_click == 'delete_quiz'){
                $this->deleteQuiz($this->id_quiz);
            }
        }
        
    }
    public function getAuthorQuizs(){
       return $this->author->getDataQuiz($this->mauthor);
    }
    public function setStatusQuiz($id_quiz, $status){
        $quiz=new QuizDAO();
        $quiz->setVasibilityQuiz($id_quiz, $status);
    }
    public function deleteQuiz($id_quiz){
        $mquiz = new MQuiz();
        $mquiz->setIdQuiz($id_quiz);
        $this->author->deleteQuiz($mquiz);
    }
}
