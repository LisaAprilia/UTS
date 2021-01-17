<?php

namespace App\Models;

use App\Models\Kecamatan;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Desa extends Model
{
	Protected $table = 'desa';

	function Kecamatan(){
		return $this->belongsTo(Kecamatan::class, 'id_kecamatan');
	}
	
}