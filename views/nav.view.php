<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nav</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link href="https://fonts.cdnfonts.com/css/viner-hand-itc" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo route('css_bootstrap/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?php echo route('Style/header.css') ?>">
</head>

<body>
    <nav class="navbar navbar-dark navbar-expand-lg bg-body-tertiary sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand ms-5" href="<?php echo route(''); ?>">
                <img src="<?php echo route('Imagens/logo_white.png') ?>" alt="" width="100px">
            </a>
            <div class="d-flex mx-auto bg-light rounded-pill p-2 ms-lg-5 search-form flex-grow-1 me-4">
                <input id="live_search" class="form-control border-0 me-2 bg-light" type="text" placeholder="Search" aria-label="Search">
                <button style="border: none;" class="btn" disabled><i class="fas fa-search"></i></button>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end bg-offcanvas" style="background-color: black;" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title text-white font-text" id="offcanvasNavbarLabel">Car Dealership</h5>
                    <button type="button" class="btn" data-bs-dismiss="offcanvas" aria-label="Close">
                        <i class="fa-solid fa-xmark fa-lg" style="color: white;"></i>
                    </button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <?php
                        if (isset($_SESSION["userid"]) && isset($_SESSION["userrole"])) {
                            if ($_SESSION["userrole"] == 1) {
                        ?>

                                <li class="nav-item">
                                    <a class="nav-link pe-4" aria-current="page" href="<?php echo route('Favorites'); ?>">
                                        <i class="fa-regular fa-heart pe-2 fa-lg"></i>Favorites
                                    </a>
                                </li>
                            <?php
                            }
                            ?>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle pe-4" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <?php echo $_SESSION["username"]; ?>
                                </a>
                                <?php
                                if ($_SESSION["userrole"] == 1) {
                                ?>

                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="<?php echo route('MyAdverts'); ?>">My Adverts</a></li>
                                        <li><a class="dropdown-item" href="<?php echo route('PersonalData/' . $_SESSION["userid"]); ?>">Personal data</a></li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="dropdown-item" href="<?php echo route('logout'); ?>">Logout</a></li>
                                    </ul>
                                <?php
                                } else {
                                ?>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="<?php echo route('UserAdverts'); ?>">User Adverts</a></li>
                                        <li><a class="dropdown-item" href="<?php echo route('PersonalData/' . $_SESSION["userid"]); ?>">Personal data</a></li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="dropdown-item" href="<?php echo route('logout'); ?>">Logout</a></li>
                                    </ul>
                                <?php
                                }
                                ?>

                            </li>
                        <?php
                        } else {
                        ?>
                            <li class="nav-item">
                                <a class="nav-link pe-4" aria-current="page" href="<?php echo route('login'); ?>">
                                    <i class="fa-regular fa-user pe-2 fa-lg"></i>Login/Register
                                </a>
                            </li>
                        <?php
                        }
                        ?>
                        <li class="nav-item pe-2 me-2">
                            <a class="nav-link btn bg-color fw-bold" href="<?php if (isset($_SESSION["userid"]) && $_SESSION["userrole"] == 1) {
                                                                                echo route('SellCars');
                                                                            } else {
                                                                                echo route('login');
                                                                            }  ?>">
                                Sell My Cars
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- Script -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="<?php echo route('js_bootstrap/bootstrap.bundle.js') ?>"></script>
    
    <script>
        $(document).ready(function(){
            $("#live_search").keyup(function(){
                var input = $(this).val();
                
                if (input != "") {
                    $.ajax({
                        url: "<?php echo route('livesearch'); ?>",
                        method: "POST",
                        data:{input:input},
                        success: function(data){
                            $('#car-list').html(data);
                            $('#car-list').css("display","block");
                        }
                    });
                }else{
                    $('#car-list').css("display","none");
                }
            });
        });
    </script>

</body>

</html>