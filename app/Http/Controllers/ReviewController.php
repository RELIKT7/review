<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Review;
use App\Image;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller {
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct() {
    $this->middleware('auth');
  }

  /**
   * Show the application dashboard.
   *
   * @return string
   */
  public function index() {
    $reviews = Review::all();

    foreach ($reviews as $review) {
      $review->images = $review->images;
      $review->user_name = $review->user->name;
    }

    return $reviews;
  }

  public function store(Request $request) {
    $review = new Review();

    $review->text = $request->text;
    $review->user_id = Auth::id();
    $review->save();

    if ($request->images) foreach ($request->images as $key => $file) {
      $image = new Image();
      $image->file_name = "{$review->id}${key}.{$file->clientExtension()}";
      $image->path = $file->storeAs('public/images', $image->file_name);
      $image->review_id = $review->id;

      $image->save();
    }

    $review->images = $review->images;
    $review->user_name = $review->user->name;


    return $review;
  }
}
