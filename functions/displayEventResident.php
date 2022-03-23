<?php
require_once './functions/db.php';


$center = $_SESSION['user']['center'];
$dateOfBirth = $_SESSION['user']['date_of_birth'];
// calcul de l'age a partir de la date de naissance

$today = date("Y-m-d");
$diff = date_diff(date_create($dateOfBirth), date_create($today));
$age = $diff->format('%y');



$sql = "SELECT * FROM `events` WHERE `center` = '$center' AND `age_min` < '$age' AND `age_max` > '$age' LIMIT 10";
$req = mysqli_query($db, $sql);
$events = mysqli_fetch_all($req, MYSQLI_ASSOC);
print_r(mysqli_error($db));

foreach ($events as $event) {
    $sql = "SELECT img_name FROM `event_images` WHERE `event_id` = '$event[id]'";
    $req = mysqli_query($db, $sql);
    $eventImg = mysqli_fetch_assoc($req);
    $route = './images/events/' . $eventImg['img_name'];
    $date = date('d/m/Y', strtotime($event['date']));
    $time = date('H:i', strtotime($event['time']));
    $event['date'] = $date;
    $idUser = $_SESSION['user']['id'];

    $sql = "SELECT * FROM `event_subscribers` WHERE `event_id` = '$event[id]' AND `user_id` = '$idUser'";
    $req = mysqli_query($db, $sql);
    $subscribed = mysqli_fetch_assoc($req);


?>
    <div class="card_event" data-event="<?= $event['id'] ?>">
        <div class="card_event_img">
            <img class="img img-card" src="<?= $route ?>" alt="<?= $eventImg['img_name'] ?>">
        </div>
        <div class="card_event_content">
            <h3 class="title title_event-card">
                <?= $event['name'] ?>
            </h3>
            <div class="wrapper wrapper_event-subscribe">
                <div class="wrapper wrapper_event-info-card">
                    <p class="info_card">
                        Le <?= $event['date'] ?>
                    </p>
                    <p class="info_card">
                        à <?= $time ?>
                    </p>
                </div>
                <?php
                if ($subscribed) {
                    echo '<button class="button_subscribe_event" data-subscribe="0" data-event="' . $event['id'] . '">Se désinscrire</button>';
                } else {
                    echo '<button class="button_subscribe_event" data-subscribe="1" data-event="' . $event['id'] . '">S\'inscrire</button>';
                }
                ?>

            </div>
        </div>
    </div>

<?php
}
