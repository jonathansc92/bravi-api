<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Schema;

class ContactFilter extends Filter
{
    public function phone(string $value = null): Builder
    {
        return $this->builder->where('phone', 'LIKE', "%$value%");
    }

    public function whatsapp(string $value = null): Builder
    {
        return $this->builder->where('whatsapp', 'LIKE', "%$value%");
    }

    public function email(string $value = null): Builder
    {
        return $this->builder->where('email', 'LIKE', "%$value%");
    }

    public function sort(array $value = []): Builder
    {
        if (isset($value['by']) && ! Schema::hasColumn('persons', $value['by'])) {
            return $this->builder;
        }

        return $this->builder->orderBy(
            $value['by'] ?? 'created_at',
            $value['order'] ?? 'desc'
        );
    }

    public function limit(int $value = 15): Builder
    {
        $this->builder->getModel()->setPerPage($value);

        return $this->builder;
    }
}
