<?php

namespace App\Enums;

enum SociedadesInternas: string 
{
    case SOCIEDADE_UCP = 'UCP';
    case SOCIEDADE_UPA = 'UPA';
    case SOCIEDADE_UMP = 'UMP';
    case SOCIEDADE_UPH = 'UPH';
    case SOCIEDADE_SAF = 'SAF';

    public static function list(): array 
    {
        return [
            self::SOCIEDADE_UCP->value => 'União de Crianças Presbiterianas',
            self::SOCIEDADE_UPA->value => 'União de Presbiterianos Adolescentes',
            self::SOCIEDADE_UMP->value => 'União da Mocidade Presbiteriana',
            self::SOCIEDADE_UPH->value => 'União Presbiteriana de Homens',
            self::SOCIEDADE_SAF->value => 'Sociedade Auxiliadora Feminina',
        ];
    }

    public function label(): string
    {
        return match($this) {
            self::SOCIEDADE_UCP => 'União de Crianças Presbiterianas' . ' (' . $this->value . ')',
            self::SOCIEDADE_UPA => 'União Presbiteriana de Adolescentes' . ' (' . $this->value . ')',
            self::SOCIEDADE_UMP => 'União da Mocidade Presbiteriana' . ' (' . $this->value . ')',
            self::SOCIEDADE_UPH => 'União Presbiteriana de Homens' . ' (' . $this->value . ')',
            self::SOCIEDADE_SAF => 'Sociedade Auxiliadora Feminina' . ' (' . $this->value . ')',
        };
    }

}