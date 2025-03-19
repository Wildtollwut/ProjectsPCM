<?php
/**
 * link to another URL
 *
 * @param string $link
 * @param string $text
 * @return void
 */
function getRoot($link, $text)
{
    echo "<a href='{$link}'>{$text}</a>";
}

/**
 * Link to another URL + Robot ID
 * @param $link
 * @param $text
 * @param $id
 * @param $robotID
 * @return void
 */
function getRootID($link, $text, $id, $robotID)
{
    echo "<a href='{$link}' class='{$id}' data-id='{$robotID}'>{$text}</a>";
}

/**
 * Returns the root URL of the Project
 *  This function builds the URL based on the current script's location.
 *  It assumes the URL includes directories from the document root (e.g.
 *  "/Projects/RobotAnimals/") and that the project root is the portion
 *  preceding the "App" directory.
 * @param $url
 * @return string
 */
function getRootUrl($url = ""): string
{
    $protocol = empty($_SERVER['HTTPS']) ? 'http' : 'https';
    $domain = $_SERVER['SERVER_NAME'];
    $port = $_SERVER['SERVER_PORT'];
    $base_dir = dirname(__DIR__, 2);
    $doc_root = $_SERVER['DOCUMENT_ROOT'];
    $base_url = preg_replace("!^{$doc_root}!", '', $base_dir);

    return rtrim("{$protocol}://{$domain}:{$port}{$base_url}/{$url}", "/");
}


/**
 * Returns the root filesystem path of your project.
 *
 * Since this file is located in "App/Helpers", we go up two levels
 * to reach the project root (i.e. /var/www/html/Projects/RobotAnimals).
 *
 * @return string
 */
function getRootPath()
{
    return dirname(__DIR__, 2);
}


/**
 * Return different URL Path
 *
 * @param $path
 * @return string
 */
function getStoragePath($path = '')
{
    return getRootPath() . DIRECTORY_SEPARATOR . "Storage" . DIRECTORY_SEPARATOR . ltrim($path, '/\\');
}

function getUploadPath($path = '')
{
    return getStoragePath() . "uploads" . DIRECTORY_SEPARATOR . ltrim($path, '/\\');
}

function getStorageUrl($url = "")
{
    return getRootUrl("Storage/{$url}");
}

function getUploadUrl($url = "")
{
    $filepath = getUploadPath($url);

    if (!file_exists($filepath)) {
        return null;
    }

    return getStorageUrl("uploads/{$url}");
}

function getAssetUrl($url = "")
{
    return getRootUrl("Assets/{$url}");
}

function getResourceUrl($url = "")
{
    return getRootUrl("Resources/{$url}");
}

function getAppUrl($url = "")
{
    return getRootUrl("App/{$url}");
}


/**
 * print HTML header
 *
 * @param string $title
 * @return void
 */
function getHeader(string $title)
{
    ?>
    <!DOCTYPE html>
    <html class="h-100" lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo $title ?></title>

        <!--  Bootstrap CSS-->
        <link rel="stylesheet" href="<?php echo getAssetUrl('CSS/bootstrap.css') ?>">
        <!--  Bootstrap Icons-->
        <link rel="stylesheet" href="<?php echo getAssetUrl('CSS/bootstrap-icons.min.css') ?>">
        <!--  Style-CSS-->
        <link rel="stylesheet" href="<?php echo getAssetUrl('CSS/style.css') ?>">
        <!--  Poppers, not required with JS-Bundle-->
        <!--        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>-->
        <!--        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>-->

        <!--  JS-->
        <script src="<?php echo getAssetUrl('JS/jQuery.js') ?>" crossorigin="anonymous"></script>
        <script src="<?php echo getAssetUrl('JS/bootstrap.bundle.js') ?>" crossorigin="anonymous"></script>
    </head>

    <body class="m-0 border-0 d-flex flex-column h-100">
    <header class="p-0 ">
        <?php showLoginModal(); ?>
        <?php navbar(); ?>
    </header>

    <div class="container-fluid">
    <div class="row">

    <?php sidebar(); ?>

    <main class="col-md-9 ms-sm-auto col-lg-10 d-flex flex-column p-0">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center p-3 mb-3 border-bottom">
        <h1><?php echo $title ?></h1>
    </div>
    <section class="mb-5 p-3">
    <?php
}

