<div class="container-login">
    <?php
    if (isset($_SESSION['flash'])) :
        if ($_SESSION['flash']['type'] == 'error') :
    ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?= $_SESSION['flash']['message']; ?> <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php
        else :
        ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= $_SESSION['flash']['message']; ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

        <?php endif; ?>
    <?php
        unset($_SESSION['flash']);
    endif;
    ?>
    <h4>Login Admin</h4>
    <form action="<?= BASEURL; ?>/auth/middleware" method="POST">
        <div class="form-group">
            <label for="username">Username</label>
            <input type="username" class="form-control" name="username" id="username">
            <div class="invalid-feedback">
                Username masih kosong.
            </div>
            <div class="valid-feedback">
            </div>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control" id="password">
            <div class="invalid-feedback">
                Password masih kosong.
            </div>
            <div class="valid-feedback">
            </div>
        </div>
        <button type="submit" name="submit" class="btn btn-primary btn-block btn-login" disabled>Submit</button>
    </form>
</div>