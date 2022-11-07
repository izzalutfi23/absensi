<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $fillable = ['employe_id', 'date', 'status', 'in', 'out', 'value'];

    public function employe(){
        return $this->belongsTo(Employe::class, 'employe_id');
    }
}
