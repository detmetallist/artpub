jQuery(document).ready(function($){
	
	  var mediaUploader;
	
	  $('.buttonupload').click(function(e) {
	    e.preventDefault();
	    var role=$(this).attr('role');
	     	    // Extend the wp.media object
	    mediaUploader = wp.media.frames.file_frame = wp.media({
	      title: 'Выберите изображение',
	      button: {
	      text: 'Вставить'
	    }, multiple: false });
	
	    // When a file is selected, grab the URL and set it as the text field's value
	    mediaUploader.on('select', function() {
	      var attachment = mediaUploader.state().get('selection').first().toJSON();
	      //$('#image-url').val(attachment.url);
	      $('#image-url'+role).val(attachment.id);
	      $('#upli'+role).html( '<img src="'+attachment.url+'" alt="" style="height: 100px; width: auto; margin: 10px 0"/>' );
	      
	
	      
	    });
	    // Open the uploader dialog
	    mediaUploader.open();
	  });
	  $('.delete').click(function(e) {
	  e.preventDefault();
	  var role=$(this).attr('role');	
	  if (confirm("Изображение будет удалено. Изменения вступят в силу после сохранения")) {
		  
	  $('#image-url'+role).val('');
	  $('#upli'+role).html('');	  
		  
		  
		  
	  } else {
	  		return false;
	  	} 
	  
	  
	    
	  });
	$(".zakazi_tabl p").click(function(){
		var block=$(this);
		var id=block.attr("data-sob-id");
		$.ajax({
			url: "/sobitia.php",
			type: "POST",
			data: {sob_id: id},
			success: function(html) { 
				$(".pod_blokom_zakazov").fadeOut(300);
				$(".zakazi_tabl p").removeClass('zakazi_tabl_active');
				block.addClass('zakazi_tabl_active');
				block.parent(".block_zakazov").children(".pod_blokom_zakazov").html(html).fadeIn(300);
		  	}
		});
	});
	$(".bronirovat_button").click(function(){
    	var sob_id=$(this).attr("data-sob-id");
    	ostalos_mest=Number($(this).attr("data_mest"));
    	$("input[name=sobitie_id]").val(sob_id);
    	$(".popup").fadeIn(300);
    });
    $(document).on('click','.knopka_udalit',function(){
    	var sobitie_id=$(this).parent(".zakaz_item").attr("data-id");
    	$.ajax({
				url: "/udalit.php",
				type: "POST",
				data: {sob_id:sobitie_id},
				success: function(html) { 
					location.reload();
			  	}
			}); 
    });
    $(".popup_over").click(function(){
    	$(".popup").fadeOut(300);
    });
    $(".form_bron").submit(function(){
    	var inp_kol_mest=Number($("input[name='kol_mest']").val());
    	var th=$(this);
    	if(ostalos_mest<inp_kol_mest){
    		alert("Столько мест нет. Осталось всего "+ostalos_mest+". Введите количество мест до "+ostalos_mest);
    	} else {
    		$.ajax({
				url: "/bron.php",
				type: "POST",
				data: th.serialize(),
				success: function(html) { 
					alert("Спасибо за заказ. Проверьте e-mail, туда должен прийти билет");
					$(".popup").fadeOut(300);
			  	}
			});
    	}
    	return false;
    });
});	