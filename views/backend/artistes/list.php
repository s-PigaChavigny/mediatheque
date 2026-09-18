<?php
include '../../../header.php'; // contains the header and call to config.php

// Load artists with the name of their group
$artistes = sql_select(
    "ARTISTE INNER JOIN GROUPE ON ARTISTE.idGp = GROUPE.idGp",
    "ARTISTE.idArt, ARTISTE.idGp, GROUPE.nomGp, ARTISTE.nomArt, ARTISTE.prenomArt"
);
?>

<!-- Bootstrap default layout to display all artists in foreach -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Artistes</h1>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Id Artiste</th>
                        <th>Nom Groupe</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($artistes as $artiste) { ?>
                        <tr>
                            <td><?php echo($artiste['idArt']); ?></td>
                            <td><?php echo htmlspecialchars($artiste['nomGp'], ENT_QUOTES, 'UTF-8'); ?></td>
                            <td><?php echo htmlspecialchars($artiste['nomArt'], ENT_QUOTES, 'UTF-8'); ?></td>
                            <td><?php echo htmlspecialchars($artiste['prenomArt'], ENT_QUOTES, 'UTF-8'); ?></td>
                            <td>
                                <a href="edit.php?idArt=<?php echo (int) $artiste['idArt']; ?>" class="btn btn-warning">Edit</a>
                                <a href="delete.php?idArt=<?php echo (int) $artiste['idArt']; ?>" class="btn btn-danger">Delete</a>
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