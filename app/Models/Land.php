<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use App\Helpers\MediaHelper;


class Land extends Model
{
    use HasFactory;

    protected $table = 'lands';

    protected $fillable = [
        'image',
        'price',
        'desired_price',
        'area',
        'width',
        'length',
        'tract_no',
        'nature',
        'address',
        'description',
        'office_id',
        'landscape_id',
        'direction_id',
        'site_description_id',
    ];

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($land) {
            if ($land->image){
            MediaHelper::deleteFile($land->image);
            }

            $images = $land->images();

            if ($images->get()->isNotEmpty()){
                foreach ($images->get() as $image) {
                    MediaHelper::deleteFile($image->path);
                }

                $images->delete();
            }
        });
    }

    public function images(): MorphMany
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function landDirection(): BelongsTo
    {
        return $this->belongsTo(landDirection::class, 'direction_id');
    }

    public function siteDescription(): BelongsTo
    {
        return $this->belongsTo(LandSiteDescription::class);
    }

    public function landscape(): BelongsTo
    {
        return $this->belongsTo(Landscape::class);
    }

    public function office(): BelongsTo
    {
        return $this->belongsTo(Office::class);
    }

}
