<body>
<h2><span class="label label-primary">Edit <?php echo $transaction['transaction_image']?></span></h2>
<form action="<?php echo site_url('transaction/admin/transactions/save')?>" method="post" class="navbar-form navbar-left">
<div class="form-group">
<table class="table"> 
	<tr>
	<td class="navbar-brand">Transaction Image:</td>
    <td><input type="file" name="transaction_image" id="transaction_image" class="form-control" required autofocus></td> 
 <td><?php echo $transaction['transaction_image']?></td>
  </tr>
  <tr>
  <td class="navbar-brand">User:</td>
  <td><select name="user_id" id="user_id" >
    <?php
	foreach($users as $user){
    ?>
    <option value="<?php echo $user['user_id'];?>" id="<?php echo $user['user_id'];?>" name="<?php echo $user['user_id'];?>"><?php echo $user['user_name'];?></option>
    <?php
	}
	?></select></td>
  </tr>
  <tr>
    <td class="navbar-brand">Status:</td>
    <td><input type="radio" name="status" id="status1" value="1" class="form-control"/>ON
        <input type="radio" name="status" id="status0" value="0" class="form-control"/>OFF
      <label for="status"></label></td>
  </tr>
   <input type="hidden" id="transaction_id" name="transaction_id" value="<?php echo $transaction['transaction_id'];?>"/>
  <tr>
    <td class="navbar-brand">&nbsp;</td>
    <td><input type="submit" name="submit" id="submit" value="Submit" /> 
    <input type="button" name="notify" id="notify" value="Submit and Notify"/>
      <a href="<?php echo site_url('trasanction/admin/trasnactions')?>">Cancel</a></td>
  </tr>
</table>
</div>
</form>
</body>
</html>
