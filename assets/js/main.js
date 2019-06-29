$(document).ready(function(){
    $("#formInsert").submit(add_article);
    $(document).on("click",".buttonDelete",delete_article);
    
});
function get_table(){
    $.ajax({
        url:"models/articles/all.php",
        method:"POST",
        dataType:"json",
        success:function(data){
            fill_table(data);
        },
        error:function(xhr,status,error){
            console.error(xhr.status);
            console.error(error);
        }
    });
}
function fill_table(articles){
    let html="";
    for(let a of articles){
        html+=`
        <tr>
        <td>${a.idArticle}</td>
        <td><img class='img-thumbnail' src="${a.new_cover}" alt="${a.title}" /></td>
        <td>${a.title}</td>
        <td>${a.description}</td>
        <td>${a.date}</td>
        <td><a class="buttonUpdate" href="php/changeB.php?id=<?=$panel_blog->idArticle?>">Update</a></td>
        <td><a class="buttonDelete" href="#" data-id="${a.idArticle}">Delete</a></td>
      </tr>
        `
    }
    $("#tableArticles").html(html);
}
function delete_article(e){
    e.preventDefault();
    let idArticle=$(this).data('id');

    $.ajax({
        url:"models/articles/delete.php",
        method:"POST",
        dataType:"json",
        data:{
            idArticle:idArticle
        },
        success:function(){
            get_table();
        },
        error:function(xhr,status,error){
            console.error("Nije uspeo ajax i insert");
            console.error(xhr.status);
            console.error(error);
        }
    });
}
function add_article(e){
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