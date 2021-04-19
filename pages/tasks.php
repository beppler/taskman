<?php
if (!isset($_SESSION['authenticated_user'])) {
    header('Location: ' . BASE_URL . '/login');
    exit;
}

$title = 'Tasks'; 
include(__DIR__ . '/_header.php'); 
?>

<h1>Tasks</h1>

<?php include(__DIR__ . '/_footer.php'); ?>
