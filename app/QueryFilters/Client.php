<?php


namespace App\QueryFilters;


class Client extends Filter
{

    protected function applyFilters($builder)
    {
        return $builder->where('user_id', request('client'));
    }
}
