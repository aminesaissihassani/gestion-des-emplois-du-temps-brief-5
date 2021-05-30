<?php require APPROOT . '/views/inc/header.php';?>
<h2 class="text-center">Hello <?php echo $_SESSION['user_first_name'] . ' ' . $_SESSION['user_last_name']?> </h2>

<div class="row">
    <div class="col-md-6 mx-auto">
        <div class="card card-body bg-light mt-5">
            <form action="<?php echo URLROOT; ?>/dashboard/saveRooms" method="post">
                <div class="form-group">
                    <label for="name">Group Name: </label>
                    <input type="text" name="name" id="name" class="form-control form-control-lg">
                </div>

                <div class="row align-items-center">
                    <div class="col">
                        <input type="submit" value="Add" class="btn btn-success btn-block">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<form id="edit-form" action="<?php echo URLROOT; ?>/dashboard/editRooms" method="post"></form>
<table class="table">
<thead>
    <tr>
        <th scope="col">Name</th>
        <th scope="col">Actions</th>
    </tr>
</thead>
<tbody>
    <?php if(isset($data)):?>
    <?php foreach($data as $row):?>
    <tr>
        <td id="name-<?php echo $row->id ?>"><?php echo $row->name ?></td>
        <td id="edit-id-<?php echo $row->id ?>" style="display:none"><input type="text" name="id" value="<?php echo $row->id ?>"></td>
        <td id="edit-name-<?php echo $row->id ?>" style="display:none"><input type="text" name="name-<?php echo $row->id ?>" value="<?php echo $row->name ?>"></td>
        <td id="action-<?php echo $row->id ?>">
            <a id="edit-button-<?php echo $row->id ?>" onclick="editRooms('<?php echo $row->id ?>')" class="btn btn-block btn-warning">Edit</a>
            <a id="delete-button-<?php echo $row->id ?>" href="<?php echo URLROOT; ?>/dashboard/deleteRooms/<?php echo $row->id ?>" class="btn btn-block btn-danger">Delete</a>
            <input id="update-button-<?php echo $row->id ?>" type="submit" value="Update" class="btn btn-block btn-success" style="display:none">
            <a id="cancel-button-<?php echo $row->id ?>" onclick="cancelEditRooms('<?php echo $row->id ?>')" class="btn btn-block btn-danger" style="display:none">Cancel</a>
        </td>
    </tr>
    <?php endforeach; ?>
    <?php endif; ?>
    
</tbody>
</table>
<?php require APPROOT . '/views/inc/footer.php';?>