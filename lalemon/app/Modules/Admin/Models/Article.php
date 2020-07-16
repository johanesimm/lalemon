<?php

namespace App\Modules\Admin\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = "article";

    public function category()
    {
        return $this->hasOne('App\Modules\Admin\Models\ArticleCategory', 'id', 'm_article_id');
    }
}
