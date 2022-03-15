<?php
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


function getEveryPossibility(){
    $outcome= array();
    // This function creates an array of all the possibilities. 
    for( $sprinkel = 0; $sprinkel <= 100; $sprinkel++){
        if($sprinkel === 100 ){
            array_push($outcome, [$sprinkel, 0, 0, 0]);
        }
        else {
            for( $butterscotch = 0; $butterscotch <= 100; $butterscotch++){
                if($sprinkel + $butterscotch == 100){
                array_push($outcome, [$sprinkel, $butterscotch, 0, 0]);     
                }
                else {
                    for( $chocolate = 0; $chocolate <= 100; $chocolate++){
                        if($sprinkel + $butterscotch + $chocolate == 100){
                            array_push($outcome, [$sprinkel, $butterscotch, $chocolate, 0]);                          
                        }
                        else{
                            for( $candy = 0; $candy <= 100; $candy++){
                                if($sprinkel + $butterscotch + $chocolate + $candy == 100) {
                                    array_push($outcome, [$sprinkel, $butterscotch, $chocolate, $candy]);       
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

function calculate($ingredients, $possibilities){
    $total_score = 0 ;
    foreach($possibilities as $pos){
            $total_capacity = ($pos[0])* ($ingredients[0]['capacity'])
                + ($pos[1]) * ($ingredients[1]['capacity'])
                + ($pos[2]) * ($ingredients[2]['capacity'])
                + ($pos[3]) * ($ingredients[3]['capacity']);
                
            $total_durability = ($pos[0]) * ($ingredients[1]['durability'])
            + ($pos[1]) * ($ingredients[1]['durability'])
            + ($pos[2]) * ($ingredients[2]['durability'])
            + ($pos[3]) * ($ingredients[3]['durability']);

            $total_flavour = ($pos[0]) * ($ingredients[2]['flavour'])
            + ($pos[1]) * ($ingredients[1]['flavour'])
            + ($pos[2]) * ($ingredients[2]['flavour'])
            + ($pos[3]) * ($ingredients[3]['flavour']);
            
            $total_texture = ($pos[0]) * ($ingredients[3]['texture'])
            + ($pos[1]) * ($ingredients[1]['texture'])
            + ($pos[2]) * ($ingredients[2]['texture'])
            + ($pos[3]) * ($ingredients[3]['texture']);
            
            $total_capacity = $total_capacity < 0 ? 0 : $total_capacity;
            $total_durability = $total_durability < 0 ? 0 : $total_durability;
            $total_flavour = $total_flavour < 0 ? 0 : $total_flavour;
            $total_texture = $total_texture < 0 ? 0 : $total_texture;


            $outcome = ($total_capacity) * ($total_durability) * ($total_flavour) * ($total_texture);         

            $total_score = $outcome > $total_score ? $outcome : $total_score;
    }
    


print_r("de hoogst mogelijke score is: " . $total_score);


}
calculate($ingredients, getEveryPossibility());
?>
