<?php

namespace App\Http\Controllers;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function halamanreview(){
        $review = Review::get();
        return view('',compact('review'));
    }
}
