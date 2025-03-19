<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styles.css">
    <title>CSS/Flexbox</title>
    <style>
        body {
            font-family: sans-serif;
            margin: 0;
        }

        header {
            background: purple;
            height: 100px;
        }

        h1 {
            text-align: center;
            color: white;
            line-height: 100px;
            margin: 0;
        }

        section {
            zoom: 0.8;
        }

        article {
            padding: 10px;
            margin: 10px;
            background: aqua;
        }

        section {
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
        }

    </style>
</head>
<body>
<header>
    <h1>Sample flexbox example</h1>
</header>
<div class="">
    <section>
        <article>
            <h2>First article</h2>
            <p>Content…</p>
        </article>
        <article>
            <h2>Second article</h2>
            <p>Content…</p>
        </article>
        <article>
            <h2>Third article</h2>
            <p>Content…</p>
        </article>
        <article>
            <h2>Third article</h2>
            <p>Content…</p>
        </article>
        <article>
            <h2>Third article</h2>
            <p>Content…</p>
        </article>
        <article>
            <h2>Third article</h2>
            <p>Content…</p>
        </article>
    </section>
</div>
<div class="">
    <section>
        <div>
            <article>
                <h2>First article</h2>
                <p>Content…</p>
            </article>
            <article>
                <h2>Second article</h2>
                <p>Content…</p>
            </article>
            <article>
                <h2>Third article</h2>
                <p>Content…</p>
            </article>
            <article>
                <h2>Third article</h2>
                <p>Content…</p>
            </article>
        </div>
        <div>
            <article>
                <h2>Third article</h2>
                <p>Content…</p>
            </article>
        </div>
        <article>
            <h2>Third article</h2>
            <p>Content…</p>
        </article>
    </section>
</div>


<nav class="navi">
    <ul class="nav_eins">
        <li class="navi_item start"><a class="navi_link" href="#">Start</a></li>
        <li class="navi_item aktuell"><a class="navi_link" href="#">Aktuell</a></li>
        <li class="navi_item produkte"><a class="navi_link" href="#">Produkte</a></li>
        <li class="navi_item service"><a class="navi_link" href="#">Service</a></li>
        <li class="navi_item kontakte"><a class="navi_link" href="#">Kontakt</a></li>
    </ul>
</nav>
<nav class="navi">
    <ul class="nav_zwei">
        <li class="navi_item start"><a class="navi_link" href="#">Start</a></li>
        <li class="navi_item aktuell"><a class="navi_link" href="#">Aktuell</a></li>
        <li class="navi_item produkte"><a class="navi_link" href="#">Produkte</a></li>
        <li class="navi_item service"><a class="navi_link" href="#">Service</a></li>
        <li class="navi_item kontakte"><a class="navi_link" href="#">Kontakt</a></li>
    </ul>
</nav>
<nav class="navi">
    <ul class="nav_drei">
        <li class="navi_item start"><a class="navi_link" href="#">Start</a></li>
        <li class="navi_item aktuell"><a class="navi_link" href="#">Aktuell</a></li>
        <li class="navi_item produkte"><a class="navi_link" href="#">Produkte</a></li>
        <li class="navi_item service"><a class="navi_link" href="#">Service</a></li>
        <li class="navi_item kontakte"><a class="navi_link" href="#">Kontakt</a></li>
    </ul>
</nav>
<nav class="navi">
    <ul class="nav_vier">
        <li class="navi_item start"><a class="navi_link" href="#">Start</a></li>
        <li class="navi_item aktuell"><a class="navi_link" href="#">Aktuell</a></li>
        <li class="navi_item produkte"><a class="navi_link" href="#">Produkte</a></li>
        <li class="navi_item service"><a class="navi_link" href="#">Service</a></li>
        <li class="navi_item kontakte"><a class="navi_link" href="#">Kontakt</a></li>
        <li class="navi_item start"><a class="navi_link" href="#">Start</a></li>
        <li class="navi_item aktuell"><a class="navi_link" href="#">Aktuell</a></li>
        <li class="navi_item produkte"><a class="navi_link" href="#">Produkte</a></li>
        <li class="navi_item service"><a class="navi_link" href="#">Service</a></li>
        <li class="navi_item kontakte"><a class="navi_link" href="#">Kontakt</a></li>
    </ul>
</nav>

<div class="box">
    <div class="navi_item sstart"><a class="navi_link" href="#">Start</a></div>
    <div class="navi_item saktuell"><a class="navi_link" href="#">Aktuell</a></div>
    <div class="navi_item sprodukte"><a class="navi_link" href="#">Produkte</a></div>
    <div class="navi_item sservice"><a class="navi_link" href="#">Service</a></div>
    <div class="navi_item skontakte"><a class="navi_link" href="#">Kontakt</a></div>
    <div class="boxbox">
        <div class="navi_item estart"><a class="navi_link" href="#">Start</a></div>
        <div class="navi_item eaktuell"><a class="navi_link" href="#">Aktuell</a></div>
        <div class="navi_item eprodukte"><a class="navi_link" href="#">Produkte</a></div>
        <div class="navi_item eservice"><a class="navi_link" href="#">Service</a></div>
        <div class="navi_item ekontakte"><a class="navi_link" href="#">Kontakt</a></div>
    </div>
</div>

<div class="first">
    <div>bla</div>
    <div>bla</div>
    <div>bla</div>
    <div>bla</div>
    <div class="2">bla</div>
    <div>bla</div>
    <div>bla</div>
    <div class="second">
        <div>bla</div>
        <div>bla</div>
        <div>bla</div>
        <div>bla</div>
    </div>

</div>
</body>
</html>