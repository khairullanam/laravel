<x-layout>
    
  
</x-layout>

<div class="bg-gray-50 py-24 sm:py-32 relative isolate overflow-hidden  px-6  lg:overflow-visible lg:px-0">
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
  <div class="mx-auto max-w-8xl px-6 lg:px-8">
    <p class="mx-auto mt-2 max-w-3xl text-center text-4xl font-semibold tracking-tight text-gray-950 sm:text-5xl">
      {{ $post['title'] }}
    </p>

    <div class="mt-12  gap-6 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3">
      <!-- Item 1: Artikel Utama -->
      <article class="flex mx-auto max-w-4xl flex-col items-start justify-between col-span-2">
       
        <div class="group relative">
          <!-- Tambahkan mx-auto pada gambar -->
          <img class="w-64 mx-auto" src="{{ Storage::url($post->image) }}" alt="Image">
          <p class="text-gray-500 mx-auto">{{ date('Y-m-d', strtotime($post['published_at'])) }}</p>
          <div class="text-justify leading-relaxed text-gray-700">
            {!! $post->body !!}
          </div>
        </div>
        <div class="relative mt-8 flex items-center gap-x-4">
          <div class="text-sm">
            <p class="font-semibold text-gray-900">
              <a href="#">
                <span class="absolute inset-0"></span>
                {{ $post['author'] }}
              </a>
            </p>
          </div>
        </div>
      </article>
      
    </div>
  </div>
</div>




<x-footer></x-footer>
