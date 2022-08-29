<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarModel extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'brand_id', 'created_by', 'updated_by'];

    public function brand()
    {
        return $this->hasOne(Brands::class, 'id', 'brand_id');
    }
}
