<form action="" method="post">
<table class="table table-striped">
  <tr>
    <th><input type="checkbox" name="checkbox2" id="checkbox2" /></th>
    <th>Id</th>
    <th>User Name</th>
    <th>Transaction Image</th>
    <th>Action</th>
  </tr>
 <?php foreach($transactions as $transaction){?>
  <tr>
    <td><input type="checkbox" name="checkbox" id="checkbox" />
      <label for="checkbox"></label></td>
    <td><?php echo $transaction['transaction_id']?></td>
    <td><?php echo $transaction['user_name']?></td>
    <td><?php echo $transaction['transaction_image']?></td>
    <td><a href="javascript:void(0)" class="btn btn-info" onclick="transaction.edit('<?php echo $transaction['transaction_id']?>')"><span class="glyphicon glyphicon-pencil"></span> Edit</a> <a href="javascript:void(0)<?php //echo site_url('admin/transaction/remove/'.$transaction['transaction_id'])?>" class="btn btn-danger" onclick="return transaction.delete('<?php echo $transaction['transaction_id']?>')"><span class="glyphicon glyphicon-trash"></span> Delete</a></td>
  </tr>
  <?php }?>
</table>

</form>