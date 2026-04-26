<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Activitylog\LogOptions;

class SociedadeInterna extends BaseModel
{
    public $table = 'sociedades_internas';

    protected $fillable = [
        'nome', 
        'id_usuario', 
        'created_at'
    ];

    protected $dates = ['created_at', 'updated_at'];

    protected $casts = [
        'nome' => \App\Enums\SociedadesInternas::class,
    ];
    
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logFillable()->logOnly(['user.name'])->useLogName('Sociedade Interna');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo('App\Models\User', 'id_usuario', 'id');
    }
}
