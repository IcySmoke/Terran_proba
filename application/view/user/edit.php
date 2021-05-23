<div  class="container container">

    <div class="row">
        <div class="col">
            <h2 class="masthead-brand"><?php echo $user->getLastName() ?> <?php echo $user->getFirstName() ?></h2>
        </div>

        <div class="col text-right">
            <a href="<?php echo URL; ?>user">
                <button type="button" class="btn btn-outline-light">Lista</button>
            </a>
        </div>
    </div>
    <a href="<?php echo URL; ?>user/delete/?id=<?php echo $_GET['id'] ?>">
        <button type="button" class="btn btn-danger">munkatárs törlése</button>
    </a>

    <form action="<?php echo URL; ?>user/edit?id=<?php echo $_GET['id'] ?>" method="POST">

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

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="password">Jelszó</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="jelszó">
                <small id="passwordHelpBlock" class="form-text text-muted">
                    A jelszónak legalább 6, maximum 20 karakter hosszúnak kell lennie.
                </small>
            </div>

            <div class="col-md-6 mb-3">
                <label for="passwordAgain">Újra</label>
                <input type="password" name="passwordAgain" id="passwordAgain" class="form-control" placeholder="újra">
            </div>
        </div>

        <?php
        if(isset($_SESSION['edit_form_error']['passwords_missmatch'])){
            if($_SESSION['edit_form_error']['passwords_missmatch']){
                ?>
                <div class="alert alert-danger" role="alert">
                    A két jelszó nem egyezik meg.
                </div>
                <?php
                unset($_SESSION['edit_form_error']['passwords_missmatch']);
            }
        }
        ?>

        <div class="row">
            <div class="col-3">
                <h2>Admin</h2>
            </div>

            <div class="col">
                <label class="switch">
                    <input type="checkbox" name="admin" <?php if($user->isAdmin()){ ?> checked <?php } ?>>
                    <span class="slider round"></span>
                </label>
            </div>
        </div>

        <div class="row">
            <div class="col-3">
                <h2>Státusz</h2>
            </div>

            <div class="col">
                <label class="switch">
                    <input type="checkbox" name="status" <?php if($user->isActive()){ ?> checked <?php } ?>>
                    <span class="slider round"></span>
                </label>
            </div>
        </div>

        <hr class="mb-4">

        <button class="btn btn-outline-light btn-lg btn-block col-8 mx-auto" name="submit_editUser" type="submit">Mentés</button>

    </form>

</div>