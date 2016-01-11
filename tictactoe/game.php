<?php
/* 
 * Game class for ACIT 4850
 *  Implements a html tic-tac-toe using php
 * Author: Pablo Ramos - CIT 4B - A00905324
 * 2016-01-10 14:00 
 */
class Game {
    
    var $position;          // Stores current moves
    var $raw_board;         // Store raw input string with moves
    var $current_player;    // keep current player

    function __construct($squares) {
        $this->raw_board = !is_null($squares) ? $squares : '---------';
        $this->position = str_split($this->raw_board);
    }

    function winner($token) {
        $won = false;

        // test for winner in rows
        for($row=0; $row<9; $row+=3){
            if (($this->position[$row] == $token) && 
                ($this->position[1+$row] == $token) && 
                ($this->position[2+$row] == $token)) $won = true;
        }

        // test for winner in columns
        for($col=0; $col<3; $col++){
            if (($this->position[0+$col] == $token) && 
                ($this->position[3+$col] == $token) && 
                ($this->position[6+$col] == $token)) $won = true;            
        }

        // test for winner in diagonals 
        if (($this->position[4] == $token) &&
            (($this->position[0] == $token && $this->position[8] == $token) ||
             ($this->position[2] == $token && $this->position[6] == $token))) {
            $won = true;
        }

        return $won;
    }
    
    function show_cell($which) {
        $token = $this->position[$which];
        
        // deal with the easy case
        if ($token <> '' && $token <> '-'){
            return '<td>'.$token.'</td>';
        }
        
        // now the hard case
        $this->newposition = $this->position;               // copy the original
        $this->newposition[$which] = $this->current_player; // this would be their move
        
        $move = implode($this->newposition); // make a string from the board array
        $link = './?board='.$move;           // this is what we want the link to be
                                    
        // so return a cell containing an anchor and showing a hyphen
        return '<td><a href="'.$link.'">-</a></td>';
    }    
    
    function display() {
        
        echo '<h2>Welcome to George, the evil TicTacToe Game.</h2>';
        
        // Test with someone already won
        if ($this->winner('x')){
            echo '<h3 style="color:red;">X player is the big winner!!!</h3>';
            echo '<td><a href="./?board=---------">Click here to play again!</a></td>';
        }
        else if ($this->winner('o')){
            echo '<h3 style="color:red;">O player is the big winner!!!</h3>';
            echo '<td><a href="./?board=---------">Click here to play again!</a></td>';
        }
        else if (substr_count($this->raw_board, '-') == 0)
        {
            echo '<h3 style="color:red;">No winners this turn!!</h3>';
            echo '<td><a href="./?board=---------">Click here to play again!</a></td>';
        }
        else {
            echo '<h3>No winner yet, but you are losing.</h3>';
            echo '</br></br>';
            
            // Define next player     
            if (substr_count($this->raw_board, 'o') >= substr_count($this->raw_board, 'x'))
                $this->current_player = 'x';
            else             
                $this->current_player = 'o';
            
            echo "It's ".strtoupper($this->current_player)." turn";
            
            //draw game table to output
            echo '</br></br>';
            echo '<table cols="3" style="width:50%;font-size:large; font-weight:bold">';
            echo '<tr>'; // open the first row
            for ($pos = 0; $pos < 9; $pos++) {
                echo $this->show_cell($pos);
                if ($pos % 3 == 2){
                    echo '</tr><tr>'; // start a new row for the next square
                }
            }
            echo '</tr>'; // close the last row
            echo '</table>';
        }
    }
}   
?>