/**
 * print Navigation Bar
 *
 * @return void
 */
function navbar(): void
{
    ?>
    <nav class="navbar sticky-top navbar-expand-md navbar-dark bg-dark shadow">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                The Lockwood C<i class="bi bi-gear-wide h6 text-warning"></i>nstructs</a>
            <button class="navbar-toggler" type="button"
                    data-bs-toggle="collapse" data-bs-target="#navbar"
                    aria-controls="navbar" aria-expanded="true" aria-label="Toggle navigation"
            >
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbar">
                <ul class="navbar-nav me-auto mb-2 mb-md-0 align-content-center">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo getResourceUrl("index.php"); ?>">Home</a>
                    </li>
                    <?php if (isset($_SESSION['login'])): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo getResourceUrl("createRobot.php"); ?>">Roboter
                                Bauen</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"
                               href="<?php echo getResourceUrl("showRobotList.php"); ?>">Roboterliste</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"
                               href="<?php echo getResourceUrl("showRobotMap.php"); ?>">Roboterkarte</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
        <div class="me-2 pt-2 text-center">
            <p class="text-white"><?php if (isset($_SESSION['login'])) echo $_SESSION['login']['username'] ?></p>
        </div>
        <div class="dropdown bottom-0 end-0 me-3 bd-mode-toggle">
            <button class="btn btn-bd-primary py-2 dropdown-toggle d-flex align-items-center  text-white"
                    id="bd-theme" type="button"
                    aria-expanded="false" aria-label="Toggle theme (auto)"
                    data-bs-toggle="dropdown">
                <i class="bi bi-gear"></i>
                <span class="visually-hidden" id="bd-theme-text">Toggle theme</span>
            </button>
            <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="bd-theme-text">
                <li>
                    <button type="button" class="dropdown-item d-flex align-items-center"
                            data-bs-theme-value="light" aria-pressed="false">
                        <span><i class="bi bi-brightness-low-fill"></i> Light</span>
                    </button>
                </li>
                <li>
                    <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="dark"
                            aria-pressed="false">
                        <span><i class="bi bi-moon-stars-fill"></i> Dark</span>
                    </button>
                </li>
            </ul>
        </div>
    </nav>
    <?php
}

/**
 * print Sidebar
 *
 * @return void
 */
function sidebar(): void
{
    ?>
    <aside class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
        <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu"
             aria-labelledby="sidebarMenuLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="sidebarMenuLabel">The Lockwood Constructs</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu"
                        aria-label="Close"></button>
            </div>
            <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link d-flex align-items-center gap-2" href="./index.php">
                            <i class="bi bi-house-fill"></i>
                            Dashboard
                        </a>
                    </li>

                    <?php if (isset($_SESSION['login'])): ?>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center gap-2" href="./createRobot.php">
                                <i class="bi bi-person-plus-fill"></i>
                                Baue einen neuen Roboter
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center gap-2" href="./showRobotList.php">
                                <i class="bi bi-list-ul"></i>
                                Roboterliste
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center gap-2" href="./showRobotMap.php">
                                <i class="bi bi-geo-alt-fill"></i>
                                Roboterkarte
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>

                <hr class="my-3">

                <ul class="nav flex-column mb-auto">
                    <?php if (!isset($_SESSION['login'])): ?>
                        <li class="nav-item">
                            <a id="login" class="nav-link d-flex gap-2"
                               data-bs-target="#login-modal"
                               data-bs-toggle="modal"
                               data-bs-heading="Login"
                               href="#">
                                <i class="bi bi-box-arrow-in-right"></i>
                                Sign in
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php if (isset($_SESSION['login'])): ?>
                        <li class="nav-item">
                            <a id="logout" class="nav-link d-flex gap-2"
                               data-bs-target="#logout-modal"
                               data-bs-toggle="modal"
                               data-bs-heading="Logout"
                               href="#">
                                <i class="bi bi-box-arrow-left"></i>
                                Sign Out
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php if (!isset($_SESSION['login'])): ?>
                        <li class="nav-item">
                            <a class="nav-link d-flex gap-2"
                               data-bs-target="#signUp-modal"
                               data-bs-toggle="modal"
                               data-bs-heading="Registrieren"
                               href="#">
                                <i class="bi bi-box-arrow-left"></i>
                                Registrieren
                            </a>
                        </li>
                    <?php endif; ?>
                    <li class="nav-item">
                        <a class="nav-link d-flex align-items-center gap-2" href="./settings.php">
                            <i class="bi bi-gear-fill"></i>
                            Settings
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </aside>
    <?php
}

