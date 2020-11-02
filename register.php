<?php
    include './Partials/head.php';
    $error = '';
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if($_POST['password']=== $_POST['checkPass']){
            $hashed_pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $query = 'INSERT INTO medewerker (firstname, lastname, username, password) VALUES (:firstname, :lastname, :username, :password)';
            $DB->insert($query, [
                'firstname' => $_POST['firstname'],
                'lastname' => $_POST['lastname'],
                'username' => $_POST['username'],
                'password' => $hashed_pass
            ]);
        header('Location: http://localhost/drempeltoets/login.php');
        }
        else{
            $error = 'Passwords did not match. <br>';
        }
    }
?>
<form method="post">
    <?=$error?><br>
    <b>REGISTER</b><br>
    <div class="form-group">
        <label for="username">Username: </label>
        <input type="text" class="form-control" name="username" required><br>
    </div>
    <div class="form-group">
        <label for="firstname">Voornaam: </label>
        <input type="text" class="form-control" name="firstname" required><br>
    </div>
    <div class="form-group">
        <label for="lastname">Achternaam: </label>
        <input type="text" class="form-control" name="lastname" required><br>
    </div>
    <div class="form-group">
        <label for="password">Wachtwoord: </label>
        <input type="password" class="form-control" name="password" required><br>
    </div>
    <div class="form-group">
        <label for="checkPass">Herhaal wachtwoord: </label>
        <input type="password" class="form-control" name="checkPass" required><br>
    </div>
    <button type="submit" class="btn btn-primary mb-2">Register</button>
</form>  

<?php include './Partials/footer.php';?>
