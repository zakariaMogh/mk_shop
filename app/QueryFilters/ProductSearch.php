<?php


namespace App\QueryFilters;


class ProductSearch extends Filter
{

    protected function applyFilters($builder)
    {
        return $builder->where('name','like','%'.request($this->filterName()).'%');
    }
}
