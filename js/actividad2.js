document.addEventListener("DOMContentLoaded", function(event) {

const showNavbar = (toggleId, navId, bodyId, headerId) =>{
const toggle = document.getElementById(toggleId),
nav = document.getElementById(navId),
bodypd = document.getElementById(bodyId),
headerpd = document.getElementById(headerId)

// Validate that all variables exist
if(toggle && nav && bodypd && headerpd){
toggle.addEventListener('click', ()=>{
// show navbar
nav.classList.toggle('show2')
// change icon
toggle.classList.toggle('bx-x')
// add padding to body
bodypd.classList.toggle('body-pd')
// add padding to header
headerpd.classList.toggle('body-pd')
})
}
}

showNavbar('header-toggle','nav-bar','body-pd','header')

/*===== LINK ACTIVE =====*/
const linkColor = document.querySelectorAll('.nav_link')

function colorLink(){
if(linkColor){
linkColor.forEach(l=> l.classList.remove('active'))
this.classList.add('active')
}
}
linkColor.forEach(l=> l.addEventListener('click', colorLink))

// Your code to run since DOM is loaded and ready
});



$( window ).on( "load", function() {
    $('#tableUsers').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json"
        },
        dom: 'Bfrtip',
        buttons: [
             'csv',  'pdf', 
        ],
        responsive: true

    });
});


function editarPass(usuarioId){
	 $.ajax({
      type: "POST",
      url: WEB_ROOT+"/ajax/usuarios.php",
      data: "opcion=editarPass&usuarioId="+usuarioId,
    beforeSend: function(){
      $(".loader").show();
      
    },
      success: function(response) { 
    //alert(response)
      $(".loader").hide();
      //$("#testFinal").html(response)
      var splitResp = response.split("[#]");

      if(splitResp[0] == "ok"){    
      	 $("#bodyModal").html(splitResp[1])  ;
      	  $("#titleModal").html(splitResp[2])  
         $("#lanzar").click();
         $("#btnEditPass").click(function(){
         	UpdateUsuarioPass();
         })
      }
      
    },
    error:function(){
        var x=1;
    } 
    }); 
}

function UpdateUsuarioPass(){
	var error=0;
	 var passwd = $("#passwd").val();
     var passwd2 = $("#passwd2").val();
    if(passwd.length == 0) {
        $("#error_passwd").show();
        $("#error_passwd").html("Contraseña obligatoria");
        var error=1;
     }else if(passwd.length < 5){
       $("#error_passwd").show();
        $("#error_passwd").html("Contraseña muy corta");
        var error=1;
     }else if(passwd!=passwd2){
        $("#error_passwd2").show();
        $("#error_passwd2").html("Contraseñas no coinciden");
        var error=1;
     }

     if(error==0){
     	 $.ajax({
            type: "POST",
            url: WEB_ROOT+"/ajax/usuarios.php",
     		data: $("#frmUserEditPass").serialize(true),
		    beforeSend: function(){
		      $(".loader").show();
		      
		    },
		      success: function(response) { 
		    //alert(response)
		      $(".loader").hide();
		      //$("#testFinal").html(response)
		      var splitResp = response.split("[#]");

		      if(splitResp[0] == "ok"){       
		         Swal.fire({
		            icon: 'success',
		            html: "Contraseña actualizada exitosamente",
		            showConfirmButton: false,
		            timer: 1500
		          });
		        
		         $(".close").click();
		         
		      }else {
		        Swal.fire({
		            icon: 'error',
		            html: splitResp[1],
		            showConfirmButton: false,
		            timer: 2500
		          })
		          
		      } 
		      
		    },
		    error:function(){
		        var x=1;
		    } 
    });
     }
}

function editar(usuarioId){
  

   $.ajax({
      type: "POST",
      url: WEB_ROOT+"/ajax/usuarios.php",
      data: "opcion=editarUsuario&usuarioId="+usuarioId,
    beforeSend: function(){
      $(".loader").show();
      
    },
      success: function(response) { 
    //alert(response)
      $(".loader").hide();
      //$("#testFinal").html(response)
      var splitResp = response.split("[#]");

      if(splitResp[0] == "ok"){    
      	 $("#bodyModal").html(splitResp[1])  ;
      	  $("#titleModal").html(splitResp[2])  
         $("#lanzar").click();
         $("#btnEditSave").click(function(){
         	UpdateUsuario();
         })
      }
      
    },
    error:function(){
        var x=1;
    } 
    }); 
}


