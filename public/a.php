<?php
function recursive(int $n)
{
    if($n==1){
        return $n;
    }
    return $n * recursive($n - 1);
}

echo recursive(4);