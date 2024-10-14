<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    public $itemstamps = false; 
    protected $fillable = [ 'CityName','Type '];
    protected $primaryKey = 'CityID';
    protected $table ='tbl_tinhthanhpho';
}
