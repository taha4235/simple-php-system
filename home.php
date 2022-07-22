
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body >
  <div id="mother">
<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'databases';
$con = mysqli_connect($host,$user,$pass,$db);
$res = mysqli_query($con,"select * from student");
$id = '';
$name = '';
$address = '';
if(isset($_POST['id'])){
    $id = $_POST['id'];
}
if(isset($_POST['name'])){
    $name = $_POST['name'];
}
if(isset($_POST['address'])){
    $address = $_POST['address'];
}
$sqls = '';
if(isset($_POST['add'])){
    $sqls = "insert into student values($id,'$name','$address')";
     mysqli_query($con,$sqls);
     header('location:home.php');
};
if(isset($_POST['del'])){
    $sqls = "delete from student where name = $name";
    mysqli_query($con,$sqls);
}
      ?>
      <form method="POST">
          <aside>
              <div id="div">
                  <img src="download.jpg" alt="logo for the websites",width="100px" class="img" height="100px">
                  <h3>control panel websites</h3>
                  <label >number of the students:</label>
                  <br>
                  <input type="text" name="id" id="id">
                  <br>
                 <label>the name of the students:</label>
                 <br>
                 <input type="text" name="name" id="name">
                  <br>
                  <label>addrees of the students:</label>
                  <br>
                  <input type="text" name="address" id="address">
                  <br>
                  <br>
                  <button name='add'>add students</button>
                  <button name='del'>delete students</button>
                </div>
          </aside>
          <!-------------------------->
          <main>
              <table id="th1">
              <tr>
                  <th>number students</th>
                  <th>name students</th>
                  <th>address students</th>
              </tr>
<?php
while($row = mysqli_fetch_array($res)){
     echo "<br>";
    echo "<td>".$row['id']."</td>";
    echo "<td>".$row['name']."</td>";
    echo "<td>".$row['address']."</td>";
};
?>
</table>
          </main>
      </form>
  </div>
</body>
</html>