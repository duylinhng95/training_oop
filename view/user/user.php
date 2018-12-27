<?php 
if (isset($notice)){
    echo "Success";
}
?>
<table>
    <th>ID</th>
    <th>Name</th>
    <th>Phone</th>
    <th>Action</th>
    <?php foreach($users as $user) {?>
    <tr>
        <td><?php echo $user->id?></td>
        <td><?php echo $user->name?></td>
        <td><?php echo $user->phone?></td>
        <td>
            <a href="/index.php?controller=user&action=edit&user=<?php echo $user->id?>">Edit</a>
            <a href="/index.php?controller=user&action=destroy&user=<?php echo $user->id?>">Delete</a>
        </td>
    </tr>
<?php } ?>
</table>
<a href="/index.php?controller=user&action=add">Add User</a>
<a href="/index.php">Back to homepage</a>