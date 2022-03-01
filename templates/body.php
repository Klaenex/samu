<body>
    <header class="header">
        <?php
        require './functions/menuRouter.php';
        ?>
    </header>

    <?php
    require './functions/pagesRouter.php';
    ?>

    <main>
        <?php
        require './functions/mainRouter.php';
        ?>
    </main>



</body>