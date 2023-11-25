<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FormaPagamento extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'forma_pagamentos';
    protected $fillable = ['nome'];
    protected $dates = ['deleted_at'];

    public function pedidos()
    {
        return $this->hasMany(Pedidos::class, 'forma_pagamento_id');
    }
}
