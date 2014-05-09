<form action="" method="post">
<table class="table table-striped">
  <tr>
    <th><input type="checkbox" name="checkbox2" id="checkbox2" /></th>
    <th>Id</th>
    <th>Type Name</th>
    <th>Status</th>
    <th>Action</th>
  </tr>
 <?php foreach($types as $type){?>
  <tr>
  
    <td><input type="checkbox" name="checkbox" id="checkbox" />
      <label for="checkbox"></label></td>
    <td><?php echo $type['type_id']?></td>
    <td><?php echo $type['type_name']?></td>
    <td><?php echo $type['status']?></td>
    <td><a href="javascript:void(0)" class="btn btn-info" onclick="t.edit('<?php echo $type['type_id']?>')"><span class="glyphicon glyphicon-pencil"></span> Edit</a> <a href="javascript:void(0)<?php //echo site_url('admin/alert/remove/'.$alert['alert_id'])?>" class="btn btn-danger" onclick="return t.delete('<?php echo $type['type_id']?>')"><span class="glyphicon glyphicon-trash"></span> Delete</a></td>
  </tr>
  <?php }?>
</table>

</form>