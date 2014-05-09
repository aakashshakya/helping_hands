<form action="" method="post">
<table class="table table-striped">
  <tr>
    <th><input type="checkbox" name="checkbox2" id="checkbox2" /></th>
    <th>Id</th>
    <th>User</th>
    <th>Amount</th>
    <th>Account Information</th>
    <th>Transaction</th>
    <th>Action</th>
  </tr>
 <?php foreach($donations as $donation){?>
  <tr>
    <td><input type="checkbox" name="checkbox" id="checkbox" />
      <label for="checkbox"></label></td>
    <td><?php echo $donation['donation_id']?></td>
    <td><?php echo $donation['user_name']?></td>
    <td><?php echo $donation['amount']?></td>
    <td><?php echo $donation['account_info']?></td>
    <td><?php echo $donation['transaction_image']?></td>
    <td><a href="<?php echo site_url('donations/admin/donations/edit/'.$donation['donation_id'])?>" class="btn btn-info"><span class="glyphicon glyphicon-pencil"></span> Edit</a> <a href="javascript:void(0)" class="btn btn-danger" onclick="return donation.delete('<?php echo $donation['donation_id']?>')"><span class="glyphicon glyphicon-trash"></span> Delete</a></td>
  </tr>
  <?php }?>
</table>

</form>