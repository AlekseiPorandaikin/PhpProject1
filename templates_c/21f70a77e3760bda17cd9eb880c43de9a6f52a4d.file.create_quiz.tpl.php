<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-05-12 23:54:07
         compiled from "templates\create_quiz.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5638553e7f202fd425-93028684%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '21f70a77e3760bda17cd9eb880c43de9a6f52a4d' => 
    array (
      0 => 'templates\\create_quiz.tpl',
      1 => 1431460359,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5638553e7f202fd425-93028684',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_553e7f20db5570_93226450',
  'variables' => 
  array (
    'title' => 0,
    'data_question' => 0,
    'data_question_one' => 0,
    'view_quiz' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_553e7f20db5570_93226450')) {function content_553e7f20db5570_93226450($_smarty_tpl) {?><html>
    <head>
        <title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
        <meta charset="UTF-8">
        <?php echo '<script'; ?>
 type="text/javascript" src="https://www.google.com/jsapi"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="js/jquery-2.1.3.min.js"><?php echo '</script'; ?>
>
        <link rel="stylesheet" href="css/styles.css">
    </head>
    <body>
        <?php echo '<script'; ?>
 type="text/javascript">
            function setTimeLimit(value){
                switch(value){
                    case "Y":
                        $(".enter_time_limit").show();
                        $("#set_time_limit").val("12:00:00");
                        break;
                    case "N":
                        $(".enter_time_limit").hide();
                        break;
                }
            }
            function addAnswerTypeYorn(value){
                if(parseInt(value)===1){
                    $("#add_answer_type_yorn").show();
                }
                else{
                    $("#add_answer_type_yorn").hide();
                }
            }
            function checkTopicQuiz(value){
                $.post("checkForms.php", { action: "check", field: "topic quiz", name: value }, function( data ) {
                if(data=='true'){
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
        <?php echo '</script'; ?>
>   
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
                        <td width="30%" valign="top">
                            <?php echo $_smarty_tpl->getSubTemplate ('menu.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                        </td>
                        <td width="70%">
                            <table width="100%">
                               <tr>
                                <td>    
                                <?php $_smarty_tpl->_capture_stack[0][] = array('new_quiz', null, null); ob_start(); ?>
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
                                            Установите время: <input type="time" name="set_time_limit" id="set_time_limit" >
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
                                <?php $_smarty_tpl->_capture_stack[0][] = array('add_question', null, null); ob_start(); ?>
                                    <form method="post">
                                        <button name="button_click" value="new_question"> Добавить вопрос</button>                    
                                    </form>  
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
 $_from = $_smarty_tpl->tpl_vars['data_question']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['data_question_one']->key => $_smarty_tpl->tpl_vars['data_question_one']->value) {
$_smarty_tpl->tpl_vars['data_question_one']->_loop = true;
?>
                                       <tr>
                                           <td>
                                               №
                                           </td>
                                           <td>
                                            <?php echo $_smarty_tpl->tpl_vars['data_question_one']->value->text_question;?>

                                           </td>
                                            <td>
                                                
                                                <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['data_question_one']->value->id_questions_type;?>
<?php $_tmp1=ob_get_clean();?><?php if ($_tmp1==1) {?>
                                                Вопрос, предлогающий ответ типа Да/Нет/Не знаю
                                              <?php } else {?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['data_question_one']->value->id_questions_type;?>
<?php $_tmp2=ob_get_clean();?><?php if ($_tmp2==2) {?>
                                                  Вопрос с возможностью выбора одного ответа из списка
                                              <?php } else {?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['data_question_one']->value->id_questions_type;?>
<?php $_tmp3=ob_get_clean();?><?php if ($_tmp3==3) {?>
                                                Вопрос с возможностью выбора одного или более ответов из списка
                                              <?php } else {?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['data_question_one']->value->id_questions_type;?>
<?php $_tmp4=ob_get_clean();?><?php if ($_tmp4==4) {?>
                                                Вопрос, предполагающий написание ответа в виде произвольного текста длиной до 1000 символов
                                            <?php }}}}?> 
                                           </td>
                                           <td>
                                               Edit
                                           </td>
                                           <td>
                                               Delete
                                           </td>
                                       </tr>
                                <?php } ?>
                                    </table>
                                <?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
                                <?php $_smarty_tpl->_capture_stack[0][] = array('new_question', null, null); ob_start(); ?>
                                    <form method="post">
                                        Текст вопроса<br>
                                        <textarea rows="5" cols="40" name="text_question" placeholder="Ваш вопрос" required></textarea><br>
                                        Дополнительная информация<br>
                                        <textarea rows="5" cols="40" name="comment_question"></textarea><br>
                                        Тип вопроса<br>
                                        <select  name="question_type"  onchange ='addAnswerTypeYorn(this.options[this.selectedIndex].value);'>
                                            <option  value="1">Да/Нет/Не знаю</option>
                                            <option value="2">Один ответа из списка</option>
                                            <option value="3">Выбор одного или более ответов из списка</option>
                                            <option value="4" selected>Произвольный ответ</option>
                                        </select><br>  
                                        <div id='add_answer_type_yorn' style="display: none">
                                            <input type='radio' name='add_answer_type_yorn' value='Yes' checked="">Да<br>
                                            <input type='radio' name='add_answer_type_yorn' value='No'>Нет
                                        </div>
                                        <button name="button_click" value="add_question"> Создать вопрос</button>
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
                                        <textarea rows="5" cols="40" name="text_question"></textarea> 
                                        <button name="button_click" value="add_answer_option_one">Добавить ответ</button>
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
                                    <?php echo Smarty::$_smarty_vars['capture']['add_question'];?>

                                <?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>    
                                    
                                    <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['view_quiz']->value;?>
<?php $_tmp5=ob_get_clean();?><?php if ($_tmp5=='new_quiz') {?>
                                        <?php echo Smarty::$_smarty_vars['capture']['new_quiz'];?>
   
                                    <?php } else {?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['view_quiz']->value;?>
<?php $_tmp6=ob_get_clean();?><?php if ($_tmp6=='add_question') {?>
                                        <?php echo Smarty::$_smarty_vars['capture']['add_question'];?>

                                    <?php } else {?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['view_quiz']->value;?>
<?php $_tmp7=ob_get_clean();?><?php if ($_tmp7=='new_question') {?>
                                        <?php echo Smarty::$_smarty_vars['capture']['new_question'];?>

                                    <?php } else {?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['view_quiz']->value;?>
<?php $_tmp8=ob_get_clean();?><?php if ($_tmp8=='add_answer_option_one') {?>
                                        <?php echo Smarty::$_smarty_vars['capture']['add_answer_option_one'];?>

                                    <?php } else {?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['view_quiz']->value;?>
<?php $_tmp9=ob_get_clean();?><?php if ($_tmp9=='add_answer_option_more') {?>
                                        <?php echo Smarty::$_smarty_vars['capture']['add_answer_option_more'];?>
    
                                    <?php } else {?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['view_quiz']->value;?>
<?php $_tmp10=ob_get_clean();?><?php if ($_tmp10=='edit_quiz') {?>
                                        <?php echo Smarty::$_smarty_vars['capture']['edit_quiz'];?>
    
                                     <?php }}}}}}?>
                                </td>
                               </tr>
                           </table>  
                        </td>
                    </tr>
                </table>
                </td>
            </tr>
        </table>
        <?php echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
                        
    </body>
</html>
<?php }} ?>
