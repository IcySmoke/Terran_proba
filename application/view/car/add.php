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
            <input type="text" class="form-control" name="brand" id="brand" placeholder="Típus" required>
        </div>

        <div class="form-group">
            <label for="plate">Rendszám</label>
            <input type="text" class="form-control" name="plate" id="plate" placeholder="ABC-123" required>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="kilometers">Km óra állás</label>
                <input type="number" name="kilometers" id="kilometers" class="form-control" placeholder="Km óra állás" required>
            </div>

            <div class="col-md-6 mb-3">
                <label for="year">Évjárat</label>
                <input type="number" name="year" id="year" class="form-control" placeholder="Évjárat" required>
            </div>
        </div>

        <div class="row">
            <h2>Státusz</h2>
            <label class="switch">
                <input type="checkbox" name="status" checked>
                <span class="slider round"></span>
            </label>
        </div>

        <hr class="mb-4">

        <button class="btn btn-outline-light btn-lg btn-block col-8 mx-auto" name="submit_addCar" type="submit">Mentés</button>

    </form>

</div>