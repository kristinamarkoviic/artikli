
<body>
<!--Navbar -->
<div class="container-fluid" id="menu">
<div class="row">
<div class=" col-sm-12 col-md-12 col-lg-12">
<nav class="mb-1 navbar navbar-expand-lg navbar-dark default-color">
  <a class="navbar-brand" href="index.php?page=home">Blogs</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-333"
    aria-controls="navbarSupportedContent-333" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent-333">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <?php
          if(isset($_SESSION['user'])){
            
        ?>
        <a class="nav-link" href="index.php?page=createArticle">Create Article
        <?php  } ?> 
        </a>
      </li>
      
      
    </ul>
    <form class="form-inline" id="formSearch">
      <div class="md-form my-0">
        <input class="mr-sm-2" type="text" placeholder="" aria-label="Search">
      </div>
    </form>
    <ul class="navbar-nav ml-auto nav-flex-icons">
      <li class="nav-item">
        <a class="nav-link waves-effect waves-light">
          <i class="fab fa-twitter"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link waves-effect waves-light">
          <i class="fab fa-google-plus-g"></i>
        </a>
      </li>
      <?php
          if(isset($_SESSION['user'])){
              if($_SESSION['user']->idRole == 2){
      ?>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right dropdown-default" id="whiteMenu"
          aria-labelledby="navbarDropdownMenuLink-333">
          <a class="dropdown-item" href="index.php?page=user">My profile</a>
          <a class="dropdown-item" href="models/korisnici/logout.php">Log out</a>
          
        </div>
        
      </li>
      <?php } }
      ?> 
      <?php
          if(!isset($_SESSION['user'])){
            
      ?>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-sign-in-alt"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right dropdown-default" id="logIn"
          aria-labelledby="navbarDropdownMenuLink-333">
            <form id="formLog" method="POST" action="models/korisnici/login.php">
                <label for="Email"><p class="plavo">Email</p></label>
                <input class="inputnama" type="text" name="emaillog" id="emaillog" placeholder="Email" required/>
                <label  for="Nama"><p class="plavo">Password</p></label>
                <input class="inputnama" type="password" name="passlog" id="passlog" placeholder="Password" required/>
                <button type="submit" name="btnLog" id="btnLog">LOG IN</button>
            </form> 
          
          
        </div>
        
      </li>
      <?php } 
      ?> 
    </ul>
  </div>
</nav>
</div>
</div>
</div>
<!--/.Navbar -->