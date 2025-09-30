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

<!-- Legal -->


<div class="bg-gradient-to-br from-blue-50 to-indigo-50 min-h-screen">
    <div class="container mx-auto px-4 py-8 max-w-4xl">
        <!-- Header -->
        <header class="bg-white rounded-xl shadow-lg p-6 mb-8 border border-blue-100">
            <div class="flex flex-col md:flex-row items-center justify-between">
                <div class="flex items-center mb-4 md:mb-0">
                    <div class="bg-gradient-to-r from-blue-600 to-indigo-700 p-3 rounded-xl mr-4 shadow-md">
                        <i class="fas fa-balance-scale text-white text-2xl"></i>
                    </div>
                    <div>
                        <h1 class="text-3xl font-bold text-gray-800">Asset Performance Fund</h1>
                        <p class="text-gray-600 mt-1">Legal Notice</p>
                    </div>
                </div>
                <div class="bg-blue-50 px-4 py-2 rounded-lg border border-blue-200">
                    <p class="text-sm text-blue-700 font-medium">Last Updated: October 2025</p>
                </div>
            </div>
        </header>

        <!-- Introduction -->
        <section class="bg-white rounded-xl shadow-md p-6 mb-8 border border-blue-100">
            <h2 class="text-xl font-semibold text-gray-800 mb-4 flex items-center">
                <i class="fas fa-gavel text-blue-500 mr-2"></i> Legal Disclosure
            </h2>
            <p class="text-gray-600 mb-4">
                This Legal Notice governs the use of Asset Performance Fund's website. Please read this information carefully before accessing or using our website.
            </p>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-6">
                <div class="bg-blue-50 p-4 rounded-lg border border-blue-200 text-center">
                    <i class="fas fa-building text-blue-600 text-xl mb-2"></i>
                    <h3 class="font-semibold text-gray-700">Company Information</h3>
                    <p class="text-sm text-gray-600 mt-1">Registered entity details</p>
                </div>
                <div class="bg-green-50 p-4 rounded-lg border border-green-200 text-center">
                    <i class="fas fa-exclamation-triangle text-green-600 text-xl mb-2"></i>
                    <h3 class="font-semibold text-gray-700">Disclaimer</h3>
                    <p class="text-sm text-gray-600 mt-1">Important limitations</p>
                </div>
                <div class="bg-purple-50 p-4 rounded-lg border border-purple-200 text-center">
                    <i class="fas fa-shield-alt text-purple-600 text-xl mb-2"></i>
                    <h3 class="font-semibold text-gray-700">Compliance</h3>
                    <p class="text-sm text-gray-600 mt-1">Regulatory information</p>
                </div>
            </div>
        </section>

        <!-- Legal Sections -->
        <section class="bg-white rounded-xl shadow-md p-6 mb-8 border border-blue-100">
            <h2 class="text-xl font-semibold text-gray-800 mb-6 flex items-center">
                <i class="fas fa-info-circle text-blue-500 mr-2"></i> Legal Information
            </h2>
            
            <!-- Section 1 -->
            <div class="mb-6 p-5 border-l-4 border-blue-500 bg-blue-50 rounded-lg">
                <div class="flex items-start">
                    <div class="bg-blue-100 p-3 rounded-full mr-4">
                        <i class="fas fa-building text-blue-600"></i>
                    </div>
                    <div>
                        <h3 class="font-semibold text-gray-800 text-lg">1. Company Information</h3>
                        <p class="text-gray-600 mt-2">Asset Performance Fund is a registered investment advisor established in the United States.</p>
                        <div class="mt-3 bg-white p-4 rounded-lg border border-blue-200">
                            <ul class="text-gray-600 space-y-2">
                                <li class="flex items-start">
                                    <i class="fas fa-check-circle text-blue-500 mr-2 mt-1"></i>
                                    <span><strong>Legal Name:</strong> Asset Performance Fund, LLC</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check-circle text-blue-500 mr-2 mt-1"></i>
                                    <span><strong>Registered Address:</strong> 3134 E McKellips Rd #31, Mesa, AZ 85213.</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check-circle text-blue-500 mr-2 mt-1"></i>
                                    <span><strong>State of Formation:</strong> Arizona</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check-circle text-blue-500 mr-2 mt-1"></i>
                                    <span><strong>Entity Type:</strong> Limited Liability Company</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Section 2 -->
            <div class="mb-6 p-5 border-l-4 border-green-500 bg-green-50 rounded-lg">
                <div class="flex items-start">
                    <div class="bg-green-100 p-3 rounded-full mr-4">
                        <i class="fas fa-id-card text-green-600"></i>
                    </div>
                    <div>
                        <h3 class="font-semibold text-gray-800 text-lg">2. Regulatory Disclosures</h3>
                        <p class="text-gray-600 mt-2">Asset Performance Fund operates in compliance with applicable US securities laws and regulations.</p>
                        <ul class="text-gray-600 mt-2 ml-4 list-disc">
                            <li>Registered with the U.S. Securities and Exchange Commission (SEC)</li>
                            <li>Compliant with Investment Advisers Act of 1940</li>
                            <li>Subject to examination by regulatory authorities</li>
                            <li>All disclosures made in accordance with SEC requirements</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <!-- Section 3 -->
            <div class="mb-6 p-5 border-l-4 border-purple-500 bg-purple-50 rounded-lg">
                <div class="flex items-start">
                    <div class="bg-purple-100 p-3 rounded-full mr-4">
                        <i class="fas fa-chart-line text-purple-600"></i>
                    </div>
                    <div>
                        <h3 class="font-semibold text-gray-800 text-lg">3. Investment Disclaimer</h3>
                        <p class="text-gray-600 mt-2">Important information regarding the content presented on this website.</p>
                        <ul class="text-gray-600 mt-2 ml-4 list-disc">
                            <li>This website does not constitute an offer to sell securities</li>
                            <li>Past performance does not guarantee future results</li>
                            <li>All investments involve risk, including loss of principal</li>
                            <li>Information provided is for educational purposes only</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <!-- Section 4 -->
            <div class="mb-6 p-5 border-l-4 border-yellow-500 bg-yellow-50 rounded-lg">
                <div class="flex items-start">
                    <div class="bg-yellow-100 p-3 rounded-full mr-4">
                        <i class="fas fa-copyright text-yellow-600"></i>
                    </div>
                    <div>
                        <h3 class="font-semibold text-gray-800 text-lg">4. Intellectual Property</h3>
                        <p class="text-gray-600 mt-2">All content on this website is protected by intellectual property laws.</p>
                        <ul class="text-gray-600 mt-2 ml-4 list-disc">
                            <li>Copyright © 2023 Asset Performance Fund. All rights reserved.</li>
                            <li>Content may not be reproduced without written permission</li>
                            <li>All trademarks and logos are proprietary marks</li>
                            <li>Third-party content used with permission or under license</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <!-- Section 5 -->
            <div class="p-5 border-l-4 border-red-500 bg-red-50 rounded-lg">
                <div class="flex items-start">
                    <div class="bg-red-100 p-3 rounded-full mr-4">
                        <i class="fas fa-exclamation-triangle text-red-600"></i>
                    </div>
                    <div>
                        <h3 class="font-semibold text-gray-800 text-lg">5. Limitation of Liability</h3>
                        <p class="text-gray-600 mt-2">Asset Performance Fund disclaims certain liabilities to the extent permitted by law.</p>
                        <ul class="text-gray-600 mt-2 ml-4 list-disc">
                            <li>No warranty for accuracy or completeness of information</li>
                            <li>Not liable for technical errors or website unavailability</li>
                            <li>No responsibility for third-party website content</li>
                            <li>Users assume all risk for website use</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <!-- Compliance Information -->
        <section class="bg-white rounded-xl shadow-md p-6 mb-8 border border-blue-100">
            <h2 class="text-xl font-semibold text-gray-800 mb-4 flex items-center">
                <i class="fas fa-shield-alt text-blue-500 mr-2"></i> Compliance Information
            </h2>
            <div class="bg-gray-50 p-4 rounded-lg border border-gray-200">
                <p class="text-gray-600 mb-3">Asset Performance Fund maintains compliance with applicable regulations:</p>
                <ul class="text-gray-600 ml-4 list-disc grid grid-cols-1 md:grid-cols-2 gap-2">
                    <li>SEC registration and compliance</li>
                    <li>Anti-money laundering policies</li>
                    <li>Privacy and data protection</li>
                    <li>Conflict of interest disclosures</li>
                    <li>Code of ethics compliance</li>
                    <li>Cybersecurity protocols</li>
                </ul>
            </div>
        </section>

        <!-- Contact & Regulatory -->
        <section class="bg-white rounded-xl shadow-md p-6 mb-8 border border-blue-100">
            <h2 class="text-xl font-semibold text-gray-800 mb-4 flex items-center">
                <i class="fas fa-address-card text-blue-500 mr-2"></i> Contact & Regulatory Information
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-indigo-50 p-4 rounded-lg border border-indigo-200">
                    <h3 class="font-semibold text-gray-700 mb-2 flex items-center">
                        <i class="fas fa-envelope text-indigo-600 mr-2"></i> Contact Information
                    </h3>
                    <div class="text-gray-600 text-sm space-y-2">
                        <p class="flex items-start">
                            <i class="fas fa-map-marker-alt text-indigo-500 mr-2 mt-1"></i>
                            <span>3134 E McKellips Rd #31, <br>Mesa, AZ 85213.</span>
                        </p>
                        <p class="flex items-center">
                            <i class="fas fa-phone text-indigo-500 mr-2"></i>
                            <span>480-334-2788</span>
                        </p>
                        <p class="flex items-center">
                            <i class="fas fa-envelope text-indigo-500 mr-2"></i>
                            <span>al@assetperformancefund.com</span>
                        </p>
                    </div>
                </div>
                <div class="bg-teal-50 p-4 rounded-lg border border-teal-200">
                    <h3 class="font-semibold text-gray-700 mb-2 flex items-center">
                        <i class="fas fa-scale-balanced text-teal-600 mr-2"></i> Regulatory Bodies
                    </h3>
                    <p class="text-gray-600 text-sm">Asset Performance Fund is subject to regulation by:</p>
                    <ul class="text-gray-600 text-sm mt-2 ml-4 list-disc">
                        <li>U.S. Securities and Exchange Commission (SEC)</li>
                        <li>Financial Industry Regulatory Authority (FINRA)</li>
                        <li>State securities regulators</li>
                    </ul>
                </div>
            </div>
        </section>

        <!-- Updates & Disclaimer -->
        <section class="bg-gradient-to-r from-blue-500 to-indigo-600 rounded-xl shadow-lg p-6 text-white">
            <h2 class="text-xl font-semibold mb-4 flex items-center">
                <i class="fas fa-clock mr-2"></i> Updates & General Disclaimer
            </h2>
            <p class="mb-4">This Legal Notice may be updated periodically to reflect changes in regulations or business practices. Users are responsible for reviewing this notice regularly.</p>
            <div class="bg-blue-400 p-4 rounded-lg">
                <p class="text-sm flex items-start">
                    <i class="fas fa-lightbulb mr-2 mt-1"></i>
                    <span><strong>Note:</strong> This Legal Notice does not create any contractual or legal rights on behalf of any party. For specific legal advice, consult with qualified legal counsel.</span>
                </p>
            </div>
        </section>

        <!-- Footer -->
        <footer class="text-center text-gray-500 text-sm mt-8">
            <p>© 2025 Asset Performance Fund, LLC. All rights reserved.</p>
            <p class="mt-2">This Legal Notice is subject to change without prior notice.</p>
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
                <a href="{{ route('privacy') }}" class="hover:text-white">{{ __('site.footer_text_1') }}</a>
                <a href="{{ route('terms') }}" class="hover:text-white">{{ __('site.footer_text_2') }}</a>
                {{-- <a href="#" class="hover:text-white">{{ __('site.footer_text_3') }}</a> --}}
            </div>
            <div class="text-sm text-gray-400">
                © 2025 {{ __('site.footer_text_4') }}
            </div>
        </div>
    </div>
</footer>

</x-layouts.site>