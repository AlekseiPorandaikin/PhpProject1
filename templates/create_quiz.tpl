<html>
    <head>
        <title>{$title}</title>
        <meta charset="UTF-8">
        <script type="text/javascript" src="js/source_internet/jsapi"></script>
        <script src="js/jquery-2.1.3.min.js"></script>
        <link rel="stylesheet" href="css/styles.css">
        <link rel="stylesheet" href="js/source_internet/jquery-ui.css">
        <script src="js/source_internet/jquery-1.10.2.js"></script>
        <script src="js/source_internet/jquery-ui.js"></script>
    </head>
    <body>
        <script type="text/javascript">
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
                            <table width="70%" align="center">
                               <tr>
                                <td>    
                                {capture name='new_quiz'}
                                    <form method="post">
                                        <input type='hidden' name='button_click' value='create_quiz'>
                                        Тема опроса:<br>
                                        <input type="text" name="topic_quiz" placeholder="Ваша тема" required  onblur="checkTopicQuiz(this.value)" value="{$data_one_quiz->topic}"> 
                                        <span class="unsuitable" id="no_topic" style="display: none; color: red">Такое название уже есть</span>
                                        <span id="yes_topic" style="display: none; color: green">Ок</span>
                                        <br>
                                        Время выполнения опроса:<Br>
                                        <input type="radio" name="time_limit" value="Y" id="time_limit" onchange = 'setTimeLimit((this.getAttribute("value")))'> Да<Br>
                                        <input type="radio" name="time_limit" value="N" id="time_limit" onchange = 'setTimeLimit((this.getAttribute("value")))' checked> Нет<Br>
                                        <div class="enter_time_limit" style="display: none">
                                            <input type="hidden" name="max_time" id="max_time" value="{$max_time}">
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
                                {/capture} 
                                {capture name='menu_questions'}
                                    <h2>Опрос: {$data_one_quiz->topic}(<a href="javascript: void(0);" onclick="showEditQuiz();"><img src="img/icon/edit.png" width='30' height='30'>Изменить</a>)</h2>
                                    <div id="quiz" style="display: none">
                                    <form method="post">
                                        <input type="hidden" name="id_quiz" value="{$data_one_quiz->id_test}">
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
                                            <input type="hidden" name="max_time" id="max_time" value="{$max_time}">
                                          <p>
                                            <label for="amount">Время выполнения опроса (мин.):</label>
                                            <input type="text" id="amount" name="set_time_limit" id="set_time_limit" readonly style="border:0; color:#f6931f; font-weight:bold;" value="{$data_one_quiz->time_limit}">
                                          </p>

                                          <div id="slider-range-min"></div>
                                         </div>
                                        Дополнительная информация:<Br>
                                        <textarea rows="5" cols="40" name="comment_test" placeholder="Информация, которая необходима для прохождения теста" value="{$data_one_quiz->comment_test}"></textarea><br>
                                        Разрешить смотреть результаты опроса:<Br>
                                        {if {$data_one_quiz->see_the_result}=="Y"}
                                        {else}                                            
                                        <input type="radio" name="see_the_result" value="Y"> Да<Br>                                            
                                        <input type="radio" name="see_the_result" value="N" checked> Нет<Br>                                            
                                        {/if}    
                                        Разрешить смотреть детальную информацию:<Br>
                                        <input type="radio" name="see_details" value="Y" checked> Да<Br>
                                        <input type="radio" name="see_details" value="N"> Нет<Br>  
                                        <input type="text" name="status_test" value="{$data_one_quiz->id_status_test}">
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
                                       {foreach $data_questions as $data_question_one}  
                                           {if $data_question_one}
                                       <tr>
                                           <td>
                                               №
                                           </td>
                                           <td>
                                            {$data_question_one->text_question}
                                           </td>
                                            <td>
                                                
                                                {if  {$data_question_one->id_questions_type}==1}
                                                Да/Нет
                                              {elseif  {$data_question_one->id_questions_type}==2}
                                                  Один ответ из списка
                                              {elseif  {$data_question_one->id_questions_type}==3}
                                                Один или более ответов из списка
                                              {elseif  {$data_question_one->id_questions_type}==4}
                                                Произвольный текст
                                            {/if} 
                                           </td>
                                           <td>
                                                <a href="?action=edit_question&id_question={$data_question_one->id_question}"><img src="img/icon/edit-notes.png" height="40px" width="40px"></a>
                                           </td>
                                           <td>
                                               <button type="submit" formaction="create_quiz.php?link_click=edit_quiz&id_quiz={$id_quiz}&id_question={$data_question_one->id_question}" name="button_click" value="delete_question"><img src="img/icon/trash.png" height="33px" width="30px"></button>
                                           </td>
                                       </tr>
                                       {/if}
                                {/foreach}
                                    </table>
                                    </form> 
                                {/capture}
                                {capture name='new_question'}
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
                                        
                                {/capture}
                                {capture name='add_answer_option_one'}
                                    <form  method='post'>
                                        Текст ответа<br>
                                        <textarea id='addQuestion' rows="5" cols="40" name="answer_the_question"></textarea> 
                                        <button name="button_click" value='add_answer_option_one'>Добавить ответ</button>
                                    
                                    <table>
                                        {foreach $data_answer_option as $one_data_answer_option}                                                
                                            <tr>
                                                <td>
                                                    {if $one_data_answer_option->right_answer == 'Y'}
                                                        <input type="radio" name="value_answer_option" value="{$one_data_answer_option->id_answer_option}" checked>
                                                    {elseif $one_data_answer_option->right_answer == 'N'}
                                                        <input type="radio" name="value_answer_option" value='{$one_data_answer_option->id_answer_option}'>
                                                    {/if}
                                                </td>
                                                <td> 
                                                    {$one_data_answer_option->answer_the_questions}
                                                </td>
                                            </tr>
                                        {/foreach}                                        
                                    </table>   
                                    <button name="button_click" value='add_right_answer_option_one'>Внести ответы</button>
                                    </form>
                                {/capture}
                                {capture name='add_answer_option_more'}
                                    Добавить несколько варианты ответов
                                {/capture}
                                {capture name='edit_quiz'}                                          
                                    {$smarty.capture.menu_questions}
                                {/capture}
                                
                                {capture name=edit_question}
                                    Редактирование вопроса
                                {/capture}
                                {capture name=add_inteviewee}
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
                                    <form method="post" action="create_quiz.php?link_click=edit_quiz&id_quiz={$id_quiz}"> 
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
                                        
                                {/capture}    
                                    {if {$view_quiz} eq 'new_quiz'}
                                        {$smarty.capture.new_quiz}   
                                    {elseif {$view_quiz} eq 'menu_questions'}
                                        {$smarty.capture.menu_questions}
                                    {elseif {$view_quiz} eq 'new_question'}
                                        {$smarty.capture.new_question}
                                    {elseif {$view_quiz} eq 'add_answer_option_one'}
                                        {$smarty.capture.add_answer_option_one}
                                    {elseif {$view_quiz} eq 'add_answer_option_more'}
                                        {$smarty.capture.add_answer_option_more}    
                                    {elseif {$view_quiz} eq 'edit_quiz'}
                                        {$smarty.capture.edit_quiz}    
                                    {elseif {$view_quiz} eq 'add_inteviewee'}
                                        {$smarty.capture.add_inteviewee}     
                                     {/if}
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
