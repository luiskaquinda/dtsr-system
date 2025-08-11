<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClasseVeiculo extends Model
{
    use HasFactory;

    protected $table = 'classes_veiculos';

    protected $fillable = [
        'classe'
    ];

    public function veiculo() {
        return $this->hasMany(
            Veiculo::class, 
            'classe_id', 
            'id'
        );
    }
}
