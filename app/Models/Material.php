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
        'categoria_id',
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function materialUnidades()
    {
        return $this->hasMany(MaterialUnidad::class);
    }

    public function itemsRequisicion()
    {
        return $this->hasMany(ItemRequisicion::class);
    }
}
