$(window).on('load', function () {
     $('#login').click(function(){DoLogin();} );

	$('#email').keypress(function(event){ 
		var key = event.which || event.keyCode;
		if(key == 13) DoLogin();
	})

	$('#passwd').keypress( function(event){ 
		var key = event.which || event.keyCode;
		if(key == 13) DoLogin();
	})
});  

function DoLogin(){
	$.ajax({
	  	type: "POST",
	  	url: WEB_ROOT+"/ajax/login.php",
	  	data: $("#frmLogin").serialize(true),
		beforeSend: function(){
			$("#loadingLogin").show();
			$("#errorLogin").hide();
		},
	  	success: function(response) {	
		//alert(response)
			$("#loadingLogin").hide();
			 //alert(response)
			var splitResp = response.split("[#]");

			if(splitResp[0] == "ok"){				
				window.location=WEB_ROOT+"/actividad2";
			}else if(splitResp[0] == "fail"){
				Swal.fire({
				    icon: 'error',
					text: splitResp[1],
					showConfirmButton: false,
					timer: 2500
				});	
			}
			
		},
		error:function(){
			  var x=1;
		} 
    }); 
}