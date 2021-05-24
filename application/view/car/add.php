<div  class="container container">

    <div class="row">
        <div class="col">
            <h2 class="masthead-brand">új autó felvétele</h2>
        </div>

        <div class="col text-right">
            <a href="<?php echo URL; ?>car">
                <button type="button" class="btn btn-outline-light">Lista</button>
            </a>
        </div>
    </div>

    <form action="<?php echo URL; ?>car/add" method="POST">

        <div class="form-group">
            <label for="brand">Típus</label>
            <input type="text" class="form-control" name="brand" id="brand" placeholder="Típus" value="<?php echo isset($_POST['brand'])?$_POST['brand']:'' ?>" required>
        </div>

        <div class="form-group">
            <label for="plate">Rendszám</label>
            <input type="text" class="form-control" name="plate" id="plate" placeholder="ABC-123" value="<?php echo isset($_POST['plate'])?$_POST['plate']:'' ?>" required>
        </div>

        <?php
        if(isset($_SESSION['newCar_error']['invalid_plate'])){
            if($_SESSION['newCar_error']['invalid_plate']){
                ?>
                <div class="alert alert-danger" role="alert">
                    Hibás rendszám formátum.
                </div>
                <?php
                unset($_SESSION['newCar_error']['invalid_plate']);
            }
        }
        ?>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="kilometers">Km óra állás</label>
                <input type="number" name="kilometers" id="kilometers" class="form-control" placeholder="Km óra állás" value="<?php echo isset($_POST['kilometers'])?$_POST['kilometers']:'' ?>" required>
            </div>

            <div class="col-md-6 mb-3">
                <label for="year">Évjárat</label>
                <input type="number" name="year" id="year" class="form-control" placeholder="Évjárat" value="<?php echo isset($_POST['year'])?$_POST['year']:'' ?>" required>
            </div>
        </div>

        <?php
        if(isset($_SESSION['newCar_error']['invalid_year'])){
            if($_SESSION['newCar_error']['invalid_year']){
                ?>
                    <div class="row float-right">
                        <div class="col-11 alert alert-danger" style="width: 270px" role="alert">
                            Érvénytelen év.
                        </div>
                    </div>
                <?php
                unset($_SESSION['newCar_error']['invalid_year']);
            }
        }
        ?>

        <div class="row col-6 mr-0">
            <div class="col-6">
                <h2>Státusz</h2>
            </div>

            <div class="col-6">
                <label class="switch">
                    <input type="checkbox" name="status" checked>
                    <span class="slider round"></span>
                </label>
            </div>
        </div>

        <?php if($_SESSION['admin']){ ?>
        <div class="col-md-6 mb-3">
            <label for="user">Autó használója</label>
            <select class="custom-select d-block col-md-10" name="user" id="user">
                <?php
                foreach($users as $user){
                    ?>
                    <option value="<?php echo $user->id ?>" <?php if($user->id == (isset($_POST['user'])?$_POST['user']:$_SESSION['userId'])){ ?>selected<?php } ?>><?php echo $user->last_name ?> <?php echo $user->first_name ?></option>
                    <?php
                }
                ?>
            </select>
        </div>
        <?php } ?>

        <hr class="mb-4">

        <button class="btn btn-outline-light btn-lg btn-block col-8 mx-auto" name="submit_addCar" type="submit">Mentés</button>

    </form>

</div>