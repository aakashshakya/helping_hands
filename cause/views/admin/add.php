<body>
<h2><span class="label label-primary">Add Cause</span></h2>
<form action="<?php echo site_url('cause/admin/causes/save');?>" method="post" class="navbar-form navbar-left">
<div class="form-group">
<table class="table">
  <tr>
    <td class="navbar-brand">Cause Name</td>
    <td><label for="cause_name"></label>
    
      <input type="text" name="cause_name" id="cause_name" class="form-control" required autofocus></td>
  </tr>
   <tr>
    <td class="navbar-brand">Description:</td>
    <td><label for="cause_description"></label>
      <textarea name="cause_description" id="cause_description" cols="45" rows="5" class="form-control" required></textarea></td>
  </tr>
   <tr>
  <td class="navbar-brand">Beneficial:</td>
  <td><select name="beneficial_id" id="beneficial_id" >
    <?php
	foreach($beneficials as $beneficial){
    ?>
    <option value="<?php echo $beneficial['beneficial_id'];?>" id="<?php echo $beneficial['beneficial_id'];?>" name="<?php echo $beneficial['beneficial_id'];?>"><?php echo $beneficial['beneficial_name'];?></option>
    <?php
	}
	?></select> <a href="<?php echo site_url('beneficial/admin/beneficials/add')?>">Add Beneficial</a></td>
  </tr>
  <tr>
    <td class="navbar-brand">Status:</td>
    <td><input type="radio" name="status" id="status1" value="1" class="form-control"/>ON
        <input type="radio" name="status" id="status0" value="0" class="form-control"/>OFF
      <label for="status"></label></td>
  </tr>
  <tr>
    <td class="navbar-brand">&nbsp;</td>
    <td><input type="submit" name="submit" id="submit" value="Submit" /> 
    <input type="button" name="notify" id="notify" value="Submit and Notify"/>
      <a href="<?php echo site_url('cause/admin/causes')?>">Cancel</a></td>
  </tr>
 
</table>
</div>
</form>