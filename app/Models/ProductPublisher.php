<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductPublisher extends Model
{
    use HasFactory;

    /**
     * Get referenced product's information
     *
     * @return BelongsTo
     */
    public function product(): BelongsTo {
        return $this->belongsTo(Product::class);
    }

    /**
     * Get referenced publisher's information
     *
     * @return BelongsTo
     */
    public function publisher(): BelongsTo {
        return $this->belongsTo(Publisher::class);
    }
}