/**
 * Show Login Modal
 *
 * @return void
 */
function showLoginModal()
{
    ?>
    <!-- Login Modal -->
    <div class="modal" id="login-modal" tabindex="-1">
        <div class="modal-dialog" role="document">
            <!-- Login Modal Content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalLabel">Login</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="loginError" class="alert alert-danger" role="alert" style="display:none"></div>
                    <div class="tab-content">
                        <div class="" id="navbarLogin-login">
                            <form id="login-form" class="text-center needs-validation" name="login-form"
                                  action="../App/Controllers/robotLogin.php" method="post">
                                <div class="">
                                    <div class="form-floating mb-4 me-3">
                                        <input class="form-control"
                                               id="email"
                                               type="email"
                                               name="email"
                                               required
                                        >
                                        <label class="ms-2" for="email">E-Mail-Adresse eingeben</label>
                                    </div>
                                </div>
                                <div class="">
                                    <div class="form-floating mb-4 me-3">
                                        <input class="form-control"
                                               id="password"
                                               type="password"
                                               name="password"
                                               required
                                        >
                                        <label class="ms-2" for="password">Passwort</label>
                                    </div>
                                </div>
<!--                                <div>-->
<!--                                    <input class="form-check-input" type="checkbox" value="" id="stayLoggedIn">-->
<!--                                    <label class="ms-2" for="stayLoggedIn">Eingeloggt bleiben für 14 Tage</label>-->
<!--                                </div>-->
                                <button class="btn btn-outline-warning m-4"
                                        type="submit"
                                        data-bs-toggle="toggle"
                                        data-bs-target="#signUp-modal"
                                >
                                    <span class="visually-hidden btn-spinner spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                    <span class="visually-hidden btn-loading-text" role="status">Wird geladen...</span>
                                    <span class="btn-text">
                                        <i class="bi bi-box-arrow-in-right"></i> Anmelden
                                    </span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Logout Modal -->
    <div class="modal" id="logout-modal" tabindex="-1">
        <div class="modal-dialog" role="document">
            <!-- Login Modal Content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalLabel">Logout</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Möchten Sie sich ausloggen?</p>
                    <button class="btn btn-outline-primary"
                            id="logout-btn">
                        Ja
                    </button>
                    <button class="btn btn-outline-secondary"
                            data-bs-dismiss="modal">
                        Nein, angemeldet bleiben
                    </button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- SignUp Modal-->
    <div class="modal" id="signUp-modal" tabindex="-1">
        <div class="modal-dialog" role="document">
            <!-- Login Modal Content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalLabel">Registrieren</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="signUpError" class="alert alert-danger" role="alert" style="display:none"></div>
                    <div id="signUpSuccess" class="alert alert-primary" role="alert" style="display:none"></div>
                    <div class="tab-content">
                        <div class="" id="navbarLogin-signUp">
                            <form id="signUp-form" class="text-center needs-validation" name="signUp-form"
                                  action="../App/Controllers/robotSignUp.php" method="post">
                                <div class="">
                                    <div class="form-floating mb-4 me-3">
                                        <input class="form-control"
                                               id="regUsername"
                                               type="text"
                                               name="regUsername"
                                               required
                                        >
                                        <label class="ms-2" for="regUsername">Benutzername</label>
                                    </div>
                                </div>
                                <div class="">
                                    <div class="form-floating mb-4 me-3">
                                        <input class="form-control"
                                               id="regEmail"
                                               type="email"
                                               name="regEmail"
                                               required
                                        >
                                        <label class="ms-2" for="regEmail">E-Mail-Adresse eingeben</label>
                                    </div>
                                </div>
                                <div class="">
                                    <div class="form-floating mb-4 me-3">
                                        <input class="form-control"
                                               id="regPassword"
                                               type="password"
                                               name="password"
                                               required
                                        >
                                        <label class="ms-2" for="regPassword">Passwort</label>
                                    </div>
                                    <div class="form-floating mb-4 me-3">
                                        <input class="form-control"
                                               id="regPassword2"
                                               type="password"
                                               name="password2"
                                               required
                                        >
                                        <label class="ms-2" for="regPassword2">Passwort bestätigen</label>
                                    </div>
                                </div>
                                <button class="btn btn-outline-warning m-4"
                                        type="submit"
                                        data-bs-toggle="toggle"
                                        data-bs-target="#signUp-modal"
                                >
                                    <span class="visually-hidden btn-spinner spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                    <span class="visually-hidden btn-loading-text" role="status">Wird geladen...</span>
                                    <span class="btn-text">
                                        <i class="bi bi-box-arrow-in-right"></i> Anmelden
                                    </span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <?php
}


