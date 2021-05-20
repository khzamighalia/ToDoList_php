
<?php
session_start();
require_once 'db.php';
$id = base64_decode($_GET['id']);
$data = "SELECT * FROM task_table WHERE id=$id";
$data_from_db = $dbcon->query($data);
$f_result = $data_from_db->fetch_assoc();
$iddcatt=$f_result["id_category"];


if(isset($_POST['update'])){
  $update_text = $_POST['update_text'];
  $catfield = $_POST['catfield'];
  $update_query = "UPDATE task_table SET task_name='$update_text',id_category='$catfield' WHERE id=$id";
  $update_date = $dbcon->query($update_query);
  if($update_date){
    $_SESSION['upadate_success'] = "Task updated successfully!";
  }
  header('location: index.php');
}

?>

<?php 
require_once 'header.php';
?>
<div class="container bg-light mt-3 p-3" >

<div class="container" >
  <div class='row'>
  
    <div class='col-8 mx-auto mt-5'>
    <h2 class="display-4 mx-auto mt-2 text-center text-info">Update Task</h2>
    <form class="" action="" method="post">
    <div class='form-group'>
    <input class="form-control form-control-lg" type="text" name="update_text" value="<?=$f_result['task_name'] ?>">
    </div>
    <div class='form-group'>

    <select name="catfield" class="form-control form-control-lg">
    <?php
$iddcat=$row2["id_category"];
$cat_show_query = "SELECT * FROM category_table where id_category=$iddcat";
$result3 = $dbcon -> query($cat_show_query);
foreach ($result3 as $row3) {
  echo '<option value="'.$row3["id_category"].'">'.$row3["name_category"].' </option>';
}
?>
<?php
$iddcat=$row2["id_category"];
$cat_show_query = "SELECT * FROM category_table";
$result3 = $dbcon -> query($cat_show_query);
foreach ($result3 as $row3) {
  echo '<option value="'.$row3["id_category"].'">'.$row3["name_category"].' </option>';
}
?>
</select>
</div>
    <div class='form-group'>
    <input class="btn btn-info btn-block" type="submit" name="update" value="update">
    </div>
  </form>
    </div>
  </div>
</div>
</div>
    
  </body>
</html>
