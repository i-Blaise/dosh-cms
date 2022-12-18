<?php

require_once('DB/DB.php');
// require_once('../ClassLibraries/DB/adminCredDB.php');

define('KB', 1024);
define('MB', 1048576);
define('GB', 1073741824);
define('TB', 1099511627776);

class mainClass extends DataBase{

    function dbtest(){
        $result = $this->dbh;
        return $result;
    }

    function footerDetails(){
        $myQuery = "SELECT * FROM footer WHERE id = 1";
        $result = mysqli_query($this->db, $myQuery);
        return $result;
    }


    function uploadFooterLinksDetails($data)
    {
        if(is_object($data) || is_array($data)){
            $link_title1 = filter_var($data['link_title1'], FILTER_SANITIZE_STRING);
            $link_url1 = filter_var($data['link_url1'], FILTER_SANITIZE_URL);
            $link_title2 = filter_var($data['link_title2'], FILTER_SANITIZE_STRING);
            $link_url2 = filter_var($data['link_url2'], FILTER_SANITIZE_URL);
            $link_title3 = filter_var($data['link_title3'], FILTER_SANITIZE_STRING);
            $link_url3 = filter_var($data['link_url3'], FILTER_SANITIZE_URL);
            $link_title4 = filter_var($data['link_title4'], FILTER_SANITIZE_STRING);
            $link_url4 = filter_var($data['link_url4'], FILTER_SANITIZE_URL);


            $myQuery = "UPDATE footer SET 
            link_title1 = '$link_title1',
            link_url1 = '$link_url1',
            link_title2 = '$link_title2',
            link_url2 = '$link_url2',
            link_title3 = '$link_title3',
            link_url3 = '$link_url3',
            link_title4 = '$link_title4',
            link_url4 = '$link_url4'
            WHERE id = 1";


            $result = mysqli_query($this->db, $myQuery);
            if(!$result){
            return "Error: " .mysqli_error($this->db);
            }else{
            return 'good';
            }
        }

    }




    function uploadSMDetails($data)
    {
        if(is_object($data) || is_array($data)){
            $sm_facebook = isset($data['sm_facebook']) && $data['sm_facebook'] == 'on' ? 1 : 0;
            $sm_facebook_link = isset($data['sm_facebook_link']) ? filter_var($data['sm_facebook_link'], FILTER_SANITIZE_URL) : NULL;
            $sm_twitter = isset($data['sm_twitter']) && $data['sm_twitter'] == 'on' ? 1 : 0;
            $sm_twitter_link = isset($data['sm_twitter_link']) ? filter_var($data['sm_twitter_link'], FILTER_SANITIZE_URL) : NULL;
            $sm_linkedin = isset($data['sm_linkedin']) && $data['sm_linkedin'] == 'on' ? 1 : 0;
            $sm_linkedin_link = isset($data['sm_linkedin_link']) ? filter_var($data['sm_linkedin_link'], FILTER_SANITIZE_URL) : NULL;
            $sm_instagram = isset($data['sm_instagram']) && $data['sm_instagram']== 'on' ? 1 : 0;
            $sm_instagram_link = isset($data['sm_instagram_link']) ? filter_var($data['sm_instagram_link'], FILTER_SANITIZE_URL) : NULL;
            
            
            $myQuery = "UPDATE footer SET 
            sm_facebook = '$sm_facebook',
            sm_facebook_link = '$sm_facebook_link',
            sm_twitter = '$sm_twitter',
            sm_twitter_link = '$sm_twitter_link',
            sm_linkedin = '$sm_linkedin',
            sm_linkedin_link = '$sm_linkedin_link',
            sm_instagram = '$sm_instagram',
            sm_instagram_link = '$sm_instagram_link'
            WHERE id = 1";

            
            $result = mysqli_query($this->db, $myQuery);
            if(!$result){
            return "Error: " .mysqli_error($this->db);
            }else{
            return 'good';
            }
        }

    }






    // HOMEPAGE


    // FOR PREVIOUS HOME PAGE DESIGN 
    public function fetchHomepageDetails()
    {
        $myQuery = "SELECT * FROM homepage WHERE id = 1";
        $result = mysqli_query($this->db, $myQuery);
        return $result;
    }



    // FOR CURRENT HOME PAGE DESIGN 
    public function fetchHomeDetails()
    {
        $myQuery = "SELECT * FROM home WHERE id = 1";
        $result = mysqli_query($this->db, $myQuery);
        return $result;
    }



