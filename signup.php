<?php
    include './Partials/head.php';
    $jongeren = '<option value="" >Selecteer persoon</option>';
    $activiteiten = '<option value="" disabled selected>Selecteer activiteit</option>';
    
    foreach($DB->get('SELECT id, firstname, lastname FROM jongeren') as $jongere){
        $jongeren = $jongeren.'<option value="'.$jongere['id'].'">'.$jongere['firstname'].' '.$jongere['lastname'].'</option>';
    }
    foreach($DB->get('SELECT id, omschrijving FROM activiteiten') as $activiteit){
        $activiteiten = $activiteiten.'<option value="'.$activiteit['id'].'">'.$activiteit['omschrijving'].'</option>';
    }
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $statement = 'INSERT INTO koppel(activiteitenid, jongerenid) VALUES (:activiteitenid, :jongerenid)';
        $DB->insert($statement, [
            'activiteitenid' => $_POST['activity'],
            'jongerenid' => $_POST['jongeren']
        ]);
        header('Location: http://localhost/drempeltoets/');
        
    }
?>

<form method="post">
    <h1>Activiteit koppelen</h1>   
    <div class="form-group">
        <label for="jongeren">Jongere:</label>
        <select class="form-control" name="jongeren">
            <?=$jongeren?>
        </select>
    </div>
    
    <div class="form-group">
        <label for="activity">Activiteit:</label>
        <select class="form-control" name="activity">
            <?=$activiteiten?>
        </select>
    </div> 
    <button type="submit" class="btn btn-primary mb-2">Schrijf in</button>
</form>  

<?php include './Partials/footer.php';?>
