<?php
require_once("../App/Helpers/init.php");

getHeader("Einstellungen") ?>


<?php if(isset($_SESSION['error_message'])): ?>
    <div class="alert alert-danger" role="alert">
        <p class="h4">Datenbank Einstellungen konnten nicht übernommen werden!</p>
        <?php $errorList = explode(" || ", $_SESSION['error_message']) ?>
        <ul>
            <?php foreach($errorList as $error): ?>
                <?php echo "<li >$error</li>"; ?>
            <?php endforeach; ?>
        </ul>
    </div>
    <?php unset($_SESSION['error_message']); ?>
<?php endif; ?>

<?php if (isset($_SESSION['success_message'])): ?>
    <div class="alert alert-primary" role="alert">
        <?php echo $_SESSION['success_message']; ?>
    </div>
    <?php unset($_SESSION['success_message']); ?>
<?php endif; ?>

<div class="row g-3">
    <fieldset class="border rounded-2 p-3 col-md-6 ">
        <legend class="px-2 float-none w-auto">Toggle Light and Dark Mode</legend>
        <div class="" id="mode">
            <button type="button" class="btn btn-outline-secondary" data-bs-theme-value="light">
                <span><i class="bi bi-brightness-low-fill"></i> Light Mode</span>
            </button>
            <button type="button" class="btn dark btn-secondary" data-bs-theme-value="dark">
                <span><i class="bi bi-moon-stars-fill"></i> Dark Mode</span>
            </button>
        </div>
    </fieldset>
</div>

<div class="row g-3">
    <fieldset class="border rounded-2 p-3 col-md-6 ">
        <legend class="px-2 float-none w-auto">Datenbank Einstellungen</legend>
        <form method="post" action="<?php echo getAppUrl("Controllers/updateConfig.php") ?>">
            <div class="row g-3">
                <div class="form-floating col-6">
                    <input class="form-control"
                           id="host"
                           type="text"
                           name="DB_HOST"
                    >
                    <label class="m-2" for="host">Host</label>
                </div>
                <div class="form-floating col-6">
                    <input class="form-control"
                           id="dbPort"
                           type="text"
                           name="DB_PORT"
                    >
                    <label class="m-2" for="dbPort">Port</label>
                </div>
            </div>
            <div class="row g-3">
                <div class="form-floating col-6">
                    <input class="form-control"
                           id="dbUsername"
                           type="text"
                           name="DB_USERNAME"
                    >
                    <label class="m-2" for="dbUsername">Username</label>
                </div>
                <div class="form-floating col-6">
                    <input class="form-control"
                           id="dbPassword"
                           type="text"
                           name="DB_PASSWORD"
                    >
                    <label class="m-2" for="dbPassword">Password</label>
                </div>
            </div>
            <div class="row g-3">
                <div class="form-floating col-6 mb-3">
                    <input class="form-control"
                           id="dbName"
                           type="text"
                           name="DB_NAME"
                    >
                    <label class="m-1 ms-2" for="dbName">Db Name</label>
                </div>
            </div>
            <div class="ms-1">
                <button class="btn btn-outline-warning" type="submit">
                    <i class="bi bi-floppy"></i> Speichern
                </button>
            </div>
        </form>
    </fieldset>
</div>

<!--<div class="col-md-2 mt-5">-->
<!--    <label for="language-select" class="form-label">Spracheinstellungen</label>-->
<!--    <select id="language-select" class="form-select">-->
<!--        <option value="en">English</option>-->
<!--        <option value="es">Español</option>-->
<!--        <option value="fr">Français</option>-->
<!--    </select>-->
<!--</div>-->

<script>

    $(document).ready(function () {

        const savedTheme = localStorage.getItem('theme');

        // check for theme in localStorage
        if (savedTheme) {
            // if there is a saved theme, apply it
            $('body').attr('data-bs-theme', savedTheme);
        }

        // light Mode Button
        $('[data-bs-theme-value="light"]').on('click', function () {
            $('body').attr('data-bs-theme', 'light');
            localStorage.setItem('theme', 'light');
        });

        // dark Mode Button
        $('[data-bs-theme-value="dark"]').on('click', function () {
            $('body').attr('data-bs-theme', 'dark');
            localStorage.setItem('theme', 'dark');
        })

    });

</script>

<?php getFooter() ?>
