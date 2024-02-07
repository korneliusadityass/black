<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PasienModel extends Model
{
    use HasFactory;
    protected $table = 'pasien';
    protected $primaryKey = 'id';
    protected $fillable = ['nomorrekammedis', 'iduser', 'tempat', 'tanggallahir', 'jeniskelamin', 'alamatlengkap', 'pendidikan', 'agama', 'pekerjaan', 'status', 'notelp'];
}