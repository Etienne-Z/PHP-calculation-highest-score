<?php

$ingredients = array(
    array(
        "name" => "Sprinkels",
        "capacity" => 2,
        "durability" => 2,
        "flavor" => -2,
        "texture" => 0,
        "calories" => 3
    ),
    array(
        "name" => "Butterscotch",
        "capacity" => 0,
        "durability" => 5,
        "flavor" => -3,
        "texture" => 0,
        "calories" => 3
    ),
    array(
        "name" => "Chocolate",
        "capacity" => 0,
        "durability" => 0,
        "flavor" => 5,
        "texture" => -1,
        "calories" => 8
    ),
    array(
        "name" => "Candy",
        "capacity" => 0,
        "durability" => -1,
        "flavor" => 0,
        "texture" => 5,
        "calories" => 8
    ),

);
 
function possible_combos($groups, $prefix='') {
    $result = array();
    $group = array_shift($groups);
    foreach($group as $selected) {
        if($groups) {
            $result = array_merge($result, possible_combos($groups, $prefix . $selected. ' '));
        } else {
            $result[] = $prefix . $selected;
        }
    }
    return $result;
}

$res = possible_combos($ingredients);

?>
<html>
    <body>
        <button>bereken hoogte score</button>
         <?= count($res)?><br><br><hr><br><br>
        <?= json_encode($res) ?>
    </body>
</html>