<?php require APPROOT . '/views/inc/header.php';?>
<div class="container text-center">
    <?php if (isset($_SESSION['user_id'])): ?>
    <h2 class="text-center">Welcome <?php echo $_SESSION['user_first_name'] . ' ' . $_SESSION['user_last_name'] ?></h2>
    <?php else: ?>
    <h1><?php echo $data['title']; ?></h1>
    <p><?php echo $data['description']; ?></p>
    <?php endif; ?>
</div>
<?php require APPROOT . '/views/inc/footer.php';?>