    function processImage($name, $type, $size, $tmp_name, $error, $image_width, $image_height){
        // processing image
        
        
        $target_dir = "images/uploads/";
        $datetime = date("Ymdhis");
        $imageName = str_replace(' ', '', basename($name));
        $target_file = $target_dir . $datetime . $imageName;
        $flieLoc = '../images/uploads/'. $datetime . $imageName;
        $allowedExts = array("png", "PNG", "SVG", "svg,", "JPG", "jpg", "JPEG", "jpeg");
        $extension = strtolower(pathinfo($name, PATHINFO_EXTENSION));
        $imageLink = 'http://localhost/dosh-cms/'.$target_file;
        
        // if ((($type == "image/svg")
        // || ($type == "image/jpeg") ||($type == "image/png"))
        $max_height = 1080;
        $max_width = 1920;
        $min_height = 500;
        $min_width = 800;

        if(($image_height <= $max_height && $image_height >= $min_height) && ($image_width <= $max_width && $image_width >= $min_width))
        {
        
        if($size <= 1*MB)
        
          {
            if(in_array($extension, $allowedExts))
            {
          if ($error > 0)
            {
            return $error;
            }
          else
            {                
              move_uploaded_file($tmp_name, $flieLoc);

              return $imageLink;
            //   $uploadStatus = $this->uploadHomepageSliders($data, $imageLink);
            //   if($uploadStatus == 'good'){
            //     return 'good';
            //   }else{
            //     return 'formerror';
            //   }
            // echo "Upload: " . $_FILES["slide-1"]["name"] . "<br />";
            // echo "Type: " . $_FILES["slide-1"]["type"] . "<br />";
            // echo "Size: " . ($_FILES["slide-1"]["size"] / 1024) . " Kb<br />";
            // echo "Temp file: " . $_FILES["slide-1"]["tmp_name"] . "<br />";
        
              // echo "Stored in: " . "../images/uploads/" . $_FILES["slide-1"]["name"];
              
            }
        }else{
            return "ext_err";
        }
          }
        else
          {
          return "size_err";
          // PRINT_R($_FILES["file"]["size"]);
          }
        }else{
            return "dimension_err";
        }
        

  }


  function uploadHomepageSliders($data)
  {
      if(is_object($data) || is_array($data)){
        //   $slider1_heading = filter_var($data['slider1_heading'], FILTER_SANITIZE_STRING);



        if(!empty(basename($_FILES["slide-1"]["name"])))
        {
            $name = $_FILES["slide-1"]["name"];
            $type = $_FILES["slide-1"]["type"];
            $size = $_FILES["slide-1"]["size"];
            $error = $_FILES["slide-1"]["error"];
            $tmp_name = $_FILES["slide-1"]["tmp_name"];
            $arr = getimagesize($_FILES["slide-1"]["tmp_name"]);

            $image_width = $arr[0];
            $image_height = $arr[1];
            $slide1_link = $this->processImage($name, $type, $size, $tmp_name, $error, $image_width, $image_height);
            if($slide1_link == 'ext_err')
            {
                return $slide1_link;
            }elseif($slide1_link == 'file_err')
            {
                return $slide1_link;
            }elseif($slide1_link == 'dimension_err')
            {
                return $slide1_link;
            }
            // return $slide1_link;
        }
        
        if(!empty(basename($_FILES["slide-2"]["name"])))
        {
            $name = $_FILES["slide-2"]["name"];
            $type = $_FILES["slide-2"]["type"];
            $size = $_FILES["slide-2"]["size"];
            $tmp_name = $_FILES["slide-2"]["tmp_name"];
            $error = $_FILES["slide-2"]["error"];
            $arr = getimagesize($_FILES["slide-2"]["tmp_name"]);

            $image_width = $arr[0];
            $image_height = $arr[1];
            $slide2_link = $this->processImage($name, $type, $size, $tmp_name, $error, $image_width, $image_height);
            if($slide2_link == 'ext_err')
            {
                return $slide2_link;
            }elseif($slide2_link == 'file_err')
            {
                return $slide2_link;
            }elseif($slide2_link == 'dimension_err')
            {
                return $slide2_link;
            }
            // return $slide2_link;
        }


        //   $slider1_image = empty(basename($_FILES["slide-2"]["name"]) ? NULL
          $slider1_heading = filter_var($data['slider1_heading'], FILTER_SANITIZE_STRING);
          $slider1_desc = $data['slider1_desc'];
          $slider2_heading = filter_var($data['slider2_heading'], FILTER_SANITIZE_STRING);
          $slider2_desc = $data['slider2_desc'];
          
          if(isset($slide1_link))
          {
            $myQuery = "UPDATE homepage SET 
            home_slider1_image = '$slide1_link'
            WHERE id = 1";
  
            
            $result = mysqli_query($this->db, $myQuery);
            if(!$result){
            return "Error: " .mysqli_error($this->db);
            }
          }

          if(isset($slide2_link))
          {
            $myQuery = "UPDATE homepage SET 
            home_slider2_image = '$slide2_link'
            WHERE id = 1";
  
            
            $result = mysqli_query($this->db, $myQuery);
            if(!$result){
            return "Error: " .mysqli_error($this->db);
            }
          }
          
          $myQuery = "UPDATE homepage SET 
          home_slider1_heading = '$slider1_heading',
          home_slider1_desc = '$slider1_desc',
          home_slider2_heading = '$slider2_heading',
          home_slider2_desc = '$slider2_desc'
          WHERE id = 1";

          
          $result = mysqli_query($this->db, $myQuery);
          if(!$result){
          return "Error: " .mysqli_error($this->db);
          }else{
          return 'good';
          }
      }

  }








