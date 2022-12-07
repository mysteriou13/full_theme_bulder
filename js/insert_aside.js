
function insert_aside(){

var box = $('input[name="lienpage"]:checked').val(); 

$('#lienpage').prop( "checked", true );
 

if(box == "1"){
    $("#pet-select").show();

    $("#link_externe").hide();

}else{

    $("#pet-select").hide();
    $("#link_externe").show();

}

}
