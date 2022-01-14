<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <title>Transfer Money</title>

  <style>
    body {
      background-color: rgb(150, 225, 248);
    }

    #data {
      width: 70%;
      margin-left: 220px;
      border: 2px solid gray;
      border-radius: 10px;
      margin-top: 70px;
      padding: 30px;
      box-shadow: 2px 2px greenyellow;
    }

    #head {
      margin-top: 60px;
      color: red;
      text-shadow: 0 0 2px black, 0 5px 0 rgb(12, 192, 66), 0 8px 0 white;
      text-align: center;
    }

    #head h1 {
      font-size: 70px;
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
  $conn = mysqli_connect($servername, $username, $password, $database);

  //Die if connection failed
  if (!$conn) {
    echo "Connection failed " . mysqli_connect_errno();
  }
  // else{
  //     echo "Connection established successfully.<br>";
  // }

  if (isset($_POST['submit'])) {
    $from = $_POST['info-from'];
    $to = $_POST['info-to'];
    $amount = $_POST['amount'];

    $sql = "SELECT * from info where Id='$from'";
    $query = mysqli_query($conn, $sql);
    $sql1 = mysqli_fetch_array($query);

    $sql = "SELECT * from info where Id='$to'";
    $query = mysqli_query($conn, $sql);
    $sql2 = mysqli_fetch_array($query);


    if (($amount) < 0) {
      echo '<script type="text/javascript">';
      echo ' alert("Oops! Negative values cannot be transferred")';
      echo '</script>';
    } else if ($amount > $sql1['Balance']) {

      echo '<script type="text/javascript">';
      echo ' alert("Bad Luck! Insufficient Balance")';
      echo '</script>';
    } else if ($amount == 0) {

      echo "<script type='text/javascript'>";
      echo "alert('Oops! Zero value cannot be transferred')";
      echo "</script>";
    } else {

      $newbalance = $sql1['Balance'] - $amount;
      $sql = "UPDATE info set Balance=$newbalance where Id='$from'";
      mysqli_query($conn, $sql);


      $newbalance = $sql2['Balance'] + $amount;
      $sql = "UPDATE info set Balance=$newbalance where Id='$to'";
      mysqli_query($conn, $sql);

      $sender = $sql1['Name'];
      $receiver = $sql2['Name'];
      $sql = "INSERT INTO transaction(`sender`, `receiver`, `Balance`) VALUES ('$sender','$receiver','$amount')";
      $query = mysqli_query($conn, $sql);

      if ($query) {
        echo "<script> alert('Transaction Successful');
            window.location='transactionhistory.php';
        </script>";
      }

      $newbalance = 0;
      $amount = 0;
    }
  }
  ?>

  <div id="head">
    <h1>Transfer Money</h1>
  </div>

  <form method="POST" name="tcredit">

    <div id="data">

      <h4 class="my-3">Transfer From</h4>

      <select name="info-from" class="form-select" id="validationCustom04" required>
        <option selected disabled value="">Choose...</option>
        <?php
        $selectquery = " select * from info ";
        $query = mysqli_query($conn, $selectquery);
        $nums = mysqli_num_rows($query);               // to get the no. of rows in data fetched from database.
        while ($result = mysqli_fetch_array($query)) {
        ?>
          <option value="<?php echo $result['Id']; ?>"><?php echo $result['Id'], $result['Name'], $result['Email'], $result['Balance'] ?> </option>
        <?php
        }
        ?>
      </select>
      <div class="invalid-feedback">
        Please select a valid state.
      </div>

      <h4 class="my-3">Transfer To</h4>
      <select name="info-to" class="form-select" id="validationCustom04" required>
        <option selected disabled value="">Choose...</option>
        <?php
        $selectquery = " select * from info ";
        $query = mysqli_query($conn, $selectquery);
        $nums = mysqli_num_rows($query);               // to get the no. of rows in data fetched from database.
        while ($result = mysqli_fetch_array($query)) {
        ?>
          <option value="<?php echo $result['Id']; ?>"><?php echo $result['Id'], $result['Name'], $result['Email'], $result['Balance'] ?> </option>
        <?php
        }
        ?>
      </select>
      <div class="invalid-feedback">
        Please select a valid state.
      </div>


      <h4 class="my-3">Amount to be transferred</h4>
      <div class="form-floating mb-3">
        <input type="text" name="amount" class="form-control" id="floatingInput" placeholder="Amount">
        <label for="floatingInput">Amount</label>
      </div>

      <div class="col-12">
        <button class="btn btn-primary" name="submit" type="submit" id="btn">Transfer</button>
      </div>

    </div>

  </form>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>