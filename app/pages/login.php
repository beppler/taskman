<?php

$users = [
    'carlos' => '$2y$10$V5eZWuKbZ7VJa2MbKjrZs.frpXLKzXHTjW4oDkPuiYUn118Y5LwKu' # beppler
];

$username = '';
$password = '';

$formErrors = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') { 

    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';
    
    if ($username == '') {
        $formErrors['username'] = 'Please provide an user name';
    }

    if (empty($formErrors)) {
        if (isset($users[$username])) {
            $passwordHash = $users[$username];
            if (isset($passwordHash) && password_verify($password, $passwordHash)) {
                $_SESSION['authenticated_user'] = $username;
                $_SESSION['message'] = 'User ' . $username .' is authenticated.';
                header('Location: ' . BASE_URL . 'tasks');
                exit;
            }
        }
        $formErrors['password'] = 'Invalid username or password';
    }
}

$title = 'Login'; 
require(__DIR__ . '/_header.php');
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
                <label for="username" class="<?php echo isset($formErrors['username']) ? 'text-danger' : '' ?>">Username:</label>
                <input type="text" name="username" id="username" autofocus class="form-control <?php echo isset($formErrors['username']) ? 'is-invalid' : '' ?>" value="<?php echo htmlspecialchars($username, ENT_QUOTES) ?>">
                <div class="invalid-feedback"><?php echo $formErrors['username'] ?? ''?></div>
            </div>
            <div class="form-group">
                <label for="password" class="<?php echo isset($formErrors['password']) ? 'text-danger' : '' ?>">Password:</label>
                <input type="password" name="password" id="password" class="form-control <?php echo isset($formErrors['password']) ? 'is-invalid' : '' ?>" value="<?php echo htmlspecialchars($password, ENT_QUOTES) ?>">
                <div class="invalid-feedback"><?php echo $formErrors['password'] ?? ''?></div>
            </div>
            <div class="form-group text-center">
                <button class="btn btn-primary" type="submit">Submit</button>
            </div>
        </form>
    </div>
</div>

<?php require(__DIR__ . '/_footer.php'); ?>
