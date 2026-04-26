<?php

namespace App\Models;

use Spatie\Activitylog\LogOptions;

class ReuniaoConselho extends Visita
{
    public $table = 'reunioes_conselho';
    
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logFillable()->logOnly(['user.name'])->useLogName('Reunião do Conselho');
    }
}
