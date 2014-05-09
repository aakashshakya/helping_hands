<body>
<h2><span class="label label-primary">Edit <?php echo $beneficial['beneficial_name']?></span></h2>
<form action="<?php echo site_url('admin/beneficials/save')?>" method="post" class="navbar-form navbar-left">
<div class="form-group">
<table class="table">
  <tr>
    <td class="navbar-brand">Beneficial Name</td>
    <td><label for="beneficial_name"></label>
    
      <input type="text" name="beneficial_name" id="beneficial_name" class="form-control" value="<?php echo $beneficial['beneficial_name']?>" required autofocus></td>
  </tr>
   <tr>
    <td class="navbar-brand">Beneficial Address</td>
    <td><label for="beneficial_address"></label>
    
      <input type="text" name="beneficial_address" id="beneficial_address" class="form-control" value="<?php echo $beneficial['beneficial_address']?>" required/></td>
  </tr>
  <tr>
  <td class="navbar-brand">Event:</td>
  <td><select name="event_id" id="event_id" >
    <?php
	foreach($events as $event){
    ?>
    <option value="<?php echo $event['event_id'];?>" id="<?php echo $event['event_id'];?>" name="<?php echo $event['event_id'];?>"><?php echo $event['event_name'];?></option>
    <?php
	}
	?></select><a href="<?php echo site_url('events/admin/events/add')?>" target="_blank">Add Event</a></td>
  </tr>
  <tr>
    <td class="navbar-brand">Status:</td>
    <td><input type="radio" name="status" id="status1" value="1" class="form-control"/>ON
        <input type="radio" name="status" id="status0" value="0" class="form-control"/>OFF
      <label for="status"></label></td>
  </tr>
  <input type="hidden" id="beneficial_id" name="beneficial_id" value="<?php echo $beneficial['beneficial_id'];?>"/>
  <tr>
    <td class="navbar-brand">&nbsp;</td>
    <td><input type="submit" name="submit" id="submit" value="Submit" /> 
    <input type="button" name="notify" id="notify" value="Submit and Notify"/>
      <a href="<?php echo site_url('admin/beneficials')?>">Cancel</a></td>
  </tr>
</table>
</div>
</form>
</body>
</html>
