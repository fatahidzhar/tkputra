<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Categorie extends Model
{
    use HasFactory;

	protected $guarded = [];

    public static function uucategori()
    {
    	$kode = DB::table('categories')->max('uu_categori');
    	$addNol = '';
    	$kode = str_replace("CG-", "", $kode);
    	$kode = (int) $kode + 1;
        $incrementKode = $kode;

    	if (strlen($kode) == 1) {
    		$addNol = "000";
    	} elseif (strlen($kode) == 2) {
    		$addNol = "00";
    	} elseif (strlen($kode == 3)) {
    		$addNol = "0";
    	}

    	$kodeBaru = "CG-".$addNol.$incrementKode;
    	return $kodeBaru;
    }
}
