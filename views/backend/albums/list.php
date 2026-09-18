<?php
include '../../../header.php'; // contains the header and call to config.php

//Load all albums from database
$albums = sql_select("album", "*");
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
                        <th>Id Gp</th>
                        <th>Nom album</th>
                        <th>Date de sortie album</th>
                        <th>Nom label</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($albums as $album) { ?>
                        <tr>
                            <td><?php echo($album['idAlb']); ?></td>
                            <td><?php echo($album['idGp']); ?></td>
                            <td><?php echo($album['NomA']); ?></td>
                            <td><?php echo($album['dtSortieA']); ?></td>
                            <td><?php echo($album['nomLabelA']); ?></td>
                        </tr>
                </tbody>
                                <a href="delete.php?idGp=<?php echo($album['idAlb']); ?>" class="btn btn-fonce">Delete</a>
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