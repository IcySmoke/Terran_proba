<div class="container mx-auto">
    <h2>Regisztráció</h2>
    <form action="<?php echo URL; ?>user/register" method="POST">

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="lastName">Vezetéknév</label>
                <input type="text" class="form-control" name="lastName" id="lastName" placeholder="vezetéknév" value="<?php echo isset($_POST['lastName'])?$_POST['lastName']:'' ?>" required>
            </div>

            <div class="col-md-6 mb-3">
                <label for="firstName">Keresztnév</label>
                <input type="text" class="form-control" name="firstName" id="firstName" placeholder="keresztnév" value="<?php echo isset($_POST['lastName'])?$_POST['firstName']:'' ?>" required>
            </div>
        </div>
        <?php
        if(isset($_SESSION['register_form_error']['lastName_missing'])){
            if($_SESSION['register_form_error']['lastName_missing']){
                ?>
                <div class="alert alert-danger col-6" role="alert">
                    Kérlek add meg a vezetékneved.
                </div>
                <?php
                unset($_SESSION['register_form_error']['lastName_missing']);
            }
        }
        ?>
        <?php
        if(isset($_SESSION['register_form_error']['firstName_missing'])){
            if($_SESSION['register_form_error']['firstName_missing']){
                ?>
                <div class="alert alert-danger col-6" role="alert">
                    Kérlek add meg a keresztneved.
                </div>
                <?php
                unset($_SESSION['register_form_error']['firstName_missing']);
            }
        }
        ?>

        <div class="mb-3">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="valami@doamin.com" value="<?php echo isset($_POST['email'])?$_POST['email']:'' ?>" required>
            <small id="emailHelp" class="form-text text-muted">Az e-mail címedet nem adjuk ki senkinek.</small>
        </div>
        <?php
        if(isset($_SESSION['register_form_error']['emial_invalidFormat'])){
            if($_SESSION['register_form_error']['emial_invalidFormat']){
                ?>
                <div class="alert alert-danger" role="alert">
                    Hibás e-mail formátum.
                </div>
                <?php
                unset($_SESSION['register_form_error']['emial_invalidFormat']);
            }
        }
        ?>
        <?php
        if(isset($_SESSION['register_form_error']['emial_exists'])){
            if($_SESSION['register_form_error']['emial_exists']){
                ?>
                <div class="alert alert-danger" role="alert">
                    Ezzel az e-mail címmel már létezik felhasználó. <a href="<?php echo URL; ?>" class="alert-link">bejelentkezés</a>
                </div>
                <?php
                unset($_SESSION['register_form_error']['emial_exists']);
            }
        }
        ?>

        <div class="mb-3">
            <label for="phone">Telefonszám</label>
            <input type="tel" class="form-control" name="phone" id="phone" placeholder="+36301234567" value="<?php echo isset($_POST['phone'])?$_POST['phone']:'' ?>" required>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="password">Jelszó</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="jelszó" required>
                <small id="passwordHelpBlock" class="form-text text-muted">
                    A jelszónak legalább 6, maximum 20 karakter hosszúnak kell lennie.
                </small>
            </div>

            <div class="col-md-6 mb-3">
                <label for="passwordAgain">Újra</label>
                <input type="password" name="passwordAgain" id="passwordAgain" class="form-control" placeholder="újra" required>
            </div>
        </div>

        <?php
        if(isset($_SESSION['register_form_error']['passwords_missmatch'])){
            if($_SESSION['register_form_error']['passwords_missmatch']){
                ?>
                <div class="alert alert-danger" role="alert">
                    A két jelszó nem egyezik meg.
                </div>
                <?php
                unset($_SESSION['register_form_error']['passwords_missmatch']);
            }
        }
        ?>

        <?php
        if(isset($_SESSION['register_form_error']['password_tooShort'])){
            if($_SESSION['register_form_error']['password_tooShort']){
                ?>
                <div class="alert alert-danger" role="alert">
                    A jelszó túl rövid.
                </div>
                <?php
                unset($_SESSION['register_form_error']['password_tooLong']);
            }
        }
        ?>

        <?php
        if(isset($_SESSION['register_form_error']['password_tooLong'])){
            if($_SESSION['register_form_error']['password_tooLong']){
                ?>
                <div class="alert alert-danger" role="alert">
                    A jelszó túl hosszú.
                </div>
                <?php
                unset($_SESSION['register_form_error']['password_tooLong']);
            }
        }
        ?>

        <hr class="mb-4">

        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="terms" id="terms" required>
            <label class="custom-control-label" for="terms">Elfogadom az Általános szerződési feltételeket.</label>
        </div>
        <?php
        if(isset($_SESSION['register_form_error']['terms_unchecked'])){
            if($_SESSION['register_form_error']['terms_unchecked']){
                ?>
                <div class="alert alert-danger" role="alert">
                    Kérlek fogadd el az ÁSZF-et.
                </div>
                <?php
                unset($_SESSION['register_form_error']['terms_unchecked']);
            }
        }
        ?>

        <hr class="mb-4">

        <button class="btn btn-outline-light btn-lg btn-block col-8 mx-auto" name="submit_register" type="submit">Regisztrálás</button>
    </form>
</div>
