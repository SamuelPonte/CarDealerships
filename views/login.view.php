<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link href="https://fonts.cdnfonts.com/css/viner-hand-itc" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo route('css_bootstrap/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?php echo route('Style/main.css') ?>">
    <link rel="stylesheet" href="<?php echo route('Style/login.css') ?>">
</head>

<body>
    <?php
    include 'nav.view.php';
    ?>
    <section class="vh-100">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 text-black">

                    <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5">

                        <form style="width: 23rem;" class="space-login" action="<?php echo route('login'); ?>" method="post">

                            <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Log in</h3>

                            <div class="form-outline mb-4">
                                <label class="form-label" for="username">Username</label>
                                <input type="text" id="username" class="form-control form-control-lg" name="username" required />
                            </div>

                            <div class="form-outline mb-4">
                                <label class="form-label" for="password">Password</label>
                                <input type="password" id="password" class="form-control form-control-lg" name="password" required />
                            </div>

                            <div class="pt-1 mb-4">
                                <button class="btn btn-bg btn-lg btn-block text-white" type="submit" name="submit">Login</button>
                            </div>

                            <?php
                            if (isset($_SESSION['errormsglogin'])) {
                                ?>
                                <div class="error-message">
                                    <?php echo $_SESSION['errormsglogin']; ?>
                                </div>
                                <?php
                            }
                            ?>

                            <p class="small mb-5 pb-lg-2"><a class="frog-pass" href="#">Forgot password?</a></p>
                            <p>Don't have an account? <a href="<?php echo route('NewAccount'); ?>" class="noAccount">Register here</a></p>

                        </form>
                        
                    </div>

                </div>
                <div class="col-lg-6 px-0 d-none d-lg-block">
                    <!-- http://radical-mag.com/wp-content/uploads/2022/09/Miura-3997-4-1-1280x1920.jpeg -->
                    <img src="Imagens/Miura-3997-4-1-1280x1920.jpeg" alt="Login image" class="w-100 vh-100" style="object-fit: cover; object-position: left;">
                </div>
            </div>
        </div>
    </section>
    <?php

    ?>
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