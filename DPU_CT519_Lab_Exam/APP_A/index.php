
<?php
if(isset($_GET['id'])) {
 $id = $_GET['id'];
}else{
  $id = null;
}

$mysql_hostname = "10.1.1.22";
$mysql_user = "webserver";
$mysql_password = "P@ssw0rd";
$mysql_database = "0004_Lab_Exam";
$bd = mysqli_connect($mysql_hostname, $mysql_user, $mysql_password,$mysql_database) or die("Could not connect database");

if (!$bd) {
  die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully".'<br>';

if($id>0)
{
$sql_stmt = "select * from Hero where Hero_id=".$id;

}else
{
$sql_stmt = "select * from Hero";
}

$result=mysqli_query($bd,$sql_stmt);
if(!$result)
{
die("Database access failed".mysqli_error());
}

$rows=mysqli_num_rows($result);

if($rows){
echo '<!DOCTYPE html><html lang="en-US"><head><title>Nanticha 645162010004</title></head><body>';

 while($row = mysqli_fetch_array($result)){
echo '<a href=\'hero.php?id='.$row['Hero_id'].'\'><img src='.$row['Picture_link'].' width=100px  /></a>';
   echo '  Hero: '.$row['Name'].'<br>';
  }

echo '<p>nanticha 645162010004</p>';
echo '</body></html>';
}

//Free result set
mysqli_free_result($result);
mysqli_close($bd);
?>

