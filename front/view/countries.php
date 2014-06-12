<option>&mdash;&nbsp;&nbsp;Select a country&nbsp;&nbsp;&mdash;</option>
<?php foreach($data['countries'] as $country) : ?>
	<option value="<?php echo $country['id']; ?>"><?php echo $country['name']; ?> (<?php echo $country['code']; ?>)</option>
<?php endforeach; ?>