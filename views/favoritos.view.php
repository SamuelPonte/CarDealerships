<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Favoritos</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link href="https://fonts.cdnfonts.com/css/viner-hand-itc" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo route('css_bootstrap/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?php echo route('Style/main.css') ?>">
</head>

<body>
    <?php
    include 'nav.view.php';
    ?>
    <main class="container">
        <div class=" mt-5 mb-5">
            <h2>Your favorite adverts</h2>
        </div>
        <div id="car-listFav">
            <?php
            foreach ($favorites as $favorite) {
                if ($favorite->car->state->name == 'approved') {
            ?>
                    <div class="row mb-4 bg-AllCars mx-1 ">
                        <div class="col-lg-3">
                            <img class="image-container mt-2 mb-2 pt-2 pb-2" src="Imagens/<?php echo $favorite->car->id . '.jpg'; ?>">
                        </div>
                        <div class="col-lg-9 pt-3 pe-5">
                            <div class="RightLeft">
                                <a class="ahome fs-3" href="<?php echo route('cars/' . $favorite->car->id); ?>"><?php echo $favorite->car->model->brand->name . ' ' . $favorite->car->model->name; ?></a>
                                <span class="priceStyle"><?php echo $favorite->car->price . ' €'; ?></span>
                            </div>
                            <div style="margin-top: 150px;">
                                <p class="priceStyle "><?php echo $favorite->car->address; ?></p>
                                <div class="RightLeft">
                                    <span class="priceStyle"><i class="fa-solid fa-gauge-high"></i><?php echo ' ' . $favorite->car->year . ' - ' . $favorite->car->km . ' km'; ?></span>
                                    <button class="DeleteFav priceStyle" data-id="<?php echo $favorite->id; ?>" style="background-color: transparent; border:none;" ><i class="fa-solid fa-heart fa-xl"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>

            <?php

            }
            ?>
        </div>


    </main>
    <?php
    include 'footer.view.php';
    ?>

    <!-- Script -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="<?php echo route('js_bootstrap/bootstrap.bundle.js') ?>"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script>
        $('#car-listFav').on('click', '.DeleteFav', function() {
            var favId = $(this).data('id');
            $.ajax({
                url: "<?php echo route('Favorites/delete'); ?>",
                method: "post",
                dataType: "json",
                data: {
                    id: favId
                },
                success: function(response) {
                    if (response.success) {
                        $('#favorite-' + favId).remove();
                        location.reload();
                    }
                }
            });
        });
    </script>
</body>

</html>