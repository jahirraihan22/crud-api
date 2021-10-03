<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\news;
use Exception;

class NewsController extends Controller
{
    
    public function index(){
        $news = news::latest()->get();

        if($news != null){
            return [
                'status'=> 'success',
                'message' => 'Data found',
                'data' => $news
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
            $news = new news;
            $news->title = $request->title;
            $news->description = $request->description;
            $news->author = $request->author;
            $news->image = $request->image;
            $news->category_id = $request->category_id;

            if($news->save()){
                return [
                    'status'=> 'success',
                    'message' => 'News Created Successfully'
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
            $news = news::findOrFail($id);            
            $news->title = $request->title;
            $news->description = $request->description;
            $news->author = $request->author;
            $news->image = $request->image;
            $news->category_id = $request->category_id;


            if($news->save()){
                return [
                    'status'=> 'success',
                    'message' => 'News Updated Successfully'
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
            $news = news::findOrFail($id);

            if($news->delete()){
                return [
                    'status'=> 'success',
                    'message' => 'News Deleted Successfully'
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
