<div  class="container container">

    <div class="row">
        <div class="col">
            <h2 class="masthead-brand">Adataim módosítása</h2>
        </div>
    </div>

    <form action="<?php echo URL; ?>user/settings" method="POST">

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="lastName">Vezetéknév</label>
                <input type="text" class="form-control" name="lastName" id="lastName" placeholder="vezetéknév" value="<?php echo $user->getLastName() ?>" required>
            </div>

            <div class="col-md-6 mb-3">
                <label for="firstName">Keresztnév</label>
                <input type="text" class="form-control" name="firstName" id="firstName" placeholder="keresztnév" value="<?php echo $user->getFirstName() ?>" required>
            </div>
        </div>

        <div class="mb-3">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="valami@doamin.com" value="<?php echo $user->getEmail() ?>" required>
            <small id="emailHelp" class="form-text text-muted">Az e-mail címedet nem adjuk ki senkinek.</small>
        </div>
        <?php
        if(isset($_SESSION['edit_form_error']['emial_missing'])){
            if($_SESSION['edit_form_error']['emial_missing']){
                ?>
                <div class="alert alert-danger" role="alert">
                    Kérlek add meg az e-mail címet.
                </div>
                <?php
                unset($_SESSION['edit_form_error']['emial_invalidFormat']);
            }
        }
        ?>
        <?php
        if(isset($_SESSION['edit_form_error']['emial_invalidFormat'])){
            if($_SESSION['edit_form_error']['emial_invalidFormat']){
                ?>
                <div class="alert alert-danger" role="alert">
                    Hibás e-mail formátum.
                </div>
                <?php
                unset($_SESSION['edit_form_error']['emial_invalidFormat']);
            }
        }
        ?>
        <?php
        if(isset($_SESSION['edit_form_error']['emial_exists'])){
            if($_SESSION['edit_form_error']['emial_exists']){
                ?>
                <div class="alert alert-danger" role="alert">
                    Ezzel az e-mail címmel már létezik felhasználó.
                </div>
                <?php
                unset($_SESSION['edit_form_error']['emial_exists']);
            }
        }
        ?>

        <div class="mb-3">
            <label for="phone">Telefonszám</label>
            <input type="tel" class="form-control" name="phone" id="phone" placeholder="+36301234567" value="<?php echo $user->getPhone() ?>" required>
        </div>


        <hr class="mb-4">

        <button class="btn btn-outline-light btn-lg btn-block col-8 mx-auto" name="submit_settingsUser" type="submit">Módosítás</button>

    </form>

</div>