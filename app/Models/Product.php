<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //o laravel já faz a vinculação à tabela ao criar a migration junto com a model
    //protected $table = 'products';

    protected $fillable = ['name', 'price', 'description', 'image'];

    public function search($filter = null)
    {
        //->toSql() no lugar de pagination mostra a query que está sendo feita
        $results = $this->where(function ($query) use ($filter) {
            if ($filter) {
                $query->where('name', 'LIKE', "%{$filter}%");
                $query->where('description', 'LIKE', "%{$filter}%");
            }
        })->paginate(5);

        return $results;
    }
}
