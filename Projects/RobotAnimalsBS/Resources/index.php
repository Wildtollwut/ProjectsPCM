<?php
require_once("../App/Helpers/init.php");

?>

<?php getHeader('Willkommen bei The Lockwood Constructs') ?>

<div class="">
    <div class="-animate-img">
        <img src="<?php echo getAssetUrl("IMG/logo_sm-Photoroom.png") ?>" alt="">
    </div>
    <p>dem größten Archiv und der edelsten Werkstatt für Automatonen in Steampunk City!<br>
        Hier verwalten, bauen und optimieren wir mechanische Meisterwerke.<br>
        Ob neu geschmiedete Automaten, kunstvolle Umbauten oder sorgfältig gewartete Klassiker
        unser Archiv beherbergt die erlesensten Konstruktionen der Metropole.<br>
        Tritt ein in die Welt aus Messing, Dampf und Zahnrädern - deine perfekte Maschine wartet bereits darauf,
        erschaffen zu werden!
    </p>

</div>
<div id="carousel" class="carousel mt-5 slide d-flex justify-content-center">
    <div class="carousel-inner ">
        <div class="carousel-item active">
            <img src="../Assets/IMG/robot1.png" class="d-block mx-auto" alt="...">
        </div>
        <div class="carousel-item">
            <img src="../Assets/IMG/robot2.png" class="d-block mx-auto" alt="...">
        </div>
        <div class="carousel-item">
            <img src="../Assets/IMG/robot3.png" class="d-block mx-auto" alt="...">
        </div>
    </div>
    <button class="carousel-control-prev bg-warning my-5" type="button" data-bs-target="#carousel" data-bs-slide="prev"
            style="margin-left: 15rem; ">
        <span class="carousel-control-prev-icon" style="color: #4d5154 !important;" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next bg-warning my-5" type="button" data-bs-target="#carousel" data-bs-slide="next"
            style="margin-right: 15rem">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>



<?php getFooter() ?>



