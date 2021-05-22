<div  class="container">

    <div class="row">
        <div class="col">
            <h2 class="masthead-brand">munkatársak listája</h2>
        </div>
    </div>

    <div class="row m-4">
        <?php if($users){ ?>
            <?php foreach ($users as $user){ ?>
                <?php include '_components/_card.php'; ?>
            <?php } ?>
        <?php }else{ ?>
            <div class="row">
                <h2>Nincs találat...</h2>
            </div>
        <?php } ?>

    </div>

</div>