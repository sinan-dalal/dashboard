<?php

namespace App\Models;

use App\Helpers\MediaHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Office extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'phone_number',
        'image',
        'email',
        'email_verified_at',
    ];

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($office) {
            if ($office->image) {
                MediaHelper::deleteFile($office->image);
            }
        });
    }

    public function lands(): HasMany
    {
        return $this->hasMany(Land::class);
    }
}
