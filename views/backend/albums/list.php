<?php
include '../../../header.php'; // contains the header and call to config.php

// Load albums with the associated group and artist names
$albums = sql_select(
    "ALBUM INNER JOIN GROUPE ON ALBUM.idGp = GROUPE.idGp INNER JOIN ARTISTE ON ALBUM.idArt = ARTISTE.idArt",
    "ALBUM.idAlb, ALBUM.nomA, GROUPE.nomGp, ARTISTE.nomArt, ARTISTE.prenomArt, ALBUM.dtSortieA, ALBUM.nomLabelA"
);
?>

<!-- Bootstrap default layout to display all albums in foreach -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Albums</h1>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Id Alb</th>
                        <th>Nom album</th>
                        <th>Groupe</th>
                        <th>Artiste</th>
                        <th>Date de sortie album</th>
                        <th>Nom label</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($albums as $album) { ?>
                        <tr>
                            <td><?php echo($album['idAlb']); ?></td>
                            <td><?php echo ($album['nomA']); ?></td>
                            <td><?php echo ($album['nomGp']); ?></td>
                            <td><?php echo ($album['nomArt'] . ' ' . $album['prenomArt']); ?></td>
                            <td><?php echo ($album['dtSortieA']); ?></td>
                            <td><?php echo ($album['nomLabelA']); ?></td>
                            <td>
                                <a href="delete.php?idAlb=<?php echo (int) $album['idAlb']; ?>" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php
include '../../../footer.php'; // contains the footer