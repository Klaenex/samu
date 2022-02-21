<body>
    <header class="header">
        <?php
        require './functions/menuRouter.php';
        ?>
    </header>
    <div id="pages_router">
        <?php
        require './functions/pagesRouter.php';
        ?>
    </div>
    <main>
        <?php
        require './functions/mainRouter.php';
        ?>
    </main>



</body>