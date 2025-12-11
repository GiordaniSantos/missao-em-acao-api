<?php

namespace App\Models;

use Spatie\Activitylog\LogOptions;

class ReuniaoOracao extends Visita
{
     public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logFillable()
        ->logOnly(['user.name'])
        ->useLogName('Reunião de Oração');
    }
}
