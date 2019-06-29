$(document).ready(function(){
    $("#formInsert").submit(add_article2);
    
});
function add_article2(e){
    e.preventDefault();

    var formData = new FormData(this);

    $.ajax({
        method:"POST",
        url:"models/articles/insert.php",
        dataType:"json",
        data:formData,
        processData: false,
        contentType: false,
        error:function(xhr,status,error){
            console.error("Nije uspeo ajax i insert");
            console.error(xhr.status);
            console.error(error);

        }
    });  

}