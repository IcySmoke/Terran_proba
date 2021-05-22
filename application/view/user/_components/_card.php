<div class="card text-white bg-secondary m-3" style="width: 19rem;">
    <div class="card-header">
        <h5 class="card-title"><?= $user->last_name ?> <?= $user->first_name ?></h5>
    </div>
    <div class="card-body">
        <h5 class="card-title"><?= $user->email ?></h5>
        <h5 class="card-title"><?php if($user->admin){ ?>admin<?php }else{ ?>nem admin<?php } ?></h5>
        <h5 class="card-title"><?php if($user->status){ ?>aktív<?php }else{ ?>inaktív<?php } ?></h5>
        <a href="<?php echo URL; ?>user/edit?id=<?php echo $user->id ?>">
            <button type="button" class="btn btn-light">Részletek</button>
        </a>
    </div>
</div>