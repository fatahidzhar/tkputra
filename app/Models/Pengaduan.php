<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Pengaduan extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function excerpt($length = 100, $suffix = '...')
    {
        return Str::limit($this->text, $length, $suffix);
    }
}
