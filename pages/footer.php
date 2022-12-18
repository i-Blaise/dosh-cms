<?php
require_once('../ClassLibraries/MainClass.php');
$mainPlug = new mainClass();


if(!isset($_SESSION['login']) || empty($_SESSION['login']))
    {
            header("Location: ../login");
    }
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Dosh Admin</title>
  <!-- base:css -->
  <link rel="stylesheet" href="../vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../vendors/feather/feather.css">
  <link rel="stylesheet" href="../vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="../vendors/select2/select2.min.css">
  <link rel="stylesheet" href="../vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../images/dosh-favicon.png" />

  	<!-- Notification -->
	<!-- jQuery -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<!-- Toastr -->
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

  <?php
  if(isset($_POST['footer_link_details_submit']))
  {
    $uploadStatus = $mainPlug->uploadFooterLinksDetails($_POST);
    if($uploadStatus == 'good')
    { 
        echo "     <script type='text/javascript'>   
        $(document).ready(function() {
        toastr.options.positionClass = 'toast-top-center';
        toastr.options.closeButton = true;
        toastr.options.progressBar = true;
        toastr.options.timeOut = 30000;
        toastr.success('Footer Updated', 'Success');
    });
    </script>";
    }
  
    $footer_link_details_submit_status = $uploadStatus == 'good' ? true : false;
  
    
  
  }elseif(isset($_POST['sm_details_submit']))
  {
    $uploadStatus = $mainPlug->uploadSMDetails($_POST);
    if($uploadStatus == 'good')
    { 
        echo "     <script type='text/javascript'>   
        $(document).ready(function() {
        toastr.options.positionClass = 'toast-top-center';
        toastr.options.closeButton = true;
        toastr.options.progressBar = true;
        toastr.options.timeOut = 30000;
        toastr.success('Footer Updated', 'Success');
    });
    </script>";
    }
  }

?>
</head>


