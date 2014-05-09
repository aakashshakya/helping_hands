<form action="" method="post">
<table class="table table-striped">
  <tr>
    <th><input type="checkbox" name="checkbox2" id="checkbox2" /></th>
    <th>Id</th>
    <th>Beneficial Name</th>
    <th>Address</th>
    <th>Event</th>
    <th>Status</th>
    <th>Action</th>
  </tr>
 <?php foreach($beneficials as $beneficial){?>
  <tr>
  
    <td><input type="checkbox" name="checkbox" id="checkbox" />
      <label for="checkbox"></label></td>
    <td><?php echo $beneficial['beneficial_id']?></td>
    <td><?php echo $beneficial['beneficial_name']?></td>
    <td><?php echo $beneficial['beneficial_address']?></td>
    <td><?php echo $beneficial['event_name']?></td>
    <td><?php echo $beneficial['status']?></td>
     <td><a href="javascript:void(0)" class="btn btn-info" onclick="beneficial.edit('<?php echo $beneficial['beneficial_id']?>')"><span class="glyphicon glyphicon-pencil"></span> Edit</a> <a href="javascript:void(0)<?php //echo site_url('admin/beneficials/remove/'.$beneficial['beneficial_id'])?>" class="btn btn-danger" onclick="return beneficial.delete('<?php echo $beneficial['beneficial_id']?>')"><span class="glyphicon glyphicon-trash"></span> Delete</a></td>
  </tr>
  <?php }?>
</table>

</form>