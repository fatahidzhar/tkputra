<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Siswa extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $attributes = [
        'tahun_ajaran' => null,
    ];

    public function __construct()
    {
        $this->attributes['tahun_ajaran'] = date('Y');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
