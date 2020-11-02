<?php
    include './Partials/head.php';
    $activiteiten = $DB->get('SELECT * FROM activiteiten');
    $statement = 'DELETE FROM activiteiten WHERE id = :id';
    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $DB->delete_update($statement, [
            'id' => $_POST['delete']
        ]);
        header('Location:  http://localhost/drempeltoets/');
    }
?>
<table class="table table-striped">
    <h1>Overzicht Activiteiten</h1>
    <tr>
        <th>Id</th>
        <th>Omschrijving</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    <?php foreach($activiteiten as $activiteit){?>
    <tr>
        <td><?=$activiteit['id']?></td>
        <td><?=$activiteit['omschrijving']?></td>
        <td>
            <a class="btn btn-primary" href="editactiviteit.php/?id=<?=$activiteit['id']?>" name="update">Edit</a>
        </td>
        <td>
            <form method="post">
                <button class="btn btn-danger" type="submit" name="delete" value="<?=$activiteit['id']?>">Delete</button>
            </form>
        </td>
    </tr>
    <?php } ?>
</table>

<?php 
    include './Partials/footer.php';
?>