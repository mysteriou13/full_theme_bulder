
var ins = $("#form_inscription");

var validepass = 0;

var validemail = 0;

var sub_inscription = ("#sub_inscription");



$("#pass").keyup(function() {


  if($("#pass").val().length <= 7){

    $("#taill_password").html("mot de pass tro court");

    validepseudo = 0;
  }else{

    $("#taill_password").html("");

    validepseudo = 1;
  }

  });


  $("#verif_pass").keyup(function() {


    if($("#verif_pass").val() == $("#pass").val() ){


      $("#error_verif_pass").html(" ");

      validepass = 1;
    }else{


      $("#error_verif_pass").html("mot de pass pas indentique");

      validepass = 0;

    }


  });



  $("#email").keyup(function() {

  

    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

if($("#email").val().match(mailformat))
  {
 
    $("#error_mail").html("");

    validemail = 1;

  }
else
  {
    $("#error_mail").html("format email invalide");

    validemail = 0;

  }

  });



  
  $("#but_submit").hover(
  

    function() {

      resul = validepass+validemail;

  
      if(resul == 2){

        $('#sub_inscription').prop('type','submit');
        
      }else{
            
        $('#sub_inscription').prop('type','button');

      }

    }

    
  );

