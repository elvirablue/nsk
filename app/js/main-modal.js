$(document).on('ready', function(){

	//$(".user-input--block-modal").mask("+7 (999) 999-9999");
   
	var btnModal = document.querySelector('#main-modal-btn');
	var btnModalClosed = document.querySelector('.main-modal__closed');
	var modal = document.querySelector('.main-modal-bg');
	var modalWrapper = document.querySelector('.modal_wrapper');
	var btnCall = document.querySelector('.main-modal__btn--call');
	var blockCall = document.querySelector('.block-modal--call');
	var btnQuestion = document.querySelector('.main-modal__btn--question');
	var blockQuestion = document.querySelector('.block-modal--question');

	btnModal.addEventListener('click', function() {
		modal.classList.add('show');
		modalWrapper.classList.add('show');
	});

	btnModalClosed.addEventListener('click', function() {
		modal.classList.remove('show');
		modalWrapper.classList.remove('show');
		btnCall.classList.remove('show');
		btnQuestion.classList.remove('show');
		if (blockQuestion.classList.contains('show')) blockQuestion.classList.remove('show');
		if (blockCall.classList.contains('show')) blockCall.classList.remove('show');
	});

	btnCall.addEventListener('click', function() {
		blockCall.classList.add('show');
		if (blockQuestion.classList.contains('show')) blockQuestion.classList.remove('show');
	});

	btnQuestion.addEventListener('click', function() {
		if (blockCall.classList.contains('show')) blockCall.classList.remove('show');
		blockQuestion.classList.add('show');
	});

	window.addEventListener('keydown', function(event) {
          if (event.keyCode === 27) {
          	if (!blockQuestion.classList.contains('show') && !blockCall.classList.contains('show')) {
          		modal.classList.remove('show');  
          		modalWrapper.classList.remove('show');        	
          	}
          blockQuestion.classList.remove('show');
          blockCall.classList.remove('show');   
         }       
    });

    modalWrapper.addEventListener('click', function(event) {  
    	if (blockQuestion.classList.contains('show')) blockQuestion.classList.remove('show');
    	if (blockCall.classList.contains('show')) blockCall.classList.remove('show');
    	modal.classList.remove('show');  
    	modalWrapper.classList.remove('show');  	      
          
    });


})