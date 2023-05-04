<?php
  $hotels = [

        [
            'name' => 'Hotel Belvedere',
            'description' => 'Hotel Belvedere Descrizione',
            'parking' => true,
            'vote' => 4,
            'distance_to_center' => 10.4,
            'img' => 'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/13/47/ef/37/hotel-belvedere-bellagio.jpg?w=1200&h=-1&s=1'
        ],
        [
            'name' => 'Hotel Futuro',
            'description' => 'Hotel Futuro Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 2,
            'img' => ''
        ],
        [
            'name' => 'Hotel Rivamare',
            'description' => 'Hotel Rivamare Descrizione',
            'parking' => false,
            'vote' => 1,
            'distance_to_center' => 1,
            'img' => ''
        ],
        [
            'name' => 'Hotel Bellavista',
            'description' => 'Hotel Bellavista Descrizione',
            'parking' => false,
            'vote' => 5,
            'distance_to_center' => 5.5,
            'img' => ''
        ],
        [
            'name' => 'Hotel Milano',
            'description' => 'Hotel Milano Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 50,
            'img' => ''
        ],

    ];

$filterHotel = [];
$filterHotel = $hotels;



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
    <div class="container">
        <div class="row">

              <?php foreach ($filterHotel as $value) { ?>
            <div class="col m-4">
                <div class="card mb-3 mt-2">
                    <div class="card-head">
                        <img src=<?php $value['img']?> alt= "" class="card-img-top img-fluid">
                    </div>
                    <div class="card-body">
                    <h4 class="card-title" ><?php echo $value['name'] ?></h4>
                    <div class="card-text" > <?php echo $value['description'] ?></div>




                <?php for($i=0;$i<5;$i++){?>
                                <?php if($i < $value['vote']): ?>
                                    <i class="bi bi-star-fill text-warning"></i>
                                <?php else:?>
                                    <i class="bi bi-star"></i>
                                <?php endif?>
                                     <?php };?>




                            <?php if($value['parking']):?>
                                <div>
                                    <i class="bi bi-p-circle-fill text-success fs-3"></i>
                                </div>
                           
                            <?php else:?>
                                <div>
                                <i class="bi bi-sign-no-parking-fill text-danger fs-3"></i>
                                </div>
                            <?php endif ?>
                </div>
                </div>
                
            </div>
          <?php }?>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>