<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Footer extends Model
{
    use HasFactory;
    protected $table = 'footers';

    public $primaryKey = "id";
    protected $guarded = [];

    public function footerIcons(){
        return $this->hasMany(FooterIcon::class);
    }

    public function getImageAttribute($value)
    {
        return strpos($value, "http") === false ? asset($value) : $value;
    }

    public function setImageAttribute($value)
    {
        if ($value)
            $this->attributes["image"] = is_string($value) ? $value : User::storeFile($value, "footer");
    }
}
