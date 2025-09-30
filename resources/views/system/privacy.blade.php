<x-layouts.site :title="__('Welcome')">


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
            <a href="{{ route('home') }}" class="hover:text-blue-400">{{ __('site.home') }}</a>
            {{-- <a href="#services" class="hover:text-blue-400">{{ __('site.services') }}</a>
            <a href="#information" class="hover:text-blue-400">{{ __('site.fund') }}</a>
            <a href="#team" class="hover:text-blue-400">{{ __('site.team') }}</a>
            <a href="#faq" class="hover:text-blue-400">{{ __('site.faq') }}</a>
            <a href="#docs" class="hover:text-blue-400">{{ __('site.docs') }}</a>
            <a href="#contact" class="hover:text-blue-400">{{ __('site.contact') }}</a> --}}
        </nav>

        <!-- Botones y opciones -->
        {{-- <div class="hidden xl:flex items-center space-x-6">
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
        </div> --}}
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
            <a href="{{ route('home') }}" class="block hover:text-azul-secondary">{{ __('site.home') }}</a>
            {{-- <a href="#services" class="block hover:text-azul-secondary">{{ __('site.services') }}</a>
            <a href="#information" class="block hover:text-azul-secondary">{{ __('site.fund') }}</a>
            <a href="#team" class="block hover:text-azul-secondary">{{ __('site.team') }}</a>
            <a href="#faq" class="block hover:text-azul-secondary">{{ __('site.faq') }}</a>
            <a href="#docs" class="block hover:text-azul-secondary">{{ __('site.docs') }}</a>
            <a href="#contact" class="block hover:text-azul-secondary">{{ __('site.contact') }}</a> --}}
        </div>
        {{-- <div class="items-center space-x-6">
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
        </div> --}}
    </div>
</nav>

<!-- Privacy -->


