<?php include __DIR__ . '/partials/header.php'; ?>

<section class="container-fluid h-100">
    <div class="row h-100 d-flex justify-content-center align-items-center">
        <div class="col-12 col-md-6 col-xl-4">
            <h1><?= $this->pageTitle; ?></h1>
            <p>Enter the email address you signed up with and we'll email you a link to reset your password. (Actually, I'll just paste a URL here since mail is tricky and annoying).</p>

            <?php include __DIR__ . '/partials/message.php'; ?>

            <form id="form-forgot-password" class="js-form">
                <input name="csrf" type="hidden" value="<?= $this->csrf; ?>">

                <label for="email">Email</label>
                <input type="email" id="email" name="email" class="form-control"><br />
                <input type="submit" class="btn btn-primary" value="Reset password">
            </form>
        </div>
    </div>
</section>

<?php include __DIR__ . '/partials/footer.php'; ?>
