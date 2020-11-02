<?php
include './Partials/head.php';
$jongeren = $DB->get('SELECT * FROM jongeren');
$activiteiten = $DB->get('SELECT * FROM activiteiten');
?>
<div class="row">
        <div class="col-lg-6">
                <h1>Jongeren</h1>
                <table class="table table-striped">
                <tr>
                        <th>Id</th>
                        <th>Naam</th>
                </tr>
                <?php foreach($jongeren as $jongere){?>
                <tr>
                        <td><?=$jongere['id']?></td>
                        <td><a href="jongereactiviteiten.php/?id=<?=$jongere['id']?>"><?=$jongere['firstname'].' '.$jongere['lastname']?></a></td>
                </tr>
                <?php } ?>
                </table>
        </div>
        <div class="col-lg-6">
                <h1>Activiteiten</h1>
                <table class="table table-striped">
                <tr>
                        <th>Id</th>
                        <th>Omschrijving</th>
                </tr>
                <?php foreach($activiteiten as $activiteit){?>
                <tr>
                        <td><?=$activiteit['id']?></td>
                        <td><?=$activiteit['omschrijving']?></td>
                </tr>
                <?php } ?>
                </table>
        </div>  

</div>
<?php include './Partials/footer.php';?>
