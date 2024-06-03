<?php

namespace App\Http\Controllers;

use App\Models\Children;
use Illuminate\Http\Request;

class ChildrenController extends Controller
{
    /**
     * 子供のリストを表示します。
     * GETリクエスト
     * URL: http://localhost:8080/api/children/
     * 
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function index(): \Illuminate\Database\Eloquent\Collection
    {
        return Children::all();
    }

    /**
     * 新しい子供を登録します。
     * POSTリクエスト
     * URL: http://localhost:8080/api/children
     * リクエストボディ例:
     * {
     *     "name": "test",
     *     "gender": "M",
     *     "birth_date": "2000-01-01"
     * }
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'gender' => 'required|in:M,F',
            'birth_date' => 'required|date',
        ]);

        $child = Children::create($validated);
        return response()->json($child, 201);
    }

    /**
     * 指定された子供の詳細を表示します。
     * GETリクエスト
     * URL: http://localhost:8080/api/children/1
     * 
     * @param string $id
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function show(string $id): \Illuminate\Database\Eloquent\Model
    {
        return Children::findOrFail($id);
    }

    /**
     * 指定された子供の情報を更新します。
     * PUTリクエスト
     * リクエストボディ例:
     * {
     *     "name": "update",
     *     "gender": "M",
     *     "birth_date": "2000-01-01"
     * }
     * 
     * @param \Illuminate\Http\Request $request
     * @param string $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, string $id): \Illuminate\Http\JsonResponse
    {
        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'gender' => 'sometimes|required|in:M,F',
            'birth_date' => 'sometimes|required|date',
        ]);

        $child = Children::findOrFail($id);
        $child->update($validated);
        return response()->json($child);
    }

    /**
     * 指定された子供の情報を削除します。
     * DELETEリクエスト
     * URL: http://localhost:8080/api/children/1
     * 
     * @param string $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(string $id): \Illuminate\Http\JsonResponse
    {
        $child = Children::findOrFail($id);
        $child->delete();
        return response()->json(null, 204);
    }
}
