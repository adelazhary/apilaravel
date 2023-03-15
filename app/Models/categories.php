<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categories extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = [
        'name_ar',
        'name_en',
        'creat_at',
        'updated_at',
        'status',
    ];
}

?>
