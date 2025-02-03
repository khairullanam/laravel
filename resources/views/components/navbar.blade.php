<nav id="header" class="fixed w-full z-30 top-0 text-black">
  <div class="container mx-auto flex flex-wrap items-center justify-between py-2">
      <!-- Logo Section -->
      <div class="pl-4 flex items-center">
          <a href="#" class="toggleColour no-underline hover:no-underline font-bold text-2xl lg:text-4xl flex items-center">
              
              PARAMADINA
          </a>
      </div>

      <!-- Mobile Menu Button -->
      <div class="block lg:hidden pr-4">
          <button id="nav-toggle" class="flex items-center p-1 text-green-800 hover:text-gray-900 focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
              <svg class="fill-current h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                  <title>Menu</title>
                  <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
              </svg>
          </button>
      </div>

      <!-- Main Navigation -->
      <div id="nav-content" class="hidden lg:flex lg:items-center w-full lg:w-auto bg-white lg:bg-transparent text-white p-4 lg:p-0 z-20">
          <ul class="list-reset lg:flex justify-end flex-1 items-center">
              <li class="mr-3">
                  <a href="/" class="inline-block py-2 px-4 text-black no-underline hover:text-gray-800 {{ request()->is('/') ? 'font-bold' : '' }}">HOME</a>
              </li>
              <li class="mr-3 relative">
                  <div x-data="{ open: false }" class="inline-block text-left">
                      <button @click="open = !open" class="inline-flex items-center gap-x-1.5 rounded-md px-3 py-2 text-sm font-semibold text-black">
                          ABOUT
                          <svg class="-mr-1 h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                              <path fill-rule="evenodd" d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                          </svg>
                      </button>

                      <!-- About Dropdown -->
                      <div x-show="open" @click.away="open = false" x-transition class="absolute lefth-0 z-10 top-full mt-2 w-56 rounded-md bg-white shadow-lg ring-1 ring-black/5">
                          <a href="/about" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Sejarah</a>
                          <a href="/visi-misi-hmi" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Visi & Misi</a>
                          <div x-data="{ openSubmenu: false }" class="relative">
                              <button @click="openSubmenu = !openSubmenu" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                  E-book
                                  <svg class="inline-block h-5 w-5 ml-2" fill="currentColor" viewBox="0 0 20 20">
                                      <path fill-rule="evenodd" d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                                  </svg>
                              </button>
                              <div x-show="openSubmenu" @click.away="openSubmenu = false" x-transition class="absolute left-0 top-full mt-1 w-56 rounded-md bg-white shadow-lg ring-1 ring-black/5">
                                  <a href="{{ url('/ebook-hmi?category=hmi') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">HmI</a>
                                  <a href="{{ url('/ebook-hmi?category=ke-islaman') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Ke-Islaman</a>
                                  <a href="{{ url('/ebook-hmi?category=ke-indonesiaan') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Ke-Indonesiaan</a>
                              </div>
                          </div>
                      </div>
                  </div>
              </li>
              <li class="mr-3 relative">
                  <div x-data="{ open: false }" class="inline-block text-left">
                      <button @click="open = !open" class="inline-flex items-center gap-x-1.5 rounded-md px-3 py-2 text-sm font-semibold text-black">
                          KOHATI
                          <svg class="-mr-1 h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                              <path fill-rule="evenodd" d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                          </svg>
                      </button>

                      <!-- About Dropdown -->
                      <div x-show="open" @click.away="open = false" x-transition class="absolute lefth-0 z-10 top-full mt-2 w-56 rounded-md bg-white shadow-lg ring-1 ring-black/5">
                          <a href="/about-kohati" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Sejarah</a>
                          <a href="/visi-misi-kohati" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Visi & Misi</a>
                          
                      </div>
                  </div>
              </li>
              <li class="mr-3">
                  <a href="/blog" class="inline-block py-2 px-4 text-black no-underline hover:text-gray-800">LAPMI</a>
              </li>
              <li class="mr-3">
                  <a href="/lemi" class="inline-block py-2 px-4 text-black no-underline hover:text-gray-800">LEMI</a>
              </li>
              <li class="mr-3">
                  <a href="/lsmi" class="inline-block py-2 px-4 text-black no-underline hover:text-gray-800">LSMI</a>
              </li>
          </ul>
          <a href="/login">
          <button class="mx-auto lg:mx-0 bg-white text-gray-800 font-bold rounded-full py-4 px-8 shadow focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
              Login
          </button></a>
      </div>
  </div>
  <hr class="border-b border-gray-100 opacity-25 my-0 py-0">
</nav>
