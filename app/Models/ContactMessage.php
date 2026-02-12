<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactMessage extends Model
{
    use HasFactory;

    // Pastikan nama kolom sesuai dengan database yang kita buat di Hari 1
    protected $fillable = [
        'name',
        'email',
        'phone',
        'subject',
        'message',
        'is_read',      // Status apakah admin sudah baca
        'replied_at',   // Kapan admin membalas (opsional)
    ];

    protected $casts = [
        'is_read' => 'boolean',
        'replied_at' => 'datetime',
    ];
}