<div class="bg-gradient-to-br from-blue-50 to-indigo-50 min-h-screen">
    <div class="container mx-auto px-4 py-8 max-w-4xl">
        <!-- Header -->
        <header class="bg-white rounded-xl shadow-lg p-6 mb-8 border border-blue-100">
            <div class="flex flex-col md:flex-row items-center justify-between">
                <div class="flex items-center mb-4 md:mb-0">
                    <div class="bg-gradient-to-r from-blue-600 to-indigo-700 p-3 rounded-xl mr-4 shadow-md">
                        <i class="fas fa-shield-alt text-white text-2xl"></i>
                    </div>
                    <div>
                        <h1 class="text-3xl font-bold text-gray-800">Asset Performance Fund</h1>
                        <p class="text-gray-600 mt-1">Website Security Policies</p>
                    </div>
                </div>
                <div class="bg-blue-50 px-4 py-2 rounded-lg border border-blue-200">
                    <p class="text-sm text-blue-700 font-medium">Secure • Encrypted • Protected</p>
                </div>
            </div>
        </header>

        <!-- Introduction -->
        <section class="bg-white rounded-xl shadow-md p-6 mb-8 border border-blue-100">
            <h2 class="text-xl font-semibold text-gray-800 mb-4 flex items-center">
                <i class="fas fa-info-circle text-blue-500 mr-2"></i> Introduction
            </h2>
            <p class="text-gray-600 mb-4">
                Asset Performance Fund is committed to protecting the security and privacy of all users accessing our website. These policies outline our approach to website security and data protection.
            </p>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-6">
                <div class="bg-blue-50 p-4 rounded-lg border border-blue-200 text-center">
                    <i class="fas fa-lock text-blue-600 text-xl mb-2"></i>
                    <h3 class="font-semibold text-gray-700">Encrypted</h3>
                    <p class="text-sm text-gray-600 mt-1">All data transmissions are encrypted</p>
                </div>
                <div class="bg-green-50 p-4 rounded-lg border border-green-200 text-center">
                    <i class="fas fa-user-shield text-green-600 text-xl mb-2"></i>
                    <h3 class="font-semibold text-gray-700">Protected</h3>
                    <p class="text-sm text-gray-600 mt-1">Advanced security measures in place</p>
                </div>
                <div class="bg-purple-50 p-4 rounded-lg border border-purple-200 text-center">
                    <i class="fas fa-sync-alt text-purple-600 text-xl mb-2"></i>
                    <h3 class="font-semibold text-gray-700">Monitored</h3>
                    <p class="text-sm text-gray-600 mt-1">Continuous security monitoring</p>
                </div>
            </div>
        </section>

        <!-- Security Policies -->
        <section class="bg-white rounded-xl shadow-md p-6 mb-8 border border-blue-100">
            <h2 class="text-xl font-semibold text-gray-800 mb-6 flex items-center">
                <i class="fas fa-list-check text-blue-500 mr-2"></i> Website Security Policies
            </h2>
            
            <!-- Policy 1 -->
            <div class="mb-6 p-5 border-l-4 border-blue-500 bg-blue-50 rounded-lg hover:bg-blue-100 transition duration-300">
                <div class="flex items-start">
                    <div class="bg-blue-100 p-3 rounded-full mr-4">
                        <i class="fas fa-lock text-blue-600"></i>
                    </div>
                    <div>
                        <h3 class="font-semibold text-gray-800 text-lg">1. Data Encryption</h3>
                        <p class="text-gray-600 mt-2">All data transmitted to and from our website is encrypted using industry-standard TLS (Transport Layer Security) protocols.</p>
                        <ul class="text-gray-600 mt-2 ml-4 list-disc">
                            <li>SSL/TLS encryption for all web pages</li>
                            <li>Encrypted connections for form submissions</li>
                            <li>Secure transmission of sensitive information</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <!-- Policy 2 -->
            <div class="mb-6 p-5 border-l-4 border-green-500 bg-green-50 rounded-lg hover:bg-green-100 transition duration-300">
                <div class="flex items-start">
                    <div class="bg-green-100 p-3 rounded-full mr-4">
                        <i class="fas fa-shield-alt text-green-600"></i>
                    </div>
                    <div>
                        <h3 class="font-semibold text-gray-800 text-lg">2. Access Control</h3>
                        <p class="text-gray-600 mt-2">Strict access controls are implemented to protect sensitive areas of our website and administrative functions.</p>
                        <ul class="text-gray-600 mt-2 ml-4 list-disc">
                            <li>Role-based access to administrative functions</li>
                            <li>Multi-factor authentication for admin accounts</li>
                            <li>Regular review of access privileges</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <!-- Policy 3 -->
            <div class="mb-6 p-5 border-l-4 border-purple-500 bg-purple-50 rounded-lg hover:bg-purple-100 transition duration-300">
                <div class="flex items-start">
                    <div class="bg-purple-100 p-3 rounded-full mr-4">
                        <i class="fas fa-bug text-purple-600"></i>
                    </div>
                    <div>
                        <h3 class="font-semibold text-gray-800 text-lg">3. Vulnerability Management</h3>
                        <p class="text-gray-600 mt-2">Regular security assessments and vulnerability scans are performed to identify and address potential security issues.</p>
                        <ul class="text-gray-600 mt-2 ml-4 list-disc">
                            <li>Regular security scanning and penetration testing</li>
                            <li>Prompt patching of identified vulnerabilities</li>
                            <li>Web Application Firewall (WAF) protection</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <!-- Policy 4 -->
            <div class="mb-6 p-5 border-l-4 border-yellow-500 bg-yellow-50 rounded-lg hover:bg-yellow-100 transition duration-300">
                <div class="flex items-start">
                    <div class="bg-yellow-100 p-3 rounded-full mr-4">
                        <i class="fas fa-database text-yellow-600"></i>
                    </div>
                    <div>
                        <h3 class="font-semibold text-gray-800 text-lg">4. Data Protection</h3>
                        <p class="text-gray-600 mt-2">User data collected through our website is protected according to strict data protection standards.</p>
                        <ul class="text-gray-600 mt-2 ml-4 list-disc">
                            <li>Minimal data collection - only what is necessary</li>
                            <li>Secure storage of collected information</li>
                            <li>Regular data backups with encryption</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <!-- Policy 5 -->
            <div class="p-5 border-l-4 border-red-500 bg-red-50 rounded-lg hover:bg-red-100 transition duration-300">
                <div class="flex items-start">
                    <div class="bg-red-100 p-3 rounded-full mr-4">
                        <i class="fas fa-exclamation-triangle text-red-600"></i>
                    </div>
                    <div>
                        <h3 class="font-semibold text-gray-800 text-lg">5. Incident Response</h3>
                        <p class="text-gray-600 mt-2">A defined process is in place to respond to security incidents affecting our website.</p>
                        <ul class="text-gray-600 mt-2 ml-4 list-disc">
                            <li>24/7 monitoring for security incidents</li>
                            <li>Clear incident response procedures</li>
                            <li>Timely notification in case of data breach</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <!-- User Responsibilities -->
        <section class="bg-white rounded-xl shadow-md p-6 mb-8 border border-blue-100">
            <h2 class="text-xl font-semibold text-gray-800 mb-4 flex items-center">
                <i class="fas fa-user text-blue-500 mr-2"></i> User Responsibilities
            </h2>
            <div class="bg-gray-50 p-4 rounded-lg border border-gray-200">
                <p class="text-gray-600 mb-3">While we implement robust security measures, users also play a role in maintaining security:</p>
                <ul class="text-gray-600 ml-4 list-disc grid grid-cols-1 md:grid-cols-2 gap-2">
                    <li>Keep your browser updated</li>
                    <li>Use strong, unique passwords</li>
                    <li>Log out after each session</li>
                    <li>Don't share login credentials</li>
                    <li>Be cautious of phishing attempts</li>
                    <li>Report suspicious activity immediately</li>
                </ul>
            </div>
        </section>

        <!-- Compliance Section -->
        <section class="bg-white rounded-xl shadow-md p-6 mb-8 border border-blue-100">
            <h2 class="text-xl font-semibold text-gray-800 mb-4 flex items-center">
                <i class="fas fa-gavel text-blue-500 mr-2"></i> Compliance & Updates
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-indigo-50 p-4 rounded-lg border border-indigo-200">
                    <h3 class="font-semibold text-gray-700 mb-2 flex items-center">
                        <i class="fas fa-sync-alt text-indigo-600 mr-2"></i> Policy Reviews
                    </h3>
                    <p class="text-gray-600 text-sm">These website security policies are reviewed quarterly and updated as needed to address emerging threats and technologies.</p>
                </div>
                <div class="bg-teal-50 p-4 rounded-lg border border-teal-200">
                    <h3 class="font-semibold text-gray-700 mb-2 flex items-center">
                        <i class="fas fa-balance-scale text-teal-600 mr-2"></i> Regulatory Compliance
                    </h3>
                    <p class="text-gray-600 text-sm">Our security practices comply with applicable US regulations and industry standards for financial services websites.</p>
                </div>
            </div>
        </section>

        <!-- Contact Information -->
        {{-- <section class="bg-gradient-to-r from-blue-500 to-indigo-600 rounded-xl shadow-lg p-6 text-white">
            <h2 class="text-xl font-semibold mb-4 flex items-center">
                <i class="fas fa-headset mr-2"></i> Security Questions?
            </h2>
            <p class="mb-4">Contact our security team with any concerns or questions about our website security policies.</p>
            <div class="flex flex-col sm:flex-row gap-4">
                <a href="mailto:security@assetperformancefund.com" class="bg-white text-blue-600 hover:bg-blue-50 font-medium py-2 px-4 rounded-lg text-center transition duration-300">
                    <i class="fas fa-envelope mr-2"></i> security@assetperformancefund.com
                </a>
                <a href="tel:+1-800-123-4567" class="bg-blue-700 hover:bg-blue-800 font-medium py-2 px-4 rounded-lg text-center transition duration-300">
                    <i class="fas fa-phone mr-2"></i> 1-800-123-4567
                </a>
            </div>
        </section> --}}

        <!-- Footer -->
        <footer class="text-center text-gray-500 text-sm mt-8">
            <p>© 2025 Asset Performance Fund. All rights reserved.</p>
            <p class="mt-2">These website security policies are subject to periodic updates.</p>
        </footer>
    </div>
