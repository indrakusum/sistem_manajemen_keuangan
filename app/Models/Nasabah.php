<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nasabah extends Model
{
    use HasFactory;

    protected $table = 'nasabah';

    // Mass assignable attributes
    protected $fillable = [
        'nama',
        'email',
        'nomor_hp',
        'alamat',
        'rekening_nasabah',
    ];

    // Relationship with Pinjaman model
    public function pinjaman()
    {
        return $this->hasMany(Pinjaman::class, 'nasabah_id');
    }

    // Relationship with Simpanan model
    public function rekening()
    {
        return $this->hasMany(Rekening::class, 'nasabah_id');
    }
}