  function uploadHomePageDetails($data)
  {

    if(!empty($data['submit']) && $data['submit'] == 'header_upload')
    {
        // return 'good';
      if(is_object($data) || is_array($data)){
        //   $slider1_heading = filter_var($data['slider1_heading'], FILTER_SANITIZE_STRING);



        if(!empty(basename($_FILES["slide-1"]["name"])))
        {
            $name = $_FILES["slide-1"]["name"];
            $type = $_FILES["slide-1"]["type"];
            $size = $_FILES["slide-1"]["size"];
            $error = $_FILES["slide-1"]["error"];
            $tmp_name = $_FILES["slide-1"]["tmp_name"];
            $arr = getimagesize($_FILES["slide-1"]["tmp_name"]);

            $image_width = $arr[0];
            $image_height = $arr[1];
            $slide1_link = $this->processImage($name, $type, $size, $tmp_name, $error, $image_width, $image_height);
            if($slide1_link == 'ext_err')
            {
                return $slide1_link;
            }elseif($slide1_link == 'file_err')
            {
                return $slide1_link;
            }elseif($slide1_link == 'dimension_err')
            {
                return $slide1_link;
            }
            // return $slide1_link;
        }
        
        if(!empty(basename($_FILES["slide-2"]["name"])))
        {
            $name = $_FILES["slide-2"]["name"];
            $type = $_FILES["slide-2"]["type"];
            $size = $_FILES["slide-2"]["size"];
            $tmp_name = $_FILES["slide-2"]["tmp_name"];
            $error = $_FILES["slide-2"]["error"];
            $arr = getimagesize($_FILES["slide-2"]["tmp_name"]);

            $image_width = $arr[0];
            $image_height = $arr[1];
            $slide2_link = $this->processImage($name, $type, $size, $tmp_name, $error, $image_width, $image_height);
            if($slide2_link == 'ext_err')
            {
                return $slide2_link;
            }elseif($slide2_link == 'file_err')
            {
                return $slide2_link;
            }elseif($slide2_link == 'dimension_err')
            {
                return $slide2_link;
            }
            // return $slide2_link;
        }


        //   $slider1_image = empty(basename($_FILES["slide-2"]["name"]) ? NULL
          $slider1_heading = filter_var($data['slider1_heading'], FILTER_SANITIZE_STRING);
          $slider1_desc = $data['slider1_desc'];
          $slider2_heading = filter_var($data['slider2_heading'], FILTER_SANITIZE_STRING);
          $slider2_desc = $data['slider2_desc'];
          
          if(isset($slide1_link))
          {
            $myQuery = "UPDATE homepage SET 
            home_slider1_image = '$slide1_link'
            WHERE id = 1";
  
            
            $result = mysqli_query($this->db, $myQuery);
            if(!$result){
            return "Error: " .mysqli_error($this->db);
            }
          }

          if(isset($slide2_link))
          {
            $myQuery = "UPDATE homepage SET 
            home_slider2_image = '$slide2_link'
            WHERE id = 1";
  
            
            $result = mysqli_query($this->db, $myQuery);
            if(!$result){
            return "Error: " .mysqli_error($this->db);
            }
          }
          
          $myQuery = "UPDATE homepage SET 
          home_slider1_heading = '$slider1_heading',
          home_slider1_desc = '$slider1_desc',
          home_slider2_heading = '$slider2_heading',
          home_slider2_desc = '$slider2_desc'
          WHERE id = 1";

          
          $result = mysqli_query($this->db, $myQuery);
          if(!$result){
          return "Error: " .mysqli_error($this->db);
          }else{
          return 'good';
          }
      }

    }else{
        return 'not done';
    }

  }






