<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  <link href="https://fonts.cdnfonts.com/css/viner-hand-itc" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo route('css_bootstrap/bootstrap.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo route('Style/main.css'); ?>">
</head>

<body>
  <?php
  include 'nav.view.php';
  ?>
  <main class="container">
    <div class=" mt-5">
      <div class="row">
        <div class="col-lg-3">
          <span>Brand</span>
          <select name="brand_id" id="brand-select" class="form-control form-select" onchange="updateModels()">
            <option value="">Show all</option>
            <?php
            foreach ($brands as $brand) {
            ?>
              <option value="<?php echo $brand->id ?>"><?php echo $brand->name ?> </option>

            <?php
            }
            ?>
          </select>
        </div>
        <div class="col-lg-3">
          <span>Model</span>
          <select name="model_id" id="model-select" class="form-control form-select">
            <option value="">Select</option>
          </select>
        </div>
        <div class="col-lg-1">
          <span>Price</span>
          <select name="priceFrom" id="priceFrom" class="form-control ">
            <option value="">From</option>
            <option value="1000">1000</option>
            <option value="2000">2000</option>
            <option value="3000">3000</option>
            <option value="4000">4000</option>
            <option value="5000">5000</option>
            <option value="6000">6000</option>
            <option value="7000">7000</option>
            <option value="8000">8000</option>
            <option value="9000">9000</option>
            <option value="10000">10 000</option>
            <option value="12000">12 000</option>
            <option value="14000">14 000</option>
            <option value="16000">16 000</option>
            <option value="18000">18 000</option>
            <option value="20000">20 000</option>
            <option value="22000">22 000</option>
            <option value="24000">24 000</option>
            <option value="26000">26 000</option>
            <option value="28000">28 000</option>
            <option value="30000">30 000</option>
            <option value="32000">32 000</option>
            <option value="34000">34 000</option>
            <option value="36000">36 000</option>
            <option value="38000">38 000</option>
            <option value="40000">40 000</option>
            <option value="50000">50 000</option>
            <option value="60000">60 000</option>
            <option value="70000">70 000</option>
            <option value="80000">80 000</option>
            <option value="90000">90 000</option>
            <option value="100000">100 000</option>
            <option value="150000">150 000</option>
            <option value="200000">200 000</option>
            <option value="250000">250 000</option>
            <option value="300000">300 000</option>
            <option value="350000">350 000</option>
            <option value="400000">400 000</option>
            <option value="500000">500 000</option>
          </select>
        </div>
        <div class="col-lg-1">
          <select name="priceTo" id="priceTo" class="form-control " style="margin-top: 22px;">
            <option value="">To</option>
            <option value="1000">1000</option>
            <option value="2000">2000</option>
            <option value="3000">3000</option>
            <option value="4000">4000</option>
            <option value="5000">5000</option>
            <option value="6000">6000</option>
            <option value="7000">7000</option>
            <option value="8000">8000</option>
            <option value="9000">9000</option>
            <option value="10000">10 000</option>
            <option value="12000">12 000</option>
            <option value="14000">14 000</option>
            <option value="16000">16 000</option>
            <option value="18000">18 000</option>
            <option value="20000">20 000</option>
            <option value="22000">22 000</option>
            <option value="24000">24 000</option>
            <option value="26000">26 000</option>
            <option value="28000">28 000</option>
            <option value="30000">30 000</option>
            <option value="32000">32 000</option>
            <option value="34000">34 000</option>
            <option value="36000">36 000</option>
            <option value="38000">38 000</option>
            <option value="40000">40 000</option>
            <option value="50000">50 000</option>
            <option value="60000">60 000</option>
            <option value="70000">70 000</option>
            <option value="80000">80 000</option>
            <option value="90000">90 000</option>
            <option value="100000">100 000</option>
            <option value="150000">150 000</option>
            <option value="200000">200 000</option>
            <option value="250000">250 000</option>
            <option value="300000">300 000</option>
            <option value="350000">350 000</option>
            <option value="400000">400 000</option>
            <option value="500000">500 000</option>
          </select>
        </div>
        <div class="col-lg-1"></div>
        <div class="col-lg-1">
          <span>Year</span>
          <select name="yearFrom" id="yearFrom" class="form-control ">
            <option value="">From</option>
            <option value="1900">1900</option>
            <option value="1930">1930</option>
            <option value="1960">1960</option>
            <option value="1980">1980</option>
            <option value="1990">1990</option>
            <option value="1995">1995</option>
            <option value="2000">2000</option>
            <option value="2001">2001</option>
            <option value="2002">2002</option>
            <option value="2003">2003</option>
            <option value="2004">2004</option>
            <option value="2005">2005</option>
            <option value="2006">2006</option>
            <option value="2007">2007</option>
            <option value="2008">2008</option>
            <option value="2009">2009</option>
            <option value="2010">2010</option>
            <option value="2011">2011</option>
            <option value="2012">2012</option>
            <option value="2013">2013</option>
            <option value="2014">2014</option>
            <option value="2015">2015</option>
            <option value="2016">2016</option>
            <option value="2017">2017</option>
            <option value="2018">2018</option>
            <option value="2019">2019</option>
            <option value="2020">2020</option>
            <option value="2021">2021</option>
            <option value="2022">2022</option>
            <option value="2023">2023</option>
          </select>
        </div>
        <div class="col-lg-1">
          <select name="yearTo" id="yearTo" class="form-control " style="margin-top: 22px;">
            <option value="">To</option>
            <option value="1900">1900</option>
            <option value="1930">1930</option>
            <option value="1960">1960</option>
            <option value="1980">1980</option>
            <option value="1990">1990</option>
            <option value="1995">1995</option>
            <option value="2000">2000</option>
            <option value="2001">2001</option>
            <option value="2002">2002</option>
            <option value="2003">2003</option>
            <option value="2004">2004</option>
            <option value="2005">2005</option>
            <option value="2006">2006</option>
            <option value="2007">2007</option>
            <option value="2008">2008</option>
            <option value="2009">2009</option>
            <option value="2010">2010</option>
            <option value="2011">2011</option>
            <option value="2012">2012</option>
            <option value="2013">2013</option>
            <option value="2014">2014</option>
            <option value="2015">2015</option>
            <option value="2016">2016</option>
            <option value="2017">2017</option>
            <option value="2018">2018</option>
            <option value="2019">2019</option>
            <option value="2020">2020</option>
            <option value="2021">2021</option>
            <option value="2022">2022</option>
            <option value="2023">2023</option>
          </select>
        </div>
        <div class="col-lg-1"></div>


        <div class="col-lg-3">
          <span>Fuel Type</span>
          <select name="fuelType_id" id="fuelType_id" class="form-control form-select">
            <option value="">Show all</option>
            <?php
            foreach ($FuelTypes as $FuelType) {
            ?>
              <option value="<?php echo $FuelType->id ?>"><?php echo $FuelType->name ?></option>
            <?php
            }
            ?>
          </select>
        </div>
        <div class="col-lg-3">
          <span>Conditions</span>
          <select name="condition_id" id="condition_id" class="form-control form-select">
            <option value="">Show all</option>
            <?php
            foreach ($Conditions as $Condition) {
            ?>
              <option value="<?php echo $Condition->id ?>"><?php echo $Condition->name ?></option>
            <?php
            }
            ?>
          </select>
        </div>
        <div class="col-lg-3">
          <span>Box Type</span>
          <select name="boxType_id" id="boxType_id" class="form-control form-select">
            <option value="">Show all</option>
            <?php
            foreach ($BoxTypes as $BoxType) {
            ?>
              <option value="<?php echo $BoxType->id ?>"><?php echo $BoxType->name ?></option>
            <?php
            }
            ?>
          </select>
        </div>
        <div class="col-lg-3">
          <span>Places</span>
          <select name="place" id="place" class="form-control form-select">
            <option value="">Show all</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
          </select>
        </div>


        <div class="col-lg-3">
          <span>Order by</span>
          <select name="orderBy" id="orderBy" class="form-control form-select">
            <option value="cheaper">Cheaper</option>
            <option value="expensive">More expensive</option>
          </select>
        </div>
      </div>
    </div>
    <hr>

    <div class="mt-4" id="car-list">
      <?php
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
  <script src="<?php echo route('js_bootstrap/bootstrap.bundle.js'); ?>"></script>

  <!-- AJAX -->
  <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
  <!-- Favoritos botão -->
  <script>
    $('#car-list').on('click', '.getFav', function() {

      $.ajax({
        url: "<?php echo route('Favorites/store'); ?>",
        method: "post",
        dataType: "json",
        data: {
          car_id: $(this).closest('.bg-AllCars').find('.image-container').attr('src').split('/')[1].split('.')[0],
          user_id: <?php echo $_SESSION['userid']; ?>
        },
        success: function() {
          $(this).find('i').toggleClass('fa-regular fa-heart fa-xl').toggleClass('fa-solid fa-heart fa-xl');
          location.reload();

        }
      });
    });
  </script>
  <!-- Aparecer model devido ao brand -->
  <script>
    function updateModels() {
      var brandSelect = document.getElementById("brand-select");
      var modelSelect = document.getElementById("model-select");

      
      modelSelect.innerHTML = '<option value="" >Show all</option>';

      
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
  <!-- Filtrar -->
  <script>
    /* Filtrar */
    $(document).ready(function() {
      $('#brand-select,#model-select,#priceFrom,#priceTo,#yearFrom,#yearTo,#fuelType_id,#condition_id,#boxType_id,#place,#orderBy ').change(function() {
        let brand_id = $('#brand-select').val();
        let model_id = $('#model-select').val();
        let priceFrom = $('#priceFrom').val();
        let priceTo = $('#priceTo').val();
        let yearFrom = $('#yearFrom').val();
        let yearTo = $('#yearTo').val();
        let fuelType_id = $('#fuelType_id').val();
        let condition_id = $('#condition_id').val();
        let boxType_id = $('#boxType_id').val();
        let place = $('#place').val();
        let orderBy = $('#orderBy').val();

        $.ajax({
          url: "<?php echo route('filtrar'); ?>",
          method: "post",
          data: {
            brand_id: brand_id,
            model_id: model_id,
            priceFrom: priceFrom,
            priceTo: priceTo,
            yearFrom: yearFrom,
            yearTo: yearTo,
            fuelType_id: fuelType_id, 
            condition_id: condition_id,
            boxType_id: boxType_id,
            place: place,
            orderBy: orderBy
          },
          beforeSend: function() {
            $("#car-list").html("<span>Loading...</span>")
          },
          success: function(data) {
            // atualize o conteúdo da página com a resposta AJAX
            $('#car-list').html(data);
          }
        });
      });
    });
  </script>


</body>

</html>