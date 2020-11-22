<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $articles = Article::orderBy('created_at' , 'DESC')->where('user_id','=',auth()->id())->paginate(10);

        return view('article.index')->with([
            'articles' => $articles
        ]);
    }


    public function create()
    {
        return view('article.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:3',
            'content' => 'required'
        ]);


        $article = new Article([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => auth()->id()
        ]);
        $article->save();
        return $this->index()->with([
            'message_success' => $article->title
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
    }

    public function edit(Article $article)
    {
        return view('article.edit')->with([
            'article' => $article
        ]);
    }

    public function update(Request $request, Article $article)
    {
        $request->validate([
            'title' => 'required|min:3',
            'content' => 'required'
        ]);


        $article->update([
            'title' => $request->title,
            'content' => $request->content
        ]);

        return $this->index()->with([
            'message_success' => __('was updated ') . $article->title
        ]);
    }


    public function destroy(Article $article)
    {
        $oldName = $article->name;
        $article->delete();
        return $this->index()->with([
            'message_success' => '<b>' .$oldName. '</b> was deleted.'
        ]);
    }
}
