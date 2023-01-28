<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class landDirection extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'land_directions';

    protected $fillable = [
        'name',
        'description'
    ];

    public function land(): HasOne
    {
        return $this->hasOne(land::class);
    }
}
