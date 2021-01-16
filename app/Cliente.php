<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = "Clientes";

    protected $primaryKey = "idCliente";

    protected $fillable = [
        'idCliente',
        'Nombre',
        'Apellido',
        'Direccion',
        'Telefono',
        'idVendedor',
        'Estado'
    ];
}
