<?php
include '../../../header.php'; // contains the header and call to config.php

//Load all artists from database
$artistes = sql_select("artiste", "*");
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
                        <th>Id Groupe</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($artistes as $artiste){ ?>
                        <tr>
                            <td><?php echo($artiste['idArt']); ?></td>
                            <td><?php echo($artiste['idGp']); ?></td>
                            <td><?php echo($artiste['nomArt']); ?></td>
                            <td><?php echo($artiste['prenomArt']); ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php
include '../../../footer.php'; // contains the footer