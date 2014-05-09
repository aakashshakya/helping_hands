<body>
<h2><span class="label label-primary">Edit <?php echo $event['event_name']?></span></h2>
<form action="<?php echo site_url('events/admin/events/save')?>" method="post" class="navbar-form navbar-left">
<div class="form-group">
<table class="table">
  <tr>
    <td class="navbar-brand">Event Name</td>
    <td><label for="event_name"></label>
    
      <input type="text" name="event_name" id="event_name" class="form-control" value="<?php echo $event['event_name']?>" required autofocus></td>
  </tr>
  <tr>
    <td class="navbar-brand">Description:</td>
    <td><label for="event_description"></label>
      <textarea name="event_description" id="event_description" cols="45" rows="5" class="form-control" required><?php echo $event['event_description']?></textarea></td>
  </tr>
  <tr>
  <td class="navbar-brand">Venue:</td>
  <td><select name="venue_id" id="venue_id" >
    <?php
	foreach($venues as $venue){
    ?>
    <option value="<?php echo $venue['venue_id'];?>" id="<?php echo $venue['venue_id'];?>" name="<?php echo $venue['venue_id'];?>"><?php echo $venue['venue_name'];?></option>
    <?php
	}
	?></select></td>
  </tr>
  <tr>
    <td class="navbar-brand">Start Date</td>
    <td><label for="event_name"></label>
    
      <input type="text" name="event_name" id="event_name" class="form-control" value="<?php echo $event['start_date']?>" required autofocus></td>
  </tr>
  <tr>
    <td class="navbar-brand">End Date</td>
    <td><label for="event_name"></label>
    
      <input type="text" name="event_name" id="event_name" class="form-control" value="<?php echo $event['end_date']?>" required autofocus></td>
  </tr>
  <tr>
    <td class="navbar-brand">Status:</td>
    <td><input type="radio" name="status" id="status1" value="1" class="form-control"/>ON
        <input type="radio" name="status" id="status0" value="0" class="form-control"/>OFF
      <label for="status"></label></td>
  </tr>
  <input type="hidden" id="event_id" name="event_id" value="<?php echo $event['event_id'];?>"/>
  <tr>
    <td class="navbar-brand">&nbsp;</td>
    <td><input type="submit" name="submit" id="submit" value="Submit" /> 
    <input type="button" name="notify" id="notify" value="Submit and Notify"/>
      <a href="<?php echo site_url('events/admin/events')?>">Cancel</a></td>
  </tr>
</table>
</div>
</form>
</body>
</html>
