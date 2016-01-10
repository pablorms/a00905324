<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            if (isset($_GET['board'])){
                
                $game = new Game($_GET['board']);

                if ($game->winner('x')){
                    echo 'You win. Lucky guesses!';
                }
                else if ($game->winner('o')){
                    echo 'I win. Muahahahaha';
                }
                else {
                    echo 'No winner yet, but you are losing.';
                }
            }
            else
            {
                echo 'No game info available';
            }
                
        ?>
    </body>
</html>
<?php
 
?>