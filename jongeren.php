<?php
    include './Partials/head.php';
    $jongeren = $DB->get('SELECT * FROM jongeren');
    $statement = 'DELETE FROM jongeren WHERE id = :id';
    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $DB->delete_update($statement, [
            'id' => $_POST['delete']
        ]);
        header('Location:  http://localhost/drempeltoets/jongeren.php');
    }
?>
<table class="table table-striped">
    <h1>Overzicht Jongeren</h1>
    <tr>
        <th>Id</th>
        <th>Naam</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    <?php foreach($jongeren as $jongere){?>
    <tr>
        <td><?=$jongere['id']?></td>
        <td><a href="jongereactiviteiten.php/?id=<?=$jongere['id']?>"><?=$jongere['firstname'].' '.$jongere['lastname']?></a></td>
        <td>
            <a class="btn btn-primary" href="editjongere.php/?id=<?=$jongere['id']?>" name="update">Edit</a>
        </td>
        <td>
            <form method="post">
                <button class="btn btn-danger" type="submit" name="delete" value="<?=$jongere['id']?>">Delete</button>
            </form>
        </td>
    </tr>
    <?php } ?>
</table>

<?php 
    include './Partials/footer.php';
?>