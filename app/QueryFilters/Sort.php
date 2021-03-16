<?php


namespace App\QueryFilters;


class Sort extends Filter
{

    protected function applyFilters($builder)
    {
        $sort = request($this->filterName());
        if (!in_array($sort,['price','cashback','qte','name']))
        {
            $sort = 'name';
        }

        if ($sort === 'price'){
            $direction = 'asc';
        }elseif ($sort === 'cashback'){
            $direction = 'desc';
        }elseif ($sort === 'qte'){
            $direction = 'desc';
        }else{
            $direction = 'asc';
        }
        return $builder->orderBy($sort,$direction);
    }
}
