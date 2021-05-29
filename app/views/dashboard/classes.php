<?php require APPROOT . '/views/inc/header.php';?>
<table class="table">
<h2 class="text-center">Hello <?php echo $_SESSION['user_first_name'] . ' ' . $_SESSION['user_last_name']?> </h2>

<div class="row">
    <div class="col-md-6 mx-auto">
        <div class="card card-body bg-light mt-5">
            <form action="<?php echo URLROOT; ?>/classes/save" method="post">
                <div class="form-group">
                    <label for="group_name">Group: </label>
                    <select name="group_name" id="group_name" class="form-select">
                        <?php foreach($this->classeModel->getGroups() as $group): ?>
                        <option value="<?php echo $group->id ?>"><?php echo $group->name ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="room_name">Room: </label>
                    <select name="room_name" id="room_name" class="form-select">
                    <?php foreach($this->classeModel->getRooms() as $room): ?>
                        <option value="<?php echo $room->id ?>"><?php echo $room->name ?></option>
                    <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="class_date">Date: </label>
                    <input type="date" name="class_date" id="class_date" class="form-control form-control-lg" value="">
                </div>
                <div class="form-group">
                    <label for="class_hour_begin">From: </label>
                    <input type="time" name="class_hour_begin" id="class_hour_begin" class="form-control form-control-lg" value="">
                </div>
                <div class="form-group">
                    <label for="class_hour_end">To: </label>
                    <input type="time" name="class_hour_end" id="class_hour_end" class="form-control form-control-lg" value="">
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

<thead>
    <tr>
        <th scope="col">Group</th>
        <th scope="col">Room</th>
        <th scope="col">Date</th>
        <th scope="col">From</th>
        <th scope="col">To</th>
        <th scope="col">Action</th>
    </tr>
</thead>
<tbody>
    <?php if(isset($data)):?>
    <?php foreach($data as $row):?>
    <tr>
        <td><?php echo $row->group_name ?></td>
        <td><?php echo $row->room_name ?></td>
        <td><?php echo $row->class_date ?></td>
        <td><?php echo $row->class_hour_begin ?></td>
        <td><?php echo $row->class_hour_end ?></td>
        <td>
            <a href="<?php echo URLROOT; ?>/classes/delete/<?php echo $row->id_class ?>" class="btn btn-block btn-danger">Cancel</a>
        </td>
    </tr>
    <?php endforeach; ?>
    <?php endif; ?>
</tbody>
</table>
<?php require APPROOT . '/views/inc/footer.php';?>