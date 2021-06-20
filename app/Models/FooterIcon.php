<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FooterIcon extends Model
{
    use HasFactory;
    protected $table = 'footer_icons';

    public $primaryKey = "id";
    protected $guarded = [];
}