</div>




<!-- Footer -->
<footer id="contact" class="bg-azul-primary text-white py-12">
    <div class="container mx-auto px-4">
        <div class="grid md:grid-cols-2 gap-8">
            <div>
                <img src="{{ asset('images/Logo APF blanco.png') }}" alt="Asset Performance Fund" class="h-16 md:h-20 xl:h-24 mb-12">
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
            
            {{-- <div>
                <h3 class="text-2xl md:text-5xl font-figtree font-bold mb-4">{{ __('site.contact_title') }}</h3>
                <p class="mb-6 text-lg md:text-xl font-figtree">{{ __('site.contact_text') }}</p>
                <button class="text-xl md:text-2xl font-figtree hover:font-bold bg-azul-secondary hover:bg-azul-primary px-8 py-3 rounded-lg font-medium transition w-full md:w-auto">
                    {{ __('site.contact_button') }}
                </button>
            </div> --}}
        </div>
        
        <div class="border-t border-blue-800 mt-8 pt-8 flex flex-col md:flex-row justify-between items-center">
            <div class="flex space-x-6 text-sm text-gray-400 mb-4 md:mb-0">
                {{-- <a href="#" class="hover:text-white">{{ __('site.footer_text_1') }}</a> --}}
                <a href="{{ route('terms') }}" class="hover:text-white">{{ __('site.footer_text_2') }}</a>
                <a href="{{ route('legal') }}" class="hover:text-white">{{ __('site.footer_text_3') }}</a>
            </div>
            <div class="text-sm text-gray-400">
                © 2025 {{ __('site.footer_text_4') }}
            </div>
        </div>
    </div>
</footer>

</x-layouts.site>