  function uploadHomepageSection1($data)
  {
      if(is_object($data) || is_array($data)){
        return $data;

        if(!empty(basename($_FILES["home-image1"]["name"])))
        {
            $name = $_FILES["home-image1"]["name"];
            $type = $_FILES["home-image1"]["type"];
            $size = $_FILES["home-image1"]["size"];
            $error = $_FILES["home-image1"]["error"];
            $tmp_name = $_FILES["home-image1"]["tmp_name"];
            $arr = getimagesize($_FILES["home-image1"]["tmp_name"]);

            $image_width = $arr[0];
            $image_height = $arr[1];
            $home_image1_link = $this->processImage($name, $type, $size, $tmp_name, $error, $image_width, $image_height);
            if($home_image1_link == 'ext_err')
            {
                return $home_image1_link;
            }elseif($home_image1_link == 'file_err')
            {
                return $home_image1_link;
            }elseif($home_image1_link == 'dimension_err')
            {
                return $home_image1_link;
            }
        }
        

          $home_image1_heading = filter_var($data['home_image1_heading'], FILTER_SANITIZE_STRING);
          $home_image1_desc = filter_var($data['home_image1_desc'], FILTER_SANITIZE_STRING);
          
          if(isset($home_image1_link))
          {
            $myQuery = "UPDATE homepage SET 
            home_image1 = '$home_image1_link'
            WHERE id = 1";
  
            
            $result = mysqli_query($this->db, $myQuery);
            if(!$result){
            return "Error: " .mysqli_error($this->db);
            }
          }


          $myQuery = "UPDATE homepage SET 
          home_image1_heading = '$home_image1_heading',
          home_image1_desc = '$home_image1_desc'
          WHERE id = 1";

          
          $result = mysqli_query($this->db, $myQuery);
          if(!$result){
          return "Error: " .mysqli_error($this->db);
          }else{
          return 'good';
          }
      }

  }





  function uploadHomepageSection2($data)
  {
      if(is_object($data) || is_array($data)){

        if(!empty(basename($_FILES["home-image2"]["name"])))
        {
            $name = $_FILES["home-image2"]["name"];
            $type = $_FILES["home-image2"]["type"];
            $size = $_FILES["home-image2"]["size"];
            $error = $_FILES["home-image2"]["error"];
            $tmp_name = $_FILES["home-image2"]["tmp_name"];
            $arr = getimagesize($_FILES["home-image2"]["tmp_name"]);

            $image_width = $arr[0];
            $image_height = $arr[1];
            $home_image2_link = $this->processImage($name, $type, $size, $tmp_name, $error, $image_width, $image_height);
            if($home_image2_link == 'ext_err')
            {
                return $home_image2_link;
            }elseif($home_image2_link == 'file_err')
            {
                return $home_image2_link;
            }elseif($home_image2_link == 'dimension_err')
            {
                return $home_image2_link;
            }
        }
        

          $home_image2_heading = filter_var($data['home_image2_heading'], FILTER_SANITIZE_STRING);
          $home_image2_desc = filter_var($data['home_image2_desc'], FILTER_SANITIZE_STRING);
          
          if(isset($home_image2_link))
          {
            $myQuery = "UPDATE homepage SET 
            home_image2 = '$home_image2_link'
            WHERE id = 1";
  
            
            $result = mysqli_query($this->db, $myQuery);
            if(!$result){
            return "Error: " .mysqli_error($this->db);
            }
          }


          $myQuery = "UPDATE homepage SET 
          home_image2_heading = '$home_image2_heading',
          home_image2_desc = '$home_image2_desc'
          WHERE id = 1";

          
          $result = mysqli_query($this->db, $myQuery);
          if(!$result){
          return "Error: " .mysqli_error($this->db);
          }else{
          return 'good';
          }
      }

  }


  function uploadHomepageSection3($data)
  {
    // return $data['home_signup_desc'];
    // die();
      if(is_object($data) || is_array($data)){

        

          $home_signup_heading = filter_var($data['home_signup_heading'], FILTER_SANITIZE_STRING);
          $home_signup_desc = $data['home_signup_desc'];
          
          $myQuery = "UPDATE homepage SET 
          home_signup_heading = '$home_signup_heading',
          home_signup_desc = '$home_signup_desc'
          WHERE id = 1";

          
          $result = mysqli_query($this->db, $myQuery);
          if(!$result){
          return "Error: " .mysqli_error($this->db);
          }else{
          return 'good';
          }
      }

  }






//   ABOUT US PAGE 

