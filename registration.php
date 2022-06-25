<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
table, th, td {
  border:1px solid black;
  border-collapse: collapse;
}

th, td {
    text-align: center;
}
</style>
    <title>Document</title>
</head>
<body>
    <?php $name = '';
      $age = '';
      $password = '';
      $update = false;
      
      ?>

<?php
      include('connection.php');
      if(isset($_POST['submit']))
      {
          $name = $_POST['name'];
          $age = $_POST['age'];
          $password = $_POST['password'];

          $sql  = "INSERT INTO data (name, age, password)
                   VALUES ('$name', '$age', '$password')";
        $data = mysqli_query($conn, $sql);
        if($data)
        {
            echo "<h1>Data is inserted</h1>";
        }
      }

      else if(isset($_POST['show']))
      {
          $obj = "SELECT id, name, age FROM data";
          $data = mysqli_query($conn, $obj);

          if(mysqli_num_rows($data)>0)
          {
            echo "<table style="."width:50%"."> <tr> <th>ID</th> <th>Name</th> <th>age</th> ";
            while($row=mysqli_fetch_assoc($data)){
                $vID = $row["id"];
                echo "<tr><td>" . $row["id"] . "</td><td>" . $row["name"] . "</td><td>" . $row["age"];
            }
            echo "</table>";
          }
      }
      ?>
<br>
<br>
<br>
<br>
<br>

<div class="first_page">
<form action="registration.php" method="post">
    <input class="id" type="hidden" name="id" value="<?php echo $id; ?>" required/><br>
    Name : <input class="name" type="text" name="name" value="<?php echo $name; ?>" required/><br>
    age : <input class="email" type="number" name="age" value="<?php echo $age; ?>" required/><br>
    Password : <input class="pass"type="password" name="password" value="<?php echo $password; ?>" required/><br>
    
    <?php 
    if($update == true): 
    ?>



    <input type="submit" name="update" value="update"/>
    <?php else: ?>
        <input class="sub" type="submit" name="submit" value="insert"/>
      
    <?php endif; ?>

   </form>
</div>

   <form action="registration.php" method="post">
   <input class="show" type="submit" name="show" value="show"/>
   </form>


   <style>
     .name{
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
     }
     .email{
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
     }
     .pass{
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
     }
     .first_page{
          border-radius: 5px;
          background-color: #f2f2f2;
          padding: 20px;
     }


      .sub{
                  background-color: white; 
                  color: black; 
                  border: 2px solid #4CAF50;
      }
      .sub:hover{
        color:while;
        background-color: aqua;
      }
      .show{
                  background-color: white; 
                  color: black; 
                  border: 2px solid #008CBA;
      }
      .show:hover{
        color:while;
        background-color: aqua;
      }
    </style>
   
</body>
</html>