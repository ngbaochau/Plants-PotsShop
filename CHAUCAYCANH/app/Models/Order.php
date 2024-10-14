<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public $timestamps = false; 
    protected $fillable = [ 'CusID','ShipID','Order_status','Order_code'];
    protected $primaryKey = 'OrderID';
    protected $table ='order';
}