        public function fetchAboutPageDetails()
        {
            $myQuery = "SELECT * FROM aboutus WHERE id = 1";
            $result = mysqli_query($this->db, $myQuery);
            return $result;
        }


        function uploadAboutImgHeader($data)
        {
            if(is_object($data) || is_array($data)){
        
                if(!empty(basename($_FILES["about_header_image"]["name"])))
                {
                    $name = $_FILES["about_header_image"]["name"];
                    $type = $_FILES["about_header_image"]["type"];
                    $size = $_FILES["about_header_image"]["size"];
                    $error = $_FILES["about_header_image"]["error"];
                    $tmp_name = $_FILES["about_header_image"]["tmp_name"];
                    $arr = getimagesize($_FILES["about_header_image"]["tmp_name"]);
        
                    $image_width = $arr[0];
                    $image_height = $arr[1];
                    $about_header_img_link = $this->processImage($name, $type, $size, $tmp_name, $error, $image_width, $image_height);
                    if($about_header_img_link == 'ext_err')
                    {
                        return $about_header_img_link;
                    }elseif($about_header_img_link == 'file_err')
                    {
                        return $about_header_img_link;
                    }elseif($about_header_img_link == 'dimension_err')
                    {
                        return $about_header_img_link;
                    }
                }
                
                if(isset($about_header_img_link))
                {
                    $myQuery = "UPDATE aboutus SET 
                    about_header_image = '$about_header_img_link'
                    WHERE id = 1";
        
                    
                    $result = mysqli_query($this->db, $myQuery);
                    if(!$result){
                    return "Error: " .mysqli_error($this->db);
                    }else{
                        return 'good';
                    }
                }
            }
      
        }


        function uploadAboutSections($data)
        {
            if(is_object($data) || is_array($data))
            {

                if(isset($_POST['about1_submit']))
                {
      
                $about1_heading = filter_var($data['about1_heading'], FILTER_SANITIZE_STRING);
                $about1_desc = filter_var($data['about1_desc'], FILTER_SANITIZE_STRING);
                
                $myQuery = "UPDATE aboutus SET 
                about1_heading = '$about1_heading',
                about1_desc = '$about1_desc'
                WHERE id = 1";
      
                
                $result = mysqli_query($this->db, $myQuery);
                if(!$result){
                return "Error: " .mysqli_error($this->db);
                }else{
                return 'good';
                }

                }elseif(isset($_POST['about2_submit']))
                {
                    $about2_heading = filter_var($data['about2_heading'], FILTER_SANITIZE_STRING);
                    $about2_desc = filter_var($data['about2_desc'], FILTER_SANITIZE_STRING);
                    
                    $myQuery = "UPDATE aboutus SET 
                    about2_heading = '$about2_heading',
                    about2_desc = '$about2_desc'
                    WHERE id = 1";
          
                    
                    $result = mysqli_query($this->db, $myQuery);
                    if(!$result){
                    return "Error: " .mysqli_error($this->db);
                    }else{
                    return 'good';
                    }
                }elseif(isset($_POST['about3_submit']))
                {
                    $about3_heading = filter_var($data['about3_heading'], FILTER_SANITIZE_STRING);
                    $about3_desc = filter_var($data['about3_desc'], FILTER_SANITIZE_STRING);
                    
                    $myQuery = "UPDATE aboutus SET 
                    about3_heading = '$about3_heading',
                    about3_desc = '$about3_desc'
                    WHERE id = 1";
        
                    
                    $result = mysqli_query($this->db, $myQuery);
                    if(!$result){
                    return "Error: " .mysqli_error($this->db);
                    }else{
                    return 'good';
                    }
                }
      
        }

    }




    // CONTACT PAGE 

    public function fetchContactPageDetails()
    {
        $myQuery = "SELECT * FROM contactus WHERE id = 1";
        $result = mysqli_query($this->db, $myQuery);
        return $result;
    }


