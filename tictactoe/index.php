<!DOCTYPE html> 
<?php
    /* 
    * Index page for tit-tac-toe game for ACIT 4850
    * Developed by Pablo Ramos - CIT 4B - A00905324
    * 2016-01-10 14:00 
    */
    require_once("game.php");
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            // Acquire input
            $board = isset($_GET['board'])? $_GET['board'] : null;
            // Instantiate game
            $game = new Game($board);
            // Display game
            $game->display();
        ?>
    </body>
</html>
