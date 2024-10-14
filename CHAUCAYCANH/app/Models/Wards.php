<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wards extends Model
{
    use HasFactory;
    public $itemstamps = false; 
    protected $fillable = [ 'WardsName','Type ','DistrictID'];
    protected $primaryKey = 'WardsID';
    protected $table ='tbl_xaphuongthitran';
}
