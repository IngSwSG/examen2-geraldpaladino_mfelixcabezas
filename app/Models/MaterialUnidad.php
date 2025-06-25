<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MaterialUnidad extends Model
{
    protected $fillable = ['material_id', 'unidad_id', 'cantidad', 'presupuesto_id'];

    public function material()
    {
        return $this->belongsTo(Material::class);
    }

    public function unidad()
    {
        return $this->belongsTo(Unidad::class);
    }

    public function presupuesto()
    {
        return $this->belongsTo(Presupuesto::class);
    }
}
