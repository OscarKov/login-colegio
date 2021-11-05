<?php
// template head.
require_once('resources/global/head.php');
?>

<section class="section">
    <div class="intro-card frame my-5">
        <div class="frame__body row u-justify-center">
            <div class="col-sm-6">
                <h2>Bienvenido, <?php echo $_SESSION['nombre'] ?></h2>
                <button class="button"></button>
            </div>
        </div>
    </div>
</section>

<?php
// template head.
require_once('resources/global/footer.php');
