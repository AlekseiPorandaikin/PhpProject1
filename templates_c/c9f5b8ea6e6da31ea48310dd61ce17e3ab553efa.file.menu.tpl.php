<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-06-12 22:30:48
         compiled from ".\templates\menu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:267905572e95db635d3-03773318%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c9f5b8ea6e6da31ea48310dd61ce17e3ab553efa' => 
    array (
      0 => '.\\templates\\menu.tpl',
      1 => 1434133844,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '267905572e95db635d3-03773318',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5572e95dd9f589_30149254',
  'variables' => 
  array (
    'data_role' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5572e95dd9f589_30149254')) {function content_5572e95dd9f589_30149254($_smarty_tpl) {?>  
    <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['data_role']->value[2];?>
<?php $_tmp1=ob_get_clean();?><?php if ($_tmp1==3) {?>
            <table width="100%">
                <tr bgcolor="#4682B4" valign="top">
                    <td width="50%" height="10%" align="left" bgcolor="#6CA6CD">
                        Меню администратора
                    </td>                
                </tr>
                <tr  valign="top">
                    <td width="50%" height="10%" align="right" bgcolor="#87CEFA">
                        <a href="administration.php?link_click=show_quiz">Опросы</a>
                    </td>                
                </tr>
                <tr bgcolor="#87CEFA" valign="top">
                    <td width="50%" height="10%" align="right" bgcolor="#87CEFA">
                        <a href="administration.php?link_click=show_users">Пользователи</a>
                    </td>                
                </tr>
            </table> 
            <?php }?>
    <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['data_role']->value[1];?>
<?php $_tmp2=ob_get_clean();?><?php if ($_tmp2==2) {?>
        <table width="100%">
            <tr bgcolor="#4682B4" valign="top">
                <td width="50%" height="10%" align="left" bgcolor="#6CA6CD">
                    Меню автора теста
                </td>                
            </tr>
            <tr  valign="top">
                <td width="50%" height="10%" align="right" bgcolor="#87CEFA">
                    <a href="author_quiz.php">Мои опросы</a>
                </td>                
            </tr>
            <tr bgcolor="#87CEFA" valign="top">
                <td width="50%" height="10%" align="right" bgcolor="#87CEFA">
                    <a href="create_quiz.php?link_click=new_quiz">Создать опрос</a>
                </td>                
            </tr>
        </table>
        <?php }?>
    <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['data_role']->value[0];?>
<?php $_tmp3=ob_get_clean();?><?php if ($_tmp3==1) {?>
        <table width="100%">
            <tr bgcolor="#4682B4" valign="top">
                <td width="50%" height="10%" align="left" bgcolor="#6CA6CD">
                    Меню тестируемого
                </td>                
            </tr>
            <tr  valign="top">
                <td width="50%" height="10%" align="right" bgcolor="#87CEFA">
                    <a href="main.php">Список тестов</a>
                </td>                
            </tr>            
        </table>
     <?php }?><?php }} ?>
