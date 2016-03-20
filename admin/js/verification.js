/*Проверка введенных данных*/
$(document).ready(function() { 
    $('#form_input_admin').validate(
    { 
     // правила для проверки
     rules:{
      "UFC":{
       required:true
      },
      "payment":{
       required:true
      },
      "kbk":{
       required:true,
      minlength:20,
      maxlength:20
      },
      "summ":{
       required:true
      },
      "status":{
       required:true
      },
      "type_payment":{
          required:true
       },
      "status_bill_to":{
       required:true
      },
      "passport":{
       required:true
      },
      "numder_passport":{
       required:true,
       minlength:6,
      maxlength:6
      },
      "seria_passport":{
       required:true,
       minlength:4,
       maxlength:4
      }                         
      },
     // выводимые сообщения при нарушении соответствующих правил
     messages:{
      "UFC":{
       required:"Введите УФК по Ростовской области!"
      },
      "payment":{
       required:"Введите назначение платежа!"
      },
      "kbk":{
       required:"Введите код бюджетной классификации!"                         
      },
      "summ":{
       required:"Введите сумму!"                            
      },
      "status":{
       required:"Введите статус!" 
      },
      "type_payment":{
         required:"Введите тип платежа!"
      },
      "status_bill_to":{
       required:"Введите тип плательщика!"
      },
      "passport":{
       required:"Введите вид документа!"
      },
       "seria_passport":{
       required:"Введите 4 цифры серии паспорта!"
      },
      "numder_passport":{
       required:"Введите 6 цифр номера паспорта!"
      }
     },
     
 submitHandler: function(form){
    SendMessage();
   }
   });
 
         function SendMessage(){
           $.ajax({
  url: "functions/claim.php",
  type: "post",
  data: $('#form_input_admin').serialize(),
  success: function(data){
    alert(data);
  }
}); 
}   
   });
   
 