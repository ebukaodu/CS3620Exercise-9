<?php

namespace App\Http\Controllers;

use App\Question;
use Illuminate\Http\Request;

class QuestionsController extends Controller
{
    public function index()
    {
      return response()->json(Question::get(), 200);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        return response()->json(Question::create($request->all()), 201);
    }

    public function show(Question $question)
    {
        return response()->json($question, 200);
    }

    public function edit(Question $question)
    {
        //
    }

    public function update(Request $request, Question $question)
    {
        return response()->json($question->update($request->all()), 200);
    }

    public function destroy(Question $question)
    {
        return response()->json($question->delete(), 204);
    }
}
