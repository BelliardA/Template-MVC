<h1>menu</h1>

<ul>
    <li><a href="./?action=connexion">Connexion</a></li>
    <?php
    if(isLoggedOn()){
        ?>
        <li><a href="./?action=addGroup">Créer un groupe</a></li>
        <?php
    }
    ?>
</ul>

