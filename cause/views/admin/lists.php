<form action="" method="post">
<table class="table table-striped">
  <tr>
    <th><input type="checkbox" name="checkbox2" id="checkbox2" /></th>
    <th>Id</th>
    <th>Cause Name</th>
    <th>Created Date</th>
    <th>Beneficial</th>
    <th>Status</th>
    <th>Action</th>
  </tr>
 <?php foreach($causes as $cause){?>
  <tr>
    <td><input type="checkbox" name="checkbox" id="checkbox" />
      <label for="checkbox"></label></td>
    <td><?php echo $cause['cause_id']?></td>
    <td><?php echo $cause['cause_name']?></td>
    <td><?php echo $cause['created_date']?></td>
    <td><?php echo $cause['beneficial_name']?></td>
    <td><?php echo $cause['status']?></td>
     <td><a href="javascript:void(0)" class="btn btn-info" onclick="cause.edit('<?php echo $cause['cause_id']?>')"><span class="glyphicon glyphicon-pencil"></span> Edit</a> <a href="javascript:void(0)<?php //echo site_url('admin/beneficials/remove/'.$beneficial['beneficial_id'])?>" class="btn btn-danger" onclick="return cause.delete('<?php echo $cause['cause_id']?>')"><span class="glyphicon glyphicon-trash"></span> Delete</a></td>
  </tr>
  <?php }?>
</table>

</form>