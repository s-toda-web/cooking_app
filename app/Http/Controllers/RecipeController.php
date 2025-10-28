<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $recipes = Recipe::all();

        return view('recipes.index', compact('recipes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('recipes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'image_path'=>'nullable|image|max:5120',
            'type'=>'required',
        ]);

        $path = null;
        if($request->hasFile('image_path')) {
            $path = $request->file('image_path')->store('recipes', 'public');
        } 

        $recipe = Recipe::create([
            'title' => $request->title,
            'description' => $request->description,
            'image_path' => $path,
            'type' => $request->type,
        ]);


        if($recipe) {
            return redirect()->route('recipes.index')->with('success', '登録が成功しました！');
        } else {
            return back()->with('error', '登録に失敗しました。')->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $recipe = Recipe::findOrFail($id);
        return view('recipes.edit', compact('recipe'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image_path' => 'nullable | image | max:5120',
            'type' => 'required',
        ]);

        $recipe = Recipe::findOrFail($id);

        if($request->hasFile('image_path')) {
            $path = $request->file('image_path')->store('recipes', 'public');
            $recipe->image_path = $path;
        }

        $recipe->title = $request->title;
        $recipe->description = $request->description;
        $recipe->type = $request->type;

        $recipe->save();

        return redirect()->route('recipes.index')->with('success', '更新しました！');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $recipe = Recipe::findOrFail($id);
        $recipe->delete();

        return redirect()->route('recipes.index')->with('success', '削除しました！');
    }

    public function showImage($filename) {
        $path = storage_path('app/recipes/' . $filename);

        if(!\File::exists($path)) {
            abort(404);
        }

        return response()->file($path);
    }
}
