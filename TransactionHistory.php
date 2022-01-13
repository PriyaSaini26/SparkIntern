<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Transfer Money</title>

    <style>
        body{
            background-color:rgb(150, 225, 248);
        }

        #data{
            width:70%;
            margin-left:220px;
            border:2px solid gray;
            border-radius:10px;
            margin-top:70px;
            padding:30px;
            box-shadow:2px 2px greenyellow;
        }

        #head{
            margin-top:60px;
            color:red;
            text-shadow: 0 0 2px black,0 5px 0 rgb(12, 192, 66),0 8px 0 white;
            text-align:center;
        }
        #head h1{
            font-size:70px;
        }
    </style>
</head>
<body>

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


?>

<div id="head">
    <h1>Transaction History</h1>
</div>

<form method="post">

    <table class="table table-hover table-striped table-condensed table-bordered">
        <thead>
            <tr>
                <th class="text-center">S.No.</th>
                <th class="text-center">Sender</th>
                <th class="text-center">Receiver</th>
                <th class="text-center">Amount</th>
                <th class="text-center">Date & Time</th>
            </tr>
        </thead>
        <tbody>
        <?php

            $sql ="select * from transaction";

            $query =mysqli_query($conn, $sql);

            while($rows = mysqli_fetch_assoc($query))
            {
        ?>

            <tr>
            <td class="py-2"><?php echo $rows['sno']; ?></td>
            <td class="py-2"><?php echo $rows['sender']; ?></td>
            <td class="py-2"><?php echo $rows['receiver']; ?></td>
            <td class="py-2"><?php echo $rows['Balance']; ?> </td>
            <td class="py-2"><?php echo $rows['datetime']; ?> </td>
                
        <?php
            }

        ?>
        </tbody>
    </table>

</form>

<script>

</script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>