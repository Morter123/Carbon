<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalculatorController extends Controller
{
    public function index()
    {
        return view('pages.calculator');
    }

    public function calculate(Request $request)
    {
        $data = $request->validate([
            'fuel_value' => ['required'],
            'compost_value' => ['required'],
            'fertilizer_name' => ['required'],
            'fertilizer_value' => ['required'],
            'def_name' => ['required'],
            'def_value' => ['required'],
        ]);

        $rules = [
            'fuel'=> [
                'a' => 3135.89,
                'b' => 1000
            ],
            'compost' => [
                'a' => 0.004,
                'b' => 0.0001,
                'c' => 25,
            ],
        ];

        function compost($data, $rule) {
            return $data['compost_value'] * $rule['a'] * $rule['b'] * $rule['c'];
        }

        $result['fuel'] = $data['fuel_value'] * $rules['fuel']['a'] / $rules['fuel']['b'];
        $result['compost'] = compost($data, $rules['compost']);
        $result['fertilizer'] = +$data['fertilizer_value'];
        $result['def'] = +$data['def_value'];

        return view('pages.calculator', compact('result'));
    }
}
