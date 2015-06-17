<html>
    <head>
        <title>{$title}</title>
        <meta charset="UTF-8">
        <script type="text/javascript" src="js/source_internet/jsapi"></script>
        <script src="js/jquery-2.1.3.min.js"></script>
        <link rel="stylesheet" href="css/styles.css">
    </head>
    <body>
        <script>
            function confirmDelete() {
                if (confirm("Вы подтверждаете удаление?")) {
                        return true;
                } else {
                        return false;
                }
            }
        </script>    
        <div class="wrapper">
            <div class="content">
<form id="go" method="post">
                        </form>
        <table width="100%">
            <tr>
                <td  width="100%">
                    {include file='header.tpl'}
                </td>
            </tr>
            <tr>
                <td>
                <table width="100%" >
                    <tr>                        
                        <td width="20%" valign="top">
                            {include file='menu.tpl'}
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
                                           {foreach $data_quiz as $data_one_quiz}
                                            <tr>
                                                <td>
                                                    {$data_one_quiz->topic}
                                                </td>
                                                <td>
                                                   {$data_one_quiz->date_create}
                                               </td>
                                               <td>
                                                   {if $data_one_quiz->vasibility_test==1}
                                                        <img src="img/icon/unlock.png" width="50px" height="50px">
                                                    {else}
                                                        <img src="img/icon/lock.png" width="50px" height="50px">
                                                    {/if}
                                               </td>
                                                <td>
                                                    <a href="create_quiz.php?link_click=edit_quiz&id_quiz={$data_one_quiz->id_test}"><img src="img/icon/edit-notes.png" width="50px" height="50px" title="Изенить"></a>
                                                    <a href="author_quiz.php?link_click=delete_quiz&id_quiz={$data_one_quiz->id_test}"  onclick="return confirmDelete();"><img src="img/icon/delete-notes.png" width="50px" height="50px" title="Удалить"></a>
                                                </td>
                                                <td>
                                                    {if $data_one_quiz->vasibility_test==1}
                                                        <button type="submit" formaction="author_quiz.php" name="deactivate_quiz" value="{$data_one_quiz->id_test}">Заблокировать тест</button>
                                                    {else}
                                                        <button type="submit" formaction="author_quiz.php" name="activate_quiz" value="{$data_one_quiz->id_test}">Активировать тест</button>
                                                    {/if}  
                                                </td>                                               
                                            </tr>
                                            {/foreach}
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
        {include file='footer.tpl'}
        </div>                                
    </body>
</html>
