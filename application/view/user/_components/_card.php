<div class="card text-white bg-secondary m-3" style="width: 30rem;">
    <div class="card-header">
        <div class="row">
            <h3 class="col"><?php echo $user->last_name ?> <?php echo $user->first_name ?></h3>
        </div>
    </div>
    <div class="card-body">

        <div class="row mb-1">
            <h5 class="col-3">E-mail:</h5>
            <h5 class="col-9"><?php echo $user->email ?></h5>
        </div>

        <div class="row mb-1">
            <h5 class="col-3">Admin:</h5>
            <h5 class="col-9"><?php if($user->admin){ ?>igen<?php }else{ ?>nem<?php } ?></h5>
        </div>

        <div class="row mb-1">
            <h5 class="col-3">Atátusz:</h5>
            <h5 class="col-9"><?php if($user->status){ ?>aktív<?php }else{ ?>inaktív<?php } ?></h5>
        </div>

        <div class="row mx-auto">
            <a href="<?php echo URL; ?>user/edit?id=<?php echo $user->id ?>" class="btn btn-light btn-lg" >Részletek</a>
        </div>

    </div>
</div>