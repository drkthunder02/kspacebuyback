<?php

namespace App\Http\Controllers\Reactions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReactionsController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('role:User');
        $this->middleware('permission:reactions');
    }

    public function calculateReactions() {

    }

    public function displayReactions() {

    }

    public function postCalculate() {

    }

    public function displayIterations() {
        
    }
}
