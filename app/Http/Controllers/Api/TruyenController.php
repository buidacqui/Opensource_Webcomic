<?php

namespace App\Http\Controllers\Api;
use App\Models\Truyen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TruyenController extends Controller
{
    public function index()
    {
        return response()->json(Truyen::all());
    }

    public function store(Request $request)
    {
        $truyen = Truyen::create($request->all());
        return response()->json($truyen, 201);
    }

    public function show($id)
    {
        return response()->json(Truyen::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $truyen = Truyen::findOrFail($id);
        $truyen->update($request->all());
        return response()->json($truyen);
    }

    public function destroy($id)
    {
        Truyen::destroy($id);
        return response()->json(null, 204);
    }
}