<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EducationalContent extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'price',
        'discount',
        'discount_type',
    ];

    // Relationship: One EducationalContent has many files
    public function files()
    {
        return $this->hasMany(EducationalContentFile::class);
    }

    /**
     * Calculate the final price after applying the discount.
     *
     * @return float
     */
    public function getFinalPriceAttribute()
    {
        if ($this->discount_type === 'percent') {
            // Calculate percentage discount
            $discountedPrice = $this->price - ($this->price * ($this->discount / 100));
        } else {
            // Calculate fixed amount discount
            $discountedPrice = $this->price - $this->discount;
        }

        return max($discountedPrice, 0); // Ensure the price is not negative
    }

    /**
     * Calculate the discount amount in currency (e.g., how much is discounted in total).
     *
     * @return float
     */
    public function getDiscountAmountAttribute()
    {
        if ($this->discount_type === 'percent') {
            // Calculate percentage discount amount
            return $this->price * ($this->discount / 100);
        } else {
            // Fixed amount discount
            return $this->discount;
        }
    }

    /**
     * Calculate the discount percentage (e.g., what percentage of the price is discounted).
     *
     * @return float
     */
    public function getDiscountPercentageAttribute()
    {
        if ($this->price > 0) {
            if ($this->discount_type === 'percent') {
                // If discount type is percent, return the discount directly
                return $this->discount;
            } else {
                // Calculate percentage based on fixed amount discount
                return ($this->discount / $this->price) * 100;
            }
        }

        return 0; // No discount for free content
    }

    /**
     * Check if the content is free (price = 0).
     *
     * @return bool
     */
    public function getIsFreeAttribute()
    {
        return $this->price == 0;
    }
}
