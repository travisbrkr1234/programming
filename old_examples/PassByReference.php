<?php
function foo(&$var)
{
    //$var++;
    echo $var+1;
}

$a=5;
foo($a);
// $a is 6 here
?>