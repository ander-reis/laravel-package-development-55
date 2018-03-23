<?php

namespace Modules\Page;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = ['title', 'body'];
}