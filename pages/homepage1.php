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

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

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

  <!-- Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- WYSIWYG Editor  -->
    <script src="../vendor/tinymce/tinymce/tinymce.min.js" referrerpolicy="origin"></script>
  <script>
    // tinymce.init({
    //   selector: 'textarea#default-editor',
    //   plugins: 'code'
    // });

    tinymce.init({
      selector: 'textarea#default-editor',
      plugins: 'advlist autolink lists link image charmap preview anchor pagebreak code visualchars wordcount',
	  setup: function(editor) {
	  	var max = 400;
	    editor.on('submit', function(event) {
		  var numChars = tinymce.activeEditor.plugins.wordcount.body.getCharacterCount();
		  if (numChars > max) {
            alert("Only a maximum " + max + " characters are allowed.");
			event.preventDefault();
			return false;
		  }
		});
	  }
   });
  </script>



  <?php
    


    


    
  if(isset($_POST['homepage_slider_upload']))
  {
    $uploadStatus = $mainPlug->uploadHomepageSliders($_POST);
    if($uploadStatus == 'good')
    { 
        echo "     <script type='text/javascript'>   
        $(document).ready(function() {
        toastr.options.positionClass = 'toast-top-center';
        toastr.options.closeButton = true;
        toastr.options.progressBar = true;
        toastr.options.timeOut = 30000;
        toastr.success('Homepage Updated', 'Success');
    });
    </script>";
    }elseif($uploadStatus == 'ext_err')
    { 
        echo "     <script type='text/javascript'>   
        $(document).ready(function() {
        toastr.options.positionClass = 'toast-top-center';
        toastr.options.closeButton = true;
        toastr.options.progressBar = true;
        toastr.options.timeOut = 30000;
        toastr.error('Please check file extemsion acceptable extensions are: jpg, jpeg, png and svg', 'Invalid File');
    });
    </script>";
    }elseif($uploadStatus == 'size_err')
    { 
        echo "     <script type='text/javascript'>   
        $(document).ready(function() {
        toastr.options.positionClass = 'toast-top-center';
        toastr.options.closeButton = true;
        toastr.options.progressBar = true;
        toastr.options.timeOut = 30000;
        toastr.error('All files must be less than 1MB', 'Invalid File');
    });
    </script>";
    }elseif($uploadStatus == 'dimension_err')
    { 
        echo "     <script type='text/javascript'>   
        $(document).ready(function() {
        toastr.options.positionClass = 'toast-top-center';
        toastr.options.closeButton = true;
        toastr.options.progressBar = true;
        toastr.options.timeOut = 30000;
        toastr.error('Dimensions can be between 800x500 and 1920x1080', 'Invalid File');
    });
    </script>";
    }
  
    // $footer_link_details_submit_status = $uploadStatus == 'good' ? true : false;
  
    
  
  }elseif(isset($_POST['homepage_section1']))
  {
    $uploadStatus = $mainPlug->uploadHomepageSection1($_POST);
    // print_r($uploadStatus);
    // die();
    if($uploadStatus == 'good')
    { 
        echo "     <script type='text/javascript'>   
        $(document).ready(function() {
        toastr.options.positionClass = 'toast-top-center';
        toastr.options.closeButton = true;
        toastr.options.progressBar = true;
        toastr.options.timeOut = 30000;
        toastr.success('Homepage Updated', 'Success');
    });
    </script>";
    }elseif($uploadStatus == 'ext_err')
    { 
        echo "     <script type='text/javascript'>   
        $(document).ready(function() {
        toastr.options.positionClass = 'toast-top-center';
        toastr.options.closeButton = true;
        toastr.options.progressBar = true;
        toastr.options.timeOut = 30000;
        toastr.success('Homepage Updated', 'Success');
    });
    </script>";
    }elseif($uploadStatus == 'size_err')
    { 
        echo "     <script type='text/javascript'>   
        $(document).ready(function() {
        toastr.options.positionClass = 'toast-top-center';
        toastr.options.closeButton = true;
        toastr.options.progressBar = true;
        toastr.options.timeOut = 30000;
        toastr.error('All files must be less than 1MB', 'Invalid File');
    });
    </script>";
    }elseif($uploadStatus == 'dimension_err')
    { 
        echo "     <script type='text/javascript'>   
        $(document).ready(function() {
        toastr.options.positionClass = 'toast-top-center';
        toastr.options.closeButton = true;
        toastr.options.progressBar = true;
        toastr.options.timeOut = 30000;
        toastr.error('Dimensions can be between 800x500 and 1920x1080', 'Invalid File');
    });
    </script>";
    }
  }elseif(isset($_POST['homepage_section2']))
  {
    $uploadStatus = $mainPlug->uploadHomepageSection2($_POST);
    // print_r($uploadStatus);
    // die();
    if($uploadStatus == 'good')
    { 
        echo "     <script type='text/javascript'>   
        $(document).ready(function() {
        toastr.options.positionClass = 'toast-top-center';
        toastr.options.closeButton = true;
        toastr.options.progressBar = true;
        toastr.options.timeOut = 30000;
        toastr.success('Homepage Updated', 'Success');
    });
    </script>";
    }elseif($uploadStatus == 'ext_err')
    { 
        echo "     <script type='text/javascript'>   
        $(document).ready(function() {
        toastr.options.positionClass = 'toast-top-center';
        toastr.options.closeButton = true;
        toastr.options.progressBar = true;
        toastr.options.timeOut = 30000;
        toastr.success('Hompage Updated', 'Success');
    });
    </script>";
    }elseif($uploadStatus == 'size_err')
    { 
        echo "     <script type='text/javascript'>   
        $(document).ready(function() {
        toastr.options.positionClass = 'toast-top-center';
        toastr.options.closeButton = true;
        toastr.options.progressBar = true;
        toastr.options.timeOut = 30000;
        toastr.error('All files must be less than 1MB', 'Invalid File');
    });
    </script>";
    }elseif($uploadStatus == 'dimension_err')
    { 
        echo "     <script type='text/javascript'>   
        $(document).ready(function() {
        toastr.options.positionClass = 'toast-top-center';
        toastr.options.closeButton = true;
        toastr.options.progressBar = true;
        toastr.options.timeOut = 30000;
        toastr.error('Dimensions can be between 800x500 and 1920x1080', 'Invalid File');
    });
    </script>";
    }
  }elseif(isset($_POST['homepage_section3']))
  {
    $uploadStatus = $mainPlug->uploadHomepageSection3($_POST);
    // print_r($uploadStatus);
    // die();
    if($uploadStatus == 'good')
    { 
        echo "     <script type='text/javascript'>   
        $(document).ready(function() {
        toastr.options.positionClass = 'toast-top-center';
        toastr.options.closeButton = true;
        toastr.options.progressBar = true;
        toastr.options.timeOut = 30000;
        toastr.success('Homepage Updated', 'Success');
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
                <li class="nav-item"> <a class="nav-link" href="../pages/about.php">About Page</a></li>
                <li class="nav-item"> <a class="nav-link" href="../pages/product_services.php">Products & Services</a></li>
                <li class="nav-item"> <a class="nav-link" href="../pages/contact.php">Contact Page</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../pages/footer.php">
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
        </ul>
      </nav>
      <!-- partial -->
      <?php
      $homepage_result = $mainPlug->fetchHomepageDetails();
      $homepage_data = mysqli_fetch_assoc($homepage_result);
      ?>
      <div class="main-panel">     
        <div class="content-wrapper">
          <div class="row">
            
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Homepage</h4>
                  <p class="card-description">
                    Slide 1 and 2 & Description
                  </p>

                  <div class="row">
                  <div class="responsive">
                    <div class="gallery">
                      <a target="_blank" href="<?php echo $homepage_data['home_slider1_image']; ?>">
                        <img src="<?php echo $homepage_data['home_slider1_image']; ?>" alt="Cinque Terre" width="600" height="400">
                      </a>
                      <div class="desc">Homepage Slide 1</div>
                    </div>
                  </div>
                  
                  
                  <div class="responsive">
                    <div class="gallery">
                      <a target="_blank" href="<?php echo $homepage_data['home_slider2_image']; ?>">
                        <img src="<?php echo $homepage_data['home_slider2_image']; ?>" alt="Forest" width="600" height="400">
                      </a>
                      <div class="desc">Homepage Slide 2</div>
                    </div>
                  </div>
                </div>
                  <form class="forms-sample" method="POST" action="" enctype="multipart/form-data">
                    <div class="form-group">
                      <div class="mb-3">
                      <label for="formFile" class="form-label">Slide 1 Image</label>
                      <input class="form-control" type="file" id="formFile" name="slide-1">
                      </div>
                      <p style="color:red">Image should be above 800 x 500  and below 1920 x 1080</p>
                      <p style="color:red">Image size must be less than 1MB</p>
                      <p style="color:red">Image extesion can be SVG, PNG, JPG or JPEG</p>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Slider 1 Heading</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="slider1_heading" value="<?php echo $homepage_data['home_slider1_heading']; ?>" required maxlength="40">
                    </div>
                    <div class="form-group">
                      <label for="exampleTextarea1">Slider 1 Description</label>
                      <textarea class="form-control" id="default-editor" rows="4" name="slider1_desc" required maxlength="400" ><?php echo $homepage_data['home_slider1_desc']; ?></textarea>
                      <p style="color:red">Max number of characters: 400</p>
                    </div>


                    <div class="form-group">
                      <div class="mb-3">
                      <label for="formFile" class="form-label">Slide 2 Image</label>
                      <input class="form-control" type="file" id="formFile" name="slide-2">
                      </div>
                      <p style="color:red">Image should be above 800 x 500  and below 1920 x 1080</p>
                      <p style="color:red">Image size must be less than 1MB</p>
                      <p style="color:red">Image extesion can be SVG, PNG, JPG or JPEG</p>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Slider 2 Heading</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="slider2_heading" value="<?php echo $homepage_data['home_slider2_heading']; ?>" required maxlength="40">
                    </div>
                    <div class="form-group">
                      <label for="exampleTextarea1">Slider 2 Description</label>
                      <textarea class="form-control" id="default-editor" rows="4" name="slider2_desc" required maxlength="400"><?php echo $homepage_data['home_slider2_desc']; ?></textarea>
                      <p style="color:red">Max number of characters: 400</p>
                    </div>

                    <button type="submit" class="btn btn-primary mr-2" name="homepage_slider_upload">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
            </div>






            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Homepage</h4>
                  <p class="card-description">
                    Image 1 & Description 1
                  </p>

                  <div class="row">
                  <div class="responsive">
                    <div class="gallery">
                      <a target="_blank" href="<?php echo $homepage_data['home_image1']; ?>">
                        <img src="<?php echo $homepage_data['home_image1']; ?>" alt="Cinque Terre" width="600" height="400">
                      </a>
                      <div class="desc">Homepage Image 1</div>
                    </div>
                  </div>
                </div>
                  <form class="forms-sample" method="POST" action="" enctype="multipart/form-data">
                    <div class="form-group">
                      <div class="mb-3">
                      <label for="formFile" class="form-label">Upload Image 1</label>
                      <input class="form-control" type="file" id="formFile" name="home-image1">
                      </div>
                      <p style="color:red">Image should be above 800 x 500  and below 1920 x 1080</p>
                      <p style="color:red">Image size must be less than 1MB</p>
                      <p style="color:red">Image extesion can be SVG, PNG, JPG or JPEG</p>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Heading 1</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="home_image1_heading" value="<?php echo $homepage_data['home_image1_heading']; ?>" required maxlength="16">
                      <p style="color:red">Max number of characters: 16</p>
                    </div>
                    <div class="form-group">
                      <label for="exampleTextarea1">Description</label>
                      <textarea class="form-control" id="default-editor" rows="4" name="home_image1_desc" required maxlength="255"><?php echo $homepage_data['home_image1_desc']; ?></textarea>
                      <p style="color:red">Max number of characters: 255</p>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2" name="homepage_section1">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
            </div>






            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Homepage</h4>
                  <p class="card-description">
                    Image 2 & Description 2
                  </p>

                  <div class="row">
                  <div class="responsive">
                    <div class="gallery">
                      <a target="_blank" href="<?php echo $homepage_data['home_image2']; ?>">
                        <img src="<?php echo $homepage_data['home_image2']; ?>" alt="Cinque Terre" width="600" height="400">
                      </a>
                      <div class="desc">Homepage Image 2</div>
                    </div>
                  </div>
                </div>
                  <form class="forms-sample" method="POST" action="" enctype="multipart/form-data">
                    <div class="form-group">
                    <div class="mb-3">
                      <label for="formFile" class="form-label">Upload Image 1</label>
                      <input class="form-control" type="file" id="formFile" name="home-image2">
                      </div>
                      <p style="color:red">Image should be above 800 x 500  and below 1920 x 1080</p>
                      <p style="color:red">Image size must be less than 1MB</p>
                      <p style="color:red">Image extesion can be SVG, PNG, JPG or JPEG</p>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Heading 2</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="home_image2_heading" value="<?php echo $homepage_data['home_image2_heading']; ?>" required maxlength="16">
                      <p style="color:red">Max number of characters: 16</p>
                    </div>
                    <div class="form-group">
                      <label for="exampleTextarea1">Description</label>
                      <textarea class="form-control" id="default-editor" rows="4" name="home_image2_desc" required maxlength="255"><?php echo $homepage_data['home_image2_desc']; ?></textarea>
                      <p style="color:red">Max number of characters: 255</p>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2" name="homepage_section2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
            </div>






            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Homepage</h4>
                  <p class="card-description">
                    Sign Up Text
                  </p>
                  <form class="forms-sample" method="POST" action="" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Sign Up Heading</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="home_signup_heading" value="<?php echo $homepage_data['home_signup_heading']; ?>" required maxlength="100">
                      <p style="color:red">Max number of characters: 25</p>
                    </div>
                    <div class="form-group">
                      <label for="exampleTextarea1">Sign Up Description</label>
                      <textarea class="form-control" id="default-editor" rows="4" name="home_signup_desc" required maxlength="1000"><?php echo $homepage_data['home_signup_desc']; ?></textarea>
                      <p style="color:red">Max number of characters: 255</p>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2" name="homepage_section3">Submit</button>
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

</html>
