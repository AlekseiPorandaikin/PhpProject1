<?php
include_once 'DAO/AuthorQuizDAO.php';
include_once 'model/MAuthorQuiz.php';
include_once 'model/MQuiz.php';
include_once 'DAO/QuizDAO.php';
include_once 'model/MUser.php';
include_once 'DAO/UserDAO.php';
include_once 'DAO/AnswerOptionsDAO.php';
include_once 'model/MAnswerOptions.php';
include_once 'DAO/QuestionDAO.php';
class CreateQuizView{
    public $id_author; //ид составителя опроса
    public $id_quiz; // Ид опроса: создавемого или редактируемого
    public $id_question; // Ид вопроса
    public $link_click; // какая кнопка нажата
    public $view_quiz; // Какое действие отображается
    public $title; // Заголовок страницы
    private $mauthor; 
    private $author;
    private $answer_option;
    public function __construct() {
        if(isset($_GET['id_quiz']) && !empty($_GET['id_quiz'])){
                $_SESSION['id_quiz'] = $_GET['id_quiz'];     
        }
        $this->id_author = $_SESSION['id_user'];
        $this->id_quiz = $_SESSION['id_quiz'];
        $this->id_question = $_SESSION['id_question'];
        $this->mauthor = new MAuthorQuiz();
        $this->mauthor->setIdUser($this->id_author);
        $this->author = new AuthorQuizDAO();
        $this->answer_option = new AnswerOptionsDAO();
        $this->link_click = filter_input(INPUT_GET, 'link_click', FILTER_SANITIZE_SPECIAL_CHARS);
        $this->button_click = filter_input(INPUT_POST, 'button_click', FILTER_SANITIZE_SPECIAL_CHARS);        
        $this->initialize();
    }
    public function initialize(){
        if($this->link_click == 'new_quiz'){
             $this->view_quiz = "new_quiz";
             $this->title = 'Создание опроса';
        }
        elseif($this->link_click=='edit_quiz'){
            
            $this->view_quiz='edit_quiz';
            $this->title = 'Редактирование опроса';
        }
        if(isset($_GET['action']) && !empty($_GET['action'])){
           if($_GET['action'] == 'new_question'){
                $this->view_quiz="new_question";
            }
            elseif($_GET['action'] == 'menu_questions'){
                $this->view_quiz = 'menu_questions';
            }
            elseif($_GET['action'] == 'answer_option_one'){                
                $this->view_quiz = 'add_answer_option_one';
            }
            elseif($_GET['action'] == 'answer_option_more'){                
                $this->view_quiz = 'add_answer_option_more';
            }
            elseif($_GET['action'] == 'edit_question' && !empty ($_GET['id_question'])){  
                $_SESSION['id_question'] = $_GET['id_question'];
            }
            elseif($_GET['action'] == 'delete' && !empty ($_GET['id_question'])){  
                $_SESSION['id_question'] = $_GET['id_question'];
            }
            elseif($_GET['action'] == 'add_inteviewee'){                
                $this->view_quiz = 'add_inteviewee';
            }
        }
        if(isset($this->button_click) && !empty($this->button_click)){
            if ($this->button_click == 'create_quiz'){  
                $this->createQuiz();
                header("Location: create_quiz.php?link_click=".$this->link_click."&action=menu_questions");            
            }        
            elseif ($this->button_click == 'add_question'){
                $this->addQuestion();            
            }
            elseif ($this->button_click == 'add_right_answer_option_one'){ 
                $this->resetRightAnswer();
                $this->addRightAnswerQuestion();
            }
            elseif ($this->button_click == 'add_answer_option_one'){  
                $this->addAnswerQuestion();
            }
            elseif ($this->button_click == 'delete_question'){  
                $question_dao = new QuestionDAO();
                $question_dao->deleteQuestion($_GET['id_question']);
            }
            elseif ($this->button_click == 'add_interviewees'){
                $user = new UserDAO();
                $temp_array = $_POST['new_user_interviwees_some'];
                foreach ($temp_array as $v){                    
                    $name= explode(" ", $v);
                    $id_user = $user->getIdUserOnFI($name[0], $name[1]);
                    $this->mauthor->setIdTest($this->id_quiz);
                    $this->mauthor->setIdUser($id_user);
                    $this->author->addInterviewee($this->mauthor);
                }
            }
        }
    }    
    public function createQuiz(){
        unset($_SESSION['id_quiz']);
        unset($_SESSION['id_question']);
        $quiz=new QuizDAO();
        $muser=new MUser();
        $mquiz= new MQuiz();
        
        $muser->setIdUser($this->id_author);
        $mquiz->setTopic($_POST['topic_quiz']);
        if($_POST['time_limit']=='N'){
            $_POST['set_time_limit']=null;
        }        
        $mquiz->setTimeLimit($_POST['set_time_limit']*60);
        $mquiz->setCommentQuiz($_POST['comment_test']);
        $mquiz->setSeeTheResult($_POST['see_the_result']);
        $mquiz->setSeeDetails($_POST['see_details']);
        $mquiz->setIdStatusQuiz($_POST['status_test']);
        $_SESSION['id_quiz'] = $quiz->createQuiz($mquiz, $muser);
        $this->id_quiz = $_SESSION['id_quiz'];
//        $this->addAnswerQuestion();
    }
    public function addQuestion(){
        unset($_SESSION['id_question']);
        $mquestion= new MQuestion();
        $question= new QuestionDAO();
        $mquestion->setTextQuestion($_POST['text_question']);
        $mquestion->setCommentQuestion($_POST['comment_question']);
        $mquestion->setIdQuestionsType($_POST['question_type']);
        $mquestion->setIdTest($this->id_quiz);     
        $_SESSION['id_question'] = $question->createQuestion($mquestion);
        $this->id_question = $_SESSION['id_question'];
        if ($_POST['question_type'] == 1){
            $this->addAnswerQuestion($this->id_question, $_POST['add_answer_type_yorn'], 'Y');
            header("Location: create_quiz.php?link_click=".$this->link_click."&action=menu_questions");
        }
        elseif ($_POST['question_type'] == 2){
            for ($i=0; $i<count($_POST['answers']); $i++){
                if ($_POST['answers'][$i] == $_POST['answer_the_question']){
                    $this->addAnswerQuestion($this->id_question, $_POST['answers'][$i], 'Y');
                }
                else {
                    $this->addAnswerQuestion($this->id_question, $_POST['answers'][$i], 'N');
                }
            }    
            header("Location: create_quiz.php?link_click=".$this->link_click."&action=menu_questions");
        }
        elseif ($_POST['question_type'] == 3){
            $result = array();
            for ($a=0; $a<count($_POST['answers_some']); $a++){
                for ($b=0; $b<count($_POST['answer_some_the_question']); $b++){
                    if ($_POST['answer_some_the_question'][$b] == $_POST['answers_some'][$a]){
                        $result[$a]['answer'] = $_POST['answers_some'][$a];
                        $result[$a]['rao'] = 'Y';
                        break;
                    }
                    else {
                        $result[$a]['answer'] = $_POST['answers_some'][$a];
                        $result[$a]['rao'] = 'N';
                    }
                }
            }            
            foreach ($result as $v){
                $this->addAnswerQuestion($this->id_question, $v["answer"], $v["rao"]);
            }
            header("Location: create_quiz.php?link_click=".$this->link_click."&action=menu_questions");
        }
        elseif ($_POST['question_type'] == 4){            
            header("Location: create_quiz.php?link_click=".$this->link_click."&action=menu_questions");
        }
    }
    public function getDataQuestions(){
        $result = $this->author->getDataQuestions($this->id_quiz);
        if(count($result) > 0){            
            return $result;
        }
        return false;
    }
    public function getOneDataQuestion(){
        return $this->author->getListObjQuestion($this->id_question);
    }
    public function getAnswerOptionsData(){
        return $this->answer_option->getDataAnswerOtions($this->id_question);        
    }
    public function getOneDataQuiz(){
        return $this->author->getListObjQuiz($this->id_quiz);
    }
    public function addAnswerQuestion($id_question, $answer, $right_answer = 'N'){
        $manswer_option=new MAnswerOptions();
        $manswer_option->setIdQuestion($id_question);
        $manswer_option->setAnswerTheQuestions($answer);
        $manswer_option->setRightAnswer($right_answer); //Возможно переписать
        $this->answer_option->createAnswerOptions($manswer_option);
        header("Location: create_quiz.php?link_click=".$this->link_click."&action=answer_option_one");
    }
    public function addRightAnswerQuestion(){
        if (isset($_POST['value_answer_option']) && !empty($_POST['value_answer_option'])){
            $this->answer_option->addRightAnswerOptions($_POST['value_answer_option']);
        }
        header("Location: create_quiz.php?link_click=".$this->link_click."&action=menu_questions");
    }
    public function resetRightAnswer(){
        $this->answer_option->resetRightAnswerOptions($this->id_question);
    }
    
}
