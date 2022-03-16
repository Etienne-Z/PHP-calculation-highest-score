<?php

// The array of all the ingredients with their specific values
$ingredients = array(
    array(
        "name" => "Sprinkels",
        "capacity" => 2,
        "durability" => 0,
        "flavour" => -2,
        "texture" => 0,
        "calories" => 3
    ),
    array(
        "name" => "Butterscotch",
        "capacity" => 0,
        "durability" => 5,
        "flavour" => -3,
        "texture" => 0,
        "calories" => 3
    ),
    array(
        "name" => "Chocolate",
        "capacity" => 0,
        "durability" => 0,
        "flavour" => 5,
        "texture" => -1,
        "calories" => 8
    ),
    array(
        "name" => "Candy",
        "capacity" => 0,
        "durability" => -1,
        "flavour" => 0,
        "texture" => 5,
        "calories" => 8
    ),

);

// This function creates an array of all the possibilities. 
function getEveryPossibility(){
    $outcome= array();
    for( $sprinkel = 0; $sprinkel <= 100; $sprinkel++){
        if($sprinkel === 100 ){
            array_push($outcome, [$sprinkel, 0, 0, 0]);  // -> gives back an array with 4 keys
        }
        else {
            for( $butterscotch = 0; $butterscotch <= 100; $butterscotch++){
                if($sprinkel + $butterscotch == 100){
                array_push($outcome, [$sprinkel, $butterscotch, 0, 0]); // -> gives back an array with 4 keys
         }
                else {
                    for( $chocolate = 0; $chocolate <= 100; $chocolate++){
                        if($sprinkel + $butterscotch + $chocolate == 100){
                            array_push($outcome, [$sprinkel, $butterscotch, $chocolate, 0]); // -> gives back an array with 4 keys                       
                        }
                        else{
                            for( $candy = 0; $candy <= 100; $candy++){
                                if($sprinkel + $butterscotch + $chocolate + $candy == 100) {
                                    array_push($outcome, [$sprinkel, $butterscotch, $chocolate, $candy]);  // -> gives back an array with 4 keys       
                                }
                            }            
                        }
                    }
                }
            }
        }
    }
    return $outcome;
}

// This function calculates the highest possible score.
// -> This function is based on the possibilties and the ingredients.
function calculate($ingredients, $possibilities){
    $total_score = 0 ;
    foreach($possibilities as $pos){
            $keys = ['capacity','durability','flavour','texture'];
            foreach($keys as $key){
                $total = ($pos[0]) * ($ingredients[0][$key])
                + ($pos[1]) * ($ingredients[1][$key])
                + ($pos[2]) * ($ingredients[2][$key])
                + ($pos[3]) * ($ingredients[3][$key]);
                
                // Checks if the $total is less then 0, if so it is set to 0.
                $total = $total < 0 ? 0 : $total;
               $keys[$key] = $total;
            }
        $outcome = ($keys['capacity'] * $keys['durability'] * $keys['flavour'] * $keys['texture']);  

        // Checks if the $outcome is higher then the $totalscore.
        $total_score = $outcome > $total_score ? $outcome : $total_score;
    }
    

// Prints the $total_score onto the page.
print_r("the highest possible score is: " . $total_score);


}
// Calls to the calculate function with the needed variables.
// -> $ingredients is the array above.
// -> getEveryPossibility returns a array of all the possibilities. 
calculate($ingredients, getEveryPossibility());
?>
