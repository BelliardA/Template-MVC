<h1><?= $group["name"]?></h1>
<p><?= $group["description"]?></p>

<h2>Infos lié à l'activité</h2>
<p>Nom de l'activité : <?= $activity['name']?></p>
<p>Prix : <?= $activity["price"]?></p>
<p>Description : <?= $activity["description"]?></p>
<p>Adresse : <?= $activity["adress"]?></p>

<h2>Horaire</h2>
<p>date et heure de début : <?=$times['start_time']?></p>

<h2></h2>

<a href="./?action=addUserGroup">Rejoindre le groupe</a>

<?php
