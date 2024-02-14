<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Publicaciones') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <p class="text-sm text-right">
                        {{ \Carbon\Carbon::create($post->published_at)->format('d/m/Y') }}
                    </p>
                    <h2 class="font-semibold text-2xl text-black-900 leading-tight m-3">
                        {{ $post->title}}
                    </h2>
                    <p class="italic m-3 text-gray-800 font-semibold">
                        {{ $post->summary }}
                    </p>
                    <p class="m-3 text-sm ">
                        {{ $post->body }}
                    </p>
                    <div class="grid grid-cols-6">
                        <div class="col-start-1 col-span-1 m-3">
                            <a href="{{ route('posts.index') }}"
                            class="bg-sky-400 hover:bg-sky-500 text-white font-bold py-2 px-4 rounded">Volver</a>
                        </div>
                        @if (auth()->user()->id == $post->user_id )
                            <div class="col-start-5 col-span-1 text-right m-3">
                                <a href="{{ route('posts.edit', $post) }}"
                                class="bg-green-400 hover:bg-green-500 text-white font-bold py-2 px-4 rounded">Editar</a>
                            </div>
                            <div class="col-start-6 col-span-1 text-right m-0 p-0">
                                <form action="{{ route('posts.destroy', $post) }}"
                                    method="POST" class="m-0 p-0">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" value="Borrar"
                                    class="bg-red-400 hover:bg-red-500 text-white font-bold py-2 px-4 rounded" />
                                </form>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
