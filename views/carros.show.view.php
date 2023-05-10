<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show car</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link href="https://fonts.cdnfonts.com/css/viner-hand-itc" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo route('css_bootstrap/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?php echo route('Style/main.css') ?>">
    <link rel="stylesheet" href="<?php echo route('Style/showCar.css') ?>">
</head>

<body>
    <?php
    include 'nav.view.php';
    ?>

    <main class="mg-show" id="car-list">
        <?php
        if ($car->state->name == 'pending') {
            if (isset($_SESSION["userid"])) {
                if ($_SESSION["userrole"] == 2 || $_SESSION["userid"] == $car->user_id) {
        ?>
                    <div class="mt-4 mb-3">
                        <a class="style-aShow" href="<?php echo route(''); ?>">
                            <i class="fa-solid fa-chevron-left fa-xl pe-1"></i>
                            <span>Back</span>
                        </a>

                    </div>
                    <div class="row">

                        <div class="col-lg-8 bg-img">
                            <div id="carouselExample" class="carousel slide container-carosel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="<?php echo route('Imagens/' . $car->id . '.jpg'); ?>">
                                    </div>
                                    <?php
                                    foreach ($images as $image) {
                                    ?>
                                        <div class="carousel-item">
                                            <img src="<?php echo route('Imagens/' . $car->id . $image->name); ?>">
                                        </div>
                                    <?php
                                    }
                                    ?>

                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>
                        <div class="col-lg-4 mt-lg-0 mt-3 pe-1">
                            <div class="bg-user p-4">
                                <h4 class="text-light pb-2">User</h4>
                                <div class="row">
                                    <div class="col-sm-2">
                                        <i class="fa-regular fa-address-card  user-fa"></i>
                                    </div>
                                    <div class="col-sm-10">
                                        <p class="text-light">Name:<?php echo " " . $car->user->name; ?></p>
                                        <p class="text-light">Phone number:<?php echo " " . $car->user->phone; ?></p>
                                    </div>
                                </div>


                                <button type="button" class="btn btn-message fs-5" data-bs-toggle="modal" data-bs-target="#exampleModal">Send email</button>
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Send Email</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form action="<?php echo route('cars/' . $car->id . '/share') ?>" method="POST">
                                                <div class="modal-body">
                                                    <input type="hidden" name="myemail" value="<?php echo $user->email ?>">
                                                    <div class="mb-3">
                                                        <label for="foremail" class="col-form-label">For:</label>
                                                        <input type="email" name="foremail"  value="<?php echo $car->user->email ?>" class="form-control" id="foremail" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="title" class="col-form-label">Subject:</label>
                                                        <input type="text" name="title" class="form-control" id="title" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="message" class="col-form-label">Message:</label>
                                                        <textarea name="message" class="form-control" id="message" required></textarea>
                                                    </div>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" value="Share" class="btn btn-primary">Send email</button>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="bg-user p-4 mt-5">
                                <h5 class="text-light pb-2">Address</h5>
                                <i class="fa-solid fa-location-dot text-light pe-2"></i>
                                <span class="text-light"><?php echo $car->address; ?></span>

                            </div>
                        </div>

                        <div class=" bg-carinfo mt-3 p-4 mb-4">
                            <div class="RightLeft">
                                <span class="text-light fs-3"><?php echo $car->model->brand->name . ' ' . $car->model->name ?></span>
                                <?php
                                if (isset($_SESSION["userid"]) && $_SESSION["userrole"] == 1) {

                                ?>
                                    <?php
                                    $is_favorite = false;
                                    foreach ($favorites as $favorite) {
                                        if ($favorite->user_id == $_SESSION['userid'] && $favorite->car_id == $car->id) {
                                            $is_favorite = true;
                                            break;
                                        }
                                    }
                                    if ($is_favorite) {
                                    ?>
                                        <button disabled style="background-color: transparent; border:none;" class="priceStyle getFav"><i class="fa-solid fa-heart fa-xl"></i></button>
                                    <?php
                                    } else {
                                    ?>
                                        <button id="getFav" style="background-color: transparent; border:none " class="priceStyle getFav"><i class="fa-regular fa-heart fa-xl"></i></button>
                                    <?php
                                    }
                                } else if (isset($_SESSION["userid"]) && $_SESSION["userrole"] == 2) {
                                    ?>
                                    <form class="m-1 form-inline float-right" method="POST" action="<?php echo route('carsDelete/' . $car->id); ?>">
                                        <input type="hidden" name="car_id" value="<?php echo $car->id ?>">
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                <?php
                                }
                                ?>

                            </div>
                            <p class="text-light fs-1 fw-bold"><?php echo $car->price . ' €'; ?></p>
                            <ul class="list-group list-group-horizontal">
                                <li class="list-group-item"><?php echo 'Model: ' . $car->model->name; ?></li>
                                <li class="list-group-item"><?php echo 'Year: ' . $car->year; ?></li>
                                <li class="list-group-item"><?php echo 'Engine capacity: ' . $car->engine_capacity; ?></li>
                                <li class="list-group-item"><?php echo 'Fuel type: ' . $car->fuelsType->name; ?></li>
                                <li class="list-group-item"><?php echo 'Power car: ' . $car->power_car; ?></li>
                                <li class="list-group-item"><?php echo 'Kilometers: ' . $car->km . ' km'; ?></li>
                                <li class="list-group-item"><?php echo 'Box type: ' . $car->boxType->name; ?></li>
                                <li class="list-group-item"><?php echo 'Condition: ' . $car->condition->name; ?></li>
                                <li class="list-group-item"><?php echo 'Doors: ' . $car->door; ?></li>
                                <li class="list-group-item"><?php echo 'Places: ' . $car->place; ?></li>
                                <li class="list-group-item"><?php echo 'Color: ' . $car->color; ?></li>
                            </ul>
                            <h2 class="text-light mt-3">Description</h2>
                            <p class="text-light"><?php echo $car->description ?></p>
                        </div>
                    </div>
            <?php
                }
            }
        } else {
            ?>
            <div class="mt-4 mb-3">
                <a class="style-aShow" href="<?php echo route(''); ?>">
                    <i class="fa-solid fa-chevron-left fa-xl pe-1"></i>
                    <span>Back</span>
                </a>

            </div>
            <div class="row">

                <div class="col-lg-8 bg-img">

                    <div id="carouselExample" class="carousel slide container-carosel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="<?php echo route('Imagens/' . $car->id . '.jpg'); ?>">
                            </div>
                            <?php
                            foreach ($images as $image) {
                            ?>
                                <div class="carousel-item">
                                    <img src="<?php echo route('Imagens/' . $car->id . $image->name); ?>">
                                </div>
                            <?php
                            }
                            ?>

                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>

                </div>
                <div class="col-lg-4 mt-lg-0 mt-3 pe-1">
                    <div class="bg-user p-4">
                        <h4 class="text-light pb-2">User</h4>
                        <div class="row">
                            <div class="col-sm-2">
                                <i class="fa-regular fa-address-card  user-fa"></i>
                            </div>
                            <div class="col-sm-10">
                                <p class="text-light">Name:<?php echo " " . $car->user->name; ?></p>
                                <p class="text-light">Phone number:<?php echo " " . $car->user->phone; ?></p>
                            </div>
                        </div>
                        <?php
                        if (isset($_SESSION['userid'])) {
                        ?>
                            <button type="button" class="btn btn-message fs-5" data-bs-toggle="modal" data-bs-target="#exampleModal">Send email</button>
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Send Email</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="<?php echo route('cars/' . $car->id . '/share') ?>" method="POST">
                                            <div class="modal-body">
                                                <input type="hidden" name="myemail" value="<?php echo $user->email ?>">
                                                <div class="mb-3">
                                                    <label for="foremail" class="col-form-label">For:</label>
                                                    <input type="email"  name="foremail" value="<?php echo $car->user->email ?>" class="form-control" id="foremail" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="title" class="col-form-label">Subject:</label>
                                                    <input type="text" name="title" class="form-control" id="title" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="message" class="col-form-label">Message:</label>
                                                    <textarea name="message" class="form-control" id="message" required></textarea>
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" value="Share" class="btn btn-primary">Send email</button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        <?php
                        } else {
                        ?>
                            <button type="button" class="btn btn-message fs-5" onclick="window.location.href='<?php echo route('login'); ?>'">Send email</button>
                        <?php
                        }
                        ?>

                    </div>
                    <div class="bg-user p-4 mt-5">
                        <h5 class="text-light pb-2">Address</h5>
                        <i class="fa-solid fa-location-dot text-light pe-2"></i>
                        <span class="text-light"><?php echo $car->address; ?></span>

                    </div>
                </div>

                <div class=" bg-carinfo mt-3 p-4 mb-4">
                    <div class="RightLeft">
                        <span class="text-light fs-3"><?php echo $car->model->brand->name . ' ' . $car->model->name ?></span>
                        <?php
                        if (isset($_SESSION["userid"]) && $_SESSION["userrole"] == 1) {
                        ?>
                            <?php
                            $is_favorite = false;
                            foreach ($favorites as $favorite) {
                                if ($favorite->user_id == $_SESSION['userid'] && $favorite->car_id == $car->id) {
                                    $is_favorite = true;
                                    break;
                                }
                            }
                            if ($is_favorite) {
                            ?>
                                <button disabled style="background-color: transparent; border:none;" class="priceStyle getFav"><i class="fa-solid fa-heart fa-xl"></i></button>
                            <?php
                            } else {
                            ?>
                                <button id="getFav" style="background-color: transparent; border:none " class="priceStyle getFav"><i class="fa-regular fa-heart fa-xl"></i></button>
                            <?php
                            }
                        } else if (isset($_SESSION["userid"]) && $_SESSION["userrole"] == 2) {
                            ?>
                            <form class="m-1 form-inline float-right" method="POST" action="<?php echo route('carsDelete/' . $car->id); ?>">
                                <input type="hidden" name="car_id" value="<?php echo $car->id ?>">
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        <?php
                        }
                        ?>

                    </div>
                    <p class="text-light fs-1 fw-bold"><?php echo $car->price . ' €'; ?></p>
                    <ul class="list-group list-group-horizontal">
                        <li class="list-group-item"><?php echo 'Model: ' . $car->model->name; ?></li>
                        <li class="list-group-item"><?php echo 'Year: ' . $car->year; ?></li>
                        <li class="list-group-item"><?php echo 'Engine capacity: ' . $car->engine_capacity; ?></li>
                        <li class="list-group-item"><?php echo 'Fuel type: ' . $car->fuelsType->name; ?></li>
                        <li class="list-group-item"><?php echo 'Power car: ' . $car->power_car; ?></li>
                        <li class="list-group-item"><?php echo 'Kilometers: ' . $car->km . ' km'; ?></li>
                        <li class="list-group-item"><?php echo 'Box type: ' . $car->boxType->name; ?></li>
                        <li class="list-group-item"><?php echo 'Condition: ' . $car->condition->name; ?></li>
                        <li class="list-group-item"><?php echo 'Doors: ' . $car->door; ?></li>
                        <li class="list-group-item"><?php echo 'Places: ' . $car->place; ?></li>
                        <li class="list-group-item"><?php echo 'Color: ' . $car->color; ?></li>
                    </ul>
                    <h2 class="text-light mt-3">Description</h2>
                    <p class="text-light"><?php echo $car->description ?></p>
                </div>
            </div>
        <?php
        }
        ?>


    </main>

    <?php
    include 'footer.view.php';
    ?>
    <!-- Script -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="<?php echo route('js_bootstrap/bootstrap.bundle.js'); ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script>
        $(document).on('click', '#getFav', function() {
            var car_id = <?php echo $car->id; ?>;
            var user_id = <?php echo $_SESSION['userid']; ?>;

            $.ajax({
                url: "<?php echo route('Favorites/store'); ?>",
                method: "post",
                dataType: "json",
                data: {
                    car_id: car_id,
                    user_id: user_id
                },
                success: function() {
                    $('#getFav i').toggleClass('fa-regular fa-heart fa-xl').toggleClass('fa-solid fa-heart fa-xl');
                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseText);
                }
            });
        });
    </script>
</body>

</html>