/**
 * print HTML footer
 *
 * @return void
 */
function getFooter(): void
{
    ?>
    </section>
    <footer class="footer mt-auto py-3 bg-dark shadow-footer text-white">
        <div class="container d-flex flex-column justify-content-around flex-md-row-reverse justify-content-md-between align-items-center">
            <span>
                Version <?php echo VERSION; ?>
            </span>
            <span>
                <i class="bi bi-c-circle"></i> <?php echo date('Y') ?> Kathrin Peukert - The Lockwood C<i
                        class="bi bi-gear-wide text-warning"></i>nstructs
            </span>
        </div>
    </footer>

    </main>
    </div>
    </div>

    <script>
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
    </script>

    <script>
        $(document).ready(function () {

            // shows Login / Logout Modal
            $('#login').on('click', function (e) {
                e.preventDefault();
                $('#login-modal').modal('show');
            });


            // Login Modal Form, checks Email & Password
            // returns true or false + message (errors || success)
            $('#login-form').on('submit', function (e) {
                e.preventDefault();
                $('#loginError').hide().html('');

                // .find seaches in $(this)-Form, for [element]
                const $btn = $(this).find('[type="submit"]');
                const $btnSpinner = $btn.find('.btn-spinner');
                const $btnLoadingText = $btn.find('.btn-loading-text');
                const $btnText = $btn.find('.btn-text');

                const $email = $('#email');
                const $password = $('#password');

                const formData = {
                    email: $email.val(),
                    password: $password.val()
                }

                // remove visually-hidden to show spinner
                // add disabled to deactivate button
                $btnSpinner.removeClass('visually-hidden');
                $btnLoadingText.removeClass('visually-hidden');
                $btnText.addClass('visually-hidden');
                $btn.addClass('disabled');

                console.log("START AJAX");

                $.ajax({
                    url: "../App/Controllers/robotLogin.php",
                    type: 'POST',
                    data: formData,

                }).done(function (response) {
                    console.log("AJAX DONE");
                    const responseData = JSON.parse(response);

                    if (responseData.data.status) {
                        $('#login-modal').modal('hide'); /// +cookie 14 tage speichern
                        location.reload();
                    } else {
                        // $('#loginError').html(responseData.data.message).show();
                    }

                }).fail(function (error) {
                    console.log("AJAX FAILED");

                    const {data} = JSON.parse(error.responseText);
                    const errorMessage = data.message;
                    // console.log(errorMessage);
                    $('#loginError').html(errorMessage).show();

                }).always(function(){
                    console.log("AJAX FINISHED (ALWAYS)");

                    $btnSpinner.addClass('visually-hidden');
                    $btnLoadingText.addClass('visually-hidden');
                    $btnText.removeClass('visually-hidden');
                    $btn.removeClass('disabled');
                })

                return false;
            });


            // signUp-modal
            $('#signUp-form').on('submit', function (e) {
                e.preventDefault();
                $('#signUpError').hide().html('');

                // .find seaches in $(this)-Form, for [element]
                const $btn = $(this).find('[type="submit"]');
                const $btnSpinner = $btn.find('.btn-spinner');
                const $btnLoadingText = $btn.find('.btn-loading-text');
                const $btnText = $btn.find('.btn-text');

                const $username = $('#regUsername');
                const $email = $('#regEmail');
                const $password = $('#regPassword');
                const $password2 = $('#regPassword2');

                const regFormData = {
                    username: $username.val(),
                    email: $email.val(),
                    password: $password.val(),
                    password2: $password2.val()
                }
                //console.log($formData);

                // remove visually-hidden to show spinner
                // add disabled to deactivate button
                $btnSpinner.removeClass('visually-hidden');
                $btnLoadingText.removeClass('visually-hidden');
                $btnText.addClass('visually-hidden');
                $btn.addClass('disabled');

                console.log("START AJAX");

               $.ajax({
                    url: "../App/Controllers/robotSignUp.php",
                    type: 'POST',
                    data: regFormData,

                }).done(function (response) {
                    console.log("AJAX DONE");

                    const responseData = JSON.parse(response);
                    console.log(responseData);
                    let $errors;
                    let $success;

                   $success = responseData.data.message;
                   let successHtml = '<i class="bi bi-check-circle"> </i>' + $success;
                   $('#signUpSuccess').html(successHtml).show();
                   location.reload();

                }).fail(function (error) {
                   console.log("AJAX FAILED");

                   // short notation
                   const {data} = JSON.parse(error.responseText);
                   const errorList = data.message;
                   // long notation
                   // const response = JSON.parse(error.responseText);
                   // const data = response.data;

                   let errorHtml = "<ul style='list-style: none;'>"
                   $.each(errorList, function (index, value) {
                       errorHtml +=
                           `<li><i class=\'bi bi-exclamation-triangle'> </i>${value}</li>`;

                   });

                   errorHtml += "</ul>"
                   $('#signUpError').html(errorHtml).show();

                }).always(function (always) {
                   console.log("AJAX FINISHED (ALWAYS)");

                    $btnSpinner.addClass('visually-hidden');
                    $btnLoadingText.addClass('visually-hidden');
                    $btnText.removeClass('visually-hidden');
                    $btn.removeClass('disabled');
                })

                console.log("PROGRAM CONTINUE...")

                return false;
            });


            // Logout Modal - session destroy
            $('#logout-btn').on('click', function (e) {
                e.preventDefault();
                $('#login-modal').modal('hide');

                $.ajax({
                    url: "../App/Controllers/robotLogout.php",
                    type: 'POST',
                }).done(function (response) {
                    location.reload();
                }).fail(function (error) {
                    console.log("AJAX FAILED");
                })
                return false;
            });


            // show.bs.modal hide old Login Errors if Modal gets open again
            // show different Modal content
            $('#login-modal').on('show.bs.modal', function () {
                $('#loginError').hide();
                const content = $(event.relatedTarget);
            })

            // show.bs.modal hide old Sign Up Errors if Modal gets open again
            // show different Modal content
            $('#signUp-modal').on('show.bs.modal', function () {
                $('#signUpError').hide();
                $('#signUpSuccess').hide();
                const content = $(event.relatedTarget);
            })

        });

        // Navbar Toggle Dark / Light mode
        $(document).ready(function () {
            const $themeButtons = $("[data-bs-theme-value]");
            const $htmlElement = $("html");

            // Function to apply theme
            function applyTheme(theme) {
                $htmlElement.attr("data-bs-theme", theme);
                localStorage.setItem("theme", theme);
            }

            // Load saved theme from localStorage
            const savedTheme = localStorage.getItem("theme") || "light";
            applyTheme(savedTheme);

            // Add event listeners to theme buttons
            $themeButtons.on("click", function () {
                const selectedTheme = $(this).attr("data-bs-theme-value");
                applyTheme(selectedTheme);
            });
        });
    </script>
    </body>
    </html>
    <?php
}


