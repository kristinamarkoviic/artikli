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
        <th>Description</th>
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
        <td><?=$panel_blog->description?></td>
        <td><?=$panel_blog->date?></td>
        <td><a class="buttonUpdate" href="php/changeB.php?id=<?=$panel_blog->idArticle?>">Update</a></td>
        <td><a class="buttonDelete" href="#" data-id="<?=$panel_blog->idArticle?>">Delete</a></td>
      </tr>
            <?php endforeach;?>
    </tbody>
  </table>
  <div class="dugmici">
      <a href="php/insertB.php" id="insertA">Insert new Blog</a>
      <a href="adminPanel.php" id="blogA">ADMIN PANEL</a>
</div>

              <!-- <ul class="middlebar_nav wow">
                <li class="oneMyArticle"> 
                    <a href="#" class="mbar_thubnail"><img alt="" src="assets/images/hot_img1.jpg"></a>
                    <a href="#"class="mbar_title title">Novi huawei Y234</a>
                    <p href="#" class="mbar_titlep">06.03.2018</p>
                    <a href="#" class="mbar_title">Obrisi</a>
                    <a href="#" class="mbar_title">Izmeni</a>
                </li>
                <li class="oneMyArticle"> <a href="#" class="mbar_thubnail"><img alt="" src="assets/images/hot_img2.jpg"></a> <a href="#" class="mbar_title">Sed luctus semper odio aliquam rhoncus</a> </li>
                <li> <a href="#" class="mbar_thubnail"><img alt="" src="assets/images/hot_img1.jpg"></a> <a href="#" class="mbar_title">Sed luctus semper odio aliquam rhoncus</a> </li>
                <li> <a href="#" class="mbar_thubnail"><img alt="" src="assets/images/hot_img1.jpg"></a> <a href="#" class="mbar_title">Sed luctus semper odio aliquam rhoncus</a> </li>
              </ul> -->
    </div>
    </div>
    <div class="col-xs-12 col-md-12 col-lg-4" id="formUpdate">
    </div>
</div>
</div>