<?php 
function randMoreThing($min,$max,$howManyTimes) {
    $list = [];
    for($i=0;$i<$howManyTimes;$i++){
    $TF = TRUE;
    array_push($list, rand($min,$max));

    while($TF) {
        for($j=0;$j<count($list);$j++){
            if($list[$j] == $list[$i] && $j != $i) {
                array_pop($list);
                array_push($list, rand($min,$max));
            } else {
                $TF = FALSE;
            }
        }
    }

    }
    return $list;
}