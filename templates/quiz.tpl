<html>
    <head>
        <title>{$title}</title>
        <meta charset="UTF-8">
        <script type="text/javascript" src="https://www.google.com/jsapi"></script>
        <script src="js/jquery-2.1.3.min.js"></script>
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
                    {include file='header.tpl'}
                </td>
            </tr>
            <tr>
                <td>
                    {capture name="new_testing"}
                        <table width="100%">
                            <tr>
                                <td width="20%" valign="top">
                            {include file='menu.tpl'}
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
                                    {$data_one_quiz->topic}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Ограничение времени
                                </td>
                                <td>
                                    {if {$data_one_quiz->time_limit}==""}
                                        Без ограничений
                                    {else}
                                        {$data_one_quiz->time_limit}
                                    {/if}    
                                </td>                                    
                            </tr>
                            <tr>
                                <td>
                                    Комментарий автора
                                </td>
                                <td>
                                    {$data_one_quiz->comment_test}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Результат
                                </td>
                                <td>
                                    {if $data_one_quiz->see_the_result=='Y'}
                                        Разрешено просматривать результат<br>
                                    {/if}   
                                    {if $data_one_quiz->see_details=='Y'}
                                        Разрешено просматривать детальный отчёт
                                    {/if} 
                                    {if $data_one_quiz->see_details=='N' || $data_one_quiz->see_the_result=='N'}
                                        Запрещено просматривать результат
                                    {/if} 
                                </td>   
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <form method="post">
                                    <button type="submit" formaction="quiz.php?status=new_test&id_test={$data_one_quiz->id_test}" name="button_click" value="start_test">Начать тест</button>
                                    </form>
                                </td>
                            </tr>
                        </table>
                                </td>
                            </tr>
                        </table>
                                
                    {/capture}
                    {capture name="continue_testing"}
                        <table width="100%">
                            <tr>
                                <td width="30%">
                                    <table width="100%">
                                    {foreach $array_questions as $one_question}
                                        <tr>
                                            <td>
                                                <a href="javascript: void(0);" onclick="console.log({$one_question->getIdQuestion()})">Вопрос № {$one_question->getIdQuestion()}</a>
                                            </td>
                                        </tr>
                                    {/foreach}
                                    </table>
                                </td>
                                <td width="70%">
                                    Прохождение теста
                                </td>
                            </tr>
                        </table>
                    {/capture} 
                    {capture name="end_quiz"}
                       законченный тест
                    {/capture}    
                    {if {$status_testing} eq 'new_testing'}
                        {$smarty.capture.new_testing}
                    {elseif {$status_testing} eq 'continue_testing'}    
                        {$smarty.capture.continue_testing}
                    {elseif {$status_testing} eq 'end_quiz'}    
                        {$smarty.capture.end_quiz}    
                    {/if}    
                </td>
            </tr>
        </table>
        </div>
        {include file='footer.tpl'}
        </div>       
    </body>
</html>