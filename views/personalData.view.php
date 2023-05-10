<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Data</title>
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

    <main class="container-persData mb-3">
        <?php
        if ($_SESSION["userid"] == $user->id) {
        ?>
            <div class="mt-4 bg-AllCars">
                <form action="<?php echo route('PersonalDataUpdate/' . $user->id) ?>" method="POST">
                    <input type="hidden" name="_method" value="PATCH">
                    <div class="px-4 pt-5">
                        <h2 class="text-light">Personal Data</h2>
                    </div>
                    <div class="row px-4 pb-5">
                        <div class="col-lg-6">
                            <h4 class="text-light">Name:</h4>
                            <input type="text" class="form-control" name="name" value="<?php echo $user->name; ?>" required>
                        </div>
                        <div class="col-lg-6">
                            <h4 class="text-light">Username:</h4>
                            <input type="text" class="form-control" name="username" value="<?php echo $user->username; ?>" required>
                        </div>

                        <div class="col-lg-6">
                            <h4 class="text-light">Birthdate:</h4>
                            <input type="date" class="form-control" name="data" value="<?php echo $user->birthdate; ?>" required>
                        </div>
                        <div class="col-lg-6">
                            <h4 class="text-light">Email:</h4>
                            <input type="text" class="form-control" name="email" value="<?php echo $user->email; ?>" required>
                        </div>

                        <div class="col-lg-6">
                            <h4 class="text-light">Phone number:</h4>
                            <input type="text" class="form-control" name="phone" value=" <?php echo $user->phone; ?>" required>
                        </div>
                        <div class="col-lg-6">
                            <button type="submit" class="btn btn-bgPersonal">Save</button>
                        </div>
                    </div>
                </form>
                <?php
                if (isset($_SESSION['errormsgPersonal'])) {
                ?>
                    <div class="error-message">
                        <?php echo $_SESSION['errormsgPersonal']; ?>

                    </div>
                <?php
                }
                ?>
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
    <script src="<?php echo route('js_bootstrap/bootstrap.bundle.js') ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>