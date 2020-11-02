<?php
    include './Partials/head.php';
    $koppel = $DB->get('SELECT * FROM koppel WHERE jongerenid = :id', [ 'id' => $_GET['id'] ]);
    $jongere = $DB->get('SELECT * FROM jongeren WHERE id = :id', [ 'id' => $_GET['id']])[0];
    $activiteiten = [];
    foreach($koppel as $activiteit){
        array_push($activiteiten, $DB->get('SELECT * FROM activiteiten WHERE id = :id', [
            'id' => $activiteit['activiteitenid']
        ])[0]);
    }
?>
<table class="table table-striped">
    <h1>Activiteiten voor <?=$jongere['firstname'].' '.$jongere['lastname']?>
    <tr>
        <th>Id</th>
        <th>Activiteit</th>
    </tr>
    <?php foreach($activiteiten as $activiteit){?>
    <tr>
        <td><?=$activiteit['id']?></td>
        <td><?=$activiteit['omschrijving']?></td>
    </tr>
    <?php } ?>
</table>

<?php 
    include './Partials/footer.php';
?>