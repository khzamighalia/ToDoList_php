<?php
session_start();
require_once "header.php";
require_once "db.php";

 ?>

<div class="container bg-light mt-3 p-3" >
<div class="container">
<h2 class="display-4 text-center text-info" > Todos </h2>
<div class="float-right">
<div class="float-right">
<a href="index.php"><button class="border border-dark bg-light text-dark "> All </button></a>
<a href="index-active.php"><button class="border border-info bg-light text-info "> Active </button></a>
<a href="index-completed.php"><button class="border border-dark bg-light text-dark "> completed </button></a>

</div>

</div>
<br>
<hr>
  <div class="row">
    <div class="col-8 m-auto ">

      <form class="mt-4 " action="index_valid.php" method="post">
        <div class="form-group">
          <input class= "form-control form-control-lg" type="text" name="textfield" placeholder="Enter your task"  >

        </div>
        <div class="form-group">
<select name="catfield" class="form-control form-control-lg">
<?php
$cat_show_query = "SELECT * FROM category_table";
$result2 = $dbcon -> query($cat_show_query);
foreach ($result2 as $row2) {
  echo '<option value="'.$row2["id_category"].'">'.$row2["name_category"].' </option>';
}
?>
</select>

        </div>
        <div class="">
          <input class="btn btn-info btn-block" type="submit" name="addtask" value="Add Task">

        </div>
      </form>
    </div>
  </div>
<!-- ===================== show delete alert message ============= -->
<?php 
  if(isset($_SESSION['delete_success'])) { ?>

<div class="alert alert-success text-dark  mx-auto mt-4" role="alert" style="width:66%;">
  <?=$_SESSION['delete_success'];?>
</div>



<?php
  unset($_SESSION['delete_success']);

}

?>

<!-- ========================== update alert message ==================== -->

<?php 
  if(isset($_SESSION['upadate_success'])) { ?>

<div class="alert alert-success text-dark  mx-auto mt-4" role="alert" style="width:66%;">
  <?=$_SESSION['upadate_success'];?>
</div>



<?php
  unset($_SESSION['upadate_success']);

}

?>

<!-- =================================== table =========================== -->

<table style="width:66%;" class=" table table-sm table-borderless table-striped text-center mx-auto mt-3 " > 
  <tr>
  <?php
$category_show_query = "SELECT * FROM category_table ";
$result3 = $dbcon -> query($category_show_query);
foreach ($result3 as $row3) {
$idd=$row3["id_category"];
$task_show_query = "SELECT * FROM task_table where id_category ='$idd' and checked=0";
$result = $dbcon -> query($task_show_query);
if($result->num_rows!=0){
    foreach ($result as $row) {
      $idtask= $row['id'];
      echo'<thead class="bg-dark text-white text-center">
      <th>'.$row3["name_category"].'</th>
    
    </tr>
  </thead>';
  
  if($row["checked"]=='1'){
    $roww=$row['task_name'];
    echo '<tr>
    <td>  <div>
    <form action="uncheck.php" method="post" >
    <button type="submit" name="chk" value="'.$row["id"].'">  Uncheck
  </button>
    </form>
  </div> </td>
    <td> <s>'.$roww.'</s></td>
    <td>
    <div class="btn-group">
      <a class="btn btn-sm" href="update.php?id='.base64_encode($row['id']).'"><i class="fas fa-edit text-info"></i></a>
      <a class="btn btn-sm" href="delete.php?id='.base64_encode($row['id']).'"><i class="far fa-trash-alt text-info"></i></a>
      </div>
    </td>
  </tr>';
  
  }
  else {
  echo'<tr>
    <td>  <div>
    <form action="check.php" method="post" >
    <button type="submit" name="uchk" value="'.$row["id"].'">   Check
  </button>
    </form></div></td>
    <td>'.$row["task_name"].'</td>
    <td>
    <div class="btn-group">
      <a class="btn btn-sm" href="update.php?id='.base64_encode($row['id']).'"><i class="fas fa-edit text-info"></i></a>
      <a class="btn btn-sm" href="delete.php?id='.base64_encode($row['id']).'"><i class="far fa-trash-alt text-info"></i></a>
      </div>
    </td>
  </tr>';
    }
  }
  }
  }?>
  
  
</table>

</div>


     <!-- </div>
  </div> -->

<!-- </div> -->




  </body>
</html>
