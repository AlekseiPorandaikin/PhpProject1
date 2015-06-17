<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-06-13 22:46:32
         compiled from ".\templates\header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:209935572e95daaf193-01127505%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1f93ed950ee79f1e3b3c635831aea1c5483415b4' => 
    array (
      0 => '.\\templates\\header.tpl',
      1 => 1434221122,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '209935572e95daaf193-01127505',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5572e95db1e476_71003341',
  'variables' => 
  array (
    'you' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5572e95db1e476_71003341')) {function content_5572e95db1e476_71003341($_smarty_tpl) {?>                    <table width="100%"  bgcolor="#708090" >
                        <tr >
                            <td width="70%" height="70" align="center">
                                <h2>Автоматическая система тестирования</h2>
                            </td>
                            
                            <td width="15%" height="70">
                                <?php echo $_smarty_tpl->tpl_vars['you']->value;?>

                            </td>
                            <td width="5%" height="70">
                                <a href='authorization.php?link_click=exit'>Выход</a>
                            </td>
                        </tr>
                    </table>    
    
        <?php }} ?>
