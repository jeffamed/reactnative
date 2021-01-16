<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendedor extends Model
{
    protected $table = "Vendedores";

    protected $primaryKey = "idVendedor";

    protected $fillable = [
        'idVendedor',
        'Nombre',
        'Telefono',
        'Estado'
    ];
}
