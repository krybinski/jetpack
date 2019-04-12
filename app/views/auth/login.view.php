<?php include __DIR__ . '/partials/header.php'; ?>

<section class="container-fluid h-100">
    <div class="row h-100">
		<div class="col-12 col-md-6 offset-md-3 d-flex flex-column justify-content-center">
            <div class="w-100">
                <h2 class="text-center">Logowanie</h2>

                <?php include __DIR__ . '/partials/message.php'; ?>

                <form class="form" autocomplete="off" method="POST" action="<?= route('login') ?>">
                    <input name="csrf" type="hidden" value="<?= $this->csrf; ?>">

                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" id="username" name="username" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" class="form-control">
                    </div>

                    <div class="form-group">
                        <input type="submit" value="Login" class="btn btn-success pl-5 pr-5">
                    </div>

                    <div class="form-group">
                        <a href="<?= route('forgot-password') ?>">Forgot Password?</a>
                    </div>
                </form>
            </div>
		</div>
    </div>
</section>

<?php include __DIR__ . '/partials/footer.php'; ?>
