<?php require APPROOT . '/views/inc/header.php';?>
<div class="row">
    <div class="col-md-6 mx-auto">
        <div class="card card-body bg-light mt-5">
            <h2>Setup your profile</h2>
            <p>Select A Subject</p>
            <form action="<?php echo URLROOT; ?>/teachers/save" method="post">
                <div class="form-group">
                    <label for="subject">Subject: <sup>*</sup></label>
                    <select name="subject" id="subject" class="form-select">
                        <?php foreach($data as $row): ?>
                        <option value="<?php echo $row->id ?>"><?php echo $row->name ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="row">
                    <div class="col">
                        <input type="submit" value="Save" class="btn btn-success btn-block">
                    </div>
                    <div class="col">
                        <a href="<?php echo URLROOT; ?>/users/logout" class="btn btn-danger btn-block">Logout</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php require APPROOT . '/views/inc/footer.php';?>
