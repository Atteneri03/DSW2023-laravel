<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Inicio') }}
        </h2>
    </x-slot>


    <div class="py-12">
    <div class="max-w-7xl mx-auto p-6 lg:p-8">
      <h1 class="text-5xl">Publicaciones recientes</h1>
      <div class="">
        @foreach ($firstPosts as $post)
        <div class="rounded-3xl shadow-lg bg-white m-3 p-3 border-gray-500">
          <div class="grid grid-flow-col justify-items-stretch">
            <span class="text-4xl mt-3 col-auto">{{$post->title}}
                @if ($post->votedUsers)
                <span class="text-sm font-mono bg-slate-200 p-2 rounded-xl">
                  {{ $post->votedUsers->count() }}</span>
                @endif
            </span>
            <div class="text-right pt-3">
              <span class="text-sm bg-slate-200 p-2 rounded-2xl mt-5">
                {{ \Carbon\Carbon::create($post->published_at)->format('d/m/Y')}}
              </span>
            </div>
          </div>
          <p class="mt-3">{{$post->summary}}</p>
          <div class="grid grid-cols-2">
            <div class="m-3">
              <span class="text-sm">
                Creado por
                <span class=" font-bold text-slate-700">
                  {{ $post->user->name }}
                </span>
              </span>
            </div>
            <div class="m-3 text-right">
              <a class="text-sm bg-blue-200 p-2 rounded-xl"
  href="{{ Route('posts.read', $post->id)}}">
                Leer más
              </a>
              </span>
            </div>
          </div>
        </div>
        @endforeach
      </div>
      <ul class="list-outside">
        @foreach ($otherPosts as $post)
        <li class="m-2">
          <span class="text-sm font-mono bg-slate-200 p-2 rounded-2xl">
            {{ \Carbon\Carbon::create($post->published_at)->format('d/m/Y')}}</span>
          <a href="{{ Route('posts.read', $post->id)}}"
            class="text-xl mt-3 col-auto mx-4 hover:text-blue-500">{{$post->title}}</a>
          <span class="mt-4 text-slate-600 col-auto">{{$post->user->name}}
            @if ($post->votedUsers)
            <span class="text-sm font-mono bg-slate-200 p-2 rounded-xl">
              {{ $post->votedUsers->count() }}</span>
            @endif
</span>
        </li>
        @endforeach
      </ul>
    </div>
    </div>
</x-app-layout>
