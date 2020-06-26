<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ArticleRequest;
use App\Article;

class ArticleController extends Controller
{
    private $model;

    public function __construct(){
        $this->middleware('user');
        $this->model = new Article();
    }


    public function add(ArticleRequest $request){
        // Form Validation
        $validated = $request->validated();

        // if id null, then add new data to the database.
        if($request->input('id') == null){
            // Add User ID
            $validated['user_id']      = auth()->user()->id;
            $validated['created_at']   = date('Y-m-d H:i:s');
            $validated['updated_at']   = date('Y-m-d H:i:s');
             
            // Save article data to DB.
            $store = $this->model->store($validated);
            $msg = 'New Article Added Successfully.';
        }
        // Is given id are exists or valid?
        else if($this->model->isIDExists( $request->input('id')))
        {
            // Add User ID
            $validated['user_id']      = auth()->user()->id;
            $validated['updated_at']   = date('Y-m-d H:i:s');
            
            // update article data
            $store = $this->model->updateRow($validated, $request->input('id'));
            $msg = 'Article Updated Successfully';
        }
        // executed, when id is not valid.
        else{
            return redirect(route('user'));
        }
       
        // Redirect with data
        if($store){
            return redirect()->back()->withSuccess($msg);
        }else{
            return redirect()->back()->withErrors('Sorry! Please try again latter.');
        }

    }

    public function edit($id){
        $articles = new Article();
        $articles = $articles->get();

        $article = new Article();
        $article = $article->find($id);

       return view('user.article.form', compact('article', 'articles'));
    }


    public function delete($id){
        if($this->model->isIDExists($id)){
            $status = $this->model->remove($id);
            if($status){
                $msg = 'Article delete successfully.';
            }else{
                $msg = 'Unable to delete article. Please try again.';
            }
        }else{
            $msg = 'Unable to delete article. Please try again.';
        }
        
        return redirect()->back()->withSuccess($msg);
    }

}
