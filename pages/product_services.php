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
	  	var max = 1000;
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
      selector: 'textarea#excerpt-editor',
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
  if(isset($_POST['submit']))
  {
    $uploadStatus = $mainPlug->uploadPnSPage($_POST);
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
        toastr.success('Products & Services Page Updated', 'Success');
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
  
    
  
  }elseif(isset($_POST['banner_submit']))
  {
    $uploadStatus = $mainPlug->uploadPnSPage($_POST);
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
        toastr.success('Products & Services Updated', 'Success');
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
        toastr.success('Products & Services Updated', 'Success');
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
  }elseif(isset($_POST['pns_submit']))
  {
    $uploadStatus = $mainPlug->uploadPnSPage($_POST);
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
        toastr.success('Products & Services Updated', 'Success');
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
        toastr.success('Products & Services Updated', 'Success');
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
  }elseif(isset($_POST['pns_submit2']))
  {
    $uploadStatus = $mainPlug->uploadPnSPage($_POST);
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
        toastr.success('Products & Services Page Updated', 'Success');
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
      <?php
    include_once('sidebar.php');
      ?>
      <!-- partial -->
      <?php
      $pnspage_result = $mainPlug->fetchPnSPageDetails();
      $pns_data = mysqli_fetch_assoc($pnspage_result);
      ?>
      <div class="main-panel">     
        <div class="content-wrapper">
          <div class="row">
            
          <div class="col-md-6 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Products & Services</h4>
                  <p class="card-description">
                    Main Texts
                  </p>
                  <form class="forms-sample" method="POST" action="" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Main Heading</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="main_title" value="<?php echo $pns_data['main_title']; ?>" required maxlength="25">
                      <p style="color:red">Max number of characters: 25</p>
                    </div>
                    <div class="form-group">
                      <label for="default-editor">Main Description</label>
                      <textarea class="form-control" id="default-editor" rows="4" name="main_desc" required maxlength="600"><?php echo $pns_data['main_desc'] ?></textarea>
                      <p style="color:red">Max number of characters: 600</p>
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
                  <h4 class="card-title">Products and Services</h4>
                  <p class="card-description">
                  Products and Services Banner Image
                  </p>

                  <div class="row">
                  <div class="responsive">
                    <div class="gallery">
                      <a target="_blank" href="<?php echo $pns_data['banner_image']; ?>">
                        <img src="<?php echo $pns_data['banner_image']; ?>" alt="Cinque Terre" width="600" height="400">
                      </a>
                      <div class="desc">Products and Services Banner</div>
                    </div>
                  </div>
                </div>
                  <form class="forms-sample" method="POST" action="" enctype="multipart/form-data">
                    <div class="form-group">
                      <div class="mb-3">
                      <label for="formFile" class="form-label">Banner Image</label>
                      <input class="form-control" type="file" id="formFile" name="banner_image">
                      </div>
                      <p style="color:red">Image should be above 800 x 500  and below 1920 x 1080</p>
                      <p style="color:red">Image size must be less than 1MB</p>
                      <p style="color:red">Image extesion can be SVG, PNG, JPG or JPEG</p>
                    </div>

                    <button type="submit" class="btn btn-primary mr-2" name="submit" value="banner_upload">Submit</button>
                    <button type="reset" class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
            </div>






            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Products and Services</h4>
                  <p class="card-description">
                    Insurance
                  </p>

                  <div class="row">
                  <div class="responsive">
                    <div class="gallery">
                      <a target="_blank" href="<?php echo $pns_data['insurance_image']; ?>">
                        <img src="<?php echo $pns_data['insurance_image']; ?>" alt="Cinque Terre" width="600" height="400">
                      </a>
                      <div class="desc">Insurance Image</div>
                    </div>
                    <!-- <form method="POST" action="" enctype="multipart/form-data">
                      <input class="form-control" type="hidden" id="formFile" name="insurance_image">
                    <button type="submit" class="btn btn-danger" style="margin: 10px 0 57px 70%;" name="submit" value="delete">Delete Image</button></form> -->
                  </div>
                </div>
                  <form class="forms-sample" method="POST" action="" enctype="multipart/form-data">
                    <div class="form-group">
                      <div class="mb-3">
                      <label for="formFile" class="form-label">Upload Insurance Image</label>
                      <input class="form-control" type="file" id="formFile" name="insurance_image">
                      </div>
                      <p style="color:red">Image should be above 800 x 500  and below 1920 x 1080</p>
                      <p style="color:red">Image size must be less than 1MB</p>
                      <p style="color:red">Image extesion can be SVG, PNG, JPG or JPEG</p>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Insurance Excerpt</label>
                      <textarea class="form-control" id="excerpt-editor" rows="4" name="insurance_ex" required><?php echo $pns_data['insurance_ex']; ?></textarea>
                      <p style="color:red">Max number of characters: 400</p>
                    </div>
                    <div class="form-group">
                      <label for="default-editor">Insurance Description</label>
                      <textarea class="form-control" id="default-editor" rows="4" name="insurance_desc" required><?php echo $pns_data['insurance_desc']; ?></textarea>
                      <p style="color:red">Max number of characters: 2000</p>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2" name="submit" value="insuance_upload" >Submit</button>
                    <button typle="reset" class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
            </div>




            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Products and Services</h4>
                  <p class="card-description">
                    Financial
                  </p>

                  <div class="row">
                  <div class="responsive">
                    <div class="gallery">
                      <a target="_blank" href="<?php echo $pns_data['finance_image']; ?>">
                        <img src="<?php echo $pns_data['finance_image']; ?>" alt="Cinque Terre" width="600" height="400">
                      </a>
                      <div class="desc">Finance image</div>
                    </div>
                  </div>
                </div>
                  <form class="forms-sample" method="POST" action="" enctype="multipart/form-data">
                    <div class="form-group">
                      <div class="mb-3">
                      <label for="formFile" class="form-label">Upload Finance Image</label>
                      <input class="form-control" type="file" id="formFile" name="finance_image">
                      </div>
                      <p style="color:red">Image should be above 800 x 500  and below 1920 x 1080</p>
                      <p style="color:red">Image size must be less than 1MB</p>
                      <p style="color:red">Image extesion can be SVG, PNG, JPG or JPEG</p>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Finance Excerpt</label>
                      <textarea class="form-control" id="excerpt-editor" rows="4" name="finance_ex" required><?php echo $pns_data['finance_ex']; ?></textarea>
                      <p style="color:red">Max number of characters: 400</p>
                    </div>
                    <div class="form-group">
                      <label for="default-editor">Finance Description</label>
                      <textarea class="form-control" id="default-editor" rows="4" name="finance_desc" required maxlength="255"><?php echo $pns_data['finance_desc']; ?></textarea>
                      <p style="color:red">Max number of characters: 255</p>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2" name="submit" value="finance_upload">Submit</button>
                    <button type="reset" class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
            </div>







            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Products and Services</h4>
                  <p class="card-description">
                    Ride
                  </p>

                  <div class="row">
                  <div class="responsive">
                    <div class="gallery">
                      <a target="_blank" href="<?php echo $pns_data['ride_image']; ?>">
                        <img src="<?php echo $pns_data['ride_image']; ?>" alt="Cinque Terre" width="600" height="400">
                      </a>
                      <div class="desc">Ride Image</div>
                    </div>
                  </div>
                </div>
                  <form class="forms-sample" method="POST" action="" enctype="multipart/form-data">
                    <div class="form-group">
                      <div class="mb-3">
                      <label for="formFile" class="form-label">Upload Ride Image</label>
                      <input class="form-control" type="file" id="formFile" name="ride_image">
                      </div>
                      <p style="color:red">Image should be above 800 x 500  and below 1920 x 1080</p>
                      <p style="color:red">Image size must be less than 1MB</p>
                      <p style="color:red">Image extesion can be SVG, PNG, JPG or JPEG</p>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Ride Excerpt</label>
                      <textarea class="form-control" id="excerpt-editor" rows="4" name="ride_ex" required><?php echo $pns_data['ride_ex']; ?></textarea>
                      <p style="color:red">Max number of characters: 400</p>
                    </div>
                    <div class="form-group">
                      <label for="default-editor">Ride Description</label>
                      <textarea class="form-control" id="default-editor" rows="4" name="ride_desc" required maxlength="255"><?php echo $pns_data['ride_desc']; ?></textarea>
                      <p style="color:red">Max number of characters: 255</p>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2" name="submit" value="ride_upload">Submit</button>
                    <button type="reset" class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
            </div>







            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Products and Services</h4>
                  <p class="card-description">
                    E-Commerce
                  </p>

                  <div class="row">
                  <div class="responsive">
                    <div class="gallery">
                      <a target="_blank" href="<?php echo $pns_data['ecom_image']; ?>">
                        <img src="<?php echo $pns_data['ecom_image']; ?>" alt="Cinque Terre" width="600" height="400">
                      </a>
                      <div class="desc">E-Commerce Image</div>
                    </div>
                  </div>
                </div>
                  <form class="forms-sample" method="POST" action="" enctype="multipart/form-data">
                    <div class="form-group">
                      <div class="mb-3">
                      <label for="formFile" class="form-label">Upload E-Commerce Image</label>
                      <input class="form-control" type="file" id="formFile" name="ecom_image">
                      </div>
                      <p style="color:red">Image should be above 800 x 500  and below 1920 x 1080</p>
                      <p style="color:red">Image size must be less than 1MB</p>
                      <p style="color:red">Image extesion can be SVG, PNG, JPG or JPEG</p>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">E-Commerce Excerpt</label>
                      <textarea class="form-control" id="excerpt-editor" rows="4" name="ecom_ex" required><?php echo $pns_data['ecom_ex']; ?></textarea>
                      <p style="color:red">Max number of characters: 400</p>
                    </div>
                    <div class="form-group">
                      <label for="default-editor">E-Commerce Description</label>
                      <textarea class="form-control" id="default-editor" rows="4" name="ecom_desc" required maxlength="255"><?php echo $pns_data['ecom_desc']; ?></textarea>
                      <p style="color:red">Max number of characters: 255</p>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2" name="submit" value="ecom_upload">Submit</button>
                    <button type="reset" class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
            </div>








            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Products and Services</h4>
                  <p class="card-description">
                    ERP
                  </p>

                  <div class="row">
                  <div class="responsive">
                    <div class="gallery">
                      <a target="_blank" href="<?php echo $pns_data['erp_image']; ?>">
                        <img src="<?php echo $pns_data['erp_image']; ?>" alt="Cinque Terre" width="600" height="400">
                      </a>
                      <div class="desc">ERP Image</div>
                    </div>
                  </div>
                </div>
                  <form class="forms-sample" method="POST" action="" enctype="multipart/form-data">
                    <div class="form-group">
                      <div class="mb-3">
                      <label for="formFile" class="form-label">Upload ERP Image</label>
                      <input class="form-control" type="file" id="formFile" name="erp_image">
                      </div>
                      <p style="color:red">Image should be above 800 x 500  and below 1920 x 1080</p>
                      <p style="color:red">Image size must be less than 1MB</p>
                      <p style="color:red">Image extesion can be SVG, PNG, JPG or JPEG</p>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">ERP Excerpt</label>
                      <textarea class="form-control" id="excerpt-editor" rows="4" name="erp_ex" required><?php echo $pns_data['erp_ex']; ?></textarea>
                      <p style="color:red">Max number of characters: 400</p>
                    </div>
                    <div class="form-group">
                      <label for="default-editor">ERP Description</label>
                      <textarea class="form-control" id="default-editor" rows="4" name="erp_desc" required maxlength="255"><?php echo $pns_data['erp_desc']; ?></textarea>
                      <p style="color:red">Max number of characters: 255</p>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2" name="submit" value="erp_upload">Submit</button>
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
