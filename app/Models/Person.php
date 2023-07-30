<?php

namespace App\Models;

use App\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Person extends Model
{
    use HasFactory;
    use Filterable;

    protected $table = 'persons';

    protected $fillable = [
        'name',
    ];

    public function contacts(): HasMany
    {
        return $this->hasMany(Contact::class, 'person_id', 'id');
    }
}
