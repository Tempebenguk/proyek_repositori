<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mahasiswa extends Model
{
    use HasFactory, Notifiable;

    protected $guard = 'mahasiswa'; // Menentukan guard yang digunakan

    protected $table = 'mahasiswa';

    protected $fillable = ['nim', 'nama', 'password', 'role', 'tahun_masuk', 'foto'];

    protected $hidden = ['password', 'remember_token'];
}
