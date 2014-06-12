<option>&mdash;&nbsp;&nbsp;Select a town&nbsp;&nbsp;&mdash;</option>
<?php foreach($data['towns'] as $town) : ?>
	<option value="<?php echo $town['id']; ?>"><?php echo $town['name']; ?></option>
<?php endforeach; ?>