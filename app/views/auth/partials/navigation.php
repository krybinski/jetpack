<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="/"><?= config('app.name') ?></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTop" aria-controls="navbarTop" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarTop">
        <ul class="navbar-nav mr-auto">
        </ul>
        <?php if ($this->sessionService->isUserLoggedIn()) : ?>
            <a href="/logout" class="btn btn-light btn-sm">Wyloguj</a>
        <?php endif; ?>
    </div>
</nav>