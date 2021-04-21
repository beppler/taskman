<?php $title = $title ?? 'Task Manager' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo htmlspecialchars($title, ENT_QUOTES) ?></title>
    <base href="<?php echo BASE_URL ?>" >
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>
<body>
    <?php require __DIR__ . '/_flash_message.php'; ?>
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg bg-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/tasks">Tasks</a>
                </li>
                <?php if (isset($_SESSION['authenticated_user'])) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="/logout">Log out (<?php echo $_SESSION['authenticated_user']; ?>)</a>
                    </li>
                <?php } else { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="/login">Log in</a>
                    </li>
                <?php } ?>
            </ul>
        </nav>