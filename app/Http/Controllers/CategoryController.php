<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;
use Exception;

class CategoryController extends Controller
{
    public function index(){
        $category = category::latest()->get();

        if($category != null){
            return [
                'status'=> 'success',
                'message' => 'Data found',
                'data' => $category
            ];    
        }else{
            return [
                'status'=> 'success',
                'message' => 'No Data found',
                'data' => []
            ];
        }
        
    }

    public function store(Request $request){
        try{
            $category = new category;
            $category->title = $request->title;
            $category->description = $request->description;

            if($category->save()){
                return [
                    'status'=> 'success',
                    'message' => 'Category Created Successfully'
                ];
            }
        }catch(Exception $e){
            return [
                'status'=> 'error',
                'message' => $e->getMessage()
            ];
        }
    }

    public function update(Request $request,$id){
        
        try{
            $category = category::findOrFail($id);
            $category->title = $request->title;
            $category->description = $request->description;

            if($category->save()){
                return [
                    'status'=> 'success',
                    'message' => 'Category Updated Successfully'
                ];
            }
        }catch(Exception $e){
            return [
                'status'=> 'error',
                'message' => $e->getMessage()
            ];
        }
    }

    public function destroy($id){
        
        try{
            $category = category::findOrFail($id);

            if($category->delete()){
                return [
                    'status'=> 'success',
                    'message' => 'Category Deleted Successfully'
                ];
            }
        }catch(Exception $e){
            return [
                'status'=> 'error',
                'message' => $e->getMessage()
            ];
        }
    }
}
