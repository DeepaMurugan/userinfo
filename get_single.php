<?php
include('db.php');
include('get_all_records.php');
if(isset($_POST["user_id"]))
{
 $output = array();
 $statement = $connection->prepare(
  "SELECT * FROM users 
  WHERE id = '".$_POST["user_id"]."' 
  LIMIT 1"
 );
 $statement->execute();
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
  $output["first_name"] = $row["name"];
  $output["home_no"] = $row["home_no"];
  $output["work_no"] = $row["work_no"];
  $output["cell_no"] = $row["cell_no"];
  
 
 }
 echo json_encode($output);
}
?>