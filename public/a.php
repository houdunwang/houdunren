<?php
function sum(int ...$nums): int
{
    return $count = array_sum($nums);
}
echo sum(1, 2, 3);
