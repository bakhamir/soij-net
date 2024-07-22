<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BaseController extends Controller
{
    protected $model;

    public function create(Request $request)
    {
        $rules = $this->getValidationRules();
        
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation errors',
                'errors' => $validator->errors()
            ], 422);
        }

        $item = $this->model::create($request->all());
        return response()->json($item, 201);
    }

    public function item($id)
    {
        $item = $this->model::findOrFail($id);
        return response()->json($item);
    }

    public function list()
    {
        $items = $this->model::all();
        return response()->json($items);
    }

    public function update(Request $request, $id)
    {
        $rules = $this->getValidationRules();
        
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation errors',
                'errors' => $validator->errors()
            ], 422);
        }

        $item = $this->model::findOrFail($id);
        $item->update($request->all());
        return response()->json($item);
    }

    public function delete($id)
    {
        $item = $this->model::findOrFail($id);
        $item->delete();
        return response()->json(null, 204);
    }

    protected function getValidationRules()
    {
        return [];
    }
}