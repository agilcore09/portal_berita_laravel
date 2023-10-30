<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class BeritaModel extends Model
{
    use HasFactory;

    protected $table = 'berita';

    public function category()
    {
        return $this->hasOne(CategoryModel::class, 'id', 'kategori_id');
    }
}
