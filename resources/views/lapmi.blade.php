<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('LAPMI') }}
        </h2>
    </x-slot>

    <!-- Tombol Tambah -->
    <div class="py-8 px-8">
       <a href="/post/create"> <button class="px-4 py-2 bg-black text-white rounded-md">Tambah</button></a>
    </div>

    <!-- Tabel -->
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mx-8">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">Judul</th>
                    <th scope="col" class="px-6 py-3">Gambar</th>
                    <th scope="col" class="px-6 py-3">Konten</th>
                    <th scope="col" class="px-6 py-3">Tanggal</th>
                    <th scope="col" class="px-6 py-3"><span class="sr-only">Edit</span></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $post->title }}
                    </th>
                    <td class="px-4 py-4">
                        @if($post->image)
                            <img src="{{ asset('storage/'.$post->image) }}" alt="Image" class="w-10 h-10 object-cover rounded-full">
                        @else
                            <span>No Image</span>
                        @endif
                    </td>
                    <td class="px-4 py-4" id="content{{ $post->id }}">
                        {!! Str::limit($post->body, 50) !!}  <!-- Limit content to 100 chars -->
                    </td>
                    <td class="px-4 py-4">
                        {{ date('Y-m-d', strtotime($post->published_at)) }}
                    </td>
                    <td class="px-4 py-4 text-right flex justify-end gap-2">
                        <!-- Tombol Edit -->
                        <a href="{{ route('post.edit', $post->id) }}" class="flex items-center justify-center text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm p-2.5">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 3.487a2.121 2.121 0 113 3L9.878 16.363a4 4 0 01-1.414.94l-4 1.333a1 1 0 01-1.264-1.263l1.333-4a4 4 0 01.94-1.414L16.862 3.487z" />
                            </svg>
                        </a>

                        <!-- Tombol Hapus -->
                        <button data-modal-target="popup-modal{{ $post->id }}" data-modal-toggle="popup-modal{{ $post->id }}"
                            class="flex items-center justify-center text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm p-2.5">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>

                        <!-- Modal -->
                        <div id="popup-modal{{ $post->id }}" tabindex="-1" class="hidden fixed inset-0 z-50 items-center justify-center overflow-y-auto overflow-x-hidden bg-gray-900 bg-opacity-50">
                            <div class="relative w-full max-w-md bg-white rounded-lg shadow-md dark:bg-gray-800">
                                <!-- Tombol Close -->
                                <button type="button" class="absolute top-3 right-3 text-gray-400 hover:text-gray-900 hover:bg-gray-200 p-1.5 rounded-lg focus:outline-none" data-modal-hide="popup-modal{{ $post->id }}">
                                    <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1l6 6m0 0l6 6M7 7l6-6M7 7L1 13" />
                                    </svg>
                                </button>

                                <!-- Konten Modal -->
                                <div class="p-6 text-center">
                                    <h3 class="mb-5 text-lg font-medium text-gray-700 dark:text-gray-300">
                                        Kamu yakin ingin menghapus {{ $post->title }}?
                                    </h3>
                                    <form action="{{ route('post.destroy', $post->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                    
                                        <button type="submit" class="px-4 py-2 text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm">
                                            Hapus
                                        </button>
                                        <button type="button" data-modal-hide="popup-modal{{ $post->id }}" class="px-4 py-2 ml-2 text-gray-700 bg-gray-100 hover:bg-gray-200 rounded-lg focus:ring-4 focus:outline-none focus:ring-gray-300">
                                            Tidak, Kepencet
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            document.querySelectorAll("[data-modal-toggle]").forEach((button) => {
                button.addEventListener("click", () => {
                    const modalId = button.getAttribute("data-modal-target");
                    const modal = document.getElementById(modalId);
                    modal.classList.remove("hidden");
                    modal.classList.add("flex");
                });
            });

            document.querySelectorAll("[data-modal-hide]").forEach((button) => {
                button.addEventListener("click", () => {
                    const modal = button.closest(".fixed");
                    modal.classList.add("hidden");
                    modal.classList.remove("flex");
                });
            });
        });
    </script>

</x-app-layout>
