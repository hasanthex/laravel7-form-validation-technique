<?php

namespace App;

use App\BaseModel;

class Article extends BaseModel
{
    protected $table = 'article';
    
    protected $fillable = ['title', 'details', 'user_id'];
}
