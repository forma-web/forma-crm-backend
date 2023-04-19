<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdatePositionRequest;
use App\Models\Position;
use App\Models\User;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Position::paginate(5);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $name = $request->get('name');
        $position = Position::create(['name'=> $name]);

        return response()->json($position);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $position = Position::find($id);

        if ($position) {
            return $position;
        } else {
            abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePositionRequest $request, int $id_position)
    {
        $position = Position::findOrFail($id_position)->update($request->validated());

        return response()->json($position);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $position = Position::find($id);
        $users = User::where('id_position', $id)->get();
        foreach ($users as $user) {
            $user->id_position = null;
            $user->save();
        }
        if (! $position instanceof Position) {
            return response()->json(['message' => 'Позиция не найдена'], 404);
        } else {
            Position::destroy($id);

            return response()->json(['data' => $position, 'message' => 'Позиция успешно удалена'], 200);
        }
    }

    public function setPosition(Request $request): \Illuminate\Http\JsonResponse
    {
        $id_position = $request->get('id_position');
        $id_user = $request->get('id_user');
        $user = User::find($id_user);
        $user->id_position = $id_position;
        $user->save();

        return response()->json($user);
    }
}
