<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\URL;

class File extends Model
{
    use HasFactory , SoftDeletes;

    protected $fillable = ['File' , 'email' , 'title' , 'message' , 'deleted_at'];

    public function downloadLink()
    {
         return URL::signedRoute('files.download');
    }
}
