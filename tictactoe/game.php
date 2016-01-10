<?php

/* 
 * Game class for ACIT 4850
 * Developed by Pablo Ramos - CIT 4B - A00905324
 * 2016-01-10 14:00 
 */
class Game {
    var $position;

    function __construct($squares) {
        $this->position = str_split($squares);
    }

    function winner($token) {
        $won = false;

        // test for rows
        for($row=0; $row<9; $row+=3){
            if (($this->position[$row] == $token) && 
                ($this->position[1+$row] == $token) && 
                ($this->position[2+$row] == $token)) $won = true;
        }

        // test for columns
        for($col=0; $col<3; $col++){
            if (($this->position[0+$col] == $token) && 
                ($this->position[3+$col] == $token) && 
                ($this->position[6+$col] == $token)) $won = true;            
        }

        // test for diagonals 
        if (($this->position[4] == $token) &&
            (($this->position[0] == $token && $this->position[8] == $token) ||
             ($this->position[2] == $token && $this->position[6] == $token))) {
            $won = true;
        }

        return $won;
    }
}   

?>
