<div class="card text-white bg-secondary m-3" style="width: 30rem;">
    <div class="card-header">
        <div class="row">
            <h3 class="col-8"><?php echo $car->brand ?></h3>
            <h3 class="col-4 card bg-light text-dark text-center"><?php echo $car->plate ?></h3>
        </div>
    </div>
    <div class="card-body">

        <div class="row mb-1">
            <h5 class="col-7">Km óra állás:</h5>
            <h5 class="col-5"><?php echo $car->kilometers ?></h5>
        </div>

        <div class="row mb-1">
            <h5 class="col-7">Évjárat:</h5>
            <h5 class="col-5"><?php echo $car->year ?></h5>
        </div>

        <?php if($_SESSION['admin']){ ?>
            <div class="row mb-1">
                <h5 class="col-7">Felhasználó:</h5>
                <h5 class="col-5"><?php echo $car->user ?></h5>
            </div>
        <?php } ?>

        <div class="row mx-auto">
            <a href="<?php echo URL; ?>car/edit?id=<?php echo $car->id ?>" class="btn btn-light btn-lg" >Részletek</a>
        </div>

    </div>
</div>