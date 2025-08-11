<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Combustivel extends Model
{
    use HasFactory;

    protected $table = 'combustiveis';

    protected $fillable = [
        'combustivel'
    ];

    public function veiculo() {
        return $this->hasMany(
            Veiculo::class,
            'combustivel_id',
            'id'
        );
    }
}
