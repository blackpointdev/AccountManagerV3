<?php


namespace App\Http\Controllers;

use App\Operation;
use Illuminate\Http\Request;

class OperationController extends Controller
{
    public function showAllOperations() {
        return response()->json(Operation::all());
    }

    public function showOneOperation($id) {
        return response()->json(Operation::find($id));
    }

    public function create(Request $request) {
        $operation = Operation::create($request->all());

        return response()->json($operation, 201);
    }

    public function delete($id) {
        Operation::findOrFail($id)->delete();
        return response('Deleted Successfully', 200);
    }

    public function update($id, Request $request) {
        $operation = Operation::findOrFail($id);
        $operation->update($request->all());

        return response()->json($operation, 200);
    }
}
