<x-layouts.site :title="__('Welcome')">


    {{-- <nav x-data="{ scrolled: false }" 
        @scroll.window="scrolled = window.scrollY > 0"
        :class="scrolled ? 'bg-white text-[#162C48]' : 'bg-black text-white'" 
        class="sticky top-0 z-50 transition-all duration-300">
        <div class="container mx-auto px-4 py-3 flex items-center justify-between">
            <!-- Logo -->
            <div class="flex items-center space-x-6">
                <img 
                    :src="scrolled ? '{{ asset('images/LOGO APF.svg') }}' : '{{ asset('images/LOGO APF blanco.svg') }}'" 
                    alt="Asset Performance Fund" 
                    class="h-10"
                >
                <nav class="hidden md:flex space-x-6">
                    <a href="#" class="hover:text-blue-400">Inicio</a>
                    <a href="#" class="hover:text-blue-400">Servicios</a>
                    <a href="#" class="hover:text-blue-400">Asset Found</a>
                    <a href="#" class="hover:text-blue-400">Quienes somos</a>
                    <a href="#" class="hover:text-blue-400">FAQ</a>
                    <a href="#" class="hover:text-blue-400">Documentación</a>
                    <a href="#" class="hover:text-blue-400">Contacto</a>
                </nav>
            </div>

            <!-- Botones y opciones -->
            <div class="flex items-center space-x-6">
                <div class="flex items-center space-x-2">
                    <img src="https://via.placeholder.com/20x15?text=MX" alt="México" class="w-5 h-3">
                    <i class="fas fa-chevron-down text-xs"></i>
                </div>
                <div class="flex items-center space-x-2">
                    <i class="fas fa-lock text-sm"></i>
                    <span>Log In Inversionistas</span>
                </div>
                <button class="bg-azul-secondary hover:bg-azul-primary text-white px-4 py-2 rounded-lg font-medium">
                    Invierte ahora
                </button>
            </div>
        </div>
    </nav> --}}

    
    {{-- <nav x-data="{ scrolled: false, isOpen: false }" 
     @scroll.window="scrolled = window.scrollY > 0"
     :class="scrolled ? 'bg-white text-[#162C48]' : 'bg-black text-white'" 
     class="sticky top-0 z-50 transition-all duration-300">
        <div class="container mx-auto px-4 py-3 flex items-center justify-between">
            <!-- Hamburguesa (visible en móviles) -->
            <div class="md:hidden">
                <button @click="isOpen = !isOpen" class="text-2xl focus:outline-none">
                    <i class="fas fa-bars"></i>
                </button>
            </div>

            <!-- Logo -->
            <div class="flex justify-center md:justify-start w-full md:w-auto">
                <img 
                    :src="scrolled ? '{{ asset('images/LOGO APF.svg') }}' : '{{ asset('images/LOGO APF blanco.svg') }}'" 
                    alt="Asset Performance Fund" 
                    class="h-10 mx-auto md:mx-0"
                >
            </div>

            <!-- Menú de navegación (oculto en móviles) -->
            <nav class="hidden md:flex space-x-6">
                <a href="#home" class="hover:text-blue-400">Inicio</a>
                <a href="#services" class="hover:text-blue-400">Servicios</a>
                <a href="#information" class="hover:text-blue-400">Asset Found</a>
                <a href="#team" class="hover:text-blue-400">Quienes somos</a>
                <a href="#faq" class="hover:text-blue-400">FAQ</a>
                <a href="#docs" class="hover:text-blue-400">Documentación</a>
                <a href="#contact" class="hover:text-blue-400">Contacto</a>
            </nav>

            <!-- Botones y opciones -->
            <div class="hidden md:flex items-center space-x-6">
                <div class="flex items-center space-x-2">
                    @livewire('system.language-selector')
                </div>
                <div class="flex items-center space-x-2">
                    <i class="fas fa-lock text-sm"></i>
                    
                    <a href="{{ route('login') }}"><span>Log In Inversionistas</span></a>
                </div>
                <button class="bg-azul-secondary hover:bg-azul-primary text-white px-4 py-2 rounded-lg font-medium">
                    Invierte ahora
                </button>
            </div>
        </div>

        <!-- Menú desplegable (visible en móviles) -->
        <div x-show="isOpen" @click.away="isOpen = false" class="md:hidden bg-white text-[#162C48] mt-2"
            x-transition:enter="transition ease-out duration-300" 
            x-transition:enter-start="opacity-0 transform scale-95" 
            x-transition:enter-end="opacity-100 transform scale-100" 
            x-transition:leave="transition ease-in duration-200" 
            x-transition:leave-start="opacity-100 transform scale-100" 
            x-transition:leave-end="opacity-0 transform scale-95">
            <div class="px-4 py-6 space-y-4">
                <a href="#home" class="block hover:text-azul-secondary">Inicio</a>
                <a href="#services" class="block hover:text-azul-secondary">Servicios</a>
                <a href="#information" class="block hover:text-azul-secondary">Asset Found</a>
                <a href="#team" class="block hover:text-azul-secondary">Quienes somos</a>
                <a href="#faq" class="block hover:text-azul-secondary">FAQ</a>
                <a href="#docs" class="block hover:text-azul-secondary">Documentación</a>
                <a href="#contact" class="block hover:text-azul-secondary">Contacto</a>
            </div>
            <div class="items-center space-x-6">
                <div class="flex items-center space-x-2 m-2">
                    @livewire('system.language-selector')
                </div>
                <div class="flex items-center space-x-2 m-1">
                    <i class="fas fa-lock text-sm"></i>
                    <span>Log In Inversionistas</span>
                </div>
                <div class="flex justify-end">
                    <button class="bg-azul-secondary hover:bg-azul-primary text-white px-4 py-2 m-2 rounded-lg font-medium">
                        Invierte ahora
                    </button>
                </div>
        </div>
    </nav> --}}

    <nav x-data="{ scrolled: false, isOpen: false }" 
     @scroll.window="scrolled = window.scrollY > 0"
     :class="scrolled ? 'bg-white text-[#162C48]' : 'bg-black text-white'" 
     class="sticky top-0 z-50 transition-all duration-300">
    <div class="container mx-auto px-4 py-3 flex items-center justify-between">
        <!-- Hamburguesa (visible en móviles y tablets) -->
        <div class="xl:hidden">
            <button @click="isOpen = !isOpen" class="text-2xl focus:outline-none">
                <i class="fas fa-bars"></i>
            </button>
        </div>

        <!-- Logo -->
        <div class="flex justify-center xl:justify-start w-full xl:w-auto">
            <img 
                :src="scrolled ? '{{ asset('images/LOGO APF.svg') }}' : '{{ asset('images/LOGO APF blanco.svg') }}'" 
                alt="Asset Performance Fund" 
                class="h-10 mx-auto xl:mx-0"
            >
        </div>

        <!-- Menú de navegación (oculto en móviles y tablets) -->
        <nav class="hidden xl:flex space-x-6">
            <a href="#home" class="hover:text-blue-400">{{ __('site.home') }}</a>
            <a href="#services" class="hover:text-blue-400">{{ __('site.services') }}</a>
            <a href="#information" class="hover:text-blue-400">{{ __('site.fund') }}</a>
            <a href="#team" class="hover:text-blue-400">{{ __('site.team') }}</a>
            <a href="#faq" class="hover:text-blue-400">{{ __('site.faq') }}</a>
            <a href="#docs" class="hover:text-blue-400">{{ __('site.docs') }}</a>
            <a href="#contact" class="hover:text-blue-400">{{ __('site.contact') }}</a>
        </nav>

        <!-- Botones y opciones -->
        <div class="hidden xl:flex items-center space-x-6">
            <div class="flex items-center space-x-2">
                @livewire('system.language-selector')
            </div>
            <div class="flex items-center space-x-2">
                <i class="fas fa-lock text-sm"></i>
                <a href="{{ route('login') }}"><span>{{ __('site.login') }}</span></a>
            </div>
            <button class="bg-azul-secondary hover:bg-azul-primary text-white px-4 py-2 rounded-lg font-medium">
                {{ __('site.invest_now') }}
            </button>
        </div>
    </div>

    <!-- Menú desplegable (visible en móviles y tablets) -->
    <div x-show="isOpen" @click.away="isOpen = false" class="xl:hidden bg-white text-[#162C48] mt-2"
        x-transition:enter="transition ease-out duration-300" 
        x-transition:enter-start="opacity-0 transform scale-95" 
        x-transition:enter-end="opacity-100 transform scale-100" 
        x-transition:leave="transition ease-in duration-200" 
        x-transition:leave-start="opacity-100 transform scale-100" 
        x-transition:leave-end="opacity-0 transform scale-95">
        <div class="px-4 py-6 space-y-4">
            <a href="#home" class="block hover:text-azul-secondary">{{ __('site.home') }}</a>
            <a href="#services" class="block hover:text-azul-secondary">{{ __('site.services') }}</a>
            <a href="#information" class="block hover:text-azul-secondary">{{ __('site.fund') }}</a>
            <a href="#team" class="block hover:text-azul-secondary">{{ __('site.team') }}</a>
            <a href="#faq" class="block hover:text-azul-secondary">{{ __('site.faq') }}</a>
            <a href="#docs" class="block hover:text-azul-secondary">{{ __('site.docs') }}</a>
            <a href="#contact" class="block hover:text-azul-secondary">{{ __('site.contact') }}</a>
        </div>
        <div class="items-center space-x-6">
            <div class="flex items-center space-x-2 m-2">
                @livewire('system.language-selector')
            </div>
            <div class="flex items-center space-x-2 m-1">
                <i class="fas fa-lock text-sm"></i>
                <span>{{ __('site.login') }}</span>
            </div>
            <div class="flex justify-end">
                <button class="bg-azul-secondary hover:bg-azul-primary text-white px-4 py-2 m-2 rounded-lg font-medium">
                    {{ __('site.invest_now') }}
                </button>
            </div>
        </div>
    </div>
