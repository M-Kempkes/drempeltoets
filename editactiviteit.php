<?php
    include './Partials/head.php';
    $activiteit = $DB->get('SELECT * FROM activiteiten WHERE id = :id', [
        'id' => $_GET['id']
    ])[0];
    $statement = 'UPDATE activiteiten SET omschrijving=:omschrijving WHERE id=:id';
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $DB->delete_update($statement, [
            'omschrijving' => $_POST['omschrijving'],
            'id' => $_POST['id']

        ]);
        header('Location: http://localhost/drempeltoets/activiteiten.php');
    }
?>
<table class="table table-striped">
    <tr>
        <th>Id</th>
        <th>Omschrijving</th>
        <th>Submit</th>
    </tr>
    <tr>
        <form method="post">
            <td><input readonly type="number" value="<?=$activiteit['id']?>" name="id"></input></td>
            <td><input type="text" value="<?=$activiteit['omschrijving']?>" name="omschrijving"></input></td>
            <td>
                <button class="btn btn-primary" type="submit" name="Submit">Submit changes</button>
            </td>
        </form>
    </tr>
</table>

<?php 
    include './Partials/footer.php';
?>