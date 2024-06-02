<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FamilyGroup;

class FamilyGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     * GET
     * http://localhost:8080/api/family
     */
    public function index()
    {
        $familyGroups = FamilyGroup::with(['user', 'child'])->get();
        return response()->json($familyGroups);
    }

    /**
     * Store a newly created resource in storage.
     * POST
     * http://localhost:8080/api/family
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'user_id' => 'required|exists:users,id',
        //     'child_id' => 'required|exists:childrens,id',
        // ]);

        // @TODO ログインした、user-idに変更する
        // $familyGroup = FamilyGroup::create($request->all());
        $familyGroup = FamilyGroup::create([
            'user_id'  => 1,  // 固定値
            'child_id' => 1,  // 固定値
        ]);

        return response()->json($familyGroup, 201);
    }

    /**
     * Display the specified resource.
     * GET
     * http://localhost:8080/api/family/1
     */
    public function show(string $id)
    {
        $familyGroup = FamilyGroup::with(['user', 'child'])->findOrFail($id);
        return response()->json($familyGroup);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return response()->json(['message' => 'This resource cannot be updated.'], 405); 
    }

    /**
     * Remove the specified resource from storage.
     * DELETE
     * http://localhost:8080/api/family/1
     */
    public function destroy(string $id)
    {
        $familyGroup = FamilyGroup::findOrFail($id);
        $familyGroup->delete();
        return response()->json(null, 204);
    }
}