</nav>

    <!-- Hero Section -->
    <div id="home">
    <section class="relative w-full h-[900px] bg-black text-white overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-r from-black to-transparent opacity-70"></div>
        <!-- Imagen transparente -->
        <img 
            src="{{ asset('images/Hero background.webp') }}" 
            alt="Imagen transparente" 
            class="absolute inset-0 w-full h-full object-cover opacity-50"
        />
        <div class="container mx-auto px-4 py-16 md:py-24 relative z-10">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div>
                    <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-4">
                        {{ __('site.hero_text_1') }}
                    </h1>
                    <p class="text-xl mb-8">{{ __('site.hero_text_2') }}</p>
                    <button class="bg-azul-secondary hover:bg-azul-primary px-6 py-3 rounded-lg font-medium transition">
                        {{ __('site.hero_text_3') }}
                    </button>
                </div>
                <div class="relative">
                    <img src="{{ asset('images/GRAFICO HERO.webp') }}" alt="Gráfico de crecimiento" class="w-full rounded-lg">
                </div>
            </div>
        </div>
        {{-- <div class="absolute right-0 bottom-10 mb-8 text-xs text-white opacity-70">
            <div class="transform rotate-90">
                <span>DESLIZA HACIA ABAJO</span>
            </div>
            <i class="fa-solid fa-caret-down"></i>
        </div> --}}
        <div class="absolute right-0 bottom-10 mb-4 text-center text-xs text-white opacity-70 mr-4">
            <span class="transform rotate-90">{{ __('site.hero_text_4') }}</span>
            <i class="fa-solid fa-caret-down mt-2 block animate-bounce"></i>
        </div>
    </section>

    </div>
    

    <!-- Servicios de inversión confiable -->
    <section id="services" class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                {{-- <div>
                    <img src="{{ asset('images/Servicios.webp') }}" alt="Edificio moderno" class="w-full rounded-2xl shadow-lg">
                </div> --}}
                <div class="relative w-full">
                    <!-- Imagen -->
                    <img 
                        src="{{ asset('images/Servicios.webp') }}" 
                        alt="Edificio moderno" 
                        class="w-full rounded-2xl shadow-lg h-[500px] md:h-[600px] lg:h-[700px] object-cover"
                    />

                    <!-- Máscara de color -->
                    <div class="absolute inset-0 bg-azul-primary opacity-50 rounded-2xl"></div>
                </div>
                <div>
                    <h2 class="text-5xl lg:text-6xl text-azul-primary mb-6 font-figtree font-bold">{{ __('site.services_title') }}</h2>
                    <ul class="space-y-4">
                        <li class="flex items-center">
                            <i class="fa-solid fa-check text-xl lg:text-2xl text-azul-secondary mr-3"></i>
                            <span class="text-xl lg:text-2xl font-figtree">
                                {{ __('site.services_text_1') }}</h2>
                            </span>
                        </li>
                        <li class="flex items-center">
                            <i class="fa-solid fa-check text-xl lg:text-2xl text-azul-secondary mr-3 pl-1"></i>
                            <span class="text-xl lg:text-2xl font-figtree pl-1">
                                {{ __('site.services_text_2') }}
                            </span>
                        </li>
                        <li class="flex items-center">
                            <i class="fa-solid fa-check text-xl lg:text-2xl text-azul-secondary mr-3"></i>
                            <span class="text-xl lg:text-2xl font-figtree">
                                {{ __('site.services_text_3') }}
                            </span>
                        </li>
                        <li class="flex items-center">
                            <i class="fa-solid fa-check text-xl lg:text-2xl text-azul-secondary mr-3"></i>
                            <span class="text-xl lg:text-2xl font-figtree">{{ __('site.services_text_4') }}</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fa-solid fa-check text-xl lg:text-2xl text-azul-secondary mr-3"></i>
                            <span class="text-xl lg:text-2xl font-figtree">{{ __('site.services_text_5') }}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Información de Asset Found -->
    <section id="information" class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div>
                    <h2 class="text-5xl lg:text-6xl font-figtree font-bold text-azul-primary mb-4">{{ __('site.fund_title') }}</h2>
                    <h3 class="text-2xl font-figtree font-semibold text-azul-primary mb-6">{{ __('site.fund_subtitle') }}</h3>
                    <ul class="space-y-4">
                        <li class="flex items-center">
                            <i class="fa-solid fa-check text-xl lg:text-2xl text-azul-secondary mr-3"></i>
                            <span class="text-xl lg:text-2xl font-figtree"><strong>{{ __('site.fund_text_1_title') }}</strong> {{ __('site.fund_text_1') }}</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fa-solid fa-check text-xl lg:text-2xl text-azul-secondary mr-3"></i>
                            <span class="text-xl lg:text-2xl font-figtree"><strong>{{ __('site.fund_text_2_title') }}</strong> {{ __('site.fund_text_2') }}</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fa-solid fa-check text-xl lg:text-2xl text-azul-secondary mr-3"></i>
                            <span class="text-xl lg:text-2xl font-figtree"><strong>{{ __('site.fund_text_3_title') }}</strong> {{ __('site.fund_text_3') }}</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fa-solid fa-check text-xl lg:text-2xl text-azul-secondary mr-3"></i>
                            <span class="text-xl lg:text-2xl font-figtree"><strong>{{ __('site.fund_text_4_title') }}</strong> {{ __('site.fund_text_4') }}</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fa-solid fa-check text-xl lg:text-2xl text-azul-secondary mr-3"></i>
                            <span class="text-xl lg:text-2xl font-figtree"><strong>{{ __('site.fund_text_5_title') }}</strong> {{ __('site.fund_text_5') }}</span>
                        </li>
                    </ul>
                </div>
                <div class="relative w-full">
                    <!-- Imagen -->
                    <img 
                        src="{{ asset('images/Asset Found Information.webp') }}" 
                        alt="Edificio moderno" 
                        class="w-full rounded-2xl shadow-lg h-[500px] md:h-[600px] lg:h-[700px] object-cover"
                    />

                    <!-- Máscara de color -->
                    <div class="absolute inset-0 bg-azul-primary opacity-50 rounded-2xl"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Nuestros Proyectos -->
    <section id="projects" class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-5xl lg:text-6xl font-figtree font-bold text-azul-primary text-center mb-4">{{ __('site.projects_title') }}</h2>
            <p class="text-center text-2xl lg:text-3xl text-azul-primary font-figtree">{{ __('site.projects_subtitle') }}</p>
            <div class="relative w-full">
                <img src="{{ asset('images/Construccion.webp') }}" alt="Sitio de construcción con grúas" class="w-full rounded-2xl shadow-lg">
                <div class="absolute inset-0 bg-azul-primary opacity-20 rounded-2xl"></div>
            </div>
        </div>
    </section>

    <!-- Equipo Gestor -->
    <section id="team" class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div class="relative">
                    <img src="{{ asset('images/Alvaro Bazan.webp') }}" alt="Álvaro Bazan" class="w-3/4 mx-auto rounded-2xl shadow-lg">
                    {{-- <div class="absolute -bottom-6 left-10 w-16 h-16 bg-blue-600 rounded-full flex items-center justify-center">
                        <i class="fas fa-ellipsis-h text-white text-2xl"></i>
                    </div>
                    <div class="absolute -top-6 right-10 w-16 h-16 bg-blue-600 rounded-full flex items-center justify-center">
                        <i class="fas fa-ellipsis-h text-white text-2xl"></i>
                    </div> --}}
                </div>
                <div>
                    <h2 class="text-5xl lg:text-6xl font-figtree font-bold text-azul-primary mb-2">{{ __('site.team_title') }}</h2>
                    <p class="text-xl lg:text-2xl text-azul-primary mb-8">{{ __('site.team_subtitle') }}</p>
                    
                    <div class="bg-white p-6 rounded-xl shadow-lg">
                        <h3 class="text-4xl lg:text-5xl font-figtree font-bold text-azul-secondary mb-2">Álvaro Bazan</h3>
                        <p class="text-xl lg:text-2xl text-gray-500 font-figtree mb-4">{{ __('site.team_subtitle_2') }}</p>
                        <p class="text-lg text-gray-700 leading-relaxed">
                            {{ __('site.team_text_1') }}
                            <br><br>
                            {{ __('site.team_text_2') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Dónde Operamos -->
    <section id="where" class="py-16 bg-white mt-0 mb-0">
        <div class="container mx-auto px-4">
            <h2 class="text-4xl font-bold text-blue-900 text-center mb-12">{{ __('site.where_title') }}</h2>
            
            <div class="grid md:grid-cols-4 gap-8 items-center">
                <div class="bg-white p-6 rounded-xl shadow-md border-b-4 border-azul-secondary h-[500px] lg:h-[300px]">
                    <div class="flex justify-center mb-4">
                        <img src="{{ asset('images/Donde operamos icon-01.svg') }}"  class="text-azul-secondary h-[128px]"></img>
                    </div>
                    <p class="text-center text-gray-700">
                        {{ __('site.where_text_1') }}
                    </p>
                </div>
                
                <div class="bg-white p-6 rounded-xl shadow-md border-b-4 border-azul-secondary h-[500px] lg:h-[300px]">
                    <div class="flex justify-center mb-4">
                        <img src="{{ asset('images/Donde operamos icon-02.svg') }}"  class="text-azul-secondary h-[128px]"></img>
                    </div>
                    <p class="text-center text-gray-700">
                        {{ __('site.where_text_2') }}
                    </p>
                </div>
                
                <div class="bg-white p-6 col-span-2">
                    <img src="{{ asset('images/Mapa USA corregido.webp') }}" alt="Mapa de EE.UU. con estados destacados" class="w-full h-auto">
                </div>
            </div>
            
        </div>
    </section>
    <div class="relative mt-0 mb-0 overflow-hidden">
        <img src="{{ asset('images/Mesa Arizona.webp') }}" alt="Panorama de la ciudad de Mesa, Arizona" class="w-full h-[600px] object-cover opacity-60">

        <!-- Gradiente difuminado -->
        <div class="absolute inset-0 bg-gradient-to-b from-white to-transparent"></div>
    </div>

    <!-- Historical y rendimiento -->
   {{--  <section class="py-16 bg-azul-primary text-white">
        <div class="mx-auto px-4">
            <h2 class="text-4xl font-figtree font-bold text-center mb-12">Historial y rendimiento</h2>
            
            <div class="grid md:grid-cols-4 gap-8 mb-12">
                <div class="text-center">
                    <div class="text-4xl font-bold text-blue-300">+10</div>
                    <div class="text-sm">Años operando</div>
                </div>
                <div class="text-center">
                    <div class="text-4xl font-bold text-blue-300">$3,894,567</div>
                    <div class="text-sm">AUM</div>
                </div>
                <div class="text-center">
                    <div class="text-4xl font-bold text-blue-300">145</div>
                    <div class="text-sm">Proyectos finales</div>
                </div>
                <div class="text-center">
                    <div class="text-4xl font-bold text-blue-300">7% -10%</div>
                    <div class="text-sm">Rendimiento promedio anual</div>
                </div>
            </div>
            
            <div class="text-center">
                <button class="bg-blue-600 hover:bg-blue-700 px-8 py-3 rounded-lg font-medium transition">
                    Solicitar Reporte de Rendimiento
                </button>
            </div>
            
            <div class="mt-12 flex justify-center">
                <img src="https://via.placeholder.com/400x400?text=Analytics+Chart+in+Circle" alt="Gráfico analítico en círculo" class="w-64 h-64">
            </div>
        </div>
    </section> --}}

    <!-- Historical y rendimiento -->
    <section id="performance" class="relative w-full h-50vh bg-black text-white overflow-hidden">
        {{-- <div class="absolute inset-0 bg-gradient-to-r from-black to-transparent opacity-70"></div> --}}
        <!-- Imagen transparente -->
        <img 
            src="{{ asset('images/Historial y Rendimiento Background.webp') }}" 
            alt="Imagen transparente" 
            class="absolute inset-0 w-full h-[900px] object-cover opacity-10"
        />
        <div class="container mx-auto px-4 py-16 md:py-24 relative z-10">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div>
                    <h2 class="text-3xl md:text-6xl font-figtree font-bold text-center mb-12 mt-0">{{ __('site.perf_title') }}</h2>
                    <div class="flex justify-between">
                        <div class="text-center ml-4 md:ml-8"> 
                            <div class="text-4xl md:text-5xl font-bold text-azul-secondary">+10</div>
                            <div class="text-sm">{{ __('site.perf_text_1') }}</div>
                        </div>
                        <div class="text-center mr-4 md:mr-8">
                            <div class="text-4xl md:text-5xl font-bold text-azul-secondary">$3,894,567</div>
                            <div class="text-sm">{{ __('site.perf_text_2') }}</div>
                        </div>
                    </div>
                    <div class="flex justify-between mt-4">
                        <div class="text-center ml-4 md:ml-8">
                            <div class="text-4xl md:text-5xl font-bold text-azul-secondary">145</div>
                            <div class="text-sm">{{ __('site.perf_text_3') }}</div>
                        </div>
                        <div class="text-center mr-4 md:mr-8">
                            <div class="text-4xl md:text-5xl font-bold text-azul-secondary">7% -10%</div>
                            <div class="text-sm">{{ __('site.perf_text_4') }}</div>
                        </div>
                    </div>
                    <div class="text-center col-span-2 mt-12">
                        <button class="bg-azul-secondary hover:bg-azul-primary px-8 py-3 rounded-lg font-medium transition">
                            {{ __('site.perf_button') }}
                        </button>
                    </div>
                </div>
                {{-- <div class="relative items-center">
                    <img src="{{ asset('images/Metrica icon.webp') }}" alt="Gráfico de crecimiento" class="w-4/5 rounded-lg">
                </div> --}}
                <div class="flex justify-center items-center">
                <img 
                    src="{{ asset('images/Metrica icon.webp') }}" 
                    alt="Gráfico de crecimiento" 
                    class="w-full md:w-4/5 lg:w-3/5 max-w-[400px] mx-auto rounded-lg"
                />
            </div>
            </div> 
        </div>
    </section>


    <!-- Preguntas Frecuentes -->
    <section id="faq" class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-4xl md:text-6xl font-bold font-figtree text-azul-secondary mb-8 mx-auto text-left">{{ __('site.faq_title') }}</h2>
            
            <div class="grid md:grid-cols-2 gap-8">
                

                <div class="container mx-auto px-4 py-14">
                    <div class="space-y-4">
                        <!-- Pregunta 1 -->
                        <div x-data="{ open: false }" class="border rounded-lg overflow-hidden">
                            <!-- Botón para abrir/cerrar -->
                            <button 
                                @click="open = !open"
                                class="w-full text-left font-figtree font-bodd text-lg md:text-2xl px-6 py-4 bg-gray-100 hover:bg-gray-200 focus:outline-none focus:bg-gray-200 transition"
                            >
                                <div class="flex items-center justify-between">
                                    <span class="font-medium text-gray-800">{{ __('site.faq_text_1_title') }}</span>
                                    {{-- <svg 
                                        :class="open ? 'transform rotate-180' : ''" 
                                        class="w-5 h-5 text-gray-600 transition-transform"
                                        xmlns="http://www.w3.org/2000/svg" 
                                        fill="none" 
                                        viewBox="0 0 24 24" 
                                        stroke="currentColor"
                                    >
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                    </svg> --}}
                                    <i class="fa-solid fa-chevron-down font-bold text-lg md:text-2xl"></i>
                                </div>
                            </button>

                            <!-- Contenido que se muestra/oculta -->
                            <div x-show="open" x-collapse class="px-6 py-4 bg-white text-gray-700 font-figtree text-lg md:text-2xl">
                                <p>{{ __('site.faq_text_1') }}</p>
                            </div>
                        </div>

                        <!-- Pregunta 2 -->
                        <div x-data="{ open: false }" class="border rounded-lg overflow-hidden">
                            <button 
                                @click="open = !open"
                                class="w-full text-left font-figtree font-bodd text-lg md:text-2xl px-6 py-4 bg-gray-100 hover:bg-gray-200 focus:outline-none focus:bg-gray-200 transition"
                            >
                                <div class="flex items-center justify-between">
                                    <span class="font-medium text-gray-800">{{ __('site.faq_text_2_title') }}</span>
                                    {{-- <svg 
                                        :class="open ? 'transform rotate-180' : ''" 
                                        class="w-5 h-5 text-gray-600 transition-transform"
                                        xmlns="http://www.w3.org/2000/svg" 
                                        fill="none" 
                                        viewBox="0 0 24 24" 
                                        stroke="currentColor"
                                    >
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                    </svg> --}}
                                    <i class="fa-solid fa-chevron-down font-bold text-lg md:text-2xl"></i>
                                </div>
                            </button>
                            <div x-show="open" x-collapse class="px-6 py-4 bg-white text-gray-700 font-figtree text-lg md:text-2xl">
                                <p><p>{{ __('site.faq_text_2') }}</p></p>
                            </div>
                        </div>

                        <!-- Pregunta 3 -->
                        <div x-data="{ open: false }" class="border rounded-lg overflow-hidden">
                            <button 
                                @click="open = !open"
                                class="w-full text-left font-figtree font-bodd text-lg md:text-2xl px-6 py-4 bg-gray-100 hover:bg-gray-200 focus:outline-none focus:bg-gray-200 transition"
                            >
                                <div class="flex items-center justify-between">
                                    <span class="font-medium text-gray-800">{{ __('site.faq_text_3_title') }}</span>
                                    {{-- <svg 
                                        :class="open ? 'transform rotate-180' : ''" 
                                        class="w-5 h-5 text-gray-600 transition-transform"
                                        xmlns="http://www.w3.org/2000/svg" 
                                        fill="none" 
                                        viewBox="0 0 24 24" 
                                        stroke="currentColor"
                                    >
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                    </svg> --}}
                                    <i class="fa-solid fa-chevron-down font-bold text-lg md:text-2xl"></i>
                                </div>
                            </button>
                            <div x-show="open" x-collapse class="px-6 py-4 bg-white text-gray-700 font-figtree text-lg md:text-2xl">
                                <p><p>{{ __('site.faq_text_3') }}</p></p>
                            </div>
                        </div>

                        <!-- Pregunta 4 -->
                        <div x-data="{ open: false }" class="border rounded-lg overflow-hidden">
                            <button 
                                @click="open = !open"
                                class="w-full text-left font-figtree font-bodd text-lg md:text-2xl px-6 py-4 bg-gray-100 hover:bg-gray-200 focus:outline-none focus:bg-gray-200 transition"
                            >
                                <div class="flex items-center justify-between">
                                    <span class="font-medium text-gray-800">{{ __('site.faq_text_4_title') }}</span>
                                    {{-- <svg 
                                        :class="open ? 'transform rotate-180' : ''" 
                                        class="w-5 h-5 text-gray-600 transition-transform"
                                        xmlns="http://www.w3.org/2000/svg" 
                                        fill="none" 
                                        viewBox="0 0 24 24" 
                                        stroke="currentColor"
                                    >
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                    </svg> --}}
                                    <i class="fa-solid fa-chevron-down font-bold text-lg md:text-2xl"></i>
                                </div>
                            </button>
                            <div x-show="open" x-collapse class="px-6 py-4 bg-white text-gray-700 font-figtree text-lg md:text-2xl">
                                <p><p>{{ __('site.faq_text_4') }}</p></p>
                            </div>
                        </div>

                        <!-- Agrega más preguntas aquí -->
                    </div>
                </div>




                <div>
                    <img src="{{ asset('images/Preguntas frecuentes.webp') }}" alt="Rascacielos modernos" class="w-2/3 mx-auto rounded-2xl shadow-lg">
                </div>
            </div>
                
        </div>
    </section>

    <!-- Documentación & Cumplimiento -->
    {{-- <section class="h-50vh bg-white text-white">
        <div class="container bg-gray-900 mx-auto px-4 py-16 mb-8">
            <img 
                src="{{ asset('images/Documentacion y Cumplimiento.webp') }}" 
                alt="Imagen transparente" 
                class="absolute inset-0 w-full object-cover opacity-10"
            />
            <h2 class="text-4xl font-bold text-center mb-8">Documentación & Cumplimiento</h2>
            <p class="text-center mb-8">archivos descargables:</p>
            
            <div class="flex flex-wrap justify-center gap-4">
                <button class="bg-blue-600 hover:bg-blue-700 px-6 py-3 rounded-lg font-medium transition">
                    Folleto
                </button>
                <button class="bg-blue-600 hover:bg-blue-700 px-6 py-3 rounded-lg font-medium transition">
                    Acuerdo de Suscripción para inversores existentes
                </button>
                <button class="bg-blue-600 hover:bg-blue-700 px-6 py-3 rounded-lg font-medium transition">
                    Acuerdo de Suscripción para nuevos inversores
                </button>
            </div>
        </div>
    </section> --}}
    <section id="docs" class="relative w-full bg-white py-16">
        <!-- Contenedor principal -->
        <div class="container mx-auto px-4">
            <!-- Recuadro con imagen de fondo transparente -->
            <div class="max-w-7x h-50vh mx-auto relative rounded-2xl overflow-hidden shadow-lg">
                <!-- Imagen de fondo transparente -->
                <img 
                    src="{{ asset('images/Documentacion y Cumplimiento.webp') }}" 
                    alt="Imagen transparente" 
                    class="absolute inset-0 w-full h-full object-cover opacity-80"
                />

                <!-- Capa semitransparente para el fondo -->
                <div class="absolute inset-0 bg-azul-primary opacity-80"></div>

                <!-- Contenido del recuadro -->
                <div class="relative p-8 text-center rounded-2xl">
                    <h2 class="text-4xl md:text-6xl font-figtree font-bold text-white mb-6 md:mt-16"><p>{{ __('site.docs_title') }}</p></h2>
                    <p class="text-gray-300 mb-8 font-figtree">{{ __('site.docs_subtitle') }}</p>

                    <!-- Botones -->
                    <div class="flex flex-wrap justify-center gap-4">
                        <button class="font-figtree hover:font-bold text-xl bg-azul-secondary hover:bg-azul-primary px-6 py-3 rounded-lg font-medium transition text-white md:mb-16">
                            {{ __('site.docs_button_1') }}
                        </button>
                        <button class="font-figtree hover:font-bold text-xl bg-azul-secondary hover:bg-azul-primary px-6 py-3 rounded-lg font-medium transition text-white md:mb-16">
                            {{ __('site.docs_button_2') }}
                        </button>
                        <button class="font-figtree hover:font-bold text-xl bg-azul-secondary hover:bg-azul-primary px-6 py-3 rounded-lg font-medium transition text-white md:mb-16">
                            {{ __('site.docs_button_3') }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Footer -->
    <footer id="contact" class="bg-azul-primary text-white py-12">
        <div class="container mx-auto px-4">
            <div class="grid md:grid-cols-2 gap-8">
                <div>
                    <img src="{{ asset('images/Logo APF blanco.png') }}" alt="Asset Performance Fund" class="h-24 mb-12">
                    <div class="space-y-3 mb-12">
                        <div class="flex items-center space-x-3">
                            <i class="fa-solid fa-location-dot text-lg md:text-xl"></i>
                            <span class="font-figtree text-lg md:text-xl">3134 E McKellips Rd #31, Mesa, AZ 85213.</span>
                        </div>
                        <div class="flex items-center space-x-3">
                            <i class="fa-solid fa-envelope text-lg md:text-xl"></i>
                            <span class="font-figtree text-lg md:text-xl">invest@assetperformancefund.com</span>
                        </div>
                        <div class="flex items-center space-x-3">
                            <i class="fa-solid fa-phone text-lg md:text-xl"></i>
                            <span class="font-figtree text-lg md:text-xl">480-334-2788</span>
                        </div>
                    </div>
                    <div class="flex space-x-4">
                        <a href="#" class="text-2xl md:text-3xl hover:text-azul-secondary"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="text-2xl md:text-3xl hover:text-azul-secondary"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="text-2xl md:text-3xl hover:text-azul-secondary"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                
                <div>
                    <h3 class="text-2xl md:text-5xl font-figtree font-bold mb-4">{{ __('site.contact_title') }}</h3>
                    <p class="mb-6 text-lg md:text-xl font-figtree">{{ __('site.contact_text') }}</p>
                    <button class="text-xl md:text-2xl font-figtree hover:font-bold bg-azul-secondary hover:bg-azul-primary px-8 py-3 rounded-lg font-medium transition w-full md:w-auto">
                        {{ __('site.contact_button') }}
                    </button>
                </div>
            </div>
            
            <div class="border-t border-blue-800 mt-8 pt-8 flex flex-col md:flex-row justify-between items-center">
                <div class="flex space-x-6 text-sm text-gray-400 mb-4 md:mb-0">
                    <a href="#" class="hover:text-white">{{ __('site.footer_text_1') }}</a>
                    <a href="#" class="hover:text-white">{{ __('site.footer_text_2') }}</a>
                    <a href="#" class="hover:text-white">{{ __('site.footer_text_3') }}</a>
                </div>
                <div class="text-sm text-gray-400">
                    © 2025 {{ __('site.footer_text_4') }}
                </div>
            </div>
        </div>
    </footer>




</x-layouts.site>