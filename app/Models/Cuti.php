<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuti extends Model
{
    use HasFactory;

    protected $table = 'cuties';
    protected $fillable = ['employe_id', 'jenis_cuti', 'alasan', 'lama_cuti', 'tgl', 'setuju'];

    public function employe(){
        return $this->belongsTo(Employe::class, 'employe_id');
    }
}
