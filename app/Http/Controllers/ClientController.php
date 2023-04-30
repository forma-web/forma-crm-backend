<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientRequest;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Client::paginate(5);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        Client::firstOrCreate($data);

        return response()->noContent(201);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $client = Client::find($id);

        if ($client) {
            return $client;
        } else {
            abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $client = Client::findOrFail($id)->update($request->data);
        return response()->json($client);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $client = Client::find($id);

        if (! $client instanceof Client) {
            return response()->json(['message' => 'Позиция не найдена'], 404);
        } else {
            Client::destroy($id);

            return response()->json(['data' => $client, 'message' => 'Позиция успешно удалена'], 200);
        }
    }
}
