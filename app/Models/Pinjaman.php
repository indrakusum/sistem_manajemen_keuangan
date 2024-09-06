<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pinjaman extends Model
{
    use HasFactory;

    protected $table = 'pinjaman';

    // Mass assignable attributes
    protected $fillable = [
        'nasabah_id',
        'jumlah_pinjaman',
        'jumlah_cicilan',
        'rentang_waktu_pinjaman',
        'bunga_pinjaman',
        'tanggal_pinjaman',
        'tanggal_pembayaran_cicilan',
    ];

    // Relationship with Nasabah model
    public function nasabah()
    {
        return $this->belongsTo(Nasabah::class, 'nasabah_id');
    }
}
