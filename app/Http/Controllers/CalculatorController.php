<?php

namespace App\Http\Controllers;

use App\Models\Calculation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
                'a' => 3.149,
            ],
            'compost' => [
                'a' => 4,
                'b' => 0.001,
                'c' => 25,
                'd' => 0.3,
                'e' => 298,
            ],
            'fertilizer' => [
                'a' => 2,
                'b' => 0.001,
                'c' => 298,
            ],
        ];

        function compost($data, $rule) {
            $a = $data['compost_value'] * $rule['a'] * $rule['b'] * $rule['c'];
            $b = $data['compost_value'] * $rule['d'] * $rule['b'] * $rule['e'];
            $result = $a + $b;
            return $result;
        }

        function fertilizer($data, $rule) {
            return $data['fertilizer_value'] * $rule['a'] * $rule['b'] * $rule['c'];
        }

        function def($data, $rule) {
            return $data['def_value'] * $rule['a'];
        }

        $result['fuel'] = $data['fuel_value'] * $rules['fuel']['a'];
        $result['compost'] = compost($data, $rules['compost']);
        $result['fertilizer'] = fertilizer($data, $rules['fertilizer']);
        $result['def'] = +$data['def_value'];

        if (Auth::check()) {
            Calculation::create([
                'user_id' => Auth::id(),
                'calculation_date' => now(),
                'calculation_data' => json_encode($result),
            ]);
        }

        return view('pages.calculator', compact('result'));
    }
}
