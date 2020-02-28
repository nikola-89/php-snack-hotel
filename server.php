<?php
    include __DIR__ . '/db.php';
    // ******************************************
    $paramParking = $_GET['parking'];
    $paramVote = $_GET['max-vote'];
    $paramCenterDistance = $_GET['center-distance'];
    // ******************************************
    if (!empty($paramParking)) {
        if ($paramParking == 'available') {
            foreach ($hotels as $hotel) {
                if ($hotel['parking']) {
                    $filtered[] = $hotel;
                }
            }
            $results = ['success' => true, 'data' => $filtered];
        } elseif ($paramParking == 'unavailable') {
            foreach ($hotels as $hotel) {
                if (!$hotel['parking']) {
                    $filtered[] = $hotel;
                }
            }
            $results = ['success' => true, 'data' => $filtered];
        } else {
            $results = ['success' =>  false, 'message' =>  'Parametro [' . $paramParking . '] non corretto'];
        }
    } elseif (!empty($paramVote)) {
        if (ctype_digit(strval($paramVote)) && $paramVote <= 5) {
            foreach ($hotels as $hotel) {
                if ($hotel['vote'] <= $paramVote) {
                    $filtered[] = $hotel;
                }
            }
            $results = ['success' => true, 'data' => $filtered];
        } else {
            $results = ['success' =>  false, 'message' =>  'Parametro [' . $paramVote . '] non corretto'];
        }
    } elseif (!empty($paramCenterDistance)) {
        if (is_numeric($paramCenterDistance)) {
            foreach ($hotels as $hotel) {
                if ($hotel['distance_to_center'] <= $paramCenterDistance) {
                    $filtered[] = $hotel;
                }
            }
            $results = ['success' => true, 'data' => $filtered];
        } else {
            $results = ['success' =>  false, 'message' =>  'Parametro [' . $paramCenterDistance . '] non corretto'];
        }
    } else {
        $results = ['success' => true, 'data' => $hotels];
    }
    // ******************************************
?>
