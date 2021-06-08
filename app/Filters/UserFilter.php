<?php

namespace App\Filters;

use App\Login;
use App\Sortable;
use App\Rules\SortableColumn;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserFilter extends QueryFilter
{
    protected $aliasses = [
        'nombre' => 'name',
    ];

    public function getColumnName($alias)
    {
        return $this->aliasses[$alias] ?? $alias;
    }

    public function rules(): array
    {
        return [
            'search' => 'filled',
            'order' => [new SortableColumn(['nombre'])],
        ];
    }

    public function search($query, $search)
    {
        return $query->where('name', 'like', "%$search%");
    }

    public function order($query, $value)
    {
        [$column, $direction] = Sortable::info($value);
        $query->orderBy($this->getColumnName($column), $direction);
    }

}
