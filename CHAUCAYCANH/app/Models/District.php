<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;
    public $itemstamps = false; 
    protected $fillable = [ 'DistrictName','Type ','CityID '];
    protected $primaryKey = 'DistrictID';
    protected $table ='tbl_quanhuyen';
}
