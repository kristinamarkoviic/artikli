<!-- Default form contact -->
<div class="container-fluid" id="createA">
<div class="row">
<div class="col-lg-2">
</div>
<div class=" col-sm-12 col-md-6 col-lg-8" >

<form class="text-center border border-light p-5" id="formInsert" action="models/articles/insert.php" method="post" enctype="multipart/form-data">

    <p class="h4 mb-4">Add article</p>
    <div class="form-group">
    <label for="exampleFormControlFile1">Choose image for cover photo</label>
    <input type="file" class="form-control-file" id="cover" name="cover"/>
    </div>

    <!-- Name -->
    <input type="text" id="title" name="title" class="form-control mb-4" placeholder="Title"/>

    <!-- Email -->
    <input type="date" id="date" name="date" class="form-control mb-4"/>
    
    

    <!-- Message -->
    <div class="form-group">
        <textarea class="form-control rounded-0" id="desc" name="desc" rows="3" placeholder="Description"></textarea>
    </div>
    <input type="hidden" name="hidnUser" id="hidnUser" value="<?=$_SESSION['user_id']  ?>"/>

    <!-- Send button -->
    <button class="btn btn-info btn-block" id="btnAddArticle" type="submit">Add</button>

</form>
<!-- Default form contact -->
</div>
<div class="col-lg-2">
</div>
</div>
</div>