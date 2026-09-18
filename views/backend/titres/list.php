<?php
include '../../../header.php'; // contains the header and call to config.php

//Load all titres from database
$titres = sql_select("titre", "*");
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
                        <th>Id Album</th>
                        <th>Nom titre</th>
                        <th>Durée titre</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($titres as $titre) { ?>
                        <tr>
                            <td><?php echo($titre['idTit']); ?></td>
                            <td><?php echo($titre['idAlb']); ?></td>
                            <td><?php echo($titre['NomTit']); ?></td>
                            <td><?php echo($titre['dureeTit']); ?></td>
                        </tr>
                </tbody>
                                <a href="delete.php?idGp=<?php echo($titre['idTit']); ?>" class="btn btn-fonce">Delete</a>
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