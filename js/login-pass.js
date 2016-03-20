/*Проверка логина и пароля*/
$(document).ready(function() { 
    $('#form_pass_login').validate(
    { 
     // правила для проверки
     rules:{
      "input_login":{
       required:false
      },
      "input_pass":{
       required:false
      }               
      },
     // выводимые сообщения при нарушении соответствующих правил
     messages:{
      "input_login":{
       required:"Введите логин"
      }
      "input_pass":{
       required:"Введите пароль"
      }
     },
     
submitHandler: function(form){
    SendMessage();
   }
   });
 
    /*function SendMessage(){         
  $.ajax({
  url: "php/claim.php",
  type: "post",
  data: $('#form_input').serialize(),
  success: function(data){
    alert(data);
  }
});  */


}
   
   