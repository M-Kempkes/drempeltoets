<?php
    include './Partials/head.php';
    $error = '';
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $DB->login($_POST['username'], $_POST['password']);
        header('Location: http://localhost/drempeltoets/');
    }

?>
<form method="post">
    <b>LOG IN</b><br>
    <div class="form-group">
        <label for="username">Username: </label>
        <input type="text" class="form-control" name="username" required>
    </div>
    <div class="form-group">
        <label for="password">Wachtwoord: </label>
        <input type="password" class="form-control" name="password" required><br>
    </div>
    <button type="submit" class="btn btn-primary mb-2">Log in</button>
</form>  
<a href="register.php">Geen account? registreer nu.</a><br>

<?php include './Partials/footer.php';?>

