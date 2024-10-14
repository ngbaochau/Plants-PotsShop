<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    use HasFactory;
    public $timestamps = false; 
    protected $fillable = [ 'Order_code','ProID ','ProName','Cost','Pro_sales_quantity','Product_feeship'];
    protected $primaryKey = 'Order_details_ID';
    protected $table ='order_details';
}
