<x-layout>
    
  
</x-layout>
{{-- <div class="bg-white py-24 sm:py-32 relative isolate overflow-hidden  px-6  lg:overflow-visible lg:px-0">
  <div class="absolute inset-0 -z-10 overflow-hidden">
    <svg class="absolute left-[max(50%,25rem)] top-0 h-[64rem] w-[128rem] -translate-x-1/2 stroke-gray-200 [mask-image:radial-gradient(64rem_64rem_at_top,white,transparent)]" aria-hidden="true">
      <defs>
        <pattern id="e813992c-7d03-4cc4-a2bd-151760b470a0" width="200" height="200" x="50%" y="-1" patternUnits="userSpaceOnUse">
          <path d="M100 200V.5M.5 .5H200" fill="none" />
        </pattern>
      </defs>
      <svg x="50%" y="-1" class="overflow-visible fill-gray-50">
        <path d="M-100.5 0h201v201h-201Z M699.5 0h201v201h-201Z M499.5 400h201v201h-201Z M-300.5 600h201v201h-201Z" stroke-width="0" />
      </svg>
      <rect width="100%" height="100%" stroke-width="0" fill="url(#e813992c-7d03-4cc4-a2bd-151760b470a0)" />
    </svg>
  </div>
  <div class="mx-auto max-w-7xl px-6 lg:px-8" >
    <div class="mx-auto max-w-2xl lg:mx-0" data-aos="fade-up" data-aos-duration="2000">
      <img class="w-7xl" src="img/lapmadina.png" alt="">
      <h2 class="text-pretty text-4xl font-semibold tracking-tight text-gray-900 sm:text-5xl">LAPMI PARAMADINA</h2>
      <p class="mt-2 text-lg/8 text-gray-600">Lembaga Pers Himpunan Mahasiswa Islam Komisariat Paramadina.</p>
    </div>
    <div class="mx-auto mt-10 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 border-t border-gray-200 pt-10 sm:mt-16 sm:pt-16 lg:mx-0 lg:max-w-none lg:grid-cols-3" data-aos="fade-up" data-aos-duration="2000">
     @foreach ($posts as $post)
        <article class="flex flex-col bg-white shadow-md rounded-lg overflow-hidden transition-transform hover:-translate-y-2 hover:shadow-lg">
          <!-- Image Section -->
          <a href="blog/{{ $post['slug'] }}" class="group relative block">
            <img class="w-full h-48 object-cover" src="{{ Storage::url($post->image) }}" alt="{{ $post['title'] }}">
          </a>
          <!-- Content Section -->
          <div class="p-4">
            <p class="text-sm text-gray-500">{{ date('Y-m-d', strtotime($post['published_at'])) }}</p>
            <h3 class="mt-2 text-lg font-semibold text-gray-900 group-hover:text-gray-600">
              <a href="blog/{{ $post['slug'] }}" class="hover:underline">{{ $post['title'] }}</a>
            </h3>
            <div class="mt-2 text-sm text-gray-600 line-clamp-2">{!! $post->body !!}</div>
          </div>
          <div class="px-4 pb-4">
            <p class="text-sm text-gray-700">By <span class="font-semibold">{{ $post['author'] }}</span></p>
          </div>
        </article>
      @endforeach
    </div>
    
  </div>
</div> --}}
<div class="bg-white py-24 sm:py-32 relative isolate overflow-hidden px-6 lg:overflow-visible lg:px-0">
  <div class="absolute inset-0 -z-10 overflow-hidden">
    <svg class="absolute left-[max(50%,25rem)] top-0 h-[64rem] w-[128rem] -translate-x-1/2 stroke-gray-200 [mask-image:radial-gradient(64rem_64rem_at_top,white,transparent)]" aria-hidden="true">
      <defs>
        <pattern id="e813992c-7d03-4cc4-a2bd-151760b470a0" width="200" height="200" x="50%" y="-1" patternUnits="userSpaceOnUse">
          <path d="M100 200V.5M.5 .5H200" fill="none" />
        </pattern>
      </defs>
      <svg x="50%" y="-1" class="overflow-visible fill-gray-50">
        <path d="M-100.5 0h201v201h-201Z M699.5 0h201v201h-201Z M499.5 400h201v201h-201Z M-300.5 600h201v201h-201Z" stroke-width="0" />
      </svg>
      <rect width="100%" height="100%" stroke-width="0" fill="url(#e813992c-7d03-4cc4-a2bd-151760b470a0)" />
    </svg>
  </div>
  <div class="mx-auto max-w-7xl px-6 lg:px-8">
    <div class="mx-auto max-w-2xl lg:mx-0" data-aos="fade-up" data-aos-duration="2000">
      <img class="w-7xl" src="img/lapmadina.png" alt="">
      <h2 class="text-pretty text-4xl font-semibold tracking-tight text-gray-900 sm:text-5xl">LAPMI PARAMADINA</h2>
      <p class="mt-2 text-lg/8 text-gray-600">Lembaga Pers Himpunan Mahasiswa Islam Komisariat Paramadina.</p>
    </div>
    <div class="mx-auto mt-10 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 border-t border-gray-200 pt-10 sm:mt-16 sm:pt-16 lg:mx-0 lg:max-w-none lg:grid-cols-3" data-aos="fade-up" data-aos-duration="2000">
      @foreach ($posts as $post)
        <article class="flex flex-col bg-white shadow-md rounded-lg overflow-hidden transition-transform hover:-translate-y-2 hover:shadow-lg">
          <a href="blog/{{ $post->slug }}" class="group relative block">
            <img class="w-full h-48 object-cover" src="{{ Storage::url($post->image) }}" alt="{{ $post->title }}">
          </a>
          <div class="p-4">
            <p class="text-sm text-gray-500">{{ date('Y-m-d', strtotime($post->published_at)) }}</p>
            <h3 class="mt-2 text-lg font-semibold text-gray-900 group-hover:text-gray-600">
              <a href="blog/{{ $post->slug }}" class="hover:underline">{{ $post->title }}</a>
            </h3>
            <div class="mt-2 text-sm text-gray-600 line-clamp-2">{!! $post->body !!}</div>
          </div>
          <div class="px-4 pb-4">
            <p class="text-sm text-gray-700">By <span class="font-semibold">{{ $post->author }}</span></p>
          </div>
        </article>
      @endforeach
    </div>
    <div class="mt-8 flex justify-center">
      {{ $posts->links('pagination::tailwind') }}
    </div>
  </div>
</div>

<x-footer></x-footer>
