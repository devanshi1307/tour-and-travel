<?php
include('config.php');


                
?> 	
<head>
<link href="https://fonts.googleapis.com/css2?family=Assistant:wght@200&display=swap" rel="stylesheet">
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" href="style.css">
</head>
<style>
table {
  background-color: rgb(43, 3, 138) !important;

    justify-content: center;
    width:auto;

}
.display-4{
  padding: 90px;
}

@font-face {
  font-family: 'product sans';
  src: url('assets/css/Product Sans Bold.ttf');
}
h1{
    font-family :'product sans' !important;
	color:white ;
	font-size:40px !important;
	margin-top:20px;
	text-align:center;
 

}
  body { 
  background: white; /* fallback for old browsers */
   background: -webkit-linear-gradient(to right, #2c3e50, #bdc3c7);  /*Chrome 10-25, Safari 5.1-6 */
  background: white;/* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+*/

} 
thread {
  margin: 3px;
}
th {
  font-size: 22px;
  margin-left: 7rem;
  /* font-family: 'Courier New', Courier, monospace; */
}
td {
  margin-top: 10px !important;
  font-size: 16px;
  font-weight: bold;
  /* color: #3931af; */
  color: white;
}
/* .btn{
  line-height: 0.7;
} */
</style>








<?php include('header.php')?>

    <main>
        <?php if(isset($_POST['search_but'])) { 
            $dep_date = $_POST['dep_date'];                        
            $ret_date = $_POST['ret_date'];  
            $dep_city = $_POST['dep_city'];  
            $arr_city = $_POST['arr_city'];  
            // $flight_id = $_POST['flight_id'];   
            $type = $_POST['type'];
            $f_class = $_POST['f_class'];
            $passengers = $_POST['passengers'];
            if($dep_city === $arr_city){
              header('Location: index.php?error=sameval');
              exit();    
            }
            if($dep_city === '0') {
              header('Location: index.php?error=seldep');
              exit(); 
            }
            if($arr_city === '0') {
              header('Location: index.php?error=selarr');
              exit();              
            }
            ?>
          <div class="container-md mt-2">
            <h1 class="display-4 text-center text-dark"
              >FLIGHTS  FROM : <br> <?php echo $dep_city; ?> 
                 to <?php echo $arr_city; ?> </h1>
            <table class="table table-striped table-bordered table-hover">
              <thead>
                <tr class="text-center text-light">
                  <th scope="col">Airline</th>
                  <th scope="col">Departure</th>
                  <th scope="col">Arrival</th>
                  <th scope="col">Status</th>
                  <th scope="col">Fare</th>
                  <th scope="col">Buy</th>
                </tr>
              </thead>
              <tbody>


                <?php
                $sql = 'SELECT * FROM flight WHERE source=? AND Destination =? AND 
                    DATE(departure)=? ORDER BY Price';
                $stmt = mysqli_stmt_init($conn);
                mysqli_stmt_prepare($stmt,$sql);                
                mysqli_stmt_bind_param($stmt,'sss',$dep_city,$arr_city,$dep_date);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
               
                while ($row = mysqli_fetch_assoc($result)) {
                  $price = (int)$row['Price']*(int)$passengers;
                  if($type === 'round') {
                    $price = $price*2;
                  }
                  if($f_class == 'B') {
                      $price += 0.5*$price;
                  }
                  if($row['status'] === '') {
                      $status = "Not yet Departed";
                      $alert = 'alert-primary';
                  } else if($row['status'] === 'dep') {
                      $status = "Departed";
                      $alert = 'alert-info';
                  } else if($row['status'] === 'issue') {
                      $status = "Delayed";
                      $alert = 'alert-danger';
                  } else if($row['status'] === 'arr') {
                      $status = "Arrived";
                      $alert = 'alert-success';
                  }               
                  echo "
                 
                  <tr class='text-center'>                  
                    <td>".$row['airline']."</td>
                    <td>".$row['departure']."</td>
                    <td>".$row['arrivale']."</td>
                    <td>
                      <div>
                          <div class='alert ".$alert." text-center mb-0 pt-1 pb-1' 
                              role='alert'>
                              ".$status."
                          </div>
                      </div>  
                    </td>                   
                    <td>$ ".$price."</td>
                  
                    ";
                    // print_r($_SESSION);
                    // print_r($row['status']); die;
                  if(isset($_SESSION['userId']) && $row['status'] == '') {  
                     
                    echo " <td>
                  
                    <form action='pass_form.php' method='post'>
                     
                   
                     <input name='passengers' type='hidden' value=".$passengers.">
                      <input name='price' type='hidden' value=".$price.">
                      <input name='flight_id' type='hidden' value=".$row['flight_id'].">
                      <input name='type' type='hidden' value=".$type.">
                      <input name='price' type='hidden' value=".$price.">
                      <input name='ret_date' type='hidden' value=".$ret_date.">
                      <input name='class' type='hidden' value=".$f_class.">
                      <button name='book_but' type='submit' 
                      class='btn btn-success mt-0'>
                      <div style=''>
                      <i class='fa fa-lg fa-check'></i>  
                      </div>
                    </button>
                    </form> 
                    </td>                                                       
                    "; 
                  } elseif (isset($_SESSION['userId']) && $row['status'] == 'dep') {
					echo "<td>Not Available</td>";
				  } else {
                     echo "<td>Login to continue</td>";
                  }
                  echo '</tr> ';                 
                }
                ?>

              </tbody>
            </table>

          </div>
        <?php } ?>

    </main>
   
