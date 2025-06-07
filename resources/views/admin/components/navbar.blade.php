<header class="border-b border-gray-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex items-center justify-between h-14">
        <div class="flex items-center space-x-6">
        </div>

        <!-- Desktop User Menu -->
        <div class="hidden sm:flex items-center space-x-4 text-gray-600 text-sm select-none">
         
          <div class="flex items-center space-x-2">
            {{-- <img
              src="{{asset('assets/img/ningning.jpeg')}}"
              class="w-8 h-8 rounded-full object-cover"
              width="32"
              height="32"
              alt="Profile"
            /> --}}
            <div class="text-xs leading-tight">
             @if(Auth::check()) <p class="font-semibold text-gray-900">{{ Auth::user()->username }}</p>
              
    <p class="text-gray-400">{{ Auth::user()->email }}</p>
@endif

            </div>
          </div>
        </div>

        <!-- Mobile Menu Button -->
        <button
          aria-label="Open menu"
          class="sm:hidden text-gray-600 hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-blue-600"
        >
          <i class="fas fa-bars fa-lg"></i>
        </button>
      </div>
    </div>

    <!-- Navigation -->
    <div class="border-t border-b border-gray-200 w-full bg-white sticky top-0 z-20">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <nav class="flex flex-wrap items-center space-x-4 sm:space-x-6 text-sm text-gray-600 font-normal py-2 relative" >
      <a class="flex items-center gap-1 hover:text-gray-900 font-semibold" href="{{route('admin.dashboard')}}" >
        <i class="fas fa-home w-4 text-center"></i> <span>Home</span>
      </a>
      <a class="flex items-center gap-1 hover:text-gray-900" href="{{route('admin.pegawai')}}">
        <i class="fas fa-user-friends w-4 text-center"></i> <span>Pegawai</span>
      </a>
      <!-- Dropdown Rekap Presensi -->
      <div class="relative" onmouseleave="delayHideDropdown()" onmouseenter="clearHideTimeout()">
        <button class="flex items-center gap-1 hover:text-gray-900 focus:outline-none" onclick="toggleDropdown()">
          <i class="fas fa-clipboard-list w-4 text-center"></i>
          <span>Rekap Presensi</span>
          <i class="fas fa-chevron-down text-xs"></i>
        </button>
        <div id="dropdown" class="absolute mt-2 w-40 bg-white border border-gray-200 rounded shadow-lg hidden z-50">
          <a href="{{ route('admin.r_harian')}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Harian</a>
          <a href="{{ route('admin.r_mingguan')}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Mingguan</a>
          <a href="{{ route('admin.r_bulanan')}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Bulanan</a>
        </div>
      </div>
      <a class="flex items-center gap-1 hover:text-gray-900" href="{{ route('admin.ketidak_hadiran')}}">
        <i class="fas fa-calendar-times w-4 text-center"></i> <span>Ketidakhadiran</span>
      </a>
      <a class="flex items-center gap-1 hover:text-gray-900" href="{{route('admin.logout.admin')}}">
        <i class="fas fa-sign-out-alt w-4 text-center"></i> <span>Logout</span>
      </a>
    </nav>
  </div>
</div>
    </header>