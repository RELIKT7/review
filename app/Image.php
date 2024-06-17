<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model {
  protected $table = 'images';

  protected $hidden = ['id', 'review_id', 'created_at', 'updated_at'];
}
