<x-layouts.site :title="__('Welcome')">

    <!-- NAVBAR -->
    {{-- <nav class="bg-black text-white sticky top-0 z-50">
        <div class="container mx-auto px-4 py-3 flex items-center justify-between">
            <div class="flex items-center space-x-6">
                <img src="{{ asset('images/LOGO APF blanco.svg') }}" alt="Asset Performance Fund" class="h-10">
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
            
            <div class="flex items-center space-x-6">
                <div class="flex items-center space-x-2">
                    <img src="https://via.placeholder.com/20x15?text=MX" alt="México" class="w-5 h-3">
                    <i class="fas fa-chevron-down text-xs"></i>
                </div>
                <div class="flex items-center space-x-2">
                    <i class="fas fa-lock text-sm"></i>
                    <span>Log In Inversionistas</span>
                </div>
                <button class="bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded-lg font-medium">
                    Invierte ahora
                </button>
            </div>
        </div>
    </nav> --}}

    <nav x-data="{ scrolled: false }" 
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
    </nav>

    <!-- Hero Section -->
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
                        Fondo de Inversión garantizado con <br>Retornos Consistentes
                    </h1>
                    <p class="text-xl mb-8">Gestión profesional, estrategias de bajo riesgo y liquidez flexible.</p>
                    <button class="bg-azul-secondary hover:bg-azul-primary px-6 py-3 rounded-lg font-medium transition">
                        Descargar Folleto
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
            <span class="transform rotate-90">DESLIZA HACIA ABAJO</span>
            <i class="fa-solid fa-caret-down mt-2 block animate-bounce"></i>
        </div>
    </section>

    <!-- Servicios de inversión confiable -->
    <section class="py-16 bg-gray-50">
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
                    <h2 class="text-6xl text-azul-primary mb-6 font-figtree font-bold">Servicios de inversión confiable</h2>
                    <ul class="space-y-4">
                        <li class="flex items-center">
                            <i class="fa-solid fa-check text-2xl text-azul-secondary mr-3"></i>
                            <span class="text-2xl font-figtree">
                                Administración profesional del fondo con reportes trimestrales.
                            </span>
                        </li>
                        <li class="flex items-center">
                            <i class="fa-solid fa-check text-2xl text-azul-secondary mr-3 pl-1"></i>
                            <span class="text-2xl font-figtree pl-1">
                                Estrategias diversificadas y conservadoras (deuda garantizada, préstamos asegurados, activos de crédito de alta calidad).
                            </span>
                        </li>
                        <li class="flex items-center">
                            <i class="fa-solid fa-check text-2xl text-azul-secondary mr-3"></i>
                            <span class="text-2xl font-figtree">
                                Distribuciones periódicas (mensuales o trimestrales) para flujo de efectivo.
                            </span>
                        </li>
                        <li class="flex items-center">
                            <i class="fa-solid fa-check text-2xl text-azul-secondary mr-3"></i>
                            <span class="text-2xl font-figtree">Liquidez a partir de 30 días y sin largos períodos de bloqueo en la estructura estándar.</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fa-solid fa-check text-2xl text-azul-secondary mr-3"></i>
                            <span class="text-2xl font-figtree">Soporte personalizado: asesoría fiscal y financiera para inversionistas.</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Información de Asset Found -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div>
                    <h2 class="text-6xl font-figtree font-bold text-azul-primary mb-4">Información de Asset Found</h2>
                    <h3 class="text-2xl font-figtree font-semibold text-azul-primary mb-6">Estructura, Propósito y Estrategia</h3>
                    <ul class="space-y-4">
                        <li class="flex items-center">
                            <i class="fa-solid fa-check text-2xl text-azul-secondary mr-3"></i>
                            <span class="text-2xl font-figtree"><strong>Estructura legal:</strong> Fondo privado (LLC) con domicilio operativo en Mesa, Arizona. Estructura diseñada para inversores acreditados y no-acreditados según el producto.</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fa-solid fa-check text-2xl text-azul-secondary mr-3"></i>
                            <span class="text-2xl font-figtree"><strong>Propósito:</strong> Proteger capital y generar flujos de ingreso estables mediante inversiones conservadoras y diligencia rigurosa.</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fa-solid fa-check text-2xl text-azul-secondary mr-3"></i>
                            <span class="text-2xl font-figtree"><strong>Estrategia de inversión:</strong> Préstamos garantizados, hipotecas selectas, activos de crédito de alta calidad.</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fa-solid fa-check text-2xl text-azul-secondary mr-3"></i>
                            <span class="text-2xl font-figtree"><strong>Gestión de riesgos:</strong> due diligence, modelos de stress testing, límites de concentración y seguros</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fa-solid fa-check text-2xl text-azul-secondary mr-3"></i>
                            <span class="text-2xl font-figtree"><strong>Objetivo de rendimiento:</strong> 7–10% anual (aproximado).</span>
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
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-4xl font-figtree font-bold text-azul-primary text-center mb-4">Nuestros Proyectos</h2>
            <p class="text-center text-azul-primary font-figtree mb-12">Proximamente</p>
            <div class="relative">
                <img src="https://via.placeholder.com/1200x600?text=Construction+Site+with+Cranes" alt="Sitio de construcción con grúas" class="w-full rounded-2xl shadow-lg">
            </div>
        </div>
    </section>

    <!-- Equipo Gestor -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div class="relative">
                    <img src="https://via.placeholder.com/400x500?text=Álvaro+Bazan" alt="Álvaro Bazan" class="w-full rounded-2xl shadow-lg">
                    <div class="absolute -bottom-6 left-10 w-16 h-16 bg-blue-600 rounded-full flex items-center justify-center">
                        <i class="fas fa-ellipsis-h text-white text-2xl"></i>
                    </div>
                    <div class="absolute -top-6 right-10 w-16 h-16 bg-blue-600 rounded-full flex items-center justify-center">
                        <i class="fas fa-ellipsis-h text-white text-2xl"></i>
                    </div>
                </div>
                <div>
                    <h2 class="text-4xl font-bold text-blue-900 mb-2">Equipo Gestor</h2>
                    <p class="text-lg text-gray-600 mb-8">Experiencia y Transparencia</p>
                    
                    <div class="bg-white p-6 rounded-xl shadow-lg">
                        <h3 class="text-3xl font-bold text-blue-600 mb-2">Álvaro Bazan</h3>
                        <p class="text-gray-600 mb-4">CEO y Co-fundador</p>
                        <p class="text-gray-700 leading-relaxed">
                            Fuerza, visión y estrategia. Álvaro Bazán, Contador Público por la Universidad de Arizona, ha construido más de 20 años de éxito en finanzas e inversiones privadas, moviendo activos por encima de $850 millones y liderando equipos de alto rendimiento.
                            <br><br>
                            Su sello es la determinación y la precisión: optimiza cada proceso, anticipa riesgos y transforma desafíos en oportunidades. Bajo su dirección, Asset Performance Fund avanza con poder, confianza y una clara meta: crecer sin límites.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Dónde Operamos -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-4xl font-bold text-blue-900 text-center mb-12">Dónde Operamos</h2>
            
            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-white p-6 rounded-xl shadow-md border-b-4 border-blue-600">
                    <div class="flex justify-center mb-4">
                        <i class="fas fa-map-marker-alt text-blue-600 text-4xl"></i>
                    </div>
                    <p class="text-center text-gray-700">
                        Nuestra sede se ubica en <strong>Mesa, Arizona</strong>. Con operaciones en mercados clave de EE.UU.: Phoenix, Las Vegas, Dallas, Houston, Atlanta y Miami.
                    </p>
                </div>
                
                <div class="bg-white p-6 rounded-xl shadow-md border-b-4 border-blue-600">
                    <div class="flex justify-center mb-4">
                        <i class="fas fa-users text-blue-600 text-4xl"></i>
                    </div>
                    <p class="text-center text-gray-700">
                        Nuestros clientes incluyen profesionales, empresas familiares y family offices que buscan productos de baja volatilidad.
                    </p>
                </div>
                
                <div class="bg-white p-6 rounded-xl shadow-md">
                    <img src="https://via.placeholder.com/400x300?text=USA+Map+with+Highlighted+States" alt="Mapa de EE.UU. con estados destacados" class="w-full h-auto">
                </div>
            </div>
            
            <div class="mt-12">
                <img src="https://via.placeholder.com/1200x600?text=Cityscape+of+Mesa+Arizona" alt="Panorama de la ciudad de Mesa, Arizona" class="w-full rounded-2xl shadow-lg">
            </div>
        </div>
    </section>

    <!-- Historical y rendimiento -->
    <section class="py-16 bg-gradient-to-br from-blue-900 to-blue-800 text-white">
        <div class="container mx-auto px-4">
            <h2 class="text-4xl font-bold text-center mb-12">Historial y rendimiento</h2>
            
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
    </section>

    <!-- Preguntas Frecuentes -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-4xl font-bold text-blue-900 mb-12">Preguntas Frecuentes</h2>
            
            <div class="grid md:grid-cols-2 gap-8">
                <div class="space-y-4">
                    <div class="bg-white p-4 rounded-xl shadow-md border">
                        <div class="flex justify-between items-center">
                            <h3 class="font-medium">¿Cuál es el retorno estimado?</h3>
                            <button class="text-gray-400 hover:text-gray-600">
                                <i class="fas fa-chevron-down"></i>
                            </button>
                        </div>
                    </div>
                    
                    <div class="bg-white p-4 rounded-xl shadow-md border">
                        <div class="flex justify-between items-center">
                            <h3 class="font-medium">¿Cuál es el monto mínimo de inversión?</h3>
                            <button class="text-gray-400 hover:text-gray-600">
                                <i class="fas fa-chevron-down"></i>
                            </button>
                        </div>
                    </div>
                    
                    <div class="bg-white p-4 rounded-xl shadow-md border">
                        <div class="flex justify-between items-center">
                            <h3 class="font-medium">¿Qué liquidez ofrece Asset Found?</h3>
                            <button class="text-gray-400 hover:text-gray-600">
                                <i class="fas fa-chevron-down"></i>
                            </button>
                        </div>
                    </div>
                    
                    <div class="bg-white p-4 rounded-xl shadow-md border">
                        <div class="flex justify-between items-center">
                            <h3 class="font-medium">¿Qué tan seguro es el capital invertido?</h3>
                            <button class="text-gray-400 hover:text-gray-600">
                                <i class="fas fa-chevron-down"></i>
                            </button>
                        </div>
                    </div>
                </div>
                
                <div>
                    <img src="https://via.placeholder.com/600x400?text=Modern+Skyscrapers" alt="Rascacielos modernos" class="w-full rounded-2xl shadow-lg">
                </div>
            </div>
        </div>
    </section>

    <!-- Documentación & Cumplimiento -->
    <section class="py-16 bg-gray-900 text-white">
        <div class="container mx-auto px-4">
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
    </section>

    <!-- Footer -->
    <footer class="bg-blue-900 text-white py-12">
        <div class="container mx-auto px-4">
            <div class="grid md:grid-cols-2 gap-8">
                <div>
                    <img src="https://via.placeholder.com/200x60?text=Asset+Performance+Fund" alt="Asset Performance Fund" class="h-12 mb-6">
                    <div class="space-y-3 mb-8">
                        <div class="flex items-center space-x-3">
                            <i class="fas fa-map-marker-alt"></i>
                            <span>3134 E McKellips Rd #31, Mesa, AZ 85213.</span>
                        </div>
                        <div class="flex items-center space-x-3">
                            <i class="fas fa-envelope"></i>
                            <span>invest@assetperformancefund.com</span>
                        </div>
                        <div class="flex items-center space-x-3">
                            <i class="fas fa-phone"></i>
                            <span>480-334-2788</span>
                        </div>
                    </div>
                    <div class="flex space-x-4">
                        <a href="#" class="text-2xl hover:text-blue-300"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="text-2xl hover:text-blue-300"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="text-2xl hover:text-blue-300"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                
                <div>
                    <h3 class="text-3xl font-bold mb-4">¿LISTO PARA DAR EL SIGUIENTE PASO EN TU ESTRATEGIA FINANCIERA?</h3>
                    <p class="mb-6">Haz crecer tu patrimonio hoy con un fondo diseñado para proteger tu capital y generar ingresos estables.</p>
                    <button class="bg-blue-600 hover:bg-blue-700 px-8 py-3 rounded-lg font-medium transition w-full md:w-auto">
                        Invierte ahora
                    </button>
                </div>
            </div>
            
            <div class="border-t border-blue-800 mt-8 pt-8 flex flex-col md:flex-row justify-between items-center">
                <div class="flex space-x-6 text-sm text-gray-400 mb-4 md:mb-0">
                    <a href="#" class="hover:text-white">Privacy Policy</a>
                    <a href="#" class="hover:text-white">Terms of Use</a>
                    <a href="#" class="hover:text-white">Sales and Refunds</a>
                    <a href="#" class="hover:text-white">Legal</a>
                </div>
                <div class="text-sm text-gray-400">
                    © 2025 All Rights Reserved
                </div>
            </div>
        </div>
    </footer>




</x-layouts.site>