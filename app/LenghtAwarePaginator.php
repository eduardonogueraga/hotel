<?php

namespace App;

use Illuminate\Pagination\LengthAwarePaginator;

class LenghtAwarePaginator extends LengthAwarePaginator
{
    public function parameters()
    {
        return $this->query;
    }
}