    function uploadContactBG($data)
    {
        if(is_object($data) || is_array($data)){
    
            if(!empty(basename($_FILES["contact_bg_image"]["name"])))
            {
                $name = $_FILES["contact_bg_image"]["name"];
                $type = $_FILES["contact_bg_image"]["type"];
                $size = $_FILES["contact_bg_image"]["size"];
                $error = $_FILES["contact_bg_image"]["error"];
                $tmp_name = $_FILES["contact_bg_image"]["tmp_name"];
                $arr = getimagesize($_FILES["contact_bg_image"]["tmp_name"]);
    
                $image_width = $arr[0];
                $image_height = $arr[1];
                $contact_bg_image_link = $this->processImage($name, $type, $size, $tmp_name, $error, $image_width, $image_height);
                if($contact_bg_image_link == 'ext_err')
                {
                    return $contact_bg_image_link;
                }elseif($contact_bg_image_link == 'file_err')
                {
                    return $contact_bg_image_link;
                }elseif($contact_bg_image_link == 'dimension_err')
                {
                    return $contact_bg_image_link;
                }
            }
            
            if(isset($contact_bg_image_link))
            {
                $myQuery = "UPDATE contactus SET 
                contact_bg_image = '$contact_bg_image_link'
                WHERE id = 1";
    
                
                $result = mysqli_query($this->db, $myQuery);
                if(!$result){
                return "Error: " .mysqli_error($this->db);
                }else{
                    return 'good';
                }
            }
        }
  
    }





    // PRODUCTS AND SERVICES PAGE 

    public function fetchPnSPageDetails()
    {
        $myQuery = "SELECT * FROM products_and_services WHERE id = 1";
        $result = mysqli_query($this->db, $myQuery);
        return $result;
    }


