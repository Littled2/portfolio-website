<?php

    require_once "headless-cms.php";

    $page = handle_request();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Import the Client Side Router -->
    <!-- Remove this if you don't wish to use the client-side routing function of the Headless CMS -->
    <!-- <script type="module" src="/headless-cms-scripts/client-side-router.js"></script> -->

    <!-- Import Alpine JS -->
    <!-- Remove this if you don't wish to use Alpine JS across you webpages -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>


    <!-- If the title property is set, insert here. -->
    <?php echo $page->get_property('title') ?>

    <!-- If the description property is set, insert here. -->
    <?php echo $page->get_property('description') ?>

    <!-- If the og-image property is set, insert here. -->
    <?php echo $page->get_property('og-image') ?>

    <!-- If the og-type property is set, insert here. -->
    <?php echo $page->get_property('og-type') ?>

    <!-- If the og-url property is set, insert here. -->
    <?php echo $page->get_property('og-url') ?>

    <!-- If the favicon property is set, insert here. Default value is '/resources/favicon.png' -->
    <?php echo $page->get_property('favicon') ?>



    <!-- Add global stylesheet imports here -->
    <link rel="stylesheet" href="/resources/stylesheets/utils.css">
    <link rel="stylesheet" href="/resources/stylesheets/globals.css">
    <link rel="stylesheet" href="/resources/stylesheets/default-styles.css">


</head>
<body>

    <header>
    <a href="/" class="logo">
            <span class="accent">{</span>
            <span class="logo-text">eb.</span>
            <span class="accent">}</span>
        </a>
        <nav class="flex-1 nav" x-bind:class="navOpen ? 'open' : ''">
            <ul class="nav-links">
                <li>
                    <a href="/#about-me">
                        <small class="mono accent">01.</small>
                        <span>About Me</span>
                    </a>
                </li>
                <li>
                    <a href="/#what-i-do">
                        <small class="mono accent">02.</small>
                        <span>What I Do</span>
                    </a>
                </li>
                <li>
                    <a href="/#featured-projects">
                        <small class="mono accent">03.</small>
                        <span>Projects</span>
                    </a>
                </li>
                <!-- <li>
                    <a href="/contact">
                        <small class="mono accent">04.</small>
                        <span>Contact Me</span>
                    </a>
                </li> -->
            </ul>

            <a target="_blank" href="https://www.linkedin.com/in/edward-blewitt-a1b257224/" class="button mobile-only flex align-center gap-s">
                <span>View My LinkedIn</span>
                <img style="width: 1.2em; height: 1.2em; object-fit: contain;" src="/resources/images/icons/linkedin-accent.svg">
            </a>

        </nav>

        <a target="_blank" href="https://www.linkedin.com/in/edward-blewitt-a1b257224/" class="button flex align-center gap-s">
            <span>View My LinkedIn</span>
            <img style="width: 1.2em; height: 1.2em; object-fit: contain;" src="/resources/images/icons/linkedin-accent.svg">
        </a>

        <button class="mobile-menu-toggle" x-on:click="navOpen = !navOpen" x-bind:class="navOpen ? 'open' : ''">
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="bar"></div>
        </button>
    </header>

    
    <main>
        <!-- Insert the page content in here -->
        <?php echo $page->content; ?>
    </main>


    <footer>
        <p class="mono">Congratulations! You reached the bottom</p>
    </footer>

</body>
</html>