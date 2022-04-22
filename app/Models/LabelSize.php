<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LabelSize extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'width',
        'height'
    ];

    public function template()
    {
        return $this->belongsTo(Template::class);
    }
}
