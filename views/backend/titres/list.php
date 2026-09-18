<?php
include '../../../header.php'; // contains the header and call to config.php

// Load titles with the name of their album
$titres = sql_select(
    "TITRE INNER JOIN ALBUM ON TITRE.idAlb = ALBUM.idAlb",
    "TITRE.idTit, TITRE.nomTit, ALBUM.nomA, TITRE.dureeTit"
);
?>

<!-- Bootstrap default layout to display all titres in foreach -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Titres</h1>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Id Titre</th>
                        <th>Nom du titre</th>
                        <th>Album</th>
                        <th>Durée du titre</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($titres as $titre) { ?>
                        <tr>
                            <td><?php echo($titre['idTit']); ?></td>
                            <td><?php echo htmlspecialchars($titre['nomTit'], ENT_QUOTES, 'UTF-8'); ?></td>
                            <td><?php echo htmlspecialchars($titre['nomA'], ENT_QUOTES, 'UTF-8'); ?></td>
                            <td><?php echo htmlspecialchars($titre['dureeTit'], ENT_QUOTES, 'UTF-8'); ?></td>
                            <td>
                                <a href="edit.php?idTit=<?php echo (int) $titre['idTit']; ?>" class="btn btn-warning">Edit</a>
                                <a href="delete.php?idTit=<?php echo (int) $titre['idTit']; ?>" class="btn btn-danger">Delete</a>
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