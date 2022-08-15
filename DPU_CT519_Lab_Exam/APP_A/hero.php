
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
   echo ' Detail: '.$row['Detail'].'<br>';
  }

//$sql2 = "select * from Hero left join Hero_in_movie on Hero.Hero_id = Hero_in_movie.Hero_id where Hero_id = ".$id;
//left join Movie on Hero_in_movie.Movie_id = Movie.Movie_id
$sql2 = "select *,Movie.Name as MNAME from Hero left join Hero_in_movie on Hero.Hero_id = Hero_in_movie.Hero_id left join Movie on Hero_in_movie.Movie_id = Movie.Movie_id  where Hero.Hero_id =".$id;
//echo $sql2;
$result=mysqli_query($bd,$sql2);
echo 'Movie<br>';
while($row = mysqli_fetch_array($result)){
echo '-'.$row['MNAME'].'<br>';
  }







echo '<a href=#><p>nanticha 645162010004</p></a>';
echo '</body></html>';
}

//Free result set
mysqli_free_result($result);
mysqli_close($bd);
?>

