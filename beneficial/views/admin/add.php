<body>
<h2><span class="label label-primary">Add Beneficial</span></h2>
<form action="<?php echo site_url('beneficial/admin/beneficials/save');?>" method="post" class="navbar-form navbar-left">
<div class="form-group">
<table class="table">
  <tr>
    <td class="navbar-brand">Beneficial Name</td>
    <td><label for="beneficial_name"></label>
    
      <input type="text" name="beneficial_name" id="beneficial_name" class="form-control" required autofocus></td>
  </tr>
  <tr>
    <td class="navbar-brand">Beneficial Address:</td>
    <td><label for="beneficial_address"></label>
      <input type="text" name="beneficial_address" id="beneficial_address" cols="45" rows="5" class="form-control" required></td>
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
	?></select>
    <a href="javascript:void(0)" onclick="beneficial.reloadEvent()">Refresh</a> <a href="<?php echo site_url('events/admin/events/add')?>" target="_blank">Add Event</a></td></td>
  </tr>
  <tr>
    <td class="navbar-brand">Status:</td>
    <td><input type="radio" name="status" id="status1" value="1" class="form-control"/> 
    ON
        <input type="radio" name="status" id="status0" value="0" class="form-control"/>OFF
      <label for="status"></label></td>
  </tr>
  <tr>
    <td class="navbar-brand">&nbsp;</td>
    <td><input type="submit" name="submit" id="submit" value="Submit" /> 
    <input type="button" name="notify" id="notify" value="Submit and Notify"/>
      <a href="<?php echo site_url('beneficial/admin/beneficials')?>">Cancel</a></td>
  </tr>
 
</table>
</div>
</form>
<script>
var beneficial={
	reloadEvent:function()
			{
				$obj = $('#event_id');
				$obj.html('<option value="">Select Event</option>');
				$.getJSON('<?php echo site_url('events/admin/events/json')?>',null,function(data){
					$.each(data.events,function(i,o){
						$obj.append('<option value="'+o.event_id+'">'+o.event_name+'</option>');
					});
				});				
			}
			
	};
</script>