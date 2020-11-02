<?php
    include './Partials/head.php';
    $jongere = $DB->get('SELECT * FROM jongeren WHERE id = :id', [
        'id' => $_GET['id']
    ])[0];
    $statement = 'UPDATE jongeren SET firstname=:firstname, lastname=:lastname, NAW=:naw WHERE id=:id';
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $DB->delete_update($statement, [
            'firstname' => $_POST['firstname'],
            'lastname' => $_POST['lastname'],
            'naw' => $_POST['naw'],
            'id' => $_POST['id']

        ]);
        header('Location: http://localhost/drempeltoets/jongeren.php');
    }
?>
<table class="table table-striped">
    <tr>
        <th>Id</th>
        <th>Voornaam</th>
        <th>Achternaam</th>
        <th>NAW</th>
        <th>Submit</th>
    </tr>
    <tr>
        <form method="post">
            <td><input readonly type="number" value="<?=$jongere['id']?>" name="id"></input></td>
            <td><input type="text" value="<?=$jongere['firstname']?>" name="firstname"></input></td>
            <td><input type="text" value="<?=$jongere['lastname']?>" name="lastname"></input></td>
            <td><input type="text" value="<?=$jongere['NAW']?>" name="naw"></input></td>
            <td>
                <button class="btn btn-primary" type="submit" name="Submit">Submit changes</button>
            </td>
        </form>
    </tr>
</table>

<?php 
    include './Partials/footer.php';
?>