<div  class="container mx-auto">
    <h2>Bejelentkezés</h2>
    <form action="<?php echo URL; ?>user/login" method="POST">

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="Email">
        </div>
        <?php
        if(isset($_SESSION['login_form_error']['email'])){
            if($_SESSION['login_form_error']['email']){
                ?>
                <div class="alert alert-danger" role="alert">
                    Ezzel az e-mail címmel nem létezik felhasználó.
                </div>
                <?php
            }
            unset($_SESSION['login_form_error']);
        }
        ?>

        <div class="form-group">
            <label for="password">Jelszó</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Jelszó">
        </div>

        <?php
        if(isset($_SESSION['login_form_error']['password'])){
            if($_SESSION['login_form_error']['password']){
                ?>
                <div class="alert alert-danger" role="alert">
                    Hibás jelszó
                </div>
                <?php
            }
            unset($_SESSION['login_form_error']);
        }
        ?>

        <button class="btn btn-outline-light btn-lg btn-block col-8 mx-auto" name="submit_login" type="submit">Belépés</button>

    </form>
</div>
