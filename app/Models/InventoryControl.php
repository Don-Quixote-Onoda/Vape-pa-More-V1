<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryControl extends Model
{
    use HasFactory;

    protected $table = 'inventory_controls';

    public $primary_key = 'id';
    public $timestamp = true;

    public function product() {
        return $this->belongsTo('App\Models\InventoryControl');
    }
}
