<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3">
<div class="container">
    <a class="navbar-brand" href="<?php echo URLROOT; ?>"><?php echo SITENAME; ?></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav m-auto">
        <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/pages/about">About</a>
        </li>
        <?php if(isset($_SESSION['user_id'])): ?>
            <?php if($_SESSION['user_type'] == 1): ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo URLROOT; ?>/dashboard/classes">Classes</a>
                </li>
            <?php endif; ?>
            <?php if($_SESSION['user_type'] == 0): ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo URLROOT; ?>/dashboard/groups">Groups</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo URLROOT; ?>/dashboard/rooms">Rooms</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo URLROOT; ?>/dashboard/subjects">Subjects</a>
                </li>
            <?php endif; ?>
        <?php endif; ?>
        </ul>
        
        <ul class="navbar-nav m-auto">
        <?php if(isset($_SESSION['user_id'])): ?>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo URLROOT; ?>/users/logout">Logout</a>
            </li>
        <?php else: ?>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo URLROOT; ?>/users/register">Register</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo URLROOT; ?>/users/login">Login</a>
            </li>
        <?php endif; ?>
        </ul>
    </div>
</div>
</nav>