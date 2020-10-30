<?php
class H
{
  public function __construct()
  {
    print_r(func_get_args());
  }
}

new H(1, 2, 3, 4);
