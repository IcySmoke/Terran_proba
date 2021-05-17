<div class="container">
    <h2>LOGIN</h2>

    <form action="<?php echo URL; ?>" method="POST">

        <div class="form-group">
            <label for="exampleInputEmail1">Email</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email">
        </div>

        <div class="form-group">
            <label for="exampleInputPassword1">Jelszó</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Jelszó">
        </div>

        <button class="btn btn-primary btn-lg btn-block col-8 mx-auto" name="submit_login" type="submit">Belépés</button>

    </form>

</div>
