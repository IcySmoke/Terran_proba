<div  class="container container">

    <div class="row">
        <div class="col">
            <h2 class="masthead-brand">autók listája</h2>
        </div>

        <div class="col text-right">
            <a href="<?php echo URL; ?>car/add">
                <button type="button" class="btn btn-outline-light">Új</button>
            </a>
        </div>
    </div>

    <form class="form-inline" action="<?php echo URL; ?>car" method="POST">
        <div class="form-group mb-2">
            <label for="brand" class="sr-only">Típus</label>
            <input type="text" class="form-control" name="filter_brand" id="brand" placeholder="Típus" value="<?= isset($_POST['filter_brand']) ? $_POST['filter_brand'] : "" ?>">
        </div>
        <div class="form-group mx-sm-3 mb-2">
            <label for="plate" class="sr-only">Rendszám</label>
            <input type="text" class="form-control" name="filter_plate" id="plate" placeholder="Rendszám" value="<?= isset($_POST['filter_plate']) ? $_POST['filter_plate'] : "" ?>">
        </div>
        <button type="submit" class="btn btn-primary mb-2" name="submit_filter">Szűrés</button>
    </form>

    <div class="row m-4">
        <?php if($cars){ ?>
            <?php foreach ($cars as $car){ ?>
                <?php include '_components/_card.php'; ?>
            <?php } ?>
        <?php }else{ ?>
            <div class="row">
                <h2>Nincs találat...</h2>
            </div>
        <?php } ?>

    </div>

</div>