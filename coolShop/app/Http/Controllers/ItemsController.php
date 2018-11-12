<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;
use Validator;

class ItemsController extends Controller
{
    public function index(){
      return response()->json(Item::paginate(1), 200);
    }

    public function show($id) {
      $item = Item::with('questions')->findOrFail($id);
      $response['item'] = $item;
      $response['questions'] = $item->questions;
      return response()->json($response, 200);
    }

    public function shop(Request $request) {
      $rules = [
        'title' => 'required|max:255',
      ];
      $validator = Validator::make($request->all(), $rules);
      if($validator->fails()) {
        return response()->json($validator->errors(), 400);
      }
        $item = Item::create($request->all());
      return response()->json($item, 201);
    }

    public function update(Request $request, Item $item) {
        $item->update($request->all());
      return response()->json($item, 200);
    }

    public function delete(Request $request, Item $item) {
        $item->delete();
      return response()->json(null, 204);
    }

    public function errors() {
      return response()->json(['msg' => 'Payment is required'], 501);
    }

    public function questions(Request $request, Item $item){
      $questions = $item->questions;
      return response()->json($questions, 200);
    }
}
