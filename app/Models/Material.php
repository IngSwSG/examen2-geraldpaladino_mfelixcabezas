<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Material extends Model
{
    use HasFactory;


    protected $fillable = [
        'unidadMedida',
        'descripcion',
        'ubicacion',
        'idCategoria',
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'idCategoria');
    }

    public function materialUnidades()
    {
        return $this->hasMany(MaterialUnidad::class, 'codigo');
    }

    public function itemsRequisicion()
    {
        return $this->hasMany(ItemRequisicion::class, 'codigo');
    }
}
