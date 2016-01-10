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
            if (isset($_GET['board']))    
            {
                $position = $_GET['board'];
                $squares = str_split($position);

                if (winner('x',$squares)) echo 'You win.';
                else if (winner('o',$squares)) echo 'I win.';
                else echo 'No winner yet.';
            }
            else
            {
                echo 'No game info available';
            }
                
        ?>
    </body>
</html>
<?php

    // Function to determine if there is a winner
    function winner($token,$position) {
        $won = false;
        
        // test for rows
        for($row=0; $row<9; $row+=3){
            if (($position[$row] == $token) && ($position[1+$row]
                == $token) && ($position[2+$row] == $token)) $won = true;
        }
        
        // test for columns
        for($col=0; $col<3; $col++){
            if (($position[0+$col] == $token) && ($position[3+$col]
                == $token) && ($position[6+$col] == $token)) $won = true;            
        }
        
        // test for diagonals 
        if (($position[4] == $token) &&
            (($position[0] == $token && $position[8] == $token) ||
             ($position[2] == $token && $position[6] == $token))) {
            $won = true;
        }
        
        return $won;
    }
?>