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

    <div class="row m-4">
        <?php if($cars){ ?>
            <?php foreach ($cars as $car){ ?>
                <?php include '_components/_card.php'; ?>
            <?php } ?>
        <?php }else{ ?>
            <div class="row">
                <h2>Nincs még autód...</h2>
            </div>
        <?php } ?>

    </div>

</div>