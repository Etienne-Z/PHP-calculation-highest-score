<?php

$ingredients = array(
    array(
        "name" => "Sprinkels",
        "capacity" => 2,
        "durability" => 2,
        "flavor" => -2,
        "texture" => 0,
        // "calories" => 3
    ),
    array(
        "name" => "Butterscotch",
        "capacity" => 0,
        "durability" => 5,
        "flavor" => -3,
        "texture" => 0,
        // "calories" => 3
    ),
    array(
        "name" => "Chocolate",
        "capacity" => 0,
        "durability" => 0,
        "flavor" => 5,
        "texture" => -1,
        // "calories" => 8
    ),
    array(
        "name" => "Candy",
        "capacity" => 0,
        "durability" => -1,
        "flavor" => 0,
        "texture" => 5,
        // "calories" => 8
    ),

);
 
function calculate($groups) {
    $outcome = array(
        "capacity" => null, 
        "durability" => null,
        "flavor" => null,
        "texture" => null,
    );
    foreach($groups as $group){
    $head = $group['name'];
    array_shift($group);
        foreach($group as $key => $item){
            $results = array(
                "capacity" => null, 
                "durability" => null,
                "flavor" => null,
                "texture" => null,
            );
            $spoons = array();
            for ($i = 0; $i < 50; $i++) {
                $output = $item * $i;
                if( $output > 1){

                    $check = $results[$key];
                    print_r("the check for " . $head . " in " .  $key . " is " . $check . "<br>");
                    if($output > $check or !$check){
                        $results[$key] = $output;
                        $spoons[$key] = $i;
                    }

                    else continue;                   
                }          
            } 
           
        foreach($results as $result){
            // output = result x teaspoons
            $output = $result * $spoons[$key];


            $check = $outcome[$key];
            if( $output > $check or !$check){
                $outcome[$key] = $output;
            }
            else continue;
        }
        
        }    
    }


    print_r($outcome);
} calculate($ingredients);
?>