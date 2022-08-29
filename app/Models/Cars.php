<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cars extends Model
{
    use HasFactory;
    protected $fillable = [
        'brand_id',
        'model_id',
        'image',
        'year',
        'number_plate',
        'price',
        'color',
        'transmission',
        'created_by',
        'updated_by',
    ];

    public function brand(){
        return $this->hasOne(Brands::class,'id','brand_id');
    }

    public function model(){
        return $this->hasOne(CarModel::class,'id','model_id');
    }
}
