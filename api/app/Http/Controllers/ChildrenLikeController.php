<?php

namespace App\Http\Controllers;

use App\Models\ChildrenLike;
use Illuminate\Http\Request;

class ChildrenLikeController extends Controller
{
    /**
     * Display a listing of the resource.
     * GET
     * http://localhost:8080/api/children-like
     */
    public function index()
    {
        return ChildrenLike::with('child')->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'child_id' => 'required|exists:childrens,id',
            'like' => 'required|string|max:255',
        ]);

        return ChildrenLike::create($validated);
    }

    /**
     * Display the specified resource.
     * GET
     * http://localhost:8080/api/children-like/1
     */
    public function show(string $id)
    {
        return ChildrenLike::with('child')->findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'child_id' => 'required|exists:childrens,id',
            'like' => 'required|string|max:255',
        ]);

        $childrenLike = ChildrenLike::findOrFail($id);
        $childrenLike->update($validated);

        return $childrenLike;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $childrenLike = ChildrenLike::findOrFail($id);
        $childrenLike->delete();

        return response()->noContent();
    }
}
