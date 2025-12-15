<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Discipulado extends BaseModel
{
    use HasFactory;

    protected $fillable = ['id_usuario', 'nome', 'created_at'];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logFillable()
        ->logOnly(['user.name'])
        ->useLogName('Discipulado');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo('App\Models\User', 'id_usuario', 'id');
    }
}
