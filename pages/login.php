<?php

$users = [
    'carlos' => '$2y$10$V5eZWuKbZ7VJa2MbKjrZs.frpXLKzXHTjW4oDkPuiYUn118Y5LwKu' # beppler
];

$username = trim($_POST['username'] ?? '');

if ($_SERVER['REQUEST_METHOD'] != 'GET') { 
    if (isset($users[$username])) {
        $password = $_POST['password'] ?? '';
        $passwordHash = $users[$username];
        if (isset($passwordHash) && password_verify($password, $passwordHash)) {
            $_SESSION['authenticated_user'] = $username;
            header('Location: ' . BASE_URL . '/tasks');
            exit;
        }
    }
}

$title = 'Login'; 
require __DIR__ . '/_header.php';
?>

<div class="row align-items-center justify-content-center">
    <div class="col-4">
        <h1 class="text-center">Login</h1>
    </div>
</div>
<div class="row align-items-center justify-content-center">
    <div class="col-4">
        <form method="post">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" name="username" id="username" class="form-control" value="<?php echo htmlspecialchars($username, ENT_QUOTES) ?>">
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" class="form-control">
            </div>
        <?php if ($_SERVER['REQUEST_METHOD'] != 'GET') { ?>
            <div>
                <p class="text-center text-danger">Invalid username or password.</p>
            </div>
        <?php } ?>
            <div class="form-group text-center">
                <button class="btn btn-primary" type="submit">Submit</button>
            </div>
        </form>
    </div>
</div>

<?php require __DIR__ . '/_footer.php'; ?>
