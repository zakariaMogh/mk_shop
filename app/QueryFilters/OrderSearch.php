<?php


namespace App\QueryFilters;


class OrderSearch extends Filter
{

    protected function applyFilters($builder)
    {
        return $builder->whereHas('user', function($q) {
            $q->where('name','like','%'.request($this->filterName()).'%');
        });
    }
}
