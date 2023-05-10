<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Adverts</title>
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

    <main class="container-MyAdverts">
        <div class="mt-4">
            <h2>My Adverts</h2>
            <div class="row">
                <div class="col-lg-6">
                    <h4>Approved</h4>
                    <?php
                    foreach ($cars as $car) {
                        if ($car->user->id == $_SESSION["userid"]) {
                            if ($car->state->name == 'approved') {
                    ?>
                                <div class="row mb-4 bg-AllCars mx-1 ">
                                    <div class="col-lg-3">
                                        <img class="image-container mt-2 mb-2 pt-2 pb-2" src="Imagens/<?php echo $car->id . '.jpg'; ?>">
                                    </div>
                                    <div class="col-lg-9 pt-3 pe-3" style="padding-left: 100px;">
                                        <div class="RightLeft">
                                            <a class="ahome fs-3" href="<?php echo route('cars/' . $car->id); ?>"><?php echo $car->model->brand->name . ' ' . $car->model->name; ?></a>
                                            <span class="priceStyle"><?php echo $car->price . ' €'; ?></span>
                                        </div>
                                        <div style="margin-top: 150px;">
                                            <p class="priceStyle "><?php echo $car->address; ?></p>
                                            <div class="RightLeft">
                                                <span class="priceStyle"><i class="fa-solid fa-gauge-high"></i><?php echo ' ' . $car->year . ' - ' . $car->km . ' km'; ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>

                    <?php
                        }
                    }
                    ?>
                </div>
                <div class="col-lg-6">
                    <h4>Pendding</h4>
                    <?php
                    foreach ($cars as $car) {
                        if ($car->user->id == $_SESSION["userid"]) {
                            if ($car->state->name == 'pending') {
                    ?>
                                <div class="row mb-4 bg-AllCars mx-1 " style="opacity: 0.3;">
                                    <div class="col-lg-3">
                                        <img class="image-container mt-2 mb-2 pt-2 pb-2" src="Imagens/<?php echo $car->id . '.jpg'; ?>">
                                    </div>
                                    <div class="col-lg-9 pt-3 pe-3" style="padding-left: 100px;">
                                        <div class="RightLeft">
                                            <a class="ahome fs-3" href="<?php echo route('cars/' . $car->id); ?>"><?php echo $car->model->brand->name . ' ' . $car->model->name; ?></a>
                                            <span class="priceStyle"><?php echo $car->price . ' €'; ?></span>
                                        </div>
                                        <div style="margin-top: 150px;">
                                            <p class="priceStyle "><?php echo $car->address; ?></p>
                                            <div class="RightLeft">
                                                <span class="priceStyle"><i class="fa-solid fa-gauge-high"></i><?php echo ' ' . $car->year . ' - ' . $car->km . ' km'; ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>

                    <?php
                        }
                    }
                    ?>
                </div>
            </div>

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
</body>

</html>