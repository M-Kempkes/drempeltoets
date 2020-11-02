<?php
    include './Partials/head.php';
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $statement = 'INSERT INTO jongeren (firstname, lastname, NAW) VALUES (:firstname, :lastname, :naw)';
        $DB->insert($statement, [
            'firstname' => $_POST['firstname'],
            'lastname' => $_POST['lastname'],
            'naw' => $_POST['naw']
        ]);
        header('Location: http://localhost/drempeltoets/');
    }
?>
<form method="post">
    <h1>Jongeren toevoegen</h1>
    <div class="form-group">
        <label for="firstname">Voornaam: </label>
        <input type="text" class="form-control" name="firstname" required>
    </div>
    <div class="form-group">
        <label for="lastname">Achternaam: </label>
        <input type="text" class="form-control" name="lastname" required>
    </div>
    <div class="form-group">
        <label for="naw">NAW: </label>
        <input type="text" class="form-control" name="naw" required>
    </div>
    <button type="submit" class="btn btn-primary mb-2">Voeg toe</button>
</form>  

<?php include './Partials/footer.php';?>
