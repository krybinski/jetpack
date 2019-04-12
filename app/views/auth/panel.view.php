<?php include __DIR__ . '/partials/header.php'; ?>

<?php include __DIR__ . '/partials/navigation.php'; ?>

<div class="container-fluid">
    <section class="jumbotron mt-3">
        <h1 class="display-3">Witaj w panelu!</h1>
    </section>

    <div class="row">
        <div class="col-12 col-md-6 col-xl-4">
            <form class="form" autocomplete="off" method="POST" action="<?= route('panel/update') ?>" enctype="multipart/form-data">
                <input name="csrf" type="hidden" value="<?= $this->csrf; ?>">

                <div class="form-group">
                    <label for="url">Adres przekierowania:</label>
                    <input type="text" id="url" name="url" class="form-control">
                </div>

                <div class="form-group">
                    <label for="logo">Logo:</label>
                    <input type="file" id="logo" name="logo" class="form-control">
                </div>

                <div class="form-group">
                    <input type="submit" value="Save" class="btn btn-success pl-5 pr-5">
                </div>
            </form>
        </div>
    </div>

</div>

<?php include __DIR__ . '/partials/footer.php'; ?>
