<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Raport extends Model
{
    use HasFactory;

    public function __construct()
    {
        $this->attributes['tahun_ajaran'] = date('Y');
    }
}
