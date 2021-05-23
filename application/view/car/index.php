<div  class="container container">

    <div class="row">
        <div class="col mb-3">
            <h2 class="masthead-brand">autók listája</h2>
        </div>

        <div class="col text-right">
            <a href="<?php echo URL; ?>car/add">
                <button type="button" class="btn btn-outline-light">Új</button>
            </a>
        </div>
    </div>

    <form action="<?php echo URL; ?>car" method="POST">

        <div class="row">

            <div class="col-3 mb-3 ml-5">
                <label for="brand">Típus</label>
                <input type="text" class="form-control col-md-10" name="filter_brand" id="brand" placeholder="Típus" value="<?= isset($_POST['filter_brand']) ? $_POST['filter_brand'] : "" ?>">
            </div>

            <div class="col-3 mb-3">
                <label for="plate">Rendszám</label>
                <input type="text" class="form-control col-md-10" name="filter_plate" id="plate" placeholder="Rendszám" value="<?= isset($_POST['filter_plate']) ? $_POST['filter_plate'] : "" ?>">
            </div>

            <?php
            if($_SESSION['admin']){
                ?>
                <div class="col-3 mb-3">
                    <label for="user">Autó használója</label>
                    <select class="custom-select d-block col-md-10" name="filter_user" id="user">
                        <option value="0">Mindenki</option>
                        <?php
                        foreach($users as $user){
                            ?>
                            <option value="<?php echo $user->id ?>" <?php if($user->id == (isset($_POST['filter_user'])?$_POST['filter_user']:-1)){ ?>selected<?php } ?>><?php echo $user->last_name ?> <?php echo $user->first_name ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
                <?php
            }
            ?>

            <div class="col modal-dialog-centered">
                <button type="submit" class="btn btn-outline-light" style="height: 50px;" name="submit_filter">Szűrés</button>
            </div>

        </div>

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