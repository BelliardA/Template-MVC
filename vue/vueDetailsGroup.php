<h1>Choix des horraires </h1>
<h2>les horraires disponnible : </h2>
<form action="" method="POST">
    <?php
    foreach ($schedules as $schedule) {
        echo '<div>';
        echo '<label for="schedule">' . $schedule['day'] . ' de ' . $schedule['start'] . ' à ' . $schedule['end'] . '</label>';
        echo '<input type="checkbox" id="schedule" name="schedule" value="' . $schedule['id'] . '">';
        echo '</div>';
    }
    ?>
</form>