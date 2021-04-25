<?php if (isset($_SESSION['message'])) { ?>
<div class="alert alert-info alert-dismissible fade show" role="alert">
    <?php echo htmlspecialchars($_SESSION['message'], ENT_QUOTES); ?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<?php } ?>
<?php
unset($_SESSION['message']);