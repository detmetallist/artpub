$(document).ready(function(){
	var ostalos_mest=0;
	$(".button_top").click(function(){
		$('html,body').animate( { scrollTop: 0 }, 500 );
	});
	$('a[href^="#"]').click(function () { 
	     elementClick = $(this).attr("href");
	     destination = $(elementClick).offset().top;
	       $('html,body').animate( { scrollTop: destination }, 1100 );
	     return false;
    });
    $(".bronirovat button").click(function(){
    	var sob_id=$(this).attr("data-sob-id");
    	ostalos_mest=Number($(this).attr("data_mest"));
    	$("input[name=sobitie_id]").val(sob_id);
    	$(".popup").fadeIn(300);
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
					$(".popup_bron").fadeOut(300);
                    $(".popup_pay").fadeIn(300);
                    oplata_zapol(html);
			  	}
			});
    	}
    	return false;
    });
    function oplata_zapol(id){
        $.ajax({
                url: "/pay.php",
                type: "POST",
                data: {id:id},
                success: function(html) { 
                    var kol_mest=Number($("input[name='kol_mest']").val());
                    var cena=Number(html);
                    var cena_poln=cena*kol_mest;
                    $(".oplata_text").html("Вы хотите забронировать "+kol_mest+" по "+cena+" руб.<br> Общая сумма заказа - "+cena_poln+" руб.");
                    $("input[name='label']").val(id);
                    $("input[name='targets']").val("Транзакция за заказ "+id);
                    $("input[name='sum']").val(cena_poln);
                }
            });
    };
});