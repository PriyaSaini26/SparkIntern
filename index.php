<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<style>
    body{
       background-color:rgb(150, 225, 248);
      
    }
    
    #heading{
        
        margin-top:80px;
        margin-bottom:70px;
        text-align:center;
    }

    table{
      width:90%;
      margin-left:30px;
    }

    tr{
      border-bottom:2px solid rgb(113, 163, 33);
      padding:3px;
      margin-left:5px;
    }

    td{
      font-size:20px;
      padding:3px;
    }

    thead tr td{
      font-size:25px;
      color:red;
      padding:5px;
      border-top: 2px solid blue;
      border-bottom: 2px solid blue;
    }

</style>

<body >

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" style="font-size: 30px;" href="SparkFoundationTask1.html">HOME</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" style="font-size: 25px;margin-left: 50px;" aria-current="page" href="index.php">View Customers</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" style="font-size: 25px;margin-left: 50px;" aria-current="page" href="Transfer.php">Transfer Money</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" style="font-size: 25px;margin-left: 50px;" aria-current="page" href="TransactionHistory.php">Transaction History</a>
              </li>
            </ul>
           
          </div>
        </div>
      </nav>
    
    <div id="heading">
        <h1>Customer List</h1>
    </div>




<div class="center-div">
    <div class="table-responsive">
        <table>
          <thead>
              <tr>
                  <td>Id</td>
                  <td>Name</td>
                  <td>Email</td>
                  <td>Balance</td>
              </tr>
          </thead>

          <tbody>

          <?php  

              //Creating connection with database
              $servername = "localhost";
              $username = "root";
              $password = "";
              $database = "BankSystem";

              //Create a connection
              $conn = mysqli_connect($servername,$username,$password,$database);

              //Die if connection failed
              if(!$conn){
                  echo "Connection failed ". mysqli_connect_errno();
              }
              // else{
              //     echo "Connection established successfully.<br>";
              // }

              //$sql = "CREATE DATABASE BankSystem";
              //$result = mysqli_query($conn,$sql);

              // Check for database creation success
              // if($result){
              //     echo "<br>Database created successfully.";
              // }
              // else{
              //     echo "<br>The database cannot be created successfully because of this error " . mysqli_error($conn);
              // }

              $selectquery = " select * from info ";
              $query = mysqli_query($conn,$selectquery);
              $nums = mysqli_num_rows($query);               // to get the no. of rows in data fetched from database.

              while($result = mysqli_fetch_array($query)){
                ?>

                <tr>
                <td>  <?php echo $result['Id']  ?> </td>
                <td>  <?php echo $result['Name']  ?> </td>
                <td>  <?php echo $result['Email']  ?> </td>
                <td>  <?php echo $result['Balance'] ?> </td>
              </tr>

            <?php
              }
          ?>

           
          </tbody>
        </table>
    </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    
</body>
</html>






































