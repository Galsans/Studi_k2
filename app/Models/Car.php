<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
        'id_rental'
    ];

   /**
    * Get all of the rental for the Car
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
   public function rental(): HasMany
   {
       return $this->hasMany(Rental::class);
   }

}
