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
include(__DIR__ . '/_header.php'); 
?>

<h1>Login</h1>

<form method="post">
    <div>
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" value="<?php echo htmlspecialchars($username, ENT_QUOTES) ?>">
    </div>
    <div>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password">
    </div>
<?php if ($_SERVER['REQUEST_METHOD'] != 'GET') { ?>
    <div>
        <span>Invalid username or password.</span>
    </div>
<?php } ?>
    <div>
        <button type="submit">Submit</button>
    </div>
</form>

<?php include(__DIR__ . '/_footer.php'); ?>
