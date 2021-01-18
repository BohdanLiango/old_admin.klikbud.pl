<?php

namespace App\Models\Files;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileFolderName extends Model
{
    protected $table = 'file_folders_name';
    protected $fillable = ['level', 'title'];

    use HasFactory;

}
