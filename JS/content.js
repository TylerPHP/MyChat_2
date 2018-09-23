$(document).ready (function (){
	/*-----index.php-----*/
	$(".DeleteWrite").bind("click", function(){
		if($( this )){
			$("input[name='login'], input[name='password']").val('');
		}
		return false;
	});
	$(".ChangePicture").bind("click", function(){
		$("#file").trigger('click');
		return false;
	});
	$(".DonloadPicture").bind("click", function(){
		$("#upload").trigger('click');
		return false;
	});

	/*------Chat.php------*/
	$("button[name='Save'], .mySettings,.noneclick").bind("click", function(){
		return false;
	});


	$( ".mySettings" ).bind("click", function() {
		$(".settings").toggle( "slow" );
	});
	
	
	$('.settings').mouseover(function() {
		$(".radio-inline").show();
	})
	.mouseout(function() {
		$(".radio-inline").hide();
	});

	$('.settings').hide();
/**
 * проверка аватарки
 */
 $('img[src=""]').attr('src', 'CSS/images/user.png');

 /*------------ajax Chat.php------------*/


 $.ajax({
 	url: "./server/masseges.php",
 	method: 'post',
 	data: ({result: 'yes', login:$("input[name='hidden']").val()}),
 	dataType: "html",
 }).done(function(data){
 	$("#info").html(data);
 	$(".massegeWrite").val('');
/**
 * проверка аватарки
 */
 $('img[src=""]').attr('src', 'CSS/images/user.png');

 if($('.massegeUser').length > '3')
 	$(window).scrollTop($(document).height());
});

/**
 * scroll вниз при открытии страницы когда больше 7 сообщений
 */

 if($('.massegeUser').length > '7')
 	$(window).scrollTop($(document).height());

 $("button[name='Save']").bind("click", function(){

 	$.ajax({
 		url: "./server/chatAjax.php",
 		type: "POST",
 		data: ({nikname: $("input[name='nikname']").val(), age: $("input[name='age']").val(),
 			gender:$("input[type='radio']:checked").val(), login:$("input[name='hidden']").val()}),
 		dataType: "html",
 		success: function(data){
 			if(data == "Good"){
 				alert('Save Good');

					var gender = $("input[type='radio']:checked").val();//выбор гендер

					if(gender == '1')
					{   
						$(".genDer").text('Man');

					}else if(gender == '2'){

						$(".genDer").text('Woman');
					}

				}else{
					alert('Save not good!! age not bigger 110 and less 7, nikname not bigger 25 and not less 6');
				}
				
			}
		});
 });

 var counter = 0;

 $(".noneclick").bind("click", function(){
 	if($('.massegeWrite').val().length >= 1)
 		$.ajax({
 			url: "./server/masseges.php",
 			method: 'post',
 			data: {massege: $(".massegeWrite").val(), 
 			login:$("input[name='hidden']").val()}
 		}).done(function(data){
 			$("#info").append(data);
 			$(".massegeWrite").val('');

 			counter++;
 			setTimeout(function(){ 
 				if(counter >= 4){
 					alert("Fludd!!!!!!!--!!!!!!");
 				}else{counter = 0;}
 			}, 2000);
 //проверка аватарки
 $('img[src=""]').attr('src', 'CSS/images/user.png');

 if($('.massegeUser').length > '3')
 	$(window).scrollTop($(document).height());
});

 	});



//отправка сообщения по нажатию enter
$(window).keyup(function(event) {
	if(event.keyCode==13 && $('.massegeWrite').val().length >= 1){
		{
			$.ajax({
				url: "./server/masseges.php",
				method: 'post',
				data: {massege: $(".massegeWrite").val(), 
				login:$("input[name='hidden']").val()}
			}).done(function(data){
				$("#info").append(data);
				$(".massegeWrite").val('');
				counter++;
				setTimeout(function(){ 
					if(counter >= 4){
						alert("Fludd!!!!!!!--!!!!!!");
					}else{counter = 0;}
				}, 2000);
 //проверка аватарки
 $('img[src=""]').attr('src', 'CSS/images/user.png');
 if($('.massegeUser').length > '5')
 	$(window).scrollTop($(document).height());
});

		}
	}
});


});