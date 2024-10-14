<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feeship extends Model
{
    use HasFactory;

    public $timestamps = false;  // Corrected from itemstamps to timestamps
    protected $fillable = ['Fee_CityID', 'Fee_DistrictID', 'Fee_WardsID', 'Fee_Ship'];
    protected $primaryKey = 'Fee_ID';
    protected $table = 'tbl_feeship';

    public function city(){
        return $this->belongsTo(City::class, 'Fee_CityID');
    }

    public function district(){
        return $this->belongsTo(District::class, 'Fee_DistrictID');
    }

    public function wards(){
        return $this->belongsTo(Wards::class, 'Fee_WardsID');
    }
}