<div class="card text-white bg-secondary m-3" style="width: 14rem;">
    <div class="card-header">
        <h5 class="card-title"><?= $car->brand ?> <?= $car->plate ?></h5>
    </div>
    <div class="card-body">
        <h5 class="card-title"><?= $car->kilometers ?> km</h5>
        <h5 class="card-title"><?= $car->year ?></h5>
        <button type="button" class="btn btn-light">Részletek</button>
    </div>
</div>