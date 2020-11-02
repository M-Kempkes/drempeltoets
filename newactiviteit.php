<?php
    include './Partials/head.php';
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $statement = 'INSERT INTO activiteiten (omschrijving) VALUES (:description)';
        $DB->insert($statement, [
            'description' => $_POST['description']
        ]);
        header('Location: http://localhost/drempeltoets/');
    }

?>

<form method="post">
    <h1>Activiteit toevoegen</h1>
    <div class="form-group">
        <label for="description">Omschrijving: </label>
        <input type="text" class="form-control" name="description" required>
    </div>
    <button type="submit" class="btn btn-primary mb-2">Voeg toe</button>
</form>  

<?php include './Partials/footer.php';?>
