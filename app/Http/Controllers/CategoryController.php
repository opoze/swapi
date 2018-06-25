<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use \Response;

class CategoryController extends Controller
{

    public function index() {
      return response()->json(Category::get(), 200);
    }

    public function show($id) {
      return response()->json(Category::find($id));
    }

    public function store(StoreCategoryRequest $r) {

      try{
        $category = new Category();
        $category->name = $r->get('name');
        $category->description = $r->get('description');
        $category->save();
      }
      catch(\Exception $e){
        return response()->json($e, 422);
      }
      return response()->json(true, 200);
    }

    public function update($id, UpdateCategoryRequest $r) {
      try{
        $category = Category::find($id);
        if(!is_null($category)){
          $category->name = $r->get('name');
          $category->description = $r->get('description');
          $category->save();
        }
      }
      catch(\Exception $e){
        return Response::json($e, 422);
      }
      return Response::json(true, 200);
    }

    public function destroy($id) {
      try {
        $category = Category::find($id);
        if(!is_null(category)){
          $category->delete();
          return response()->json(true);
        }
        return response()->json(false);
      } catch (\Exception $e) {
        return response()->json(false, 422);
      }
      return response()->json(true, 200);
    }

    public function search($term){
      $categories = Category::where('name', 'ILIKE', '%' . strtolower($term) . '%')->get();
      return response()->json($categories, 200);
    }

}
