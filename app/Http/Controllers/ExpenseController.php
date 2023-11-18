<?php

namespace App\Http\Controllers;
use Auth;
use App\Models\expense;
use App\Models\User;
use App\Http\Requests\StoreexpenseRequest;
use App\Http\Requests\UpdateexpenseRequest;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = \App\Models\User::where('organization', Auth::user()->organization)->pluck('id');

        $expenses = expense::where('user', $users)->get();
        return view('expense')->with(compact('expenses'));
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
    public function store(StoreexpenseRequest $request)
    {
        $expense = new expense;
        $expense->name = $request->name;
        $expense->account = $request->account;
        $expense->amount = $request->amount;
        $expense->category = $request->category;
        $expense->expense_date = $request->date;
        $expense->user = Auth::user()->id;
        $expense->save();
        return redirect('/expense');
    }

    /**
     * Display the specified resource.
     */
    public function show(expense $expense)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(expense $expense)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateexpenseRequest $request, expense $expense)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(expense $expense)
    {
        //
    }
}
