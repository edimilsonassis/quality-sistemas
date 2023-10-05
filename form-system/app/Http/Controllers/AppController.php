<?php

namespace App\Http\Controllers;

use App\Models\People;
use Laravel\Lumen\Routing\Controller as BaseController;

class AppController extends BaseController
{
    public $minAge = 0;
    public $maxAge = 120;

    public function index()
    {
        return view('index');
    }

    public function list()
    {
        return view('people-list');
    }

    public function new()
    {
        $now = \Carbon\Carbon::now();

        return view('people-new', [
            'minAge' => \Carbon\Carbon::now()->subYears($this->maxAge)->format('Y-m-d'),
            'maxAge' => \Carbon\Carbon::now()->subYears($this->minAge)->format('Y-m-d')
        ]);
    }

    public function dependents($id)
    {
        $data = People::find($id);

        return !$data ? redirect('/') : view('people-dependents', [
            'people' => $data,
            'minAge' => \Carbon\Carbon::now()->subYears($this->maxAge)->format('Y-m-d'),
            'maxAge' => \Carbon\Carbon::now()->subYears($this->minAge)->format('Y-m-d')
        ]);
    }

    public function show($id)
    {
        $data = People::find($id);

        return !$data ? redirect('/') : view('people-edit', [
            'people' => $data,
            'minAge' => \Carbon\Carbon::now()->subYears($this->maxAge)->format('Y-m-d'),
            'maxAge' => \Carbon\Carbon::now()->subYears($this->minAge)->format('Y-m-d')
        ]);
    }

}
