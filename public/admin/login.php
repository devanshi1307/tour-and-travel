<?php include('../config.php')?>
<?php
if(isset($_GET['pwd'])) {
    if($_GET['pwd']=='updated') {
        echo "<script>alert('Your password has been reset!!');</script>";
    }
}
?>

<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href='//fonts.googleapis.com/css?family=Open+Sans:400,300italic,300,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
    	<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>	
        <link href="https://fonts.googleapis.com/css2?family=Italianno&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://kit.fontawesome.com/44f557ccce.js"></script>
        <!-- Bootstrap CSS -->
		<!-- log on to codeastro.com for more projects -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <title>Online Flight Booking</title>         
        <link rel = "icon" href ="../assets/images/brand.png"  type = "image/x-icon">       
    </head>
<link rel="stylesheet" href="../assets/css/form.css">
<style>
  body {
    /* padding-top: 20px; */
    background: #485563;  /* fallback for old browsers */
background: -webkit-linear-gradient(to left, #29323c, #485563);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to left, #29323c, #485563); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
   
  }    
  input {
    border :0px !important;
    border-bottom: 2px solid #424242 !important;
    color :#424242 !important;
    border-radius: 0px !important;
    font-weight: bold !important;
    background-color: whitesmoke !important;    
  }
  *:focus {
    outline: none !important;
  }
  label {
    color : #828282 !important;
    font-size: 19px;
  }
  h5.form-name {
    color: #424242;
    font-family: 'Courier New', Courier, monospace;
    font-weight: 50;
    margin-bottom: 0px !important;
    margin-top: 10px;
  }
  h1 {
    font-size: 45px !important;
    margin-bottom: 20px;  
    font-family :'product sans';
    font-weight: bolder;
  }
  div.form-out {
    /* border-radius: 40px; */
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);  
    background-color: whitesmoke !important;
    padding: 40px;
    margin-top: 80px;
  }
  .input-group {
  position: relative;
  display: inline-block;
  width: 100%;
}
  select {
    float: right;
    font-weight: bold !important;
    color :#424242 !important;
  }
  @media screen and (max-width: 900px){
    body {
      background-color: lightblue;
      background-image: none;
    }
    div.form-out {
    padding: 20px;
    background-color: none !important;
    margin-top: 20px;
  }  
}  
</style>
<main>
<?php
if(isset($_GET['error'])) {
    if($_GET['error'] === 'invalidcred') {
        echo '<script>alert("Invalid Credentials")</script>';
    } else if($_GET['error'] === 'wrongpwd') {
        echo '<script>alert("Wrong Password")</script>';
    } else if($_GET['error'] === 'sqlerror') {
        echo"<script>alert('Database error')</script>";
    }
}
?>
<div class="container mt-0">
  <div class="row">
    <?php
    if(isset($_GET['error'])) {
        if($_GET['error'] === 'destless') {
            echo "<script>alert('Dest. date/time is less than src.');</script>";
        } else if($_GET['error'] === 'sqlerr') {
          echo "<script>alert('Database error');</script>";
        }
    }
    ?>
    <div class="col-md-3"></div>
      <div class="bg-light form-out col-md-6">
      <h1 class="text-secondary text-center">ADMIN LOGIN</h1>
      
      <form method="POST" class=" text-center" 
        action="../includes/admin/login.inc.php">

        <div class="form-row">  
            <div class="col-1 p-0 mr-1">
                <i class="fa fa-user text-secondary" 
                    style="float: right;margin-top:35px;"></i>
            </div> 
          <div class="col-10 mb-2">              
            <div class="input-group">
                <label for="user_id">Username/ Email</label>
                <input type="text" name="user_id" id="user_id" required
                   >
              </div>              
          </div>       
          <div class="col-1 p-0 mr-1">
                <i class="fa fa-lock text-secondary" 
                    style="float: right;margin-top:35px;"></i>
          </div>                
          <div class="col-10">
            <div class="input-group">
                <label for="user_pass">Password</label>
                <input type="password" name="user_pass" id="user_pass"
                      required>
              </div>            
          </div>          
        </div>              

        <button name="login_but" type="submit" 
          class="btn btn-danger mt-5">
          <div style="font-size: 1.5rem;">
          <i class="fa fa-lg fa-arrow-right"></i> Login 
          </div>
        </button>
      </form>
    </div>
    <div class="col-md-3"></div>
    </div>
</div>    
</main>

<?php include_once 'footer.php'; ?>

<script>
$(document).ready(function(){
  $('.input-group input').focus(function(){
    me = $(this) ;
    $("label[for='"+me.attr('id')+"']").addClass("animate-label");
  }) ;
  $('.input-group input').blur(function(){
    me = $(this) ;
    if ( me.val() == ""){
      $("label[for='"+me.attr('id')+"']").removeClass("animate-label");
    }
  }) ;
  // $('#test-form').submit(function(e){
  //   e.preventDefault() ;
  //   alert("Thank you") ;
  // })
});
</script>
