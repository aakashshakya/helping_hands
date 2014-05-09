<h2>Contacts</h2>
<a href="<?php echo site_url('contact/admin/contacts/add')?>" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> 
Add Contact</a>

<form action="" method="post">
<table class="table table-striped">
  <tr>
    <th><input type="checkbox" name="checkbox2" id="checkbox2" /></th>
    <th>Id</th>
    <th>Contact Number</th>
    <th>Beneficial</th>
    <th>Action</th>
  </tr>
 <?php foreach($contacts as $contact){?>
  <tr>
    <td><input type="checkbox" name="checkbox" id="checkbox" />
      <label for="checkbox"></label></td>
    <td><?php echo $contact['contact_id']?></td>
    <td><?php echo $contact['contact_number']?></td>
    <td><?php echo $contact['beneficial_name']?></td>
    <td><a href="<?php echo site_url('contact/admin/contacts/edit/'.$contact['contact_id'])?>" class="btn btn-info"><span class="glyphicon glyphicon-pencil"></span> Edit</a> <a href="<?php echo site_url('contact/admin/contacts/remove/'.$contact['contact_id'])?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Delete</a></td>
  </tr>
  <?php }?>
</table>

</form>