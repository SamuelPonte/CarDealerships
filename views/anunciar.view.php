<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anunciar carros</title>
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
    <main class="ps-5 pe-5">

        <div class=" mt-5 mb-5">
            <h2>Post advert</h2>
        </div>
        <form method="POST" action="<?php echo route('SellCars'); ?>" enctype="multipart/form-data">
            <input type="hidden" class="form-control" name="user_id" value="<?php echo $_SESSION["userid"]?>"/>
            <div class="bg-SellCar">
                <h5 class="fw-bold mb-1 pt-5 pb-3 ms-5 me-5 text-light">Title</h5>
                <div class="form-outline mb-4 ms-5 me-5 ">
                    <label class="form-label text-light" for="brand_id">Brand of the car</label>
                    <select name="brand_id" id="brand-select" class="form-control form-select" required onchange="updateModels()">
                        <option value="" disabled selected>select</option>
                        <?php
                        foreach ($brands as $brand) {
                        ?>
                            <option value="<?php echo $brand->id ?>"><?php echo $brand->name ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="form-outline pb-5 ms-5 me-5">
                    <label class="form-label text-light" for="model_id">Model of the car</label>
                    <select name="model_id" id="model-select" class="form-control form-select" required>
                        <option value="" disabled selected>select</option>

                    </select>
                </div>
            </div>

            <div class="bg-SellCar mt-3">
                <h5 class="fw-bold mb-1 pb-3 pt-5 ms-5 me-5 text-light">Images</h5>
                <div class="form-outline mb-4 ms-5 me-5 pb-5">
                    <label class="form-label text-light">The first image is the main photo of your ad. Drag and drop images to change order
                    </label>
                    <input class="form-control" type="file" id="img" name="img" accept="image/jpeg" multiple required>
                    <input class="form-control" type="file" id="img1" name="img1" accept="image/jpeg" multiple >
                    <input class="form-control" type="file" id="img2" name="img2" accept="image/jpeg" multiple >
                    <input class="form-control" type="file" id="img3" name="img3" accept="image/jpeg" multiple >
                    <input class="form-control" type="file" id="img4" name="img4" accept="image/jpeg" multiple >
                </div>
            </div>

            <div class="bg-SellCar mt-3">
                <div class="form-outline mb-4 ms-5 me-5 pb-5 pt-5">
                    <label class="form-label text-light" for="price">Price</label>
                    <input type="text" id="price" class="form-control" name="price" required />
                </div>
            </div>

            <div class="bg-SellCar mt-3">
                <h5 class="fw-bold mb-1 pt-5 pb-3 ms-5 me-5 text-light">Other details </h5>
                <div class="form-outline mb-4 ms-5 me-5">
                    <label class="form-label text-light" for="year">Year</label>
                    <input type="text" id="year" class="form-control " name="year" required />
                </div>
                <div class="form-outline mb-4 ms-5 me-5">
                    <label class="form-label text-light" for="engine">Engine capacity</label>
                    <input type="text" id="engine" class="form-control " name="engine" required />
                </div>
                <div class="form-outline mb-4 ms-5 me-5">
                    <label class="form-label text-light" for="fuel">Fuel type</label>
                    <select name="fuel" class="form-control form-select" required>
                        <option value="" disabled selected>Selecionar</option>
                        <?php
                        foreach ($fuelTypes as $fuelType) {
                        ?>
                            <option value="<?php echo $fuelType->id ?>"><?php echo $fuelType->name ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="form-outline mb-4 ms-5 me-5">
                    <label class="form-label text-light" for="power">Power of the car</label>
                    <input type="text" id="power" class="form-control " name="power" required />
                </div>
                <div class="form-outline mb-4 ms-5 me-5">
                    <label class="form-label text-light" for="km">Kilometers</label>
                    <input type="text" id="km" class="form-control" name="km" required />
                </div>
                <div class="form-outline mb-4 ms-5 me-5">
                    <label class="form-label text-light" for="box">Box type</label>
                    <select name="box" class="form-control form-select" required>
                        <option value="" disabled selected>Selecionar</option>
                        <?php
                        foreach ($boxTypes as $boxType) {
                        ?>
                            <option value="<?php echo $boxType->id ?>"><?php echo $boxType->name ?></option>
                        <?php
                        }
                        ?>

                    </select>
                </div>
                <div class="form-outline mb-4 ms-5 me-5">
                    <label class="form-label text-light" for="condition">Condition</label>
                    <select name="condition" class="form-control form-select" required>
                        <option value="" disabled selected>Selecionar</option>
                        <?php
                        foreach ($conditions as $condition) {
                        ?>
                            <option value="<?php echo $condition->id ?>"><?php echo $condition->name ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="form-outline mb-4 ms-5 me-5">
                    <label class="form-label text-light" for="door">Door</label>
                    <input type="text" id="door" class="form-control " name="door" required />
                </div>
                <div class="form-outline mb-4 ms-5 me-5">
                    <label class="form-label text-light" for="place">Place in the car</label>
                    <input type="text" id="place" class="form-control" name="place" required />
                </div>
                <div class="form-outline mb-4 ms-5 me-5 pb-5">
                    <label class="form-label text-light" for="color">Color</label>
                    <input type="text" id="color" class="form-control" name="color" required />
                </div>
            </div>

            <div class="bg-SellCar mt-3">
                <div class="form-outline mb-4 ms-5 me-5 pb-5 pt-5">
                    <label class="form-label text-light" for="description">Description</label>
                    <input type="text" id="description" class="form-control" name="description" required />
                </div>
            </div>

            <div class="bg-SellCar mt-3">
                <div class="form-outline mb-4 ms-5 me-5 pb-5 pt-5">
                    <label class="form-label text-light" for="address">Location</label>
                    <input type="text" id="address" class="form-control" name="address" required />
                </div>
            </div>

            <div class="mt-3 mb-3">
                <button class="btn btn-postAdvert btn-lg btn-block text-white" type="submit" name="submit">Post advert</button>
            </div>
        </form>


    </main>
    <?php
    include 'footer.view.php';
    ?>
    <!-- Script -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="<?php echo route('js_bootstrap/bootstrap.bundle.js'); ?>"></script>
    <script>
        function updateModels() {
            var brandSelect = document.getElementById("brand-select");
            var modelSelect = document.getElementById("model-select");

            
            modelSelect.innerHTML = '<option value="" disabled selected>Select</option>';

            var brandId = brandSelect.value;
            
            var models = <?php echo json_encode($models) ?>;
            var brandModels = models.filter(function(model) {
                return model.brand_id == brandId;
            });

            
            brandModels.forEach(function(model) {
                var option = document.createElement("option");
                option.value = model.id;
                option.text = model.name;
                modelSelect.appendChild(option);
            });
        }
    </script>
</body>

</html>