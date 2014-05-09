<body>
<h2><span class="label label-primary">Add Materials</span></h2>
<form action="<?php echo site_url('materials/admin/materials/save');?>" method="post" class="navbar-form navbar-left">
<div class="form-group">
<table class="table">
  <tr>
    <td class="navbar-brand">Material Name</td>
    <td><label for="material_name"></label>
    
      <input type="text" name="material_name" id="material_name" class="form-control" required autofocus></td>
  </tr>
   <tr>
    <td class="navbar-brand">Material Quantity</td>
    <td><label for="description">
      <input type="text" name="material_quantity" id="material_quantity" class="form-control" required autofocus>
    </label></td>
  </tr>
   <tr>
  <td class="navbar-brand">Type</td>
  <td><select name="type_id" id="type_id" >
    <?php
	foreach($types as $type){
    ?>
    <option value="<?php echo $type['type_id'];?>" id="<?php echo $type['type_id'];?>" name="<?php echo $type['type_id'];?>"><?php echo $type['type_name'];?></option>
    <?php
	}
	?></select><h3><a href="<?php echo site_url('admin/types/add')?>"><span class="label label-primary">Add Types</span></a></h3></td>
  </tr>
  <tr>
    <td class="navbar-brand">Description:</td>
    <td><label for="description"></label>
      <textarea name="description" id="description" cols="45" rows="5" class="form-control" required></textarea></td>
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
      <a href="<?php echo site_url('materials/admin/materials')?>">Cancel</a></td>
  </tr>
 
</table>
</div>
</form>