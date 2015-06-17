<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-06-17 14:51:48
         compiled from "templates\create_quiz.tpl" */ ?>
<?php /*%%SmartyHeaderCode:276245572e95b0d1ca4-88677202%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '21f70a77e3760bda17cd9eb880c43de9a6f52a4d' => 
    array (
      0 => 'templates\\create_quiz.tpl',
      1 => 1434538304,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '276245572e95b0d1ca4-88677202',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5572e95da36f15_45807798',
  'variables' => 
  array (
    'title' => 0,
    'data_one_quiz' => 0,
    'max_time' => 0,
    'data_questions' => 0,
    'data_question_one' => 0,
    'id_quiz' => 0,
    'data_answer_option' => 0,
    'one_data_answer_option' => 0,
    'view_quiz' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5572e95da36f15_45807798')) {function content_5572e95da36f15_45807798($_smarty_tpl) {?><html>
    <head>
        <title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
        <meta charset="UTF-8">
        <?php echo '<script'; ?>
 type="text/javascript" src="js/source_internet/jsapi"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="js/jquery-2.1.3.min.js"><?php echo '</script'; ?>
>
        <link rel="stylesheet" href="css/styles.css">
        <link rel="stylesheet" href="js/source_internet/jquery-ui.css">
        <?php echo '<script'; ?>
 src="js/source_internet/jquery-1.10.2.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="js/source_internet/jquery-ui.js"><?php echo '</script'; ?>
>
    </head>
    <body>
        <?php echo '<script'; ?>
 type="text/javascript">
            function setTimeLimit(value){                
                switch(value){
                    case "Y":
                        $(".enter_time_limit").show();
                        break;
                    case "N":
                        $(".enter_time_limit").hide();
                        break;
                }
            }
            function addAnswerTypeYorn(value){
                if (parseInt(value) === 0){
                     $("#add_answer_type_many_answers_some").hide();
                    $("#add_answer_type_yorn").hide();
                    $("#addNewQuestion").hide();
                    $("#add_answer_type_many_answers").hide();
                }
                if(parseInt(value) === 1){
                    $("#add_answer_type_many_answers_some").hide();
                    $("#add_answer_type_yorn").show();
                    $("#addNewQuestion").show();
                    $("#add_answer_type_many_answers").hide();
                }
                if(parseInt(value) === 2){
                    $("#add_answer_type_many_answers_some").hide();
                    $("#add_answer_type_many_answers").show();
                    $("#add_answer_type_yorn").hide();
                    $("#addNewQuestion").hide();
                }
                if(parseInt(value) === 3) {
                    $("#add_answer_type_many_answers").hide();
                    $("#add_answer_type_yorn").hide();
                    $("#addNewQuestion").hide();
                    $("#add_answer_type_many_answers_some").show();
                }
                if(parseInt(value) === 4) {
                    $("#add_answer_type_many_answers_some").hide();
                    $("#add_answer_type_many_answers").hide();
                    $("#add_answer_type_yorn").hide();
                    $("#addNewQuestion").show();
                }
                
            }
            function checkTopicQuiz(value){
                if(value != ""){
                    $.post("checkForms.php", { action: "check", field: "topic quiz", name: value }, function( data ) {
                        if(data == 'true'){
                            $("#yes_topic").show();
                            $(".unsuitable").show();
                            $("#no_topic").hide();
                        }
                        else{
                            $("#yes_topic").hide();
                            $(".unsuitable").hide();
                            $("#no_topic").show();
                        }
                      });
                }              
            }
            function showEditQuiz(){
                $("#quiz").show();
            }
            function hideEditQuiz(){
                $("#quiz").hide();
            }              
            function addNewAnswer(){
                var answer = $('textarea[name = "answer_the_question"]').val().trim();
                if (answer != ""){
                    var text = '<tr><td><input type="radio" class="answer_the_question" name="answer_the_question" value="'+answer+'">'+answer+'<a href="#" onclick="$(this).parent().parent().remove();"><img src="img/icon/delete.png" height="20px" width="20px"></a><input type="hidden" name="answers[]" value="'+answer+'"></tr>';
                    $(".new_answer").append(text);
                    $('textarea[name = "answer_the_question"]').val("");
                    $("#addNewQuestion").show();
                }
                
            }
            function addSomeNewAnswer(){
                var answer = $('textarea[name = "answer_some_the_question"]').val();
                if (answer != ""){ 
                    var text = '<tr><td><input type="checkbox" class="answer_some_the_question" name="answer_some_the_question[]" value="'+answer+'">'+answer+' <a href="#" onclick="$(this).parent().parent().remove();"><img src="img/icon/delete.png" height="20px" width="20px"></a><input type="hidden" name="answers_some[]" value="'+answer+'"></td></tr>';
                    $(".new_some_answer").append(text);
                    $('textarea[name = "answer_some_the_question"]').val("");
                    $("#addNewQuestion").show();
                }
            }
            jQuery.fn.maxTime = function() {
                $( "#slider-range-min" ).slider({
                  range: "min",
                  value: 30,
                  min: 1,
                  max: $("#max_time").val(),
                  slide: function( event, ui ) {
                    $( "#amount" ).val(ui.value );
                  }
                });
                $( "#amount" ).val($( "#slider-range-min" ).slider( "value" ) );
              };
                setTimeout( jQuery.fn.maxTime , 100);  
                
              function add_user_interviwees(){
                  var answer = $("#add_user_interviwees").val();
                  if (answer != ""){ 
                    var text = '<tr><td>'+answer+' <a href="#" onclick="$(this).parent().parent().remove();"><img src="img/icon/delete.png" height="20px" width="20px"></a><input type="hidden" name="new_user_interviwees_some[]" value="'+answer+'"></td></tr>';
                    $("#user_interviewees").append(text);
                    $('#add_user_interviwees').val("");
                    }
                  }  
              function add_group_interviwees(){
                  var answer = $("#add_group_interviewees").val();
                  if (answer != ""){ 
                    var text = '<tr><td><input type="checkbox" class="new_group_interviwees" name="new_group_interviwees[]" value="'+answer+'">'+answer+' <a href="#" onclick="$(this).parent().parent().remove();"><img src="img/icon/delete.png" height="20px" width="20px"></a><input type="hidden" name="new_group_interviwees_some[]" value="'+answer+'"></td></tr>';
                    $("#group_interviewees").append(text);
                    $('#add_group_interviewees').val("");
                    }
                  } 
                 $(function() {                   
                    $( "#add_user_interviwees" ).autocomplete({
                      source: function( request, response ){
                          console.log(request.term);
                          $.post( "checkForms.php", { action: "getInterviewees", value: request.term }, function( data ) {                            
                          response(data);
                          }, "json");
                    }
                    });
                  });
        <?php echo '</script'; ?>
>  
        <div class="wrapper">
            <div class="content">
<form id="go" method="post">
                        </form>
        <table width="100%">
            <tr>
                <td  width="100%">
                    <?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                </td>
            </tr>
            <tr>
                <td>
                <table width="100%" >
                    <tr>                        
                        <td width="20%" valign="top">
                            <?php echo $_smarty_tpl->getSubTemplate ('menu.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                        </td>
                        <td width="80%">
                            <table width="70%" align="center">
                               <tr>
                                <td>    
                                <?php $_smarty_tpl->_capture_stack[0][] = array('new_quiz', null, null); ob_start(); ?>
                                    <form method="post">
                                        <input type='hidden' name='button_click' value='create_quiz'>
                                        Тема опроса:<br>
                                        <input type="text" name="topic_quiz" placeholder="Ваша тема" required  onblur="checkTopicQuiz(this.value)" value="<?php echo $_smarty_tpl->tpl_vars['data_one_quiz']->value->topic;?>
"> 
                                        <span class="unsuitable" id="no_topic" style="display: none; color: red">Такое название уже есть</span>
                                        <span id="yes_topic" style="display: none; color: green">Ок</span>
                                        <br>
                                        Время выполнения опроса:<Br>
                                        <input type="radio" name="time_limit" value="Y" id="time_limit" onchange = 'setTimeLimit((this.getAttribute("value")))'> Да<Br>
                                        <input type="radio" name="time_limit" value="N" id="time_limit" onchange = 'setTimeLimit((this.getAttribute("value")))' checked> Нет<Br>
                                        <div class="enter_time_limit" style="display: none">
                                            <input type="hidden" name="max_time" id="max_time" value="<?php echo $_smarty_tpl->tpl_vars['max_time']->value;?>
">
                                          <p>
                                            <label for="amount">Время выполнения опроса (мин.):</label>
                                            <input type="text" id="amount" name="set_time_limit" id="set_time_limit" readonly style="border:0; color:#f6931f; font-weight:bold;">
                                          </p>

                                          <div id="slider-range-min"></div>
                                         </div>
                                        Дополнительная информация:<Br>
                                        <textarea rows="5" cols="40" name="comment_test" placeholder="Информация, которая необходима для прохождения теста"></textarea><br>
                                        Разрешить смотреть результаты опроса:<Br>
                                        <input type="radio" name="see_the_result" value="Y" checked> Да<Br>
                                        <input type="radio" name="see_the_result" value="N"> Нет<Br>
                                        Разрешить смотреть детальную информацию:<Br>
                                        <input type="radio" name="see_details" value="Y" checked> Да<Br>
                                        <input type="radio" name="see_details" value="N"> Нет<Br>                                        
                                        <input type="hidden" name="status_test" value="1">
                                        <span class="unsuitable">
                                            <input type="submit" value="Создать опрос"></span>         
                                    </form> 
                                <?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?> 
                                <?php $_smarty_tpl->_capture_stack[0][] = array('menu_questions', null, null); ob_start(); ?>
                                    <h2>Опрос: <?php echo $_smarty_tpl->tpl_vars['data_one_quiz']->value->topic;?>
(<a href="javascript: void(0);" onclick="showEditQuiz();"><img src="img/icon/edit.png" width='30' height='30'>Изменить</a>)</h2>
                                    <div id="quiz" style="display: none">
                                    <form method="post">
                                        <input type="hidden" name="id_quiz" value="<?php echo $_smarty_tpl->tpl_vars['data_one_quiz']->value->id_test;?>
">
                                        <table width="60%" align="center" bgcolor="#87CEFA">
                                            <tr>                                                
                                                <td>
                                                    <form method="post">
                                        <input type='hidden' name='button_click' value='create_quiz'>
                                        Тема опроса:<br>
                                        <input type="text" name="topic_quiz" placeholder="Ваша тема" required  onblur="checkTopicQuiz(this.value)"> 
                                        <span class="unsuitable" id="no_topic" style="display: none; color: red">Такое название уже есть</span>
                                        <span id="yes_topic" style="display: none; color: green">Ок</span>
                                        <br>
                                        Время выполнения опроса:<Br>
                                        <input type="radio" name="time_limit" value="Y" id="time_limit" onchange = 'setTimeLimit((this.getAttribute("value")))'> Да<Br>
                                        <input type="radio" name="time_limit" value="N" id="time_limit" onchange = 'setTimeLimit((this.getAttribute("value")))' checked> Нет<Br>
                                        <div class="enter_time_limit" style="display: none">
                                            <input type="hidden" name="max_time" id="max_time" value="<?php echo $_smarty_tpl->tpl_vars['max_time']->value;?>
">
                                          <p>
                                            <label for="amount">Время выполнения опроса (мин.):</label>
                                            <input type="text" id="amount" name="set_time_limit" id="set_time_limit" readonly style="border:0; color:#f6931f; font-weight:bold;" value="<?php echo $_smarty_tpl->tpl_vars['data_one_quiz']->value->time_limit;?>
">
                                          </p>

                                          <div id="slider-range-min"></div>
                                         </div>
                                        Дополнительная информация:<Br>
                                        <textarea rows="5" cols="40" name="comment_test" placeholder="Информация, которая необходима для прохождения теста" value="<?php echo $_smarty_tpl->tpl_vars['data_one_quiz']->value->comment_test;?>
"></textarea><br>
                                        Разрешить смотреть результаты опроса:<Br>
                                        <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['data_one_quiz']->value->see_the_result;?>
<?php $_tmp1=ob_get_clean();?><?php if ($_tmp1=="Y") {?>
                                        <?php } else { ?>                                            
                                        <input type="radio" name="see_the_result" value="Y"> Да<Br>                                            
                                        <input type="radio" name="see_the_result" value="N" checked> Нет<Br>                                            
                                        <?php }?>    
                                        Разрешить смотреть детальную информацию:<Br>
                                        <input type="radio" name="see_details" value="Y" checked> Да<Br>
                                        <input type="radio" name="see_details" value="N"> Нет<Br>  
                                        <input type="text" name="status_test" value="<?php echo $_smarty_tpl->tpl_vars['data_one_quiz']->value->id_status_test;?>
">
                                        <span class="unsuitable">
                                                </td>
                                                <td></td>                                                    
                                            </tr>  
                                            
                                            <tr>
                                                <td>
                                                    <input type="submit" value="Изменить опрос">
                                                </td>
                                                <td align="right">
                                                    <a href='javascript: void(0);' onclick='hideEditQuiz();'><img src="img/exit.png" width="20" height="20"></a>
                                                </td>
                                            </tr>
                                        </table>
                                </form>
                                    </div>  
                                        <a href='create_quiz.php?action=new_question'><img src="img/icon/add-notes.png" width='40' height='40'>Добавить вопрос</a>
                                        <a href='create_quiz.php?action=add_inteviewee'><img src="img/icon/add-group.png" width='40' height='40'>Добавить тестируемых</a>                                     
                                        <form method="post">
                                        <table>
                                    <tr>
                                        <td>
                                            Порядок вопроса
                                        </td>
                                        <td>
                                            Текст вопроса
                                        </td>
                                        <td>
                                            Тип вопроса
                                        </td>
                                        <td>
                                            Редактирование вопроса
                                        </td>
                                        <td>
                                            Удалить вопрос
                                        </td>
                                    </tr>
                                       <?php  $_smarty_tpl->tpl_vars['data_question_one'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['data_question_one']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data_questions']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['data_question_one']->key => $_smarty_tpl->tpl_vars['data_question_one']->value) {
$_smarty_tpl->tpl_vars['data_question_one']->_loop = true;
?>  
                                           <?php if ($_smarty_tpl->tpl_vars['data_question_one']->value) {?>
                                       <tr>
                                           <td>
                                               №
                                           </td>
                                           <td>
                                            <?php echo $_smarty_tpl->tpl_vars['data_question_one']->value->text_question;?>

                                           </td>
                                            <td>
                                                
                                                <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['data_question_one']->value->id_questions_type;?>
<?php $_tmp2=ob_get_clean();?><?php if ($_tmp2==1) {?>
                                                Да/Нет
                                              <?php } else {?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['data_question_one']->value->id_questions_type;?>
<?php $_tmp3=ob_get_clean();?><?php if ($_tmp3==2) {?>
                                                  Один ответ из списка
                                              <?php } else {?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['data_question_one']->value->id_questions_type;?>
<?php $_tmp4=ob_get_clean();?><?php if ($_tmp4==3) {?>
                                                Один или более ответов из списка
                                              <?php } else {?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['data_question_one']->value->id_questions_type;?>
<?php $_tmp5=ob_get_clean();?><?php if ($_tmp5==4) {?>
                                                Произвольный текст
                                            <?php }}}}?> 
                                           </td>
                                           <td>
                                                <a href="?action=edit_question&id_question=<?php echo $_smarty_tpl->tpl_vars['data_question_one']->value->id_question;?>
"><img src="img/icon/edit-notes.png" height="40px" width="40px"></a>
                                           </td>
                                           <td>
                                               <button type="submit" formaction="create_quiz.php?link_click=edit_quiz&id_quiz=<?php echo $_smarty_tpl->tpl_vars['id_quiz']->value;?>
&id_question=<?php echo $_smarty_tpl->tpl_vars['data_question_one']->value->id_question;?>
" name="button_click" value="delete_question"><img src="img/icon/trash.png" height="33px" width="30px"></button>
                                           </td>
                                       </tr>
                                       <?php }?>
                                <?php } ?>
                                    </table>
                                    </form> 
                                <?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
                                <?php $_smarty_tpl->_capture_stack[0][] = array('new_question', null, null); ob_start(); ?>
                                    <form method="post">
                                        Текст вопроса <br>
                                        <textarea rows="5" cols="40" name="text_question" placeholder="Ваш вопрос" required></textarea><br>
                                        Дополнительная информация<br>
                                        <textarea rows="5" cols="40" name="comment_question"></textarea><br>
                                        Тип вопроса<br>
                                        <select  name="question_type"  onchange ='addAnswerTypeYorn(this.options[this.selectedIndex].value);'>
                                            <option value="0" disabled selected>Выберите тип вопроса</option>
                                            <option  value="1">Да/Нет/Не знаю</option>
                                            <option value="2">Один ответа из списка</option>
                                            <option value="3">Выбор одного или более ответов из списка</option>
                                            <option value="4">Произвольный ответ</option>
                                        </select><br>  
                                        <div id='add_answer_type_yorn' style="display: none">
                                            Выберите привильный ответ<br>
                                            <input type='radio' name='add_answer_type_yorn' value='Y' checked="">Да<br>
                                            <input type='radio' name='add_answer_type_yorn' value='N'>Нет
                                        </div>                                        
                                        <div id="addNewQuestion" style="display: none">
                                            <button name="button_click" value="add_question"> Создать вопрос</button>
                                        </div>
                                        <div id='add_answer_type_many_answers' style="display: none">
                                        Текст ответа<br>
                                        <textarea id='addQuestion' rows="5" cols="40" name="answer_the_question"></textarea> 
                                        <a href="javascript: void(0);" onclick="addNewAnswer();"><img src="img/icon/add.png" height="40px" width="40px"></a>
                                    
                                        <table>                                                
                                            <tr>
                                            <div class="new_answer"></div>
                                            </tr>                                       
                                        </table> 
                                        </div>
                                        
                                        <div id='add_answer_type_many_answers_some' style="display: none">
                                            Текст ответа<br>
                                            <textarea id='addSomeQuestion' rows="5" cols="40" name="answer_some_the_question"></textarea> 
                                            <a href="javascript: void(0);" onclick="addSomeNewAnswer();">Добавить ответ</a>

                                            <table>                                                
                                                <tr>
                                                <div class="new_some_answer"></div>
                                                </tr>                                       
                                            </table>                                     
                                        </div>
                                    </form>
                                        
                                <?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
                                <?php $_smarty_tpl->_capture_stack[0][] = array('add_answer_option_one', null, null); ob_start(); ?>
                                    <form  method='post'>
                                        Текст ответа<br>
                                        <textarea id='addQuestion' rows="5" cols="40" name="answer_the_question"></textarea> 
                                        <button name="button_click" value='add_answer_option_one'>Добавить ответ</button>
                                    
                                    <table>
                                        <?php  $_smarty_tpl->tpl_vars['one_data_answer_option'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['one_data_answer_option']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data_answer_option']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['one_data_answer_option']->key => $_smarty_tpl->tpl_vars['one_data_answer_option']->value) {
$_smarty_tpl->tpl_vars['one_data_answer_option']->_loop = true;
?>                                                
                                            <tr>
                                                <td>
                                                    <?php if ($_smarty_tpl->tpl_vars['one_data_answer_option']->value->right_answer=='Y') {?>
                                                        <input type="radio" name="value_answer_option" value="<?php echo $_smarty_tpl->tpl_vars['one_data_answer_option']->value->id_answer_option;?>
" checked>
                                                    <?php } elseif ($_smarty_tpl->tpl_vars['one_data_answer_option']->value->right_answer=='N') {?>
                                                        <input type="radio" name="value_answer_option" value='<?php echo $_smarty_tpl->tpl_vars['one_data_answer_option']->value->id_answer_option;?>
'>
                                                    <?php }?>
                                                </td>
                                                <td> 
                                                    <?php echo $_smarty_tpl->tpl_vars['one_data_answer_option']->value->answer_the_questions;?>

                                                </td>
                                            </tr>
                                        <?php } ?>                                        
                                    </table>   
                                    <button name="button_click" value='add_right_answer_option_one'>Внести ответы</button>
                                    </form>
                                <?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
                                <?php $_smarty_tpl->_capture_stack[0][] = array('add_answer_option_more', null, null); ob_start(); ?>
                                    Добавить несколько варианты ответов
                                <?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
                                <?php $_smarty_tpl->_capture_stack[0][] = array('edit_quiz', null, null); ob_start(); ?>                                          
                                    <?php echo Smarty::$_smarty_vars['capture']['menu_questions'];?>

                                <?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
                                
                                <?php $_smarty_tpl->_capture_stack[0][] = array('edit_question', null, null); ob_start(); ?>
                                    Редактирование вопроса
                                <?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
                                <?php $_smarty_tpl->_capture_stack[0][] = array('add_inteviewee', null, null); ob_start(); ?>
                                    <h2>Добавить опрашиваемых</h2>
                                    <form method="post">
                                    <table>                                            
                                        <tr>
                                            <td>
                                                <h3>Добавить пользователя</h3>
                                            </td>
                                            <td>
                                                <h3>Добавить группу</h3>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input type="text" name="add_user_interviwees" id="add_user_interviwees" size="30%"> <a href="javasript: void(0);" onclick="add_user_interviwees()" title="Добавить человека"><img src="img/icon/add.png" height="30px" width="30px"></a>
                                            </td>
                                            <td>
                                                <input type="text" name="add_group_interviewees" id="add_group_interviewees" size="30%"> <a href="javasript: void(0);" onclick="add_group_interviwees()" title="Добавить группу"><img src="img/icon/add.png" height="30px" width="30px"></a>
                                            </td>
                                        </tr>                                        
                                    </table>                                        
                                    </form>  
                                    <form method="post" action="create_quiz.php?link_click=edit_quiz&id_quiz=<?php echo $_smarty_tpl->tpl_vars['id_quiz']->value;?>
"> 
                                        <input type="hidden" name="button_click" value="add_interviewees">
                                    <table width="90%">
                                        <tr>
                                            <td width="50%">                                              
                                                <div id="user_interviewees">
                                                    
                                                </div>
                                            </td>
                                            <td width="50%">
                                                <div id="group_interviewees">
                                                    
                                                </div>
                                            </td>
                                        </tr>
                                    </table>                                        
                                        <input type="submit" value="Добавить">  
                                        </form>                                       
                                        
                                <?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>    
                                    <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['view_quiz']->value;?>
<?php $_tmp6=ob_get_clean();?><?php if ($_tmp6=='new_quiz') {?>
                                        <?php echo Smarty::$_smarty_vars['capture']['new_quiz'];?>
   
                                    <?php } else {?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['view_quiz']->value;?>
<?php $_tmp7=ob_get_clean();?><?php if ($_tmp7=='menu_questions') {?>
                                        <?php echo Smarty::$_smarty_vars['capture']['menu_questions'];?>

                                    <?php } else {?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['view_quiz']->value;?>
<?php $_tmp8=ob_get_clean();?><?php if ($_tmp8=='new_question') {?>
                                        <?php echo Smarty::$_smarty_vars['capture']['new_question'];?>

                                    <?php } else {?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['view_quiz']->value;?>
<?php $_tmp9=ob_get_clean();?><?php if ($_tmp9=='add_answer_option_one') {?>
                                        <?php echo Smarty::$_smarty_vars['capture']['add_answer_option_one'];?>

                                    <?php } else {?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['view_quiz']->value;?>
<?php $_tmp10=ob_get_clean();?><?php if ($_tmp10=='add_answer_option_more') {?>
                                        <?php echo Smarty::$_smarty_vars['capture']['add_answer_option_more'];?>
    
                                    <?php } else {?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['view_quiz']->value;?>
<?php $_tmp11=ob_get_clean();?><?php if ($_tmp11=='edit_quiz') {?>
                                        <?php echo Smarty::$_smarty_vars['capture']['edit_quiz'];?>
    
                                    <?php } else {?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['view_quiz']->value;?>
<?php $_tmp12=ob_get_clean();?><?php if ($_tmp12=='add_inteviewee') {?>
                                        <?php echo Smarty::$_smarty_vars['capture']['add_inteviewee'];?>
     
                                     <?php }}}}}}}?>
                                </td>
                               </tr>
                           </table>  
                        </td>
                    </tr>
                </table>
                </td>
            </tr>
        </table>
                                </div>
        <?php echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
       
        </div>
    </body>
</html>
<?php }} ?>