function UpdateUsuario(){
	 $(".error").hide();
    var error=0;
    var nombre = $("#nombre").val();
    if(nombre.length == 0) {
        $("#error_nombre").show();
        $("#error_nombre").html("Nombre obligatorio");
        var error=1;
     }

     var telefono = $("#telefono").val();
     if(telefono.length == 0) {
        $("#error_telefono").show();
        $("#error_telefono").html("telefono obligatorio");
        var error=1;
     }else if(telefono.length != 10 ){
        $("#error_telefono").show();
        $("#error_telefono").html("telefono no valido");
        var error=1;
     }


     var email = $("#email").val();
     if(email.length == 0) {
        $("#error_email").show();
        $("#error_email").html("Correo electrónico obligatorio");
        var error=1;
     }else if(!validar_email(email)){
        $("#error_email").show();
        $("#error_email").html("Correo electrónico no valido");
        var error=1;
     }



     var rfc = $("#rfc").val();
     rfc = rfc.toUpperCase();
     if(rfc.length == 0) {
         $("#error_rfc").show();
         $("#error_rfc").html("RFC obligatorio");
         var error=1;
     }else  if(!rfcValido(rfc)){
        $("#error_rfc").show();
        $("#error_rfc").html("RFC no valido");
        var error=1;
     }

     if(error==0){
       $.ajax({
            type: "POST",
            url: WEB_ROOT+"/ajax/usuarios.php",
     		data: $("#frmUserEdit").serialize(true),
		    beforeSend: function(){
		      $(".loader").show();
		      
		    },
		      success: function(response) { 
		    //alert(response)
		      $(".loader").hide();
		      //$("#testFinal").html(response)
		      var splitResp = response.split("[#]");

		      if(splitResp[0] == "ok"){       
		         Swal.fire({
		            icon: 'success',
		            html: "usuario actualizado exitosamente",
		            showConfirmButton: false,
		            timer: 1500
		          });
		         $("#positionUsuarios").html(splitResp[1]);
		         $(".close").click();
		          $('#tableUsers').DataTable({
				        "language": {
				            "url": "//cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json"
				        },
				        dom: 'Bfrtip',
				        buttons: [
				             'csv',  'pdf', 
				        ],
				        responsive: true

				    });
		      }else {
		        Swal.fire({
		            icon: 'error',
		            html: splitResp[1],
		            showConfirmButton: false,
		            timer: 2500
		          })
		          
		      } 
		      
		    },
		    error:function(){
		        var x=1;
		    } 
    });
     }
}





 function validar_email( email ) 
{
    var regex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(email) ? true : false;
}


function solonumeros(evt){
    var code = (evt.which) ? evt.which : evt.keyCode;    
    if(code==8) { 
        return true;
    } else if(code>=48 && code<=57) { 
        return true;
    } else{ 
        return false;
    }
}


function rfcValido(rfc, aceptarGenerico = true) {
    const re = /^([A-ZÑ&]{3,4}) ?(?:- ?)?(\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])) ?(?:- ?)?([A-Z\d]{2})([A\d])$/;
    var validado = rfc.match(re);

    if (!validado)  // Coincide con el formato general del regex?
        return false;

    // Separar el dígito verificador del resto del RFC
    const digitoVerificador = validado.pop(),
        rfcSinDigito = validado.slice(1).join(''),
        len = rfcSinDigito.length,

        // Obtener el digito esperado
        diccionario = "0123456789ABCDEFGHIJKLMN&OPQRSTUVWXYZ Ñ",
        indice = len + 1;
    var suma,
        digitoEsperado;

    if (len == 12) suma = 0
    else suma = 481; // Ajuste para persona moral

    for (var i = 0; i < len; i++)
        suma += diccionario.indexOf(rfcSinDigito.charAt(i)) * (indice - i);
    digitoEsperado = 11 - suma % 11;
    if (digitoEsperado == 11) digitoEsperado = 0;
    else if (digitoEsperado == 10) digitoEsperado = "A";

    // El dígito verificador coincide con el esperado?
    // o es un RFC Genérico (ventas a público general)?
    if ((digitoVerificador != digitoEsperado)
        && (!aceptarGenerico || rfcSinDigito + digitoVerificador != "XAXX010101000"))
        return false;
    else if (!aceptarGenerico && rfcSinDigito + digitoVerificador == "XEXX010101000")
        return false;
    return rfcSinDigito + digitoVerificador;
}