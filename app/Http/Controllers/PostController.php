<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * No vamos a recuperar todos los datos de todas las publicaciones,
     * vamos a hacer la selección de columnas (select) y un filtrado (where).
     *  Además ordenamos por fecha de publicación (orderByDesc) y obtenemos sólo los
     *  elementos que queremos (take) y saltandonos los primeros (skip).
     * */
    public function home(){
        $firstPosts = Post::select('id', 'title', 'summary', 'published_at', 'user_id')
        ->where('published_at', '<=', \Carbon\Carbon::today())
        ->orderByDesc('published_at')
        ->take(5)
        ->get();


      $otherPosts = Post::select('id', 'title', 'published_at', 'user_id')
        ->where('published_at', '<=', \Carbon\Carbon::today())
        ->orderByDesc('published_at')
        ->skip(5)
        ->take(20)
        ->get();

        return view('home', compact('firstPosts', 'otherPosts'));

    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $posts = Auth::user()->posts;
        return view('posts.index', compact('posts'));


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|unique:posts|min:3|max:255',
            'summary' => 'max:2000',
            'body' => 'required',
            'published_at' => 'required|date',
        ]);

        $post = new Post();
        $post->user_id = Auth::id();
        $post->title = $request->title;
        $post->summary = $request->summary;
        $post->body = $request->body;
        $post->published_at = $request->published_at;
        $post->save();


        return redirect()->route('posts.index')->with('success','Publicación creada correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('posts.edit', [
            'post' => $post,
            'title' =>  old('title', $post->title),
            'summary' => old('summary', $post->summary),
            'body' =>old('body', $post->body),
        ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
    // Validamos solo los campos necesarios para la actualización del post
    $validatedData = $request->validate([
        'title' => 'required|unique:posts|min:3|max:255',
        'summary' => 'max:2000',
        'body' => 'required',
        'published_at' => 'required|date',
    ]);

    // Actualizamos el post con los datos validados
    $post->update($validatedData);

    // Redireccionamos al usuario a la página del post actualizado
    return redirect()->route('posts.index', $post)->with('success', 'Post actualizado correctamente');
    // return redirect()->route('posts.index')->with('success','llega hatsa update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        if ($post->user_id == Auth::id()) {
            $post->delete();
            return redirect()->route('posts.index')
                    ->with('success', 'Publicación eliminada correctamente.');
          } else {
            return redirect()->route('posts.index')
                    ->with('error', 'No puedes eliminar una publicación de la que no eres el autor.');
          }

    }

    public function read(int $id)
    {
    $post = Post::find($id);
    return view('posts.read', compact('post'));
    }

}
