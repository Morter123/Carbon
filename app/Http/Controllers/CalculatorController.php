<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalculatorController extends Controller
{
    public function calculate(Request $request) {
        $data = $request->input('forms');

        return view('pages.calculator', compact('data'));
    }
}
