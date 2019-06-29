<div class="container-fluid">
<div class="row">
    <div class="col-xs-12 col-md-12 col-lg-8" id="userArticles">
    <div class="single_blog_sidebar wow fadeInUp" id="allMyArticles">
    <h2>My Articles</h2>
    <table class="table table-striped">
    <thead>
      <tr>
        <th>No</th>
        <th>Blog Photo</th>
        <th>Title</th>
        <th>Date</th>
        <th>Update</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody id="tableArticles">
        <?php
            include ABSOLUTH_PATH."models/articles/functions.php";
            $idUser = $_SESSION['user_id']; 
            
            $article_panel_blog = all_articles($idUser);
            foreach($article_panel_blog as $panel_blog):
        ?>
      <tr>
        <td><?=$panel_blog->idArticle?></td>
        <td><img class='img-thumbnail' src="<?=$panel_blog->new_cover?>" alt="<?=$panel_blog->title?>" /></td>
        <td><?=$panel_blog->title?></td>
        <td><?=$panel_blog->date?></td>
        <td><a class="buttonUpdate" href="#" data-id="<?=$panel_blog->idArticle?>">Update</a></td>
        <td><a class="buttonDelete" href="#" data-id="<?=$panel_blog->idArticle?>">Delete</a></td>
      </tr>
            <?php endforeach;?>
    </tbody>
  </table>
 

    </div>
    </div>
    <div class="col-xs-12 col-md-12 col-lg-4" id="updateArticle">
        <form class="text-center border border-light p-5" id="formUpdate" method="POST" action="models/articles/update.php" enctype="multipart/form-data">
            <p class="h4 mb-4">Update Article</p>
            <div class="form-group">
            <label for="exampleFormControlFile1">Choose images</label>
            <input type="file" multiple="multiple" name="files[]"/>
            </div>

            <!-- Name -->
            <input type="text" id="titleA" name="titleA" class="form-control mb-4" placeholder="Title"/>

            <!-- Email -->
            <input type="date" id="dateA" name="dateA" class="form-control mb-4"/>
            
            

            <!-- Message -->
            <div class="form-group">
                <textarea class="form-control rounded-0" id="descA" name="descA" rows="3" placeholder="Description"></textarea>
            </div>
            <input type="hidden" name="hidnUpdate" id="hidnUpdate"/>

            <!-- Send button -->
            <button class="btn btn-info btn-block" name="btnUpdateArticle" id="btnUpdateArticle" type="submit">Update</button>
        </form>
    </div>
</div>
</div>