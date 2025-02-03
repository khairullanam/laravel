<x-layout></x-layout>
<section class="bg-white py-64">
  <div class="max-w-4xl mx-auto bg-white shadow-xl rounded-lg p-6" data-aos="fade-down" data-aos-duration="2000">
      <h1 class="text-4xl text-center font-bold text-black mb-6">E-BOOKS Paramadina</h1>

      <!-- Accordion for HMI -->
      <div class="accordion">
          <div class="border-b">
              <button 
                  onclick="toggleAccordion('hmiAccordion')" 
                  class="w-full text-left text-lg font-semibold py-4 px-6 rounded-xl shadow-md text-white gradient focus:outline-none"
                  id="hmiButton" data-aos="fade-down" data-aos-duration="1000"
              >
                  Ke-Perempuanan
              </button>
              <div id="hmiAccordion" class="hidden" data-aos="fade-down">
                  @forelse ($perempuanEbooks as $ebook)
                      <div class="p-4 border-t flex items-center justify-between bg-gray-50 rounded-lg shadow-sm">
                        <div>
                          <p class="text-lg font-medium text-gray-900">{{ $ebook->title }}</p>
                          <p class="text-sm text-gray-600">Size: 1.2 MB</p>
                        </div>
                        <a 
                          href="file/hmi/{{ $ebook->file }}" 
                          download 
                          class="px-4 py-2 gradient text-white text-sm font-medium rounded-lg shadow"
                        >
                          Download
                        </a>
                      </div>
                  @empty
                      <div class="p-4 text-gray-600">Tidak ada e-book HMI tersedia.</div>
                  @endforelse
              </div>
          </div>
      </div>
  </div>
</section>

<script>
  // Fungsi untuk membuka accordion
  function toggleAccordion(id) {
      const element = document.getElementById(id);
      if (element.classList.contains('hidden')) {
          element.classList.remove('hidden');
      } else {
          element.classList.add('hidden');
      }
  }

  // Menambahkan logika untuk membuka accordion berdasarkan kategori yang dipilih
  document.addEventListener('DOMContentLoaded', function() {
      const category = "{{ $category }}";

      if (category === 'hmi') {
          document.getElementById('hmiButton').click(); // Membuka accordion HMI
      } else if (category === 'ke-islaman') {
          document.getElementById('keIslamanButton').click(); // Membuka accordion Ke-Islaman
      } else if (category === 'ke-indonesiaan') {
          document.getElementById('keIndonesiaanButton').click(); // Membuka accordion Ke-Indonesiaan
      }
  });
</script>



  
 
  
  
 <x-footer></x-footer>