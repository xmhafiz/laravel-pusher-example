<?php

namespace App\Http\Controllers\Api;

use App\Feed;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApiFeedController extends Controller
{
    public function index()
    {
    	return Feed::orderBy('id', 'desc')->get();
    }
}
