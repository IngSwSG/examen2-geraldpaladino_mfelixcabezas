<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Riquisicion extends Model
{
        protected $fillable = ['fecha', 'estado', 'usuario_id'];

    public function usuario()
    {
        return $this->belongsTo(user::class);
    }

    public function items()
    {
        return $this->hasMany(ItemRequisicion::class);
    }
}
