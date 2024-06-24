<?php

namespace App\Http\Controllers;

use App\Models\Calculation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        $query = Calculation::where('user_id', Auth::id());

        if ($request->has('start_date') && $request->has('end_date')) {
            $query->whereBetween('calculation_date', [$request->start_date, $request->end_date]);
        }

        $calculations = $query->get();

        foreach ($calculations as $calculation) {
            $calculation->calculation_data = json_decode($calculation->calculation_data, true);
        }

        return view('user/profile', compact('calculations'));
    }

    public function destroy($id)
    {
        $calculation = Calculation::findOrFail($id);

        $calculation->delete();

        return redirect()->route('profile')->with('success', 'Расчет удален!');
    }

    public function show(Request $request, $id)
    {
        $query = Calculation::where('user_id', Auth::id());
        if ($request->has('start_date') && $request->has('end_date')) {
            $query->whereBetween('calculation_date', [$request->start_date, $request->end_date]);
        }
        $calculations = $query->get();

        foreach ($calculations as $calculation) {
            $calculation->calculation_data = json_decode($calculation->calculation_data, true);
        }

        $calculation = Calculation::findOrFail($id);
        $calculationData = json_decode($calculation->calculation_data, true);

        return view('user/profile', compact('calculations', 'calculationData'));
    }

    public function compare(Request $request)
    {

        $request->validate([
            'calculation1' => 'required|exists:calculations,id',
            'calculation2' => 'required|exists:calculations,id'
        ]);

        $calculation1 = Calculation::findOrFail($request->calculation1);
        $calculation2 = Calculation::findOrFail($request->calculation2);

        $calculationData1 = json_decode($calculation1->calculation_data, true);
        $calculationData2 = json_decode($calculation2->calculation_data, true);

        $calculations = Calculation::where('user_id', Auth::id())->get();

        foreach ($calculations as $calculation) {
            $calculation->calculation_data = json_decode($calculation->calculation_data, true);
        }

        return view('user/profile', compact('calculations', 'calculationData1', 'calculationData2'));
    }
}
