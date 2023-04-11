<?php

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>


<body class="p-5 bg-light">
    <div class="container-sm">
        <form class="row g-3 w-50 m-auto bg-dark text-light p-3 rounded rounded-2" method="post">
            <div class="col-md-6">
                <div class="col-md-6">
                    <label for="inputname4" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" id="inputname4" value="<?= $data['name'] ?>">
                </div>
                <label for="inputEmail4" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="inputEmail4" value="<?= $data['email'] ?>">
            </div>
            <div class="col-2">
                <label for="inputCount4" class="form-label">Count</label>
                <input type="email" disabled class="form-control" id="inputCount4" value="<?= $_SESSION['index'] + 1 ?>">
            </div>
            <div class="col-12">
                <label for="inputphone" class="form-label">Phone</label>
                <input type="text" name="phone" class="form-control" id="inputphone" value="<?= $data['phone'] ?>">
            </div>
            <div class="col-12">
                <label for="inputstreet" class="form-label">street</label>
                <input type="text" name="street" class="form-control" id="inputstreet" value="<?= $data['street'] ?>">
            </div>
            <div class="col-12">
                <label for="inputbuildingNumber2" class="form-label">building Number</label>
                <input type="text" name="building_number" class="form-control" value="<?= $data['building_number'] ?>" id="inputbuildingNumber2">
            </div>
            <div class="col-md-6">
                <label for="inputCity" class="form-label">City</label>
                <input type="text" name="city" class="form-control" id="inputCity" value="<?= $data['city'] ?>">
            </div>
            <div class="col-md-6">
                <label for="inputRegion" class="form-label">Region</label>
                <input type="text" name="region" class="form-control" id="inputRegion" value="<?= $data['region'] ?>">
            </div>
            <div class="col-md-2">
                <label for="inputCountry" class="form-label">Country</label>
                <input type="text" name="country" class="form-control" id="inputCountry" value="<?= $data['country'] ?>">
            </div>
            <input type="text" name="option" class="form-control" id="inputOption" hidden>

            <div class="btn-group">
                <button type="submit" class="btn btn-primary" id="prev">prev</button>
                <button type="submit" class="btn btn-primary" id="next">Next</button>
                <button type="submit" class="btn btn-primary" id="update">update</button>
                <button type="submit" class="btn btn-primary" id="insert">insert</button>
                <!-- <button type="submit" class="btn btn-primary" id="save">save</button> -->
                <button type="submit" class="btn btn-primary" id="delete">delete</button>
            </div>

        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script>
        var btns = document.querySelectorAll(".btn-group button");
        var option = document.getElementById("inputOption");
        var form = document.querySelector("form");
        btns.forEach(btn => {
            btn.addEventListener("click", e => {
                e.preventDefault();
                e.stopPropagation();
                option.value = btn.id;
                console.log(option.value);
                form.submit();
            });
        })
    </script>
</body>

</html>