<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    public $table = 'producto';
    protected $fillable = ["id", "nombre", "cantidad", "precio_unitario", "precio_total"];

    public function getPrecioTotalAttribute(){
      return $this->cantidad * $this->precio_unitario;
    }
}
