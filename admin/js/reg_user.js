$(document).ready(function() {	
      $('#form_reg').validate(
				{	
				rules:{
						"reg_login":{
							required:true,
							minlength:5,
                            maxlength:15,
                            remote: {
                            type: "post",    
		                    url: "../reg/check_login.php"
		                     }
						},
						"reg_pas":{
							required:true,
							minlength:7,
                            maxlength:15
						},
						"reg_surname":{
							required:true,
                            minlength:3,
                            maxlength:15
						},
						"reg_name":{
							required:true,
                            minlength:3,
                            maxlength:15
						},
						"reg_patronymic":{
							required:true,
                            minlength:3,
                            maxlength:25
						},
						"reg_email":{
						    required:true,
							email:true
						},
						"reg_phone":{
							required:true
						},
						"reg_address":{
							required:true
						},
						"reg_captcha":{
							required:true,
                            remote: {
                            type: "post",    
		                    url: "../reg/check_captcha.php"
		                    
		                            }
                            
						}
					},
					messages:{
						"reg_login":{
							required:"Укажите Логин!",
                            minlength:"От 5 до 15 символов!",
                            maxlength:"От 5 до 15 символов!",
                            remote: "Логин занят!"
						},
						"reg_pas":{
							required:"Укажите Пароль!",
                            minlength:"От 7 до 15 символов!",
                            maxlength:"От 7 до 15 символов!"
						},
						"reg_surname":{
							required:"Укажите вашу Фамилию!",
                            minlength:"От 3 до 20 символов!",
                            maxlength:"От 3 до 20 символов!"                            
						},
						"reg_name":{
							required:"Укажите ваше Имя!",
                            minlength:"От 3 до 15 символов!",
                            maxlength:"От 3 до 15 символов!"                               
						},
						"reg_patronymic":{
							required:"Укажите ваше Отчество!",
                            minlength:"От 3 до 25 символов!",
                            maxlength:"От 3 до 25 символов!"  
						},
						"reg_email":{
						    required:"Укажите свой E-mail",
							email:"Не корректный E-mail"
						},
						"reg_phone":{
							required:"Укажите номер телефона!"
						},
						"reg_captcha":{
							required:"Введите код с картинки!",
                            remote: "Не верный код проверки!"
						}
					},
					
	submitHandler: function(form){
    SendMessage();
   }
   });
           function SendMessage(){
           $.ajax({
  url: "../reg/handler_reg.php",
  type: "post",
  data: $('#form_reg').serialize(),
  success: function(data){
    alert(data);
  }
}); 
}   
});