/**
 * automatic redirect to another url
 *
 * @param string $link
 * @return never
 */
function redirect(string $link)
{
    header("Location: {$link}");
    die;
}


/**
 * print vardump
 *
 * @param mixed $arg
 * @return void
 */
function dd(mixed $arg)
{
    echo "<pre>";
    var_dump($arg);
    echo "</pre>";
    die;
}


/**
 * fetch Robot Attributes from $robot Array
 *
 * @param array $robot
 * @return array{colorID: mixed, createdAt: mixed, manufacturerID: mixed, material: mixed, name: mixed, robotTypeID: mixed, serialNumber: mixed, updatedAt: mixed, x_coordinate: mixed, y_coordinate: mixed}
 */
function getAttributesFromRobotArray(array $robot)
{
    return [
        'name' => $robot['name'],
        'manufacturerID' => $robot['manufacturerID'],
        'robotTypeID' => $robot['type'],
        'serialNumber' => $robot['serialNumber'],
        'createdAt' => $robot["createdAt"],
        'updatedAt' => $robot["updatedAt"],
        'x_coordinate' => $robot['x_coordinate'],
        'y_coordinate' => $robot['y_coordinate'],
        'colorID' => $robot['color'],
        'material' => $robot['material'],
        'specie' => $robot['specie'],
        'noise' => $robot['noise'],
        'leaf' => $robot['leaf'],
        'img_path' => $robot['img_path'],
    ];
}


