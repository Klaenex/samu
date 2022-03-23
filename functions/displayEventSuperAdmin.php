<?php
require_once './functions/db.php';

$sql = "SELECT * FROM `events`";
$req = mysqli_query($db, $sql);
$events = mysqli_fetch_all($req, MYSQLI_ASSOC);

foreach ($events as $event) {
    $sql = "SELECT img_name FROM `event_images` WHERE `event_id` = '$event[id]'";
    $req = mysqli_query($db, $sql);
    $eventImg = mysqli_fetch_assoc($req);
    $route = './images/events/' . $eventImg['img_name'];
    //la date "en français textuel"
    $date = date('d/m/Y', strtotime($event['date']));
    $time = date('H:i', strtotime($event['time']));
    $event['date'] = $date;

?>
    <div class="card_event" data-event="<?= $event['id'] ?>">
        <div class="card_event_img">
            <img class="img img-card" src="<?= $route ?>" alt="<?= $eventImg['img_name'] ?>">
        </div>
        <div class="card_event_content">
            <h3 class="title title_event-card">
                <?= $event['name'] ?>

            </h3>
            <div>
                <p class="date date_event-card">
                    Le <?= $event['date'] ?>
                </p>
                <p class="time time_event-card">
                    à <?= $time ?>
                </p>

            </div>
        </div>
    </div>

<?php
}
