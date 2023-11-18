<?php

namespace App\Http\Controllers;
use Auth;
use App\Models\Income;
use App\Http\Requests\StoreIncomeRequest;
use App\Http\Requests\UpdateIncomeRequest;

class IncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = \App\Models\User::where('organization', Auth::user()->organization)->pluck('id');

        $incomes = income::where('user', $users)->get();
        return view('income')->with(compact('incomes'));
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
    public function store(StoreIncomeRequest $request)
    {
        dd($request->all());
        $income = new income;
        $income->name = $request->name;
        $income->account = $request->account;
        $income->amount = $request->amount;
        $income->category = $request->category;
        $income->income_date = $request->date;
        $income->user = Auth::user()->id;
        $income->save();
        return redirect('/income');
    }

    /**
     * Display the specified resource.
     */
    public function show(Income $income)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Income $income)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateIncomeRequest $request, Income $income)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Income $income)
    {
        //
    }
}
