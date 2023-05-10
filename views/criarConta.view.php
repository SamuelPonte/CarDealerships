<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Conta</title>
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
                <div class="col-lg-6 px-0 d-none d-lg-block">
                    <!-- https://i.pinimg.com/originals/f3/ea/66/f3ea66d125d99953d5c9b783eb58d615.jpg -->
                    <img src="Imagens/mercedes_1280x1920.jpg" alt="Login image" class="w-100 vh-100" style="object-fit: cover; object-position: left;">
                </div>
                <div class="col-lg-6 text-black">

                    <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5">

                        <form style="width: 23rem;" class="space-login" action="<?php echo route('NewAccount'); ?>" method="post">

                            <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">New Account</h3>

                            <div class="form-outline mb-4">
                                <label class="form-label" for="name">Name</label>
                                <input type="text" id="name" class="form-control form-control-lg" name="name" required />
                            </div>

                            <div class="form-outline mb-4">
                                <label class="form-label" for="email">Email</label>
                                <input type="email" id="email" class="form-control form-control-lg" name="email" required />
                            </div>

                            <div class="form-outline mb-4">
                                <label class="form-label" for="phone">Phone number</label>
                                <input type="text" id="phone" class="form-control form-control-lg" name="phone" required />
                            </div>

                            <div class="form-outline mb-4">
                                <label class="form-label" for="data">Birthdate</label>
                                <input type="date" id="data" class="form-control form-control-lg" name="data" required />
                            </div>

                            <div class="form-outline mb-4">
                                <label class="form-label" for="username">Username</label>
                                <input type="text" id="username" class="form-control form-control-lg" name="username" required />
                            </div>

                            <div class="form-outline mb-4">
                                <label class="form-label" for="password">Password</label>
                                <input type="password" id="password" class="form-control form-control-lg" name="password" required />
                            </div>

                            <div class="form-outline mb-4">
                                <label class="form-label" for="passwordRepeat">Repeat Password</label>
                                <input type="password" id="passwordRepeat" class="form-control form-control-lg" name="passwordRepeat" required />
                            </div>

                            <div class="pt-1 mb-4">
                                <button class="btn btn-bg btn-lg btn-block text-white" type="submit" name="submit">Create account</button>
                            </div>
                            <?php
                            if (isset($_SESSION['errormsg'])) {
                                ?>
                                <div class="error-message">
                                    <?php echo $_SESSION['errormsg']; ?>
                                    
                                </div>
                                <?php
                            }
                            ?>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </section>
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