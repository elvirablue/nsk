  
$(document).on('ready', function(){ 
//******************модальные окна для форм**************************************************
//
//    var link_kitel = document.querySelector('#kitel');     
     
   
   $("input[name^='user-phone']").mask("+7 (999) 999-9999");
    var popup_wrapper = document.querySelector('.modal_wrapper');
    var popup = document.querySelector('.modal');
    var close = popup.querySelector('.modal_close');
    var form = popup.querySelector('form');
    var name = popup.querySelector('[name=user-name]');  
    var phone = popup.querySelector('[name=user-phone]');
    var mail = popup.querySelector('[name=user-mail]');
    var text_hide = popup.querySelector('[name=text]');
    var title = popup.querySelector('#modal_txt');
    var btn_value = popup.querySelector('#btn_form_modal');

    var storage_name = localStorage.getItem('name');
    var storage_phone = localStorage.getItem('phone');

    //var btn_form = form.querySelector('#btn_form_modal');

    function PopupShow(event) {
          event.preventDefault();
          popup.classList.remove('zoomOut');
          popup_wrapper.classList.remove('fadeOut');
          popup.classList.add('show', 'zoomIn');
          popup_wrapper.classList.add('show', 'fadeIn');
          
          if (storage_name) {
                name.value = storage_name;
                phone.focus();
                if (storage_phone) {
                      phone.value = storage_phone;
                      btn_form.focus();
                } 
          } else {
                name.focus();
          }
    };
    
    
    $(".js-booking-apart").click (function(event){
          event.preventDefault(); 
          var str = this.getAttribute('data-apart');
          title.innerText = text_hide.value = 'Заявка на бронирование: ' + str;
          btn_value.innerText = 'Отправить';
          PopupShow(event);
      });

    if (document.querySelector('#js-btn-tour')) {
      document.querySelector('#js-btn-tour').addEventListener('click', function(event){
          event.preventDefault();          
          title.innerText = text_hide.value = 'Запись на экскурсию';
          btn_value.innerText = 'Отправить';
          PopupShow(event);
      });
    };
    
     if (document.querySelector('.js-help')) {
      $(".js-help").click(function(event){
          event.preventDefault();          
          title.innerText = text_hide.value = 'Обратиться за помощью специалиста';
          btn_value.innerText = 'Отправить';
          PopupShow(event);
      });
    };
    
     $("#js-mail-pdf").click (function(event){
          event.preventDefault(); 
           var str = $("#nkv").val();
          title.innerText = text_hide.value = 'Укажите Ваш email ';
          phone.style.display='none';
          name.style.display='none';
          mail.classList.add('required');
          name.classList.remove('required');
          phone.classList.remove('required');
          popup.querySelector('span').innerHTML = 'Мы вышлем Вам файл в формате PDF<br>с данными о квартире №' + str;
          popup.querySelector('p b').style.display='none';
          popup.style.height='330px';
          btn_value.innerText = 'Отправить';
          PopupShow(event);
      });
	
    $("#btn_form_modal").on("click", function(){
        var email  = $("#user-mail_modal").val();
        //var toget $("#form1").serialize();
        //alert ($("#user_mail_modal").val());

        
      // если обе проверки пройдены
      // сначала мы скрываем кнопку отправки
        $("#btn_form_modal").replaceWith("<button class=\"btn-yellow btn-yellow--form-modal\" type=\"submit\" id=\"btn_form_modal\">Отправка...</button>");
        $.ajax({
            type: 'GET',
            url: 'pdf.php',
            data: $("#pdfform").serialize()+'&email='+$("#user_mail_modal").val(),
            success: function(data) {
                if (data == "true")
                    closePopup();
                else
                    alert("Ошибка отправки письма");
                    
            }
        });
    });

   

    function closePopup() {
          if (name.style.display === 'none') {
            phone.style.display='block';
            name.style.display='block';
            mail.classList.remove('required');
            name.classList.add('required');
            phone.classList.add('required');
            popup.querySelector('span').innerHTML = 'Менеджер перезвонит Вам<br> в течение 15 минут';
            popup.querySelector('p b').style.display='block';
            popup.style.height='480px';
          }
        
          if (popup.classList.contains('show')) {
                popup.classList.add('zoomOut');
                popup_wrapper.classList.add('fadeOut');
                setTimeout(function(){
                      popup.classList.remove('show', 'zoomIn' );      
                      popup_wrapper.classList.remove('show', 'fadeIn');
                }, 300);
                
          };
          if (popup.classList.contains('modal_error')) {
                popup.classList.remove('modal_error');    
          };
          
    }

    window.addEventListener('keydown', function(event) {
          if (event.keyCode === 27) {
                closePopup();
          };
    });

    popup_wrapper.addEventListener('click', function(event) {
          closePopup();
          
    });
 
    close.addEventListener('click', function(event) {
          event.preventDefault();
          closePopup();
    });


});