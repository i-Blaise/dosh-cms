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


   tinymce.init({
      selector: 'textarea#aboutus-editor',
      plugins: 'advlist autolink lists link image charmap preview anchor pagebreak code visualchars wordcount',
	  setup: function(editor) {
	  	var max = 500;
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


</head>


<?php
  if(isset($_POST['submit']))
  {
    $uploadStatus = $mainPlug->uploadAboutUsPage($_POST);
    // echo $uploadStatus;
    // die();
    if($uploadStatus == 'good')
    { 
        echo "     <script type='text/javascript'>   
        $(document).ready(function() {
        toastr.options.positionClass = 'toast-top-center';
        toastr.options.closeButton = true;
        toastr.options.progressBar = true;
        toastr.options.timeOut = 30000;
        toastr.success('About Us Page Updated', 'Success');
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
    }else{ 
      echo "     <script type='text/javascript'>   
      $(document).ready(function() {
      toastr.options.positionClass = 'toast-top-center';
      toastr.options.closeButton = true;
      toastr.options.progressBar = true;
      toastr.options.timeOut = 30000;
      toastr.error('Contact Technical Team for Assistance', 'Somethings Wrong');
  });
  </script>";
  }
}
  ?>

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
      <?php
    include_once('sidebar.php');
      ?>
      <!-- partial -->

      <?php
      $aboutus_result = $mainPlug->fetchAboutPageDetails();
      $aboutus_data = mysqli_fetch_assoc($aboutus_result);
      ?>
      <div class="main-panel">     
        <div class="content-wrapper">
          <div class="row">
            
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">About Page Header Image</h4>
                  <p class="card-description">
                    About Image Header
                  </p>

                  <div class="row">
                  <div class="responsive">
                    <div class="gallery">
                      <a target="_blank" href="<?php echo $aboutus_data['header_image']; ?>">
                        <img src="<?php echo $aboutus_data['header_image']; ?>" alt="Cinque Terre" width="600" height="400">
                      </a>
                      <div class="desc">About Image Header</div>
                    </div>
                  </div>
                  
                </div>
                  <form class="forms-sample" method="POST" action="" enctype="multipart/form-data">
                    <div class="form-group">
                    <div class="mb-3">
                      <label for="formFile" class="form-label">About Us Header Image</label>
                      <input class="form-control" type="file" id="formFile" name="header_image">
                      </div>
                      <p style="color:red">Image should be above 800 x 500 and below 1920 x 1080</p>
                      <p style="color:red">Image size must be less than 1MB</p>
                      <p style="color:red">Image extesion can be SVG, PNG, JPG or JPEG</p>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2" name="submit" value="header_image_upload">Submit</button>
                    <button type="reset" class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
            </div>






            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Main Description</h4>
                  <!-- <p class="card-description">
                    What We Do
                  </p> -->
                  <form class="forms-sample" method="POST" action="">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Title</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="main_title" value="<?php echo $aboutus_data['main_title']; ?>" maxlength="25">
                      <p style="color:red">Max number of characters: 25</p>
                    </div>
                    <div class="form-group">
                      <label for="exampleTextarea1">Description</label>
                      <textarea class="form-control" id="default-editor" rows="4" name="main_desc" maxlength="800"><?php echo $aboutus_data['main_desc']; ?></textarea>
                      <p style="color:red">Max number of characters: 400</p>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2" name="submit" value="main_upload">Submit</button>
                    <button type="reset" class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
            </div>




            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">About Us 1</h4>
                  <!-- <p class="card-description">
                    Mission Statement
                  </p> -->
                  <form class="forms-sample" method="POST" action="">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Title</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="about1_title" value="<?php echo $aboutus_data['about1_title']; ?>" maxlength="25">
                      <p style="color:red">Max number of characters: 25</p>
                    </div>
                    <div class="form-group">
                      <label for="exampleTextarea1">Description</label>
                      <textarea class="form-control" id="aboutus-editor" rows="4" name="about1_desc" maxlength="255"><?php echo $aboutus_data['about1_desc']; ?></textarea>
                      <p style="color:red">Max number of characters: 255</p>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2" name="submit" value="about1_upload">Submit</button>
                    <button type="reset" class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
            </div>


            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">About Us 2</h4>
                  <!-- <p class="card-description">
                    What We Do
                  </p> -->
                  <form class="forms-sample" method="POST" action="">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Title</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="about2_title" value="<?php echo $aboutus_data['about2_title']; ?>" maxlength="25">
                      <p style="color:red">Max number of characters: 25</p>
                    </div>
                    <div class="form-group">
                      <label for="exampleTextarea1">Description</label>
                      <textarea class="form-control" id="aboutus-editor" rows="4" name="about2_desc" maxlength="255"><?php echo $aboutus_data['about2_desc']; ?></textarea>
                      <p style="color:red">Max number of characters: 255</p>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2" name="submit" value="about2_upload">Submit</button>
                    <button type="reset" class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
            </div>




            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">About Us 3</h4>
                  <!-- <p class="card-description">
                    What We Do
                  </p> -->
                  <form class="forms-sample" method="POST" action="">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Title</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="about3_title" value="<?php echo $aboutus_data['about3_title']; ?>" maxlength="25">
                      <p style="color:red">Max number of characters: 25</p>
                    </div>
                    <div class="form-group">
                      <label for="exampleTextarea1">Description</label>
                      <textarea class="form-control" id="aboutus-editor" rows="4" name="about3_desc" maxlength="255"><?php echo $aboutus_data['about3_desc']; ?></textarea>
                      <p style="color:red">Max number of characters: 255</p>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2" name="submit" value="about3_upload">Submit</button>
                    <button type="reset" class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
            </div>






            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">About Us 4</h4>
                  <!-- <p class="card-description">
                    What We Do
                  </p> -->
                  <form class="forms-sample" method="POST" action="">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Title</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="about4_title" value="<?php echo $aboutus_data['about4_title']; ?>" maxlength="25">
                      <p style="color:red">Max number of characters: 25</p>
                    </div>
                    <div class="form-group">
                      <label for="exampleTextarea1">Description</label>
                      <textarea class="form-control" id="aboutus-editor" rows="4" name="about4_desc" maxlength="255"><?php echo $aboutus_data['about4_desc']; ?></textarea>
                      <p style="color:red">Max number of characters: 255</p>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2" name="submit" value="about4_upload">Submit</button>
                    <button type="reset" class="btn btn-light">Cancel</button>
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
