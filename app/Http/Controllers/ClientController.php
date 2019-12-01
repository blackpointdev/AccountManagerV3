<?php


namespace App\Http\Controllers;

use App\Client;
use App\Operation;

class ClientController extends Controller
{
    public function showAllClients() {
        return response()->json(Client::all());
    }

    public function showAllOperations($id) {
        return response()->json(Operation::where('userId', $id)->get());
    }
}
