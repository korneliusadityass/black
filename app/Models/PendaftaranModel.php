<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendaftaranModel extends Model
{
    use HasFactory;
    protected $table = 'pendaftaranpasien';
    protected $primaryKey = 'id';
    protected $fillable = ['iduser', 'tanggaldaftar', 'jadwal', 'nomor_antrian', 'status'];
}