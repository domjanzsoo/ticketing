<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'label_size_id'
    ];

    public function labelSize()
    {
        return $this->hasOne(LabelSize::class);
    }
}
