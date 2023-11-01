<?php
/*================================================================================================================================
  These functions are for generating indexes which represent all ways of choosing k elements from an array of n elements.
  For example, for all ways to choose 3 elements from an array of 6 elements, use the indexes from print_all_indexes(6, 3).
  1 <= $numberOfindexes, $indexmax <= PHP_INT_MAX
*/
function initindexes(int $numberOfindexes) {
  $output = [];
  for($i=0; $i < $numberOfindexes; $i++) {
    $output[] = $i;
  }
  return $output;
}

function print_all_indexes(int $n, int $k) {
  $indexes = initindexes($k);
  //$ixcount = 0;
  while (count($indexes) > 0) {
    print_indexes($k, $indexes);
    //$ixcount++;
    $indexes = get_next_indexes($k, $n-1, $indexes);
  }
  //echo("There are $ixcount combinations for n=$n k=$k.\n");
}

function print_indexes(int $numberOfindexes, array $indexes) {
  if (count($indexes) === 0) {
    echo ("NULL\n");
    return;
  }
  for($i=$numberOfindexes-1; $i >= 0; $i--) {
    echo($indexes[$i]." ");
  }
  echo("\n");
}

function get_next_indexes(int $numberOfindexes, int $indexmax, array $indexes) {
  $arraypos = 0;
  if ($numberOfindexes <= 0) return array();
  for ($arraypos = 0; $arraypos < $numberOfindexes; $arraypos++) {
    if ($arraypos+1 < $numberOfindexes) {
      if ($indexes[$arraypos] + 1 < $indexes[$arraypos+1]) {
        $indexes[$arraypos]++;
        for($i=0; $i < $arraypos; $i++) {
          $indexes[$i] = $i;
        }
        return $indexes;
      }
    } else {
      if ($indexes[$arraypos] < $indexmax) {
        $indexes[$arraypos]++;
        for($i=0; $i < $arraypos; $i++) {
          $indexes[$i] = $i;
        }
        return $indexes;
      }
      return array();
    }
  }
}
/*================================================================================================================================*/
?>

