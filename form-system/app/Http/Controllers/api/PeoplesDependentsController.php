<?php

namespace App\Http\Controllers\api;

use App\Models\People;
use App\Models\PeopleDependents;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Validator;
use Laravel\Lumen\Routing\Controller as BaseController;

class PeoplesDependentsController extends BaseController
{
    public function list($pid)
    {
        $data = PeopleDependents::where('people_id', $pid)->get();

        return response()->json($data);
    }

    public function store($pid)
    {
        $input = request()->all();

        $validator = Validator::make(
            $input,
            [
                'cNomeDep'  => 'required|string|max:255',
                'cDataNasc' => 'required|date|max_age:120',
            ],
            People::$rulesMessages
        );

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->first()], 400);
        }

        $data = new PeopleDependents();

        $data->name      = $input['cNomeDep'];
        $data->birth     = $input['cDataNasc'];
        $data->people_id = $pid;

        $data->save();

        return response()->json($data, 202);
    }

    public function delete($pid, $id)
    {
        $data = PeopleDependents::where('people_id', $pid)->where('id', $id)->first();

        $data->delete();

        return response()->json($data, 202);
    }

}
