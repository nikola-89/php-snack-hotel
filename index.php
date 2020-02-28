<?php
    include __DIR__ . '/server.php';
    $s_protocol = stripos($_SERVER['SERVER_PROTOCOL'],'https') === 0 ? 'https://' : 'http://';
    $s_host = $_SERVER['SERVER_NAME'];
    $s_port = $_SERVER['SERVER_PORT'];
    $s_url = ($s_protocol . $s_host . ':' . $s_port . '/');
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>php-snack-hotel</title>
    </head>
    <body>
        <header>
            <p><a href="<?php echo $s_url; ?>php-snack-hotel/index.php">Click for reset!</a></p>
            <p><a href="<?php echo $s_url; ?>php-snack-hotel/index.php?parking=available">index.php?parking=available</a></p>
            <p><a href="<?php echo $s_url; ?>php-snack-hotel/index.php?parking=unavailable">index.php?parking=unavailable</a></p>
            <p><a href="<?php echo $s_url; ?>php-snack-hotel/index.php?max-vote=3">index.php?max-vote=3</a></p>
            <p><a href="<?php echo $s_url; ?>php-snack-hotel/index.php?center-distance=10">index.php?center-distance=10</a></p>
        </header>
        <main>
            <?php if ($results['success']) { ?>
                <?php foreach ($results['data'] as $hotel) { ?>
                <div class="hotel">
                    <h1><?php echo $hotel['name']; ?></h1>
                    <p><?php echo $hotel['description']; ?></p>
                    <p>Parcheggio:
                        <?php
                            if ($hotel['parking']) {
                                echo 'Disponibile';
                            } else {
                                echo 'Non disponibile';
                            }
                        ?>
                    </p>
                    <p>Voto: <?php echo $hotel['vote']; ?>/5</p>
                    <p>Distanza dal centro: <?php echo $hotel['distance_to_center']; ?>km</p>
                </div>
                <?php } ?>
            <?php } else { ?>
                <h1><?php echo $results['message']; ?></h1>
            <?php } ?>
        </main>
    </body>
</html>
