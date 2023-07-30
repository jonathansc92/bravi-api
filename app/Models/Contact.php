<?php

namespace App\Models;

use App\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Contact extends Model
{
    use HasFactory;
    use Filterable;

    protected $table = 'contacts';

    protected $fillable = [
        'phone',
        'whatsapp',
        'email',
        'person_id',
    ];
}
