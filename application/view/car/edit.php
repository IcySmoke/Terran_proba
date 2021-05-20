<div  class="container container">

    <div class="row">
        <div class="col">
            <h2 class="masthead-brand"><?php echo $car->getBrand() ?> autó</h2>
        </div>

        <div class="col text-right">
            <a href="<?php echo URL; ?>car">
                <button type="button" class="btn btn-outline-light">Lista</button>
            </a>
            <a href="<?php echo URL; ?>car/add">
                <button type="button" class="btn btn-outline-light">Új</button>
            </a>
        </div>
    </div>
    <a href="<?php echo URL; ?>car/delete/?id=<?php echo $_GET['id'] ?>">
        <button type="button" class="btn btn-danger">autó törlése</button>
    </a>

    <form action="<?php echo URL; ?>car/edit?id=<?php echo $_GET['id'] ?>" method="POST">

        <div class="form-group">
            <label for="brand">Típus</label>
            <input type="text" class="form-control" name="brand" id="brand" placeholder="Típus" value="<?php echo $car->getBrand() ?>" required>
        </div>

        <div class="form-group">
            <label for="plate">Rendszám</label>
            <input type="text" class="form-control" name="plate" id="plate" placeholder="ABC-123" value="<?php echo $car->getPlate() ?>" required>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="kilometers">Km óra állás</label>
                <input type="number" name="kilometers" id="kilometers" class="form-control" placeholder="Km óra állás" value="<?php echo $car->getKilometers() ?>" required>
            </div>

            <div class="col-md-6 mb-3">
                <label for="year">Évjárat</label>
                <input type="number" name="year" id="year" class="form-control" placeholder="Évjárat" value="<?php echo $car->getYear() ?>" required>
            </div>
        </div>

        <div class="row">
            <h2>Státusz</h2>
            <label class="switch">
                <input type="checkbox" name="status" <?php if($car->isActive()){ ?> checked <?php } ?>>
                <span class="slider round"></span>
            </label>
        </div>

        <hr class="mb-4">

        <button class="btn btn-outline-light btn-lg btn-block col-8 mx-auto" name="submit_editCar" type="submit">Mentés</button>

    </form>

</div>