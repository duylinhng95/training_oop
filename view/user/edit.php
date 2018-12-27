<form action="?controller=user&action=update" method="post">
	<input type="hidden" name="id" value="<?php echo $user['id']?>">
	<label>User's Name</label>
	<input type="text" name="name" value="<?php echo $user['name']?>">
	<label>User's Phone</label>
	<input type="number" name="phone" value="<?php echo $user['phone']?>">
	<button type="submit">Submit Form</button>
</form>