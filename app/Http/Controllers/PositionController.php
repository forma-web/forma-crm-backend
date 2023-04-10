<?php

namespace App\Http\Controllers;

use App\Models\Position;
use App\Models\User;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    public function getPositions(){
        return Position::all();
    }

    public function removePosition($id){
        $position = Position::find($id);
        $users = User::where('id_position', $id)->get();
        foreach ($users as $user){
            $user->id_position = null;
            $user->save();
        }
        if (!$position instanceof Position) return response()->json(['message' => 'Позиция не найдена'],404);
        else {
            Position::destroy($id);
            return response()->json(['data' => $position, 'message' => 'Позиция успешно удалена'],200);
        }
    }

    public function editPosition(Request $request){
        $id_position = $request->get('id_position');
        $name = $request->get('name');
        $position = Position::find($id_position);
        $name ? $position->name = $name : '';
        $position->save();
        return response()->json($position);
    }

    function createPosition(Request $request){
        $name = $request->get('name');
        $position = new Position();
        $position->name = $name;
        $position->save();
        return response()->json($position);
    }

    function getPosition($id){
        $position = Position::find($id);

        if ($position)
            return $position;
        else return "Такой позиции не существует";
    }

}
