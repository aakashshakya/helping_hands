<body>
<h2><span class="label label-primary">Edit <?php echo $contact['contact_number']?></span></h2>
<form action="<?php echo site_url('contact/admin/contacts/save')?>" method="post" class="navbar-form navbar-left">
<div class="form-group">
<table class="table">
  <tr>
    <td class="navbar-brand">Contact Number</td>
    <td><label for="contact_number"></label>
    
      <input type="text" name="contact_number" id="contact_number" class="form-control" value="<?php echo $contact['contact_number']?>" required autofocus></td>
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
	?></select></td>
  </tr>
  <input type="hidden" id="contact_id" name="contact_id" value="<?php echo $contact['contact_id'];?>"/>
  <tr>
    <td class="navbar-brand">&nbsp;</td>
    <td><input type="submit" name="submit" id="submit" value="Submit" /> 
    <input type="button" name="notify" id="notify" value="Submit and Notify"/>
      <a href="<?php echo site_url('contact/admin/contacts')?>">Cancel</a></td>
  </tr>
</table>
</div>
</form>
</body>
</html>
