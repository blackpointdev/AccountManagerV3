<?php


namespace App\Http\Controllers;

use App\Client;
use App\Operation;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function showAllClients() {
        return response()->json(Client::all());
    }

    public function showOneClient($id) {
        return response()->json(Client::findOrFail($id));
    }

    public function create(Request $request) {
        $this->validate($request, [
            'name' => 'required|string'
        ]);

        $client = Client::create($request->all());

        return response()->json($client, 201);
    }

    public function delete($id) {
        Client::findOrFail($id)->delete();
        return response('Deleted Successfully', 200);
    }

    public function update($id, Request $request) {
        $client = Client::findOrFail($id);
        $client->update($request->all());

        return response()->json($client, 200);
    }

    public function showAllOperations($id) {
        return response()->json(Operation::where('userId', $id)->get());
    }


}