<body>
  <div class="container-scroller">
    <!-- partial:../partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo" href="#"><img src="../images/dosh-logo.svg" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="#"><img src="../images/dosh-favicon.png" alt="logo"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
        <ul class="navbar-nav mr-lg-2">
          <li class="nav-item nav-search d-none d-lg-block">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="search">
                  <i class="icon-search"></i>
                </span>
              </div>
              <input type="text" class="form-control" placeholder="Search Projects.." aria-label="search" aria-describedby="search">
            </div>
          </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
                
          <li class="nav-item dropdown d-flex mr-4 ">
            <a class="nav-link count-indicator dropdown-toggle d-flex align-items-center justify-content-center" id="notificationDropdown" href="#" data-toggle="dropdown">
              <i class="icon-cog"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
              <!-- <p class="mb-0 font-weight-normal float-left dropdown-header">Settings</p>
              <a class="dropdown-item preview-item">               
                  <i class="icon-head"></i> Profile
              </a> -->
              <a class="dropdown-item preview-item" href="../login/logout.php">
                  <i class="icon-circle-cross"></i> Logout
              </a>
            </div>
          </li>

        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:../partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="user-profile">
          <div class="user-image">
            <img src="../images/faces/person.png">
          </div>
          <div class="user-name">
            Dosh Website CMS
          </div>
          <div class="user-designation">
              Admin
          </div>
        </div>
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link disabled" href="../index.html">
              <i class="icon-bar-graph-2 menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="icon-layout menu-icon"></i>
              <span class="menu-title">Pages</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="../pages/homepage.php">Homepage</a></li>
                <li class="nav-item"> <a class="nav-link" href="../pages/about.html">About Page</a></li>
                <li class="nav-item"> <a class="nav-link" href="../pages/product_services.php">Products & Services</a></li>
                <li class="nav-item"> <a class="nav-link" href="../pages/contact.html">Contact Page</a></li>
              </ul>
            </div>
            <li class="nav-item">
              <a class="nav-link" href="../pages/footer.html">
                <i class="icon-layout menu-icon"></i>
                <span class="menu-title">Footer</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../pages/preview.html">
                <i class="icon-paper menu-icon"></i>
                <span class="menu-title">Website Preview</span>
              </a>
            </li>
          </li>
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">     
        <!-- <iframe src="https://dosh-969a33.webflow.io/" title="description"></iframe>    -->
        <div class="content-wrapper">
          <div class="row">
            
           
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Footer</h4>
                    <p class="card-description">
                      Contact
                    </p>


                    <?php
                        $footer_result = $mainPlug->footerDetails();
                        $footer = mysqli_fetch_assoc($footer_result);
                        // print_r($footer['id']);
                        // die();
                    ?>
                    <form class="forms-sample" method="POST" action="">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Title 1</label>
                        <input type="text" name="link_title1" class="form-control" id="exampleInputEmail1" value="<?php echo $footer['link_title1'] ?>" required maxlength="30">
                      <p style="color:red">Max number of characters: 30</p>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Link 1</label>
                        <input type="text" name="link_url1"class="form-control" id="exampleInputEmail1" value="<?php echo $footer['link_url1'] ?>" required maxlength="255">
                      </div>
                      
                      <div class="form-group">
                        <label for="exampleInputEmail1">Title 2</label>
                        <input type="text" name="link_title2" class="form-control" id="exampleInputEmail1" value="<?php echo $footer['link_title2'] ?>" required maxlength="30">
                      <p style="color:red">Max number of characters: 30</p>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Link 1</label>
                        <input type="text" name="link_url2" class="form-control" id="exampleInputEmail1" value="<?php echo $footer['link_url2'] ?>" required maxlength="255">
                      </div>
                      
                      <div class="form-group">
                        <label for="exampleInputEmail1">Title 3</label>
                        <input type="text" name="link_title3" class="form-control" id="exampleInputEmail1" value="<?php echo $footer['link_title3'] ?>" maxlength="30">
                      <p style="color:red">Max number of characters: 30</p>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Link 3</label>
                        <input type="text" name="link_url3" class="form-control" id="exampleInputEmail1" value="<?php echo $footer['link_url3'] ?>" required maxlength="255">
                      </div>
                      
                      <div class="form-group">
                        <label for="exampleInputEmail1">Title 4</label>
                        <input type="text" name="link_title4" class="form-control" id="exampleInputEmail1" value="<?php echo $footer['link_title4'] ?>" maxlength="30">
                      <p style="color:red">Max number of characters: 30</p>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Link 4</label>
                        <input type="text" name="link_url4" class="form-control" id="exampleInputEmail1" value="<?php echo $footer['link_url4'] ?>" maxlength="255">
                      </div>
                      
                      <button type="submit" name="footer_link_details_submit" class="btn btn-primary mr-2">Submit</button>
                      <button class="btn btn-light">Cancel</button>
                    </form>
                  </div>
                </div>
              </div>



              
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Contact</h4>
                    <p class="card-description">
                      Social Media
                    </p>


                    <form class="forms-sample" method="POST" action="">
                        <div class="form-group row">
                        <div class="col">
                            <p class="mb-2"><img src="../images/footer/fb-24.png"></p>
                          <label class="toggle-switch toggle-switch-success">
                            <input name="sm_facebook" type="checkbox" <?php echo $footer['sm_facebook'] == 1 ? 'checked' : ''; ?> id="fb-toggle">
                            <span class="toggle-slider round"></span>
                          </label>                      
                        </div>
                        <div class="col">
                            <p class="mb-2"><img src="../images/footer/tw-24.png"></p>
                          <label class="toggle-switch toggle-switch-success">
                            <input name="sm_twitter" type="checkbox" <?php echo $footer['sm_twitter'] == 1 ? 'checked' : ''; ?> id="tw-toggle">
                            <span class="toggle-slider round"></span>
                          </label>                      
                        </div>
                        <div class="col">
                            <p class="mb-2"><img src="../images/footer/Lk-30.png" width="24" height="24"></p>
                          <label class="toggle-switch toggle-switch-success">
                            <input name="sm_linkedin" type="checkbox" <?php echo $footer['sm_linkedin'] == 1 ? 'checked' : ''; ?> id="li-toggle">
                            <span class="toggle-slider round"></span>
                          </label>                      
                        </div>
                        <div class="col">
                            <p class="mb-2"><img src="../images/footer/ig-24.png"></p>
                          <label class="toggle-switch toggle-switch-success">
                            <input type="checkbox" name="sm_instagram" <?php echo $footer['sm_instagram'] == 1 ? 'checked' : ''; ?> id="in-toggle">
                            <span class="toggle-slider round"></span>
                          </label>                      
                        </div>
                    </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Facebook Link</label>
                        <input type="text" name="sm_facebook_link" class="form-control" id="fb-link" value="<?php echo $footer['sm_facebook_link'] ?>" <?php echo $footer['sm_facebook'] == 0 ? 'disabled' : ''; ?> maxlength="255">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Twitter Link</label>
                        <input type="text" name="sm_twitter_link" class="form-control" id="tw-link" value="<?php echo $footer['sm_twitter_link'] ?>" <?php echo $footer['sm_twitter'] == 0 ? 'disabled' : ''; ?> maxlength="255">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">LinkedIn  Link</label>
                        <input type="text" name="sm_linkedin_link" class="form-control" id="li-link" value="<?php echo $footer['sm_linkedin_link'] ?>" <?php echo $footer['sm_linkedin'] == 0 ? 'disabled' : ''; ?> maxlength="255">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Instagram Link</label>
                        <input type="text" name="sm_instagram_link" class="form-control" id="in-link" value="<?php echo $footer['sm_instagram_link'] ?>" <?php echo $footer['sm_instagram'] == 0 ? 'disabled' : ''; ?> maxlength="255">
                      </div>
                      <button type="submit" name="sm_details_submit" class="btn btn-primary mr-2">Submit</button>
                      <button class="btn btn-light">Cancel</button>
                    </form>
                  </div>
                </div>
              </div>


          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © Dosh</span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- base:js -->
  <script src="../vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="../js/off-canvas.js"></script>
  <script src="../js/hoverable-collapse.js"></script>
  <script src="../js/template.js"></script>
  <!-- endinject -->
  <!-- plugin js for this page -->
  <script src="../vendors/typeahead.js/typeahead.bundle.min.js"></script>
  <script src="../vendors/select2/select2.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- Custom js for this page-->
  <script src="../js/file-upload.js"></script>
  <script src="../js/typeahead.js"></script>
  <script src="../js/select2.js"></script>
  <!-- End custom js for this page-->
</body>

<script>
  // var fbToggle = false;
$("#fb-toggle").on('change', function() {
    if ($(this).is(':checked')) {
        document.getElementById("fb-link").disabled = false;
    }
    else {
       document.getElementById("fb-link").disabled = true;
    }
});


$("#tw-toggle").on('change', function() {
    if ($(this).is(':checked')) {
        document.getElementById("tw-link").disabled = false;
    }
    else {
       document.getElementById("tw-link").disabled = true;
    }
});

$("#li-toggle").on('change', function() {
    if ($(this).is(':checked')) {
        document.getElementById("li-link").disabled = false;
    }
    else {
       document.getElementById("li-link").disabled = true;
    }
});

$("#in-toggle").on('change', function() {
    if ($(this).is(':checked')) {
        document.getElementById("in-link").disabled = false;
    }
    else {
       document.getElementById("in-link").disabled = true;
    }
});
</script>

</html>
