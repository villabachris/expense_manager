<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Expense;
use Auth;

class ExpenseController extends Controller
{
    public function index()
    {
        return view('expense');
    }

    public function getCategory()
    {
        $categories = Category::all();
        return response()->json($categories);
    }

    public function newExpense(Request $request)
    {
        $expense = new Expense();
        $expense->category_id = $request->cat;
        $expense->amount = $request->amount;
        $expense->user_id = $request->u_id;
        $expense->created_at = $request->date;
        $expense->save();
        
        return response()->json($expense);
    }

    public function getExpenses()
    {
        $expenses = Expense::with('category')->get();        
        return response()->json($expenses);
    }
    
    public function summaryExpenses()
    {
        $expenses = Expense::with('category')->get();        
        return response()->json($expenses);
    }
}
