/*Проверка введенных данных*/
$(document).ready(function() { 
    $('#form_input').validate(
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
  url: "php/claim.php",
  type: "post",
  data: $('#form_input').serialize(),
  success: function(data){
    alert(data);
  }
}); 


} 
   });
   
   
   /*Вкладки*/
 $(document).ready(function () {
        $('.accordion-tabs').children('li').first().children('a').addClass('is-active')
              .next().addClass('is-open').show();
        $('.accordion-tabs').on('click', 'li > a', function(event) {
            if (!$(this).hasClass('is-active')) {
                event.preventDefault();
                $('.accordion-tabs .is-open').removeClass('is-open').hide();
                $(this).next().toggleClass('is-open').toggle();
                $('.accordion-tabs').find('.is-active').removeClass('is-active');
                $(this).addClass('is-active');
            } else {
                event.preventDefault();
            }
        });
    });
    
    
  