/**
 * fetch Robot Attributes from $_POST Array
 *
 * @param mixed $robot
 * @return array{color: mixed, manufacturerID: mixed, material: mixed, name: mixed, robotType: mixed, serialNumber: mixed, x_coordinate: mixed, y_coordinate: mixed}
 */
function getRobotAttributesFromPOST($robot)
{
    return [
        'manufacturerID' => $robot['manufacturerID'] ?? null,
        'name' => $robot['name'],
        'robotType' => $robot['robotType'],
        'serialNumber' => $robot['serialNumber'],
        'createdAt' => $robot['createdAt'],
        'updatedAt' => $robot['updatedAt'],
        'x_coordinate' => $robot['x_coordinate'],
        'y_coordinate' => $robot['y_coordinate'],
        'color' => $robot['color'],
        'material' => $robot['material'],
        'specie' => $robot['specie'],
        'noise' => $robot['noise'],
        'leaf' => $robot['leaf'],
        'img_path' => $robot['img_path'],
    ];
}

/**
 * fetch User Attributes from $_POST
 *
 * @param $user
 * @return array
 */
function getUserAttributesFromPOST($user)
{
    return [
        'email' => $user['email'],
        'password' => $user['password'],
        'username' => $user['username'],
    ];
}

/**
 * Cecks if a Path/Directory exists
 *
 * @param string $completeDirPath
 * @param string $imgName
 * @return string
 */
function checkIfPathDirectoryExists(string $completeDirPath, string $imgName): string
{
    if (!file_exists($completeDirPath)) {
        $created = mkdir($completeDirPath, 0777, true);
        if (!$created) {
            die("Error: Failed to create directory - {$completeDirPath}");
        }
    }
// check if path directory exists
    if (!file_exists($completeDirPath)) {
        // create new directory or file
        mkdir($completeDirPath, 0777, true);

    } else {
        // deletes existing files
        // It's a directory, so iterate through contents
        $items = scandir($completeDirPath);
        foreach ($items as $item) {
            // skip the pointers to current and parent directory
            if ($item === '.' || $item === '..') {
                continue;
            }
            $filePath = $completeDirPath . DIRECTORY_SEPARATOR . $item;

            // is_file checks if its a file
            // unlink deletes files
            if (is_file($filePath)) {
                unlink($filePath);
            }
        }
    }

    // the final path to save in DB, saves a combo of both variables
    $uploadFile = $completeDirPath . $imgName;

    return $uploadFile;
}


/**
 * Delete Img Folder if Robot is deleted
 *
 * @param $dir
 * @return bool
 */
function deleteImgDirectory($dir)
{

    if (!file_exists($dir)) {
        // nothing found to delete
        return true;
    }

    // Delete all files in the directory
    $items = scandir($dir);
    foreach ($items as $item) {
        if ($item === '.' || $item === '..') {
            continue;
        }
        $filePath = $dir . DIRECTORY_SEPARATOR . $item;
        if (is_file($filePath)) {
            unlink($filePath);
        } elseif (is_dir($filePath)) {
            deleteImgDirectory($filePath);
        }
    }
    // Now delete the directory itself
    return rmdir($dir);
}
