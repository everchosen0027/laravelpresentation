<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Balances;
use App\Models\StudentInfo;

class BalancesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $balances = Balances:: join('studentinfo', 'balances.sno', '=', 'studentinfo.sno')->get();
        return view('balance.index' , compact('balances'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        
        $balances = new Balances();
        
        $balances->sNo=$request->xsNo;
        $balances->amountDue=$request->xamountDue;
        $balances->totalBalance=$request->xtotalBalance;
        $balances->notes=$request->xnotes;
        $balances ->save();
        return redirect()->route('balance');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $balances = Balances::where('bNo', $id)->get();
        return view('balance.show', compact('balances'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $balances = Balances::where('bNo', $id)->get();
        return view('balance.edit', compact('balances'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //

        $balances = Balances::where('bNo', $id)
        ->update(
             ['amountDue'=> $request->xamountDue,
             'totalBalance'=> $request->xtotalBalance,
             'notes'=> $request->xnotes,
             ]);
          return redirect()->route('balance');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $balances = Balances::where('bNo', $id);
        $balances->delete();
        return redirect()->route('balance');
    }

    public function getStudentInfo(){
        $studentinfo = StudentInfo::all();
        return view('balance.add', compact('studentinfo'));
    }
}
