<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-06-17 01:23:55
         compiled from "templates\author_quiz.tpl" */ ?>
<?php /*%%SmartyHeaderCode:95345573ec0e9be5d5-28639292%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6009bb73be1ea7bddd9bedcb338c8dc6e2d1278e' => 
    array (
      0 => 'templates\\author_quiz.tpl',
      1 => 1434489833,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '95345573ec0e9be5d5-28639292',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5573ec0eb468e0_29916700',
  'variables' => 
  array (
    'title' => 0,
    'data_quiz' => 0,
    'data_one_quiz' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5573ec0eb468e0_29916700')) {function content_5573ec0eb468e0_29916700($_smarty_tpl) {?><html>
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
    </head>
    <body>
        <?php echo '<script'; ?>
>
            function confirmDelete() {
                if (confirm("Вы подтверждаете удаление?")) {
                        return true;
                } else {
                        return false;
                }
            }
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
                            <table width="100%">
                               <tr>
                                   <td>
                                       <a href="create_quiz.php?link_click=new_quiz"><img src="img/icon/add-notes.png" width="50px" height="50px"></a>
                                   </td>
                               </tr>
                               <tr>
                                   <td>
                                       <table width="100%" align="center">
                                           <form method="post">
                                           <tr>                                               
                                               <td>
                                                   Тема теста
                                               </td>
                                               <td>
                                                   Дата создания
                                               </td>
                                               <td>
                                                   Статус опроса
                                               </td>
                                               <td colspan="2">
                                                   Операции
                                               </td>
                                           </tr>
                                           <?php  $_smarty_tpl->tpl_vars['data_one_quiz'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['data_one_quiz']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data_quiz']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['data_one_quiz']->key => $_smarty_tpl->tpl_vars['data_one_quiz']->value) {
$_smarty_tpl->tpl_vars['data_one_quiz']->_loop = true;
?>
                                            <tr>
                                                <td>
                                                    <?php echo $_smarty_tpl->tpl_vars['data_one_quiz']->value->topic;?>

                                                </td>
                                                <td>
                                                   <?php echo $_smarty_tpl->tpl_vars['data_one_quiz']->value->date_create;?>

                                               </td>
                                               <td>
                                                   <?php if ($_smarty_tpl->tpl_vars['data_one_quiz']->value->vasibility_test==1) {?>
                                                        <img src="img/icon/unlock.png" width="50px" height="50px">
                                                    <?php } else { ?>
                                                        <img src="img/icon/lock.png" width="50px" height="50px">
                                                    <?php }?>
                                               </td>
                                                <td>
                                                    <a href="create_quiz.php?link_click=edit_quiz&id_quiz=<?php echo $_smarty_tpl->tpl_vars['data_one_quiz']->value->id_test;?>
"><img src="img/icon/edit-notes.png" width="50px" height="50px" title="Изенить"></a>
                                                    <a href="author_quiz.php?link_click=delete_quiz&id_quiz=<?php echo $_smarty_tpl->tpl_vars['data_one_quiz']->value->id_test;?>
"  onclick="return confirmDelete();"><img src="img/icon/delete-notes.png" width="50px" height="50px" title="Удалить"></a>
                                                </td>
                                                <td>
                                                    <?php if ($_smarty_tpl->tpl_vars['data_one_quiz']->value->vasibility_test==1) {?>
                                                        <button type="submit" formaction="author_quiz.php" name="deactivate_quiz" value="<?php echo $_smarty_tpl->tpl_vars['data_one_quiz']->value->id_test;?>
">Заблокировать тест</button>
                                                    <?php } else { ?>
                                                        <button type="submit" formaction="author_quiz.php" name="activate_quiz" value="<?php echo $_smarty_tpl->tpl_vars['data_one_quiz']->value->id_test;?>
">Активировать тест</button>
                                                    <?php }?>  
                                                </td>                                               
                                            </tr>
                                            <?php } ?>
                                       </table>
                                    </form>
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
