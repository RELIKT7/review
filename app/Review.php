<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model {
  protected $table = 'reviews';
  public $timestamps = true;

  protected $hidden = ['user_id'];

  public function user() {
    return $this->belongsTo(User::class, 'user_id', 'id');
  }

  public function images() {
    return $this->hasMany(Image::class, "review_id", "id");
  }
}
