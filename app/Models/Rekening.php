<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rekening extends Model
{
    use HasFactory;

    protected $table = 'rekening';

    // Mass assignable attributes
    protected $fillable = [
        'nasabah_id',
        'tanggal_pembukaan',
        'jenis_rekening',
        'nama_teler',
        'nama_cabang_rekening',
    ];

    // Relationship with Nasabah model
    public function nasabah()
    {
        return $this->belongsTo(Nasabah::class, 'nasabah_id');
    }
}
