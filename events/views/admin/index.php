<h2>Events</h2>
<a href="<?php echo site_url('admin/events/add')?>" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> 
Add Event</a>

<form action="" method="post">
<table class="table table-striped">
  <tr>
    <th><input type="checkbox" name="checkbox2" id="checkbox2" /></th>
    <th>Id</th>
    <th>Event Name</th>
    <th>Event Description</th>
    <th>Venue</th>
    <th>Start Date</th>
    <th>End Date</th>
    <th>Status</th>
    <th>Action</th>
  </tr>
 <?php foreach($events as $event){?>
  <tr>
    <td><input type="checkbox" name="checkbox" id="checkbox" />
      <label for="checkbox"></label></td>
    <td><?php echo $event['event_id']?></td>
    <td><?php echo $event['event_name']?></td>
    <td><?php echo $event['event_description']?></td>
    <td><?php echo $event['venue_name']?></td>
    <td><?php echo $event['start_date']?></td>
    <td><?php echo $event['end_date']?></td>
    <td><?php echo $event['status']?></td>
    <td><a href="<?php echo site_url('admin/events/edit/'.$event['event_id'])?>" class="btn btn-info"><span class="glyphicon glyphicon-pencil"></span> Edit</a> <a href="<?php echo site_url('admin/events/remove/'.$event['event_id'])?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Delete</a></td>
  </tr>
  <?php }?>
</table>

</form>