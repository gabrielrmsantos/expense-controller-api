<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreExpenseRequest;
use App\Http\Requests\UpdateExpenseRequest;
use App\Models\Expense;
use App\Notifications\ExpenseCreated;
use DateTime;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class ExpenseController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function index()
    {
        try {
            $expenses = Expense::where('user_id', Auth::user()->id)->get();

            return response()->json([
                'status' => true,
                'data' => $expenses
            ]);

        } catch(\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function store(StoreExpenseRequest $request)
    {
        try {
            $expense = Expense::create([
                'description' => $request->description,
                'amount' => $request->amount,
                'date' => new DateTime($request->date),
                'user_id' => Auth::user()->id
            ]);

            Notification::send($request->user(), new ExpenseCreated($expense));

            return response()->json([
                'status' => true,
                'message' => 'Expense registered successfully'
            ], 201);

        } catch(\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function show(Expense $expense)
    {
        try {
            $this->authorize('view', $expense);

            return response()->json([
                'status' => true,
                'data' => $expense
            ], 200);

        } catch(\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function update(UpdateExpenseRequest $request, Expense $expense)
    {
        try {
            $this->authorize('update', $expense);

            Expense::find($expense->id)->update($request->all());

            return response()->json([
                'status' => true,
                'message' => 'Expense updated successfully'
            ], 200);

        } catch(\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function destroy(Expense $expense)
    {
        try {
            $this->authorize("delete", $expense);

            Expense::find($expense->id)->delete();

            return response()->json([
                'status' => true,
                'message' => 'Expense removed successfully'
            ], 200);

        } catch(\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }
}
