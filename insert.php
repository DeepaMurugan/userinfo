<?php
include('db.php');
include('get_all_records.php');
if(isset($_POST["operation"]))
{
 if($_POST["operation"] == "Add")
 {  
  $statement = $connection->prepare("
   INSERT INTO users (name, home_no, work_no, cell_no) 
   VALUES (:first_name, :home_no, :work_no, :cell_no)
  ");
  $result = $statement->execute(
   array(
    ':first_name' => $_POST["first_name"],
    ':home_no' => $_POST["home_no"],
    ':work_no' => $_POST["work_no"],
    ':cell_no' => $_POST["cell_no"],
   )
  );
  if(!empty($result))
  {
   echo 'Data Inserted';
  }
 }
 if($_POST["operation"] == "Edit")
 {
 
  $statement = $connection->prepare(
   "UPDATE users 
   SET name = :first_name, home_no = :home_no, work_no = :work_no, cell_no = :cell_no  
   WHERE id = :id
   "
  );
  $result = $statement->execute(
   array(
    ':first_name' => $_POST["first_name"],
    ':home_no' => $_POST["home_no"],
    ':work_no'  => $_POST["work_no"],
    ':cell_no'  => $_POST["cell_no"],
    ':id'   => $_POST["user_id"]
   )
  );
  if(!empty($result))
  {
   echo 'Data Updated';
  }
 }
}

?>
   