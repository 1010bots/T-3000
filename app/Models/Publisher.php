<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Publisher extends Model
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
        'status',
        'team_id',
        'url',
        'images_schema_version',
        'images',
        'extras_schema_version',
        'extras',
    ];

    /**
     * Get list of publishers
     *
     * @return HasMany
     */
    public function products(): HasMany {
        return $this->hasMany(Product::class);
    }
}
