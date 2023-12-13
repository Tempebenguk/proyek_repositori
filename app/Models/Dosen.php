<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Dosen extends Model
{
    use HasFactory, Notifiable;

    protected $guard = 'dosen'; // Menentukan guard yang digunakan

    protected $table = 'dosen';

    protected $fillable = ['name', 'nidn', 'password', 'role', 'foto', 'jabatan', 'bidang_keahlian'];

    protected $hidden = ['password', 'remember_token'];
}
