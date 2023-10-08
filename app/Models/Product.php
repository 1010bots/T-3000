<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are casted.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'images' => 'array',
        'extras' => 'array',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'slug',
        'name',
        'type',
        'status',
        'description',
        'keywords',
        'images_schema_version',
        'images',
        'url',
        'url_support',
        'url_eula',
        'url_privacy',
        'extras_schema_version',
        'extras',
    ];

    /**
     * Get list of publishers
     *
     * @return HasMany
     */
    public function publishers(): HasMany {
        return $this->hasMany(ProductPublisher::class);
    }
}
