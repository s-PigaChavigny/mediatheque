<?php
include '../../../header.php'; // contains the header and call to config.php

//Load all groups from database
$groupes = sql_select("groupe", "*");
?>

<!-- Bootstrap default layout to display all groups in foreach -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Groupes</h1>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nom</th>
                        <th>Date de création</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($groupes as $groupe){ ?>
                        <tr>
                            <td><?php echo($groupe['idGp']); ?></td>
                            <td><?php echo($groupe['nomGp']); ?></td>
                            <td><?php echo($groupe['dtCreaGp']); ?></td>
                            <td>
                                <a href="edit.php?idGp=<?php echo($groupe['idGp']); ?>" class="btn btn-moyen">Edit</a>
                                <a href="delete.php?idGp=<?php echo($groupe['idGp']); ?>" class="btn btn-fonce">Delete</a>
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