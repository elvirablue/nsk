<script type="text/javascript" language="javascript">
 	function call() {
 	  var msg   = $('#pdf').serialize();
        $.ajax({
          type: 'GET',
          url: 'pdf.php',
          data: msg,
          success: function(data) {
            $('#results').html(data);
          },
          error:  function(xhr, str){
	    alert('Возникла ошибка: ' + xhr.responseCode);
          }
        });
 
    }
</script>