<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-06-17 13:41:18
         compiled from "templates\quiz.tpl" */ ?>
<?php /*%%SmartyHeaderCode:108175581300d82c900-59492899%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bfd2b19e0f6c8caa86730ece86950200783687e3' => 
    array (
      0 => 'templates\\quiz.tpl',
      1 => 1434533974,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '108175581300d82c900-59492899',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5581300e550f94_02891742',
  'variables' => 
  array (
    'title' => 0,
    'data_one_quiz' => 0,
    'array_questions' => 0,
    'one_question' => 0,
    'status_testing' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5581300e550f94_02891742')) {function content_5581300e550f94_02891742($_smarty_tpl) {?><html>
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
        <div class="wrapper">
            <div class="content">
<form id="test_passing" method="post">
                        </form>
    <table width="100%">
            <tr>
                 <td colspan=""  width="100%">
                    <?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                </td>
            </tr>
            <tr>
                <td>
                    <?php $_smarty_tpl->_capture_stack[0][] = array("new_testing", null, null); ob_start(); ?>
                        <table width="100%">
                            <tr>
                                <td width="20%" valign="top">
                            <?php echo $_smarty_tpl->getSubTemplate ('menu.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                                </td>    
                                <td>
                                    <table align="center">
                            <tr>
                                <td colspan="2">
                                    Начать новый тест
                                </td>
                            </tr>
                            <tr>
                                <td width="40%">
                                    Тема теста
                                </td>
                                <td width="60%">
                                    <?php echo $_smarty_tpl->tpl_vars['data_one_quiz']->value->topic;?>

                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Ограничение времени
                                </td>
                                <td>
                                    <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['data_one_quiz']->value->time_limit;?>
<?php $_tmp1=ob_get_clean();?><?php if ($_tmp1=='') {?>
                                        Без ограничений
                                    <?php } else { ?>
                                        <?php echo $_smarty_tpl->tpl_vars['data_one_quiz']->value->time_limit;?>

                                    <?php }?>    
                                </td>                                    
                            </tr>
                            <tr>
                                <td>
                                    Комментарий автора
                                </td>
                                <td>
                                    <?php echo $_smarty_tpl->tpl_vars['data_one_quiz']->value->comment_test;?>

                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Результат
                                </td>
                                <td>
                                    <?php if ($_smarty_tpl->tpl_vars['data_one_quiz']->value->see_the_result=='Y') {?>
                                        Разрешено просматривать результат<br>
                                    <?php }?>   
                                    <?php if ($_smarty_tpl->tpl_vars['data_one_quiz']->value->see_details=='Y') {?>
                                        Разрешено просматривать детальный отчёт
                                    <?php }?> 
                                    <?php if ($_smarty_tpl->tpl_vars['data_one_quiz']->value->see_details=='N'||$_smarty_tpl->tpl_vars['data_one_quiz']->value->see_the_result=='N') {?>
                                        Запрещено просматривать результат
                                    <?php }?> 
                                </td>   
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <form method="post">
                                    <button type="submit" formaction="quiz.php?status=new_test&id_test=<?php echo $_smarty_tpl->tpl_vars['data_one_quiz']->value->id_test;?>
" name="button_click" value="start_test">Начать тест</button>
                                    </form>
                                </td>
                            </tr>
                        </table>
                                </td>
                            </tr>
                        </table>
                                
                    <?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
                    <?php $_smarty_tpl->_capture_stack[0][] = array("continue_testing", null, null); ob_start(); ?>
                        <table width="100%">
                            <tr>
                                <td width="30%">
                                    <table width="100%">
                                    <?php  $_smarty_tpl->tpl_vars['one_question'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['one_question']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['array_questions']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['one_question']->key => $_smarty_tpl->tpl_vars['one_question']->value) {
$_smarty_tpl->tpl_vars['one_question']->_loop = true;
?>
                                        <tr>
                                            <td>
                                                <a href="javascript: void(0);" onclick="console.log(<?php echo $_smarty_tpl->tpl_vars['one_question']->value->getIdQuestion();?>
)">Вопрос № <?php echo $_smarty_tpl->tpl_vars['one_question']->value->getIdQuestion();?>
</a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    </table>
                                </td>
                                <td width="70%">
                                    Прохождение теста
                                </td>
                            </tr>
                        </table>
                    <?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?> 
                    <?php $_smarty_tpl->_capture_stack[0][] = array("end_quiz", null, null); ob_start(); ?>
                       законченный тест
                    <?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>    
                    <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['status_testing']->value;?>
<?php $_tmp2=ob_get_clean();?><?php if ($_tmp2=='new_testing') {?>
                        <?php echo Smarty::$_smarty_vars['capture']['new_testing'];?>

                    <?php } else {?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['status_testing']->value;?>
<?php $_tmp3=ob_get_clean();?><?php if ($_tmp3=='continue_testing') {?>    
                        <?php echo Smarty::$_smarty_vars['capture']['continue_testing'];?>

                    <?php } else {?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['status_testing']->value;?>
<?php $_tmp4=ob_get_clean();?><?php if ($_tmp4=='end_quiz') {?>    
                        <?php echo Smarty::$_smarty_vars['capture']['end_quiz'];?>
    
                    <?php }}}?>    
                </td>
            </tr>
        </table>
        </div>
        <?php echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        </div>       
    </body>
</html><?php }} ?>