    function uploadPnSPage($data)
    {
        if(is_object($data) || is_array($data))
        {
            // return $_FILES["pns_banner"]["size"];

            if(isset($_POST['main_text']))
            {
    
            $main_heading = filter_var($data['main_heading'], FILTER_SANITIZE_STRING);
            $main_desc = filter_var($data['main_desc'], FILTER_SANITIZE_STRING);
            
            $myQuery = "UPDATE products_and_services SET 
            main_heading = '$main_heading',
            main_desc = '$main_desc'
            WHERE id = 1";
    
            
            $result = mysqli_query($this->db, $myQuery);
            if(!$result){
            return "Error: " .mysqli_error($this->db);
            }else{
            return 'good';
            }

            }elseif(isset($_FILES["pns_banner"]["size"]))
            {
                $name = $_FILES["pns_banner"]["name"];
                $type = $_FILES["pns_banner"]["type"];
                $size = $_FILES["pns_banner"]["size"];
                $error = $_FILES["pns_banner"]["error"];
                $tmp_name = $_FILES["pns_banner"]["tmp_name"];
                $arr = getimagesize($_FILES["pns_banner"]["tmp_name"]);
    
                $image_width = $arr[0];
                $image_height = $arr[1];
                $pns_banner_link = $this->processImage($name, $type, $size, $tmp_name, $error, $image_width, $image_height);
                if($pns_banner_link == 'ext_err')
                {
                    return $pns_banner_link;
                }elseif($pns_banner_link == 'file_err')
                {
                    return $pns_banner_link;
                }elseif($pns_banner_link == 'dimension_err')
                {
                    return $pns_banner_link;
                }else{
                    $myQuery = "UPDATE products_and_services SET 
                    banner_img = '$pns_banner_link'
                    WHERE id = 1";
        
                    
                    $result = mysqli_query($this->db, $myQuery);
                    if(!$result){
                    return "Error: " .mysqli_error($this->db);
                    }else{
                        return 'good';
                    }
                }
            }elseif(isset($_POST['pns_submit1']))
            {
                $pns_heading1 = filter_var($data['pns_heading1'], FILTER_SANITIZE_STRING);
                $pns_desc1 = filter_var($data['pns_desc1'], FILTER_SANITIZE_STRING);

                if(!empty(basename($_FILES["pns_img1"]["name"])))
            {
                $name = $_FILES["pns_img1"]["name"];
                $type = $_FILES["pns_img1"]["type"];
                $size = $_FILES["pns_img1"]["size"];
                $error = $_FILES["pns_img1"]["error"];
                $tmp_name = $_FILES["pns_img1"]["tmp_name"];
                $arr = getimagesize($_FILES["pns_img1"]["tmp_name"]);
    
                $image_width = $arr[0];
                $image_height = $arr[1];
                $pns_img_link = $this->processImage($name, $type, $size, $tmp_name, $error, $image_width, $image_height);
                if($pns_img_link == 'ext_err')
                {
                    return $pns_img_link;
                }elseif($pns_img_link == 'file_err')
                {
                    return $pns_img_link;
                }elseif($pns_img_link == 'dimension_err')
                {
                    return $pns_img_link;
                }else{
                    $myQuery = "UPDATE products_and_services SET 
                    pns_img1 = '$pns_img_link'
                    WHERE id = 1";
        
                    
                    $result = mysqli_query($this->db, $myQuery);
                    if(!$result){
                    return "Error: " .mysqli_error($this->db);
                    }else{
                        $query = "UPDATE products_and_services SET 
                        pns_heading1 = '$pns_heading1',
                        pns_desc1 = '$pns_desc1'
                        WHERE id = 1";
            
                        
                        $query_result = mysqli_query($this->db, $query);
                        if(!$query_result){
                        return "Error: " .mysqli_error($this->db);
                        }else{
                        return 'good';
                        }
                    }
                }
            }

                

            }elseif(isset($_POST['pns_submit2']))
            {
                $pns_heading2 = filter_var($data['pns_heading2'], FILTER_SANITIZE_STRING);
                $pns_desc2 = filter_var($data['pns_desc2'], FILTER_SANITIZE_STRING);

                if(!empty(basename($_FILES["pns_img2"]["name"])))
            {
                $name = $_FILES["pns_img2"]["name"];
                $type = $_FILES["pns_img2"]["type"];
                $size = $_FILES["pns_img2"]["size"];
                $error = $_FILES["pns_img2"]["error"];
                $tmp_name = $_FILES["pns_img2"]["tmp_name"];
                $arr = getimagesize($_FILES["pns_img2"]["tmp_name"]);
    
                $image_width = $arr[0];
                $image_height = $arr[1];
                $pns_img_link = $this->processImage($name, $type, $size, $tmp_name, $error, $image_width, $image_height);
                if($pns_img_link == 'ext_err')
                {
                    return $pns_img_link;
                }elseif($pns_img_link == 'file_err')
                {
                    return $pns_img_link;
                }elseif($pns_img_link == 'dimension_err')
                {
                    return $pns_img_link;
                }else{
                    $myQuery = "UPDATE products_and_services SET 
                    pns_img2 = '$pns_img_link'
                    WHERE id = 1";
        
                    
                    $result = mysqli_query($this->db, $myQuery);
                    if(!$result){
                    return "Error: " .mysqli_error($this->db);
                    }else{
                        $query = "UPDATE products_and_services SET 
                        pns_heading2 = '$pns_heading2',
                        pns_desc2 = '$pns_desc2'
                        WHERE id = 1";
                        
                        $query_result = mysqli_query($this->db, $query);
                        if(!$query_result){
                        return "Error: " .mysqli_error($this->db);
                        }else{
                        return 'good';
                        }
                    }
                }
            }

                

            }elseif(isset($_POST['pns_submit3']))
            {
                $pns_heading3 = filter_var($data['pns_heading3'], FILTER_SANITIZE_STRING);
                $pns_desc3 = filter_var($data['pns_desc3'], FILTER_SANITIZE_STRING);

                if(!empty(basename($_FILES["pns_img3"]["name"])))
            {
                $name = $_FILES["pns_img3"]["name"];
                $type = $_FILES["pns_img3"]["type"];
                $size = $_FILES["pns_img3"]["size"];
                $error = $_FILES["pns_img3"]["error"];
                $tmp_name = $_FILES["pns_img3"]["tmp_name"];
                $arr = getimagesize($_FILES["pns_img3"]["tmp_name"]);
    
                $image_width = $arr[0];
                $image_height = $arr[1];
                $pns_img_link = $this->processImage($name, $type, $size, $tmp_name, $error, $image_width, $image_height);
                if($pns_img_link == 'ext_err')
                {
                    return $pns_img_link;
                }elseif($pns_img_link == 'file_err')
                {
                    return $pns_img_link;
                }elseif($pns_img_link == 'dimension_err')
                {
                    return $pns_img_link;
                }else{
                    $myQuery = "UPDATE products_and_services SET 
                    pns_img3 = '$pns_img_link'
                    WHERE id = 1";
        
                    
                    $result = mysqli_query($this->db, $myQuery);
                    if(!$result){
                    return "Error: " .mysqli_error($this->db);
                    }else{
                        $query = "UPDATE products_and_services SET 
                        pns_heading3 = '$pns_heading3',
                        pns_desc3 = '$pns_desc3'
                        WHERE id = 1";
                        
                        $query_result = mysqli_query($this->db, $query);
                        if(!$query_result){
                        return "Error: " .mysqli_error($this->db);
                        }else{
                        return 'good';
                        }
                    }
                }
            }

                

            }elseif(isset($_POST['pns_submit4']))
            {
                $pns_heading4 = filter_var($data['pns_heading4'], FILTER_SANITIZE_STRING);
                $pns_desc4 = filter_var($data['pns_desc4'], FILTER_SANITIZE_STRING);

                if(!empty(basename($_FILES["pns_img4"]["name"])))
            {
                $name = $_FILES["pns_img4"]["name"];
                $type = $_FILES["pns_img4"]["type"];
                $size = $_FILES["pns_img4"]["size"];
                $error = $_FILES["pns_img4"]["error"];
                $tmp_name = $_FILES["pns_img4"]["tmp_name"];
                $arr = getimagesize($_FILES["pns_img4"]["tmp_name"]);
    
                $image_width = $arr[0];
                $image_height = $arr[1];
                $pns_img_link = $this->processImage($name, $type, $size, $tmp_name, $error, $image_width, $image_height);
                if($pns_img_link == 'ext_err')
                {
                    return $pns_img_link;
                }elseif($pns_img_link == 'file_err')
                {
                    return $pns_img_link;
                }elseif($pns_img_link == 'dimension_err')
                {
                    return $pns_img_link;
                }else{
                    $myQuery = "UPDATE products_and_services SET 
                    pns_img4 = '$pns_img_link'
                    WHERE id = 1";
        
                    
                    $result = mysqli_query($this->db, $myQuery);
                    if(!$result){
                    return "Error: " .mysqli_error($this->db);
                    }else{
                        $query = "UPDATE products_and_services SET 
                        pns_heading4 = '$pns_heading4',
                        pns_desc4 = '$pns_desc4'
                        WHERE id = 1";
                        
                        $query_result = mysqli_query($this->db, $query);
                        if(!$query_result){
                        return "Error: " .mysqli_error($this->db);
                        }else{
                        return 'good';
                        }
                    }
                }
            }

                

            }elseif(isset($_POST['pns_submit5']))
            {
                $pns_heading5 = filter_var($data['pns_heading5'], FILTER_SANITIZE_STRING);
                $pns_desc5 = filter_var($data['pns_desc5'], FILTER_SANITIZE_STRING);

                if(!empty(basename($_FILES["pns_img5"]["name"])))
            {
                $name = $_FILES["pns_img5"]["name"];
                $type = $_FILES["pns_img5"]["type"];
                $size = $_FILES["pns_img5"]["size"];
                $error = $_FILES["pns_img5"]["error"];
                $tmp_name = $_FILES["pns_img5"]["tmp_name"];
                $arr = getimagesize($_FILES["pns_img5"]["tmp_name"]);
    
                $image_width = $arr[0];
                $image_height = $arr[1];
                $pns_img_link = $this->processImage($name, $type, $size, $tmp_name, $error, $image_width, $image_height);
                if($pns_img_link == 'ext_err')
                {
                    return $pns_img_link;
                }elseif($pns_img_link == 'file_err')
                {
                    return $pns_img_link;
                }elseif($pns_img_link == 'dimension_err')
                {
                    return $pns_img_link;
                }else{
                    $myQuery = "UPDATE products_and_services SET 
                    pns_img5 = '$pns_img_link'
                    WHERE id = 1";
        
                    
                    $result = mysqli_query($this->db, $myQuery);
                    if(!$result){
                    return "Error: " .mysqli_error($this->db);
                    }else{
                        $query = "UPDATE products_and_services SET 
                        pns_heading5 = '$pns_heading5',
                        pns_desc5 = '$pns_desc5'
                        WHERE id = 1";
                        
                        $query_result = mysqli_query($this->db, $query);
                        if(!$query_result){
                        return "Error: " .mysqli_error($this->db);
                        }else{
                        return 'good';
                        }
                    }
                }
            }

                

            }
      
        }
    }



    // LOGIN PAGE 

    public function loginPage($data)
    {
        if(is_object($data) || is_array($data))
        {
            $password = md5($data['password']);
            $email = filter_var($data['email'], FILTER_VALIDATE_EMAIL);
        }
        $myQuery = "SELECT * FROM admin_cred WHERE pass = '$password' AND email = '$email'";
        $result = mysqli_query($this->db, $myQuery);
        $row = mysqli_num_rows($result);
        // return $row;
        if($row == 1)
        {
            return 'good';
        }elseif($row < 1)
        {
            return 'none';
        }
    }


}