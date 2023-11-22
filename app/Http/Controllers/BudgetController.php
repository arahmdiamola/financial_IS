<?php

namespace App\Http\Controllers;
use Auth;
use App\Models\Budget;
use App\Models\Categories;
use App\Models\Expense;
use App\Http\Requests\StoreBudgetRequest;
use App\Http\Requests\UpdateBudgetRequest;

class BudgetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // this query is for retrieving categories but only name  and budget fields selected, then budget changed to "value" to accomodate the echart js data.
        $data['categories'] = Categories::select('name','budget as value')
                                    ->where('type', 'expense')
                                    ->where('organization_id', Auth::user()->organization)
                                    ->orderBy('name','asc')
                                    ->get();

        // retrieving categories only for expenses with expenses table attached.
        $cat_expense = Categories::with('getExpenses')->where('type', 'expense')->where('organization_id', Auth::user()->organization)->get();

        // loop every expense and summed up all amounts for every category
        $data['cat_expense_value'] = $cat_expense->map(function ($v, $key) {
            $data['name'] = $v->name;
            $data['value'] = $v->getExpenses->sum('amount');
            return $data;
        });

        return view('budget', $data);
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
    public function store(StoreBudgetRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Budget $budget)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Budget $budget)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBudgetRequest $request, Budget $budget)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Budget $budget)
    {
        //
    }
}
