<body>
<h2><span class="label label-primary">Add Donation</span></h2>
<form action="<?php echo site_url('donations/admin/donations/save');?>" method="post" class="navbar-form navbar-left">
<div class="form-group">
<table class="table">
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
    <td class="navbar-brand">Amount</td>
    <td><label for="amount"></label>
    
      <input type="text" name="amount" id="amount" class="form-control" required autofocus></td>
  </tr>
  <tr>
    <td class="navbar-brand">Account Information</td>
    <td><label for="account_info"></label>
    
      <input type="text" name="account_info" id="account_info" class="form-control" required /></td>
  </tr>
   <tr>
  <td class="navbar-brand">Transaction:</td>
  <td><select name="transaction_id" id="transaction_id" >
    <?php
	foreach($transactions as $transaction){
    ?>
    <option value="<?php echo $transaction['transaction_id'];?>" id="<?php echo $transaction['transaction_id'];?>" name="<?php echo $transaction['transaction_id'];?>"><?php echo $transaction['transaction_image'];?></option>
    <?php
	}
	?></select><h3><a href="<?php echo site_url('transaction/admin/transactions/add')?>"><span class="label label-primary">Add Transactions</span></a></h3></td>
  </tr>
  <tr>
    <td class="navbar-brand">&nbsp;</td>
    <td><input type="submit" name="submit" id="submit" value="Submit" /> 
    <input type="button" name="notify" id="notify" value="Submit and Notify"/>
      <a href="<?php echo site_url('donations/admin/donations')?>">Cancel</a></td>
  </tr>
 
</table>
</div>
</form>