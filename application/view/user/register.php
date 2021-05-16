<div class="container mx-auto">
    <h2>regisztrálás</h2>
    <form action="<?php echo URL; ?>user/register" method="POST">

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="lastName">Családnévnév</label>
                <input type="text" class="form-control" name="lastName" id="lastName" required>
            </div>

            <div class="col-md-6 mb-3">
                <label for="firstName">Vezetéknév</label>
                <input type="text" class="form-control" name="firstName" id="firstName" required>
            </div>
        </div>

        <div class="mb-3">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="valami@doamin.com">
            <div class="invalid-feedback">
                Kérelek érvényes e-mail címet adj meg.
            </div>
        </div>

        <div class="mb-3">
            <label for="phone">Telefonszám</label>
            <input type="tel" class="form-control" name="phone" id="phone" placeholder="+36301234567">
            <div class="invalid-feedback">
                Kérelek érvényes telefonszámot címet adj meg.
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="password">Jelszó</label>
                <input type="password" name="password" id="password" class="form-control">
                <small id="passwordHelpBlock" class="form-text text-muted">
                    A jelszónak legalább 6, maximum 20 karakter hosszúnak kell lennie.
                </small>
            </div>
            <?php
            if(isset($_SESSION['register_form_error']['passwords_missmatch'])){
                if($_SESSION['register_form_error']['passwords_missmatch']){
            ?>
                    <div class="alert alert-danger" role="alert">
                        A két jelszó nem eggyezik meg.
                    </div>
            <?php
                }
            }
            ?>

            <div class="col-md-6 mb-3">
                <label for="passwordAgain">Újra</label>
                <input type="password" name="passwordAgain" id="passwordAgain" class="form-control">
            </div>
        </div>

        <hr class="mb-4">

        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="terms" id="terms" required>
            <label class="custom-control-label" for="terms">Elfogadom az Általános szerződési feltételeket.</label>
        </div>

        <hr class="mb-4">

        <button class="btn btn-primary btn-lg btn-block col-8 mx-auto" name="submit_register" type="submit">Regisztrálás</button>
    </form>
</div>
