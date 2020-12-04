<nav class="navbar navbar-expand-md navbar-dark bg-dark px-lg-5 py-3">
    <a class="navbar-brand" href="index.php">Plateforme d'enchère</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
        <?php
        if ($_SESSION["admin"]) {
        ?>
            <a href="admin.php?page=dashboard" class="nav-link text-light mr-3">Tableau de bord</a>
            <a href="admin.php?page=formAdmin" class="nav-link text-light mr-3">Ajouter une enchère</a>
            <form action="<?php include 'src/libs/connexion.php' ?>" method="POST">
                <button class="btn btn-outline-light my-2 my-sm-0" type="submit" name="deconnexion">Se déconnecter</button>
            </form>
        <?php
        } else {
        ?>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-outline-light" data-toggle="modal" data-target="#exampleModal">
                Se connecter
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Connexion</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="<?php include 'src/libs/connexion.php' ?>" method="post">
                            <div class="modal-body">
                                <div class="form-group mb-3">
                                    <label for="exampleDropdownFormEmail2">Nom d'utilisateur</label>
                                    <input type="text" class="form-control" id="exampleDropdownFormEmail2" name="user">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="exampleDropdownFormPassword2">Mot de passe</label>
                                    <input type="password" class="form-control" id="exampleDropdownFormPassword2" name="pass">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                <button type="submit" name="connexion" class="btn btn-dark">Se connecter</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</nav>