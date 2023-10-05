<?php

namespace App\Http\Controllers\api;

use App\Models\People;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Validator;
use Laravel\Lumen\Routing\Controller as BaseController;

class PeoplesController extends BaseController
{
    public function list()
    {
        $input = request()->only(['page', 'limit']);

        $data = People::orderBy('id', 'desc')->paginate($input['limit'] ?? 3);

        return response()->json($data);
    }

    public function updateStatus($id)
    {
        $input = request()->only(['active']);

        $data = People::find($id);

        $data->active = $input['active'];

        $data->save();

        return response()->json($data, 202);
    }

    public function show($id)
    {
        $data = People::find($id);

        return response()->json($data);
    }

    public function update($id)
    {
        $input         = request()->all();
        $maxKbFileSize = 200;

        $validator = Validator::make(
            $input,
            [
                'cNome'     => 'required|string|max:255',
                'cEmail'    => 'required|email|max:255',
                'cDataNasc' => 'required|date|max_age:120',
                'cFoto'     => "nullable|image|max:$maxKbFileSize",
            ],
            People::$rulesMessages
        );

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->first()], 400);
        }

        $data = People::find($id);

        $data->name  = $input['cNome'];
        $data->email = $input['cEmail'];
        $data->birth = $input['cDataNasc'];

        if (request()->hasFile('cFoto'))
            $data->photo = '/' . request()->file('cFoto')->store('public');

        $data->save();

        return response()->json($data, 202);
    }

    public function store()
    {
        $input         = request()->all();
        $maxKbFileSize = 200;

        $validator = Validator::make(
            $input,
            [
                'cNome'     => 'required|string|max:255',
                'cEmail'    => 'required|email|max:255',
                'cDataNasc' => 'required|date|max_age:120',
                'cFoto'     => "nullable|image|max:$maxKbFileSize",
            ],
            People::$rulesMessages
        );

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->first()], 400);
        }

        $data = new People();

        $data->name  = $input['cNome'];
        $data->email = $input['cEmail'];
        $data->birth = $input['cDataNasc'];

        if (request()->hasFile('cFoto'))
            $data->photo = '/' . request()->file('cFoto')->store('public');

        $data->save();

        return response()->json($data, 202);
    }

    public function delete()
    {
        $input = request()->all(['ids']);

        $data = People::whereIn('id', $input['ids']);

        $data->delete();

        return response()->json($data, 202);
    }

}
