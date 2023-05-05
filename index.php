<?php
$hotels = [

    [
        'name' => 'Hotel Belvedere',
        'description' => 'L’Hotel Belvedere è il vostro paradiso, l’incanto di un giardino privato a pochi passi dal vivace viavai di Bellagio. Accoglienza profonda, un’ospitalità affinata da cinque generazioni di donne appassionate a un raro e arioso paradiso di fascino in collina. Per sfumare nel sogno, mentre lo sguardo vola leggero, accarezza la pittoresca baia di Pescallo e si abbandona allo scenario del lago incorniciato dalle Alpi sullo sfondo.',
        'parking' => true,
        'vote' => 4,
        'distance_to_center' => 10.4,

    ],
    [
        'name' => 'Hotel Futuro',
        'description' => "L'Hotel Futuro si trova nel centro di Aversa, a 5 minuti d'auto dalla stazione, è facilmente raggiungibile dall'autostrada A1 e propone camere climatizzate con TV LCD, la connessione Wi-Fi gratuita nell'intera struttura e una colazione dolce tutte le mattine.",
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 2,

    ],
    [
        'name' => 'Hotel Rivamare',
        'description' => "Hai diritto a uno sconto Genius su Hotel Rivamare! Per risparmiare su questa struttura ti basta accedere.
            Situato a soli 20 metri da una spiaggia, l'Hotel Rivamare sorge in una posizione tranquilla al Lido, l'isola più grande della Laguna di Venezia, e serve la colazione sulla terrazza.
            Tutte le camere del Rivamare Hotel sono climatizzate e dotate di pavimenti in legno, TV e bagno privato. Alcune vantano anche una terrazza privata con vista sul Mar Adriatico o sul giardino.

         ",
        'parking' => false,
        'vote' => 1,
        'distance_to_center' => 1,

    ],
    [
        'name' => 'Hotel Bellavista',
        'description' => "Hai diritto a uno sconto Genius su Bellavista! Per risparmiare su questa struttura ti basta accedere.
            Interamente coperto dalla connessione WiFi gratuita, il Bellavista vi attende nel quartiere Albayzín di Granada, a 500 metri dall'Alhambra e dal Generalife, e a 800 metri dalla Cattedrale di Granada.",
        'parking' => false,
        'vote' => 5,
        'distance_to_center' => 5.5,

    ],
    [
        'name' => 'Hotel Milano',
        'description' => "L'hotel Hotel ibis Milano Centro è una struttura comoda e moderna situata a breve distanza dalla stazione ferroviaria di Milano Centrale. Le sistemazioni offrono TV a schermo piatto, Wi-Fi gratuito e pareti insonorizzate. Tutte le stanze sono dotate di bagno privato con box doccia.",
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 50,

    ],

];


$filterHotel = $hotels;


if (!empty($_GET['parking'])) {
    $tempHotel = [];
    $parking = ($_GET['parking'] === 'true') ? true : false;
    foreach ($filterHotel as $hotel) {
        if ($hotel['parking'] === $parking) {
            $tempHotel[] = $hotel;
        }
    }
    $filterHotel = $tempHotel;
}
if (!empty($_GET['vote'])) {
    $tempHotel = [];
    $vote = $_GET['vote'];
    foreach ($filterHotel as $hotel) {
        if ($hotel['vote'] >= $vote) {
            $tempHotel[] = $hotel;
        }
    }
    $filterHotel = $tempHotel;
}
// else {
//     $tempHotel = $hotels;
// }

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>

<body>
    <h1 class="text-primary text-center fs-1">Booking</h1>
    <form class="row" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="GET ">
        <div class="col">

            <div class="zone-select justify-content-end  d-flex bg-primary p-2">
                <h2 class="text-white fs-5 p-1 me-5">Filtra </h2>
                <select class="me-5 form-select-sm" name="parking" id="">
                    <option value="">All</option>
                    <option value="false">No Parking</option>
                    <option value="true">Parking</option>
                </select>
                <select class="me-5 form-select-sm" name="vote" id="">
                    <option value="">All</option>
                    <option value="1">1 star</option>
                    <option value="2">2 star</option>
                    <option value="3">3 star</option>
                    <option value="4">4 star</option>
                    <option value="5">5 star</option>

                </select>
                <button class="type btn btn-info" type="submit">Search</button>
            </div>

        </div>
    </form>

    <div class="container">
        <div class="row">

            <?php foreach ($filterHotel as $value) { ?>
                <div class="col">
                    <div class="card mb-3 mt-2">
                        <div class="card-head bg-dark-subtle ">
                            <h2 class="card-title  p-4"><?php echo $value['name'] ?></h2>
                        </div>
                        <div class="card-body bg-body-secondary border">
                            <div class="card-text fs-6 fw-lighter"> <?php echo $value['description'] ?></div>
                            <?php for ($i = 0; $i < 5; $i++) { ?>
                                <?php if ($i < $value['vote']) : ?>
                                    <i class="bi bi-star-fill text-warning mt-3"></i>
                                <?php else : ?>
                                    <i class="bi bi-star"></i>
                                <?php endif ?>
                            <?php }; ?>
                            <?php if ($value['parking']) : ?>
                                <div>
                                    <i class="bi bi-p-circle-fill text-success mt-3 fs-3 d-flex justify-content-center"></i>
                                </div>
                            <?php else : ?>
                                <div>
                                    <i class="bi bi-sign-no-parking-fill text-danger mt-3 fs-3 d-flex justify-content-center"></i>
                                </div>
                            <?php endif ?>
                        </div>
                    </div>

                </div>
            <?php } ?>
        </div>
    </div>




    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>