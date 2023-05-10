<?php

use App\Database\Connection;
use App\Database\QueryBuilder;

$connection = Connection::make();
$queryBuilder = new QueryBuilder($connection);



if (isset($_POST['input'])) {
    $input = $_POST['input'];
    $cars = $queryBuilder->getSearch($input,'App\Model\Cars');
    $favorites = $queryBuilder->getAll('Favorites', 'App\Model\Favorites');
    foreach ($cars as $car) {
        $car->model = $queryBuilder->findById('Models', $car->model_id, 'App\Model\Models');
        $car->fuelsType = $queryBuilder->findById('FuelTypes', $car->fuelsType_id, 'App\Model\FuelTypes');
        $car->condition = $queryBuilder->findById('Conditions', $car->condition_id, 'App\Model\Conditions');
        $car->boxType = $queryBuilder->findById('BoxTypes', $car->boxType_id, 'App\Model\BoxTypes');
        $car->model->brand = $queryBuilder->findById('Brands', $car->model->brand_id, 'App\Model\Brands');
        $car->state = $queryBuilder->findById('States', $car->state_id, 'App\Model\States');
    }

    if (count($cars) > 0) {
        foreach ($cars as $car) {
            if ($car->state->name == 'approved') {
?>
                <div class="row mb-4 bg-AllCars mx-1 ">
                    <div class="col-lg-3">
                        <img class="image-container mt-2 mb-2 pt-2 pb-2" src="Imagens/<?php echo $car->id . '.jpg'; ?>">
                    </div>
                    <div class="col-lg-9 pt-3 pe-5">
                        <div class="RightLeft">
                            <a class="ahome fs-3" href="<?php echo route('cars/' . $car->id); ?>"><?php echo $car->model->brand->name . ' ' . $car->model->name; ?></a>
                            <span class="priceStyle"><?php echo $car->price . ' €'; ?></span>
                        </div>
                        <div style="margin-top: 150px;">
                            <p class="priceStyle "><?php echo $car->address; ?></p>
                            <div class="RightLeft">
                                <span class="priceStyle"><i class="fa-solid fa-gauge-high"></i><?php echo ' ' . $car->year . ' - ' . $car->km . ' km'; ?></span>
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
                                    ?>
                                <?php
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
                        </div>
                    </div>
                </div>
<?php
            }
        }
    } else {
        echo "<h6 class='text-danger text-center mt-3'>No data Found</h6>";
    }
}


?>