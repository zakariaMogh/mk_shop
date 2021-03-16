<?php


namespace App\QueryFilters;


class State extends Filter
{

    protected function applyFilters($builder)
    {
        if (request($this->filterName()) === 'all')
        {
            return  $builder;
        }
        return $builder->where('state','=',request($this->filterName()));
    }
}
