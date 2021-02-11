<div class="container" style="margin-top: 30px;" >
<h3>User Management</h3>
<table class="table table-hover">
<thead>
<th scope='col'>#</th>
<th scope='col'>Firstname</th>
<th scope='col'>Email</th>
<th scope='col'>Type</th>
<th scope='col'>Action</th>
</thead>
<tbody>
<?php 
require_once "server/adminconnection/adconnect.php";
$QUERY = "
    select id,firstname,email,usertype from users
";
if($result = $pdo->query($QUERY)){
    if($result->rowCount() > 0){
        while($row = $result->fetch()){

?>
<tr>
<th scope="row"><?php echo $row['id']; ?></th>
<th ><?php echo $row['firstname']; ?></th>
<th ><?php echo $row['email']; ?></th>
<th><?php 
if($row['usertype'] == 1){
    echo "<span class='badge bg-success'>Administrator</span>";
} else if($row['usertype'] == 2){
    echo "<span class='badge bg-primary'>Supervisor</span>";
}
else if($row['usertype'] == 0){
    echo "<span class='badge bg-info'>Customer</span>";
}
?></th>
<th >
<button type="button" class="btn btn-success btn-sm" onclick="onsetadmin(<?php echo $row['id']; ?>)">Set as Admin</button>&nbsp;
<button type="button" class="btn btn-primary btn-sm" onclick="onsetsupervisor(<?php echo $row['id']; ?>)">Set as Supervisor</button>&nbsp;
<button type="button" class="btn btn-info btn-sm" onclick="onsetcustomer(<?php echo $row['id']; ?>)">Set as Customer</button>&nbsp;
<button type="button" class="btn btn-danger btn-sm" onclick="onremoveuser(<?php echo $row['id']; ?>)">Remove</button>
</th>
</tr>
<?php 
   }
}
}
?>
</tbody>
</table>

</div>