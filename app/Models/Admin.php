<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Model;
use Illuminate\Notifications\Notifiable;

class Admin extends Model
{
    use HasFactory, Notifiable;

    protected $guard = 'admin'; // Menentukan guard yang digunakan

    protected $table = 'admin';

    protected $fillable = ['name', 'nip', 'password', 'role'];

    protected $hidden = ['password', 'remember_token'];
}
