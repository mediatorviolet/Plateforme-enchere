<nav class="navbar navbar-expand-md navbar-dark bg-dark px-lg-5 py-3">
    <a class="navbar-brand" href="index.php">Plateforme d'enchère</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" 
    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
        <?php
            if($_SESSION["admin"]) {
        ?>
        <a href="admin.php" class="nav-link text-light mr-3">Ajouter une enchère</a>
        <a href="admin.php" class="nav-link text-light mr-3">Modifier une enchère</a>
        <form action="<?php include 'src/libs/connexion.php' ?>" method="POST">
            <button class="btn btn-outline-light my-2 my-sm-0" type="submit" name="deconnexion">Se déconnecter</button>
        </form>
        <?php
            } else {
        ?>
        <div class="form-inline my-2 my-lg-0 dropdown">
            <button id="dropdownMenu2" class="btn btn-outline-light my-2 my-sm-0 dropdown-toggle" type="button" 
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-offset="-100,0">Se connecter</button>
            <form class=" dropdown-menu p-4" aria-labelledby="dropdownMenu2" method="POST" action="<?php include 'src/libs/connexion.php' ?>">
                <div class="form-group mb-3">
                    <label for="exampleDropdownFormEmail2">Nom d'utilisateur</label>
                    <input type="text" class="form-control" id="exampleDropdownFormEmail2" name="user">
                </div>
                <div class="form-group mb-3">
                    <label for="exampleDropdownFormPassword2">Mot de passe</label>
                    <input type="password" class="form-control" id="exampleDropdownFormPassword2" name="pass">
                </div>
                <button type="submit" class="btn btn-dark" name="connexion">Se connecter</button>
            </form>
        </div>
        <?php
            }
        ?>
    </div> 
</nav>