<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $guarded = [];
    use HasFactory;
    public function getParent () {
        return $this->belongsTo(Menu::class, 'parent_id');
    }
}
