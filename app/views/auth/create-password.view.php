<?php include __DIR__ . '/partials/header.php'; ?>

<section class="container-fluid h-100">
    <div class="row h-100 d-flex justify-content-center align-items-center">
        <div class="col-12 col-md-6 col-xl-4">
            <h1><?= $this->pageTitle; ?></h1>
            <p>Make sure your password conforms to all proper security standards.</p>

            <?php include __DIR__ . '/partials/message.php'; ?>

            <form id="form-create-password" class="js-form">
                <input name="csrf" type="hidden" value="<?= $this->csrf; ?>">

                <label for="password">Password</label>
                <input type="password" id="password" name="password" class="form-control"><br />
                <input type="submit" name="create" class="btn btn-primary" value="Create password">
            </form>
        </div>
    </div>
</section>

<?php include __DIR__ . '/partials/footer.php'; ?>
