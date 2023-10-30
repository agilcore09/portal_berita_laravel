<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model
{
    use HasFactory;

    protected $table = 'kategori';

    public function berita()
    {
        return $this->belongsTo(BeritaModel::class);
    }
}
