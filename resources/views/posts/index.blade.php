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
                    <div class="p-6 text-gray-900">
                        @if (session('success'))
                            <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50
                                dark:bg-gray-800 dark:text-green-400" role="alert">
                                <span class="font-medium">¡Ok! </span>{{ session('success') }}
                            </div>
                        @endif
                        @if (session('error'))
                            <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50
                                dark:bg-gray-800 dark:text-red-400" role="alert">
                                <span class="font-medium">¡Error! </span>{{ session('error') }}
                            </div>
                        @endif

                    <h2 class="font-semibold text-2xl text-black-900 leading-tight">
                        Tus publicaciones son:
                    </h2>
                    <div class="relative overflow-x-auto mt-8">
                        <div class="text-right m-3">
                            <a class="bg-blue-50 p-3"
                                href="{{ route('posts.create')}}">
                                + Crear nueva publicación
                            </a>
                        </div>
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">Título</th>
                                    <th scope="col"
class="px-6 py-3 text-right">Fecha Publicación</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $post)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <td class="px-6 py-3 text-xl">
                                        <a href="{{ route('posts.show', $post) }}">
                                            {{ $post->title }}
                                        </a>
                                    </td>
                                    <td class="px-6 py-3 text-right">
                                        {{ \Carbon\Carbon::parse($post->published_at)->format('d/m/Y') }}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
