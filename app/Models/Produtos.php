<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produtos extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'produtos';
    protected $fillable = ['nome', 'preco', 'descricao'];
    protected $dates = ['deleted_at'];

    public function pedidos()
    {
        return $this->belongsToMany(Pedidos::class, 'pedido_produto', 'produto_id', 'pedido_id')
                    ->withPivot('quantidade')
                    ->withTimestamps();
    }
}
