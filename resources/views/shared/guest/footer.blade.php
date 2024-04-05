<footer>
    <section class="pt-10 pb-4 w-full bg-[#2d5b61]">
        <div class="container mx-auto flex flex-col gap-4 p-4">
            <div class="grid grid-rows-1 grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-8 items-start">
                <div class="grid lg:col-span-10 grid-rows-1 grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-8 items-start">
                    <div class="grid lg:col-span-9 grid-rows-1 grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-8 items-start">
                        <div class="w-full flex flex-col gap-6">
                            <a href="{{ route('views.guest.home') }}" class="w-36 lg:w-56 mx-auto">
                                <img src="{{ asset('img/logo.webp') }}?v={{ env('APP_VERSION') }}"
                                    alt="health-life-pro-logo" class="block w-full" />
                            </a>
                            <p class="text-x-white text-base">
                                {{ __('HEALTH LIFE PRO excels as a medical equipment expert, serving both healthcare professionals and individuals. We specialize in selecting and distributing products from top brands, providing the opportunity for professionals to excel in their field or individuals to maintain their health with high-quality equipment at favorable rates') }}
                            </p>
                            <ul class="flex gap-4 items-center mt-4 flex-wrap">
                                @if (env('LINK_WHATSAPP_FOO'))
                                    <li>
                                        <a href="{{ env('LINK_WHATSAPP_FOO') }}" class="flex text-x-prime text-sm">
                                            <svg class="block w-8 h-8 pointer-events-none" fill="currentColor"
                                                viewBox="0 0 308 308">
                                                <path
                                                    d="M227.904,176.981c-0.6-0.288-23.054-11.345-27.044-12.781c-1.629-0.585-3.374-1.156-5.23-1.156 c-3.032,0-5.579,1.511-7.563,4.479c-2.243,3.334-9.033,11.271-11.131,13.642c-0.274,0.313-0.648,0.687-0.872,0.687 c-0.201,0-3.676-1.431-4.728-1.888c-24.087-10.463-42.37-35.624-44.877-39.867c-0.358-0.61-0.373-0.887-0.376-0.887 c0.088-0.323,0.898-1.135,1.316-1.554c1.223-1.21,2.548-2.805,3.83-4.348c0.607-0.731,1.215-1.463,1.812-2.153 c1.86-2.164,2.688-3.844,3.648-5.79l0.503-1.011c2.344-4.657,0.342-8.587-0.305-9.856c-0.531-1.062-10.012-23.944-11.02-26.348 c-2.424-5.801-5.627-8.502-10.078-8.502c-0.413,0,0,0-1.732,0.073c-2.109,0.089-13.594,1.601-18.672,4.802 c-5.385,3.395-14.495,14.217-14.495,33.249c0,17.129,10.87,33.302,15.537,39.453c0.116,0.155,0.329,0.47,0.638,0.922 c17.873,26.102,40.154,45.446,62.741,54.469c21.745,8.686,32.042,9.69,37.896,9.69c0.001,0,0.001,0,0.001,0 c2.46,0,4.429-0.193,6.166-0.364l1.102-0.105c7.512-0.666,24.02-9.22,27.775-19.655c2.958-8.219,3.738-17.199,1.77-20.458 C233.168,179.508,230.845,178.393,227.904,176.981z" />
                                                <path
                                                    d="M156.734,0C73.318,0,5.454,67.354,5.454,150.143c0,26.777,7.166,52.988,20.741,75.928L0.212,302.716 c-0.484,1.429-0.124,3.009,0.933,4.085C1.908,307.58,2.943,308,4,308c0.405,0,0.813-0.061,1.211-0.188l79.92-25.396 c21.87,11.685,46.588,17.853,71.604,17.853C240.143,300.27,308,232.923,308,150.143C308,67.354,240.143,0,156.734,0z M156.734,268.994c-23.539,0-46.338-6.797-65.936-19.657c-0.659-0.433-1.424-0.655-2.194-0.655c-0.407,0-0.815,0.062-1.212,0.188 l-40.035,12.726l12.924-38.129c0.418-1.234,0.209-2.595-0.561-3.647c-14.924-20.392-22.813-44.485-22.813-69.677 c0-65.543,53.754-118.867,119.826-118.867c66.064,0,119.812,53.324,119.812,118.867 C276.546,215.678,222.799,268.994,156.734,268.994z" />
                                            </svg>
                                        </a>
                                    </li>
                                @endif
                                @if (env('LINK_INSTAGRAM'))
                                    <li>
                                        <a href="{{ env('LINK_INSTAGRAM') }}" class="flex text-x-prime text-sm">
                                            <svg class="block w-8 h-8 pointer-events-none" fill="currentColor"
                                                viewBox="0 0 31 30">
                                                <path
                                                    d="M8.7 0.250977H21.3C26.1 0.250977 30 4.15098 30 8.95098V21.551C30 23.8584 29.0834 26.0712 27.4518 27.7028C25.8203 29.3344 23.6074 30.251 21.3 30.251H8.7C3.9 30.251 0 26.351 0 21.551V8.95098C0 6.64359 0.916605 4.43071 2.54817 2.79915C4.17974 1.16758 6.39262 0.250977 8.7 0.250977ZM8.4 3.25098C6.96783 3.25098 5.59432 3.8199 4.58162 4.8326C3.56893 5.8453 3 7.21881 3 8.65098V21.851C3 24.836 5.415 27.251 8.4 27.251H21.6C23.0322 27.251 24.4057 26.6821 25.4184 25.6694C26.4311 24.6567 27 23.2831 27 21.851V8.65098C27 5.66598 24.585 3.25098 21.6 3.25098H8.4ZM22.875 5.50098C23.3723 5.50098 23.8492 5.69852 24.2008 6.05015C24.5525 6.40178 24.75 6.8787 24.75 7.37598C24.75 7.87326 24.5525 8.35017 24.2008 8.7018C23.8492 9.05343 23.3723 9.25098 22.875 9.25098C22.3777 9.25098 21.9008 9.05343 21.5492 8.7018C21.1975 8.35017 21 7.87326 21 7.37598C21 6.8787 21.1975 6.40178 21.5492 6.05015C21.9008 5.69852 22.3777 5.50098 22.875 5.50098ZM15 7.75098C16.9891 7.75098 18.8968 8.54115 20.3033 9.94768C21.7098 11.3542 22.5 13.2619 22.5 15.251C22.5 17.2401 21.7098 19.1478 20.3033 20.5543C18.8968 21.9608 16.9891 22.751 15 22.751C13.0109 22.751 11.1032 21.9608 9.6967 20.5543C8.29018 19.1478 7.5 17.2401 7.5 15.251C7.5 13.2619 8.29018 11.3542 9.6967 9.94768C11.1032 8.54115 13.0109 7.75098 15 7.75098ZM15 10.751C13.8065 10.751 12.6619 11.2251 11.818 12.069C10.9741 12.9129 10.5 14.0575 10.5 15.251C10.5 16.4445 10.9741 17.589 11.818 18.433C12.6619 19.2769 13.8065 19.751 15 19.751C16.1935 19.751 17.3381 19.2769 18.182 18.433C19.0259 17.589 19.5 16.4445 19.5 15.251C19.5 14.0575 19.0259 12.9129 18.182 12.069C17.3381 11.2251 16.1935 10.751 15 10.751Z" />
                                            </svg>
                                        </a>
                                    </li>
                                @endif
                                @if (env('LINK_TWITTER'))
                                    <li>
                                        <a href="{{ env('LINK_TWITTER') }}" class="flex text-x-prime text-sm">
                                            <svg class="block w-8 h-8 pointer-events-none" fill="currentColor"
                                                viewBox="0 0 512 462.799">
                                                <path
                                                    d="M403.229 0h78.506L310.219 196.04 512 462.799H354.002L230.261 301.007 88.669 462.799h-78.56l183.455-209.683L0 0h161.999l111.856 147.88L403.229 0zm-27.556 415.805h43.505L138.363 44.527h-46.68l283.99 371.278z" />
                                            </svg>
                                        </a>
                                    </li>
                                @endif
                                @if (env('LINK_TELEGRAM'))
                                    <li>
                                        <a href="{{ env('LINK_TELEGRAM') }}" class="flex text-x-prime text-sm">
                                            <svg class="block w-8 h-8 pointer-events-none" fill="currentColor"
                                                viewBox="0 0 20 20">
                                                <path
                                                    d="M10,0 C15.5228475,0 20,4.4771525 20,10 C20,15.5228475 15.5228475,20 10,20 C4.4771525,20 0,15.5228475 0,10 C0,4.4771525 4.4771525,0 10,0 Z M14.4415206,6 C14.060553,6.00676048 13.476055,6.20741135 10.663148,7.36249773 C9.67796175,7.7670526 7.70897661,8.60437935 4.75619264,9.87447795 C4.27670659,10.0627254 4.02553067,10.2468857 4.00266485,10.4269588 C3.95876487,10.7726802 4.46291296,10.8803081 5.09723696,11.0838761 C5.61440201,11.2498453 6.31007997,11.4440124 6.67173438,11.4517262 C6.99978943,11.4587234 7.36593635,11.3251987 7.77017511,11.051152 C10.5290529,9.21254679 11.9531977,8.28322679 12.0426094,8.26319203 C12.1056879,8.24905787 12.1930992,8.23128593 12.2523244,8.28325656 C12.3115496,8.33522719 12.3057275,8.43364956 12.299454,8.46005377 C12.2492926,8.67117474 9.65764825,10.998457 9.50849738,11.1513987 L9.43697409,11.2233057 C8.88741493,11.7661123 8.33196049,12.1205055 9.290333,12.7440164 C10.155665,13.3069957 10.6592923,13.6661378 11.5507686,14.2430701 C12.1204738,14.6117635 12.5671299,15.0489784 13.1553348,14.9955401 C13.4259939,14.9709508 13.705567,14.7196888 13.8475521,13.9703127 C14.1831052,12.1993135 14.8426779,8.36209709 14.9951103,6.78087197 C15.0084653,6.64233621 14.9916649,6.46503787 14.9781732,6.38720805 C14.9646815,6.30937823 14.9364876,6.19848702 14.8340164,6.11639754 C14.7126597,6.01917896 14.5253109,5.99867765 14.4415206,6 Z" />
                                            </svg>
                                        </a>
                                    </li>
                                @endif
                                @if (env('LINK_TIKTOK'))
                                    <li>
                                        <a href="{{ env('LINK_TIKTOK') }}" class="flex text-x-prime text-sm">
                                            <svg class="block w-8 h-8 pointer-events-none" fill="currentColor"
                                                viewBox="0 0 32 32">
                                                <path
                                                    d="M16.708 0.027c1.745-0.027 3.48-0.011 5.213-0.027 0.105 2.041 0.839 4.12 2.333 5.563 1.491 1.479 3.6 2.156 5.652 2.385v5.369c-1.923-0.063-3.855-0.463-5.6-1.291-0.76-0.344-1.468-0.787-2.161-1.24-0.009 3.896 0.016 7.787-0.025 11.667-0.104 1.864-0.719 3.719-1.803 5.255-1.744 2.557-4.771 4.224-7.88 4.276-1.907 0.109-3.812-0.411-5.437-1.369-2.693-1.588-4.588-4.495-4.864-7.615-0.032-0.667-0.043-1.333-0.016-1.984 0.24-2.537 1.495-4.964 3.443-6.615 2.208-1.923 5.301-2.839 8.197-2.297 0.027 1.975-0.052 3.948-0.052 5.923-1.323-0.428-2.869-0.308-4.025 0.495-0.844 0.547-1.485 1.385-1.819 2.333-0.276 0.676-0.197 1.427-0.181 2.145 0.317 2.188 2.421 4.027 4.667 3.828 1.489-0.016 2.916-0.88 3.692-2.145 0.251-0.443 0.532-0.896 0.547-1.417 0.131-2.385 0.079-4.76 0.095-7.145 0.011-5.375-0.016-10.735 0.025-16.093z" />
                                            </svg>
                                        </a>
                                    </li>
                                @endif
                                @if (env('LINK_YOUTUBE'))
                                    <li>
                                        <a href="{{ env('LINK_YOUTUBE') }}" class="flex text-x-prime text-sm">
                                            <svg class="block w-8 h-8 pointer-events-none" fill="currentColor"
                                                viewBox="0 0 310 310">
                                                <path d="M297.917,64.645c-11.19-13.302-31.85-18.728-71.306-18.728H83.386c-40.359,0-61.369,5.776-72.517,19.938
                                            C0,79.663,0,100.008,0,128.166v53.669c0,54.551,12.896,82.248,83.386,82.248h143.226c34.216,0,53.176-4.788,65.442-16.527
                                            C304.633,235.518,310,215.863,310,181.835v-53.669C310,98.471,309.159,78.006,297.917,64.645z M199.021,162.41l-65.038,33.991
                                            c-1.454,0.76-3.044,1.137-4.632,1.137c-1.798,0-3.592-0.484-5.181-1.446c-2.992-1.813-4.819-5.056-4.819-8.554v-67.764
                                            c0-3.492,1.822-6.732,4.808-8.546c2.987-1.814,6.702-1.938,9.801-0.328l65.038,33.772c3.309,1.718,5.387,5.134,5.392,8.861
                                            C204.394,157.263,202.325,160.684,199.021,162.41z" />
                                            </svg>
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                        <div class="w-full flex flex-col gap-3 lg:gap-6 justify-center">
                            <div class="flex flex-col gap-2">
                                <h1 class="text-x-core font-x-huge text-2xl">{{ __('Contact Info') }}</h1>
                            </div>
                            <div class="flex flex-col gap-4">
                                <a href="tel:{{ env('PHONE_CONTACT_NUMBER') }}"
                                    class="flex flex-wrap gap-4 items-center text-x-white font-x-thin">
                                    <svg class="block h-6 w-6 pointer-events-none" fill="currentcolor"
                                        viewBox="0 0 48 48">
                                        <path
                                            d="M39.6 42.95q-6.25 0-12.45-3.075-6.2-3.075-11.125-7.975-4.925-4.9-8-11.15T4.95 8.35q0-1.4 1-2.425T8.4 4.9h6.75q1.6 0 2.575.8.975.8 1.275 2.35l1.35 5.3q.2 1.4-.1 2.375-.3.975-1.1 1.675L14 22.1q2.5 3.95 5.45 6.825T26 33.85l4.95-4.95q.85-.9 1.9-1.25 1.05-.35 2.35-.05l4.7 1.15q1.55.4 2.35 1.425t.8 2.525v6.75q0 1.5-1 2.5t-2.45 1Z" />
                                    </svg>
                                    <span class="flex-1 w-0 break-words">{{ env('PHONE_CONTACT_NUMBER') }}</span>
                                </a>
                                <a href="tel:{{ env('PHONE_WHATSAPP_NUMBER') }}"
                                    class="flex flex-wrap gap-4 items-center text-x-white font-x-thin">
                                    <svg class="block h-6 w-6 pointer-events-none" fill="currentcolor"
                                        viewBox="0 0 48 48">
                                        <path
                                            d="M39.6 42.95q-6.25 0-12.45-3.075-6.2-3.075-11.125-7.975-4.925-4.9-8-11.15T4.95 8.35q0-1.4 1-2.425T8.4 4.9h6.75q1.6 0 2.575.8.975.8 1.275 2.35l1.35 5.3q.2 1.4-.1 2.375-.3.975-1.1 1.675L14 22.1q2.5 3.95 5.45 6.825T26 33.85l4.95-4.95q.85-.9 1.9-1.25 1.05-.35 2.35-.05l4.7 1.15q1.55.4 2.35 1.425t.8 2.525v6.75q0 1.5-1 2.5t-2.45 1Z" />
                                    </svg>
                                    <span class="flex-1 w-0 break-words">{{ env('PHONE_WHATSAPP_NUMBER') }}</span>
                                </a>
                                <a href="mailto:{{ env('MAIL_CONTACT_ADDRESS') }}"
                                    class="flex flex-wrap gap-4 items-center text-x-white font-x-thin">
                                    <svg class="block h-6 w-6 pointer-events-none" fill="currentColor"
                                        viewBox="0 -960 960 960">
                                        <path
                                            d="M150-138q-36.775 0-63.888-27.612Q59-193.225 59-229v-502q0-36.188 27.112-64.094Q113.225-823 150-823h660q37.188 0 64.594 27.906Q902-767.188 902-731v502q0 35.775-27.406 63.388Q847.188-138 810-138H150Zm330-295 330-223v-75L480-513 150-731v75l330 223Z" />
                                    </svg>
                                    <span class="flex-1 w-0 break-words">{{ env('MAIL_CONTACT_ADDRESS') }}</span>
                                </a>
                                @foreach (explode(';', env('MAIL_PERSONAL_ADDRESS')) as $mail)
                                    <a href="mailto:{{ $mail }}"
                                        class="flex flex-wrap gap-4 items-center text-x-white font-x-thin">
                                        <svg class="block h-6 w-6 pointer-events-none" fill="currentColor"
                                            viewBox="0 -960 960 960">
                                            <path
                                                d="M150-138q-36.775 0-63.888-27.612Q59-193.225 59-229v-502q0-36.188 27.112-64.094Q113.225-823 150-823h660q37.188 0 64.594 27.906Q902-767.188 902-731v502q0 35.775-27.406 63.388Q847.188-138 810-138H150Zm330-295 330-223v-75L480-513 150-731v75l330 223Z" />
                                        </svg>
                                        <span class="flex-1 w-0 break-words">{{ $mail }}</span>
                                    </a>
                                @endforeach
                                <a href="{{ env('LINK_MAP') }}"
                                    class="flex flex-wrap gap-4 items-center text-x-white font-x-thin">
                                    <svg class="block h-6 w-6 pointer-events-none" fill="currentColor"
                                        viewBox="0 -960 960 960">
                                        <path
                                            d="M480.722-61q-85.884 0-162.376-33.082-76.493-33.083-133.86-90.081-57.367-56.998-90.427-133.618Q61-394.4 61-480.2q0-85.8 33.03-162.149t90.366-133.388q57.337-57.039 134.147-90.651Q395.352-900 481.369-900q86.016 0 162.715 33.477t133.274 90.54q56.576 57.062 89.609 133.609Q900-565.828 900-479.914t-32.802 162.375q-32.802 76.462-89.748 133.584-56.946 57.122-134.077 90.039Q566.243-61 480.722-61ZM439-153v-80q-35 0-57.435-24.62-22.435-24.621-22.435-59.338v-42.657L162-557q-5 18.474-7 37.448t-2 37.981q0 123.241 81 219.906T439-153Zm284-104q20.286-22.287 36.62-49.145 16.334-26.857 27.054-55.282 10.719-28.425 16.022-58.165Q808-449.331 808-481.855q0-100.702-55.593-184.469Q696.815-750.091 604-788v16.327q0 34.436-22.909 58.554Q558.181-689 522.836-689H439v84.701Q439-586 426.5-576.5t-31.799 9.5H316v85h249.624q15.542 0 26.959 12.713Q604-456.575 604-440.745V-317h39.788q27.212 0 49.632 16.777Q715.84-283.446 723-257Z" />
                                    </svg>
                                    <span class="flex-1 w-0 break-words">{{ env('ADDRESS_LOCATION') }}</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="w-full lg:col-span-3 flex flex-col justify-center gap-3 lg:gap-6">
                        <div class="flex flex-col gap-2">
                            <h1 class="text-x-core font-x-huge text-2xl">{{ __('Information') }}</h1>
                        </div>
                        <ul class="flex flex-col gap-2">
                            <li>
                                <a href="{{ route('views.guest.terms') }}"
                                    class="flex gap-2 items-center font-x-thin text-x-white">
                                    {{ __('Terms And Conditions') }}
                                </a>
                            </li>
                            <li>
                                <a href="./#services" class="flex gap-2 items-center font-x-thin text-x-white">
                                    {{ __('Privacy Policy') }}
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('views.guest.returns') }}"
                                    class="flex gap-2 items-center font-x-thin text-x-white">
                                    {{ __('Return Policy') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="w-full lg:col-span-2 flex flex-col justify-center gap-3 lg:gap-6">
                    <div class="flex flex-col gap-2">
                        <h1 class="text-x-core font-x-huge text-2xl">{{ __('QR Code') }}</h1>
                    </div>
                    <img src="{{ asset('img/qrcode.webp') }}?v={{ env('APP_VERSION') }}" alt="health-life-pro-qr-code"
                        class="w-7/12 lg:w-full block" />
                </div>
            </div>
            <div class="border-t border-x-prime w-full mt-6"></div>
            <div class="flex gap-4 justify-center items-center">
                <h5 class="text-base font-x-huge text-x-white">{{ __('Copyright') }} © 2023</h5>
            </div>
        </div>
    </section>
</footer>
<os-modal id="menu_modal" label="{{ __('Menu') }}" class="lg:hidden lg:pointer-events-none">
    <ul class="flex flex-col">
        <li>
            <a href="{{ route('views.guest.home') }}"
                class="flex-wrap w-full p-2 flex gap-2 items-center font-x-thin text-start outline-none text-x-black !bg-opacity-10 hover:bg-x-black focus:bg-x-black focus-within:bg-x-black {{ request()->routeIs('views.guest.home') ? '!bg-x-black' : '' }}">
                <svg class="block w-5 h-5 pointer-events-none text-[var(--color-0)]" fill="currentcolor"
                    viewBox="0 -960 960 960">
                    <path
                        d="M441-153H238q-19.35 0-32.675-13.325Q192-179.65 192-199v-273h-73q-16 0-21.5-14.5T103-513l348-311q12.186-10 29.093-10T510-824l161 141v-80q0-9.2 7.2-15.6T695-785h49.818q8.982 0 16.082 6.4 7.1 6.4 7.1 15.6v170l89 80q11 12 5.708 26.5Q857.417-472 842-472h-74v273q0 19.35-13.312 32.675Q741.375-153 723-153H519v-231h-78v231Zm-170-79h91v-232h236v232h91v-324L480-745 271-556.073V-232Zm91-232h236-236Zm28-87h180q0-37-26.514-61-26.515-24-63.2-24-36.686 0-63.486 23.842Q390-588.315 390-551Z">
                    </path>
                </svg>
                <span>{{ __('Home') }}</span>
            </a>
        </li>
        <li>
            <a href="{{ route('views.guest.brands') }}"
                class="flex-wrap w-full p-2 flex gap-2 items-center font-x-thin text-start outline-none text-x-black !bg-opacity-10 hover:bg-x-black focus:bg-x-black focus-within:bg-x-black {{ request()->routeIs('views.guest.brands') ? '!bg-x-black' : '' }}">
                <svg class="block w-5 h-5 pointer-events-none text-[var(--color-1)]" fill="currentcolor"
                    viewBox="0 -960 960 960">
                    <path
                        d="m437-439-69-73q-10.25-12-25.125-11.5T317-514q-12 12.511-12 27.256Q305-472 317-461l88 86q12.364 15 32.182 15T470-375l174-172q10-9 10-24.5T643-598q-11-8-25-8t-23 10L437-439ZM316-68l-60-103-119-25q-19-3-29.5-17.125T100-245l14-115.704L38-451q-10-12.39-10-29.195T38-510l76-88.297L100-714q-3-17.75 7.5-31.875T137-764l119.31-24.197L316-892q8.88-14.562 25.92-20.281Q358.96-918 376-911l104 49 105-49q16-5 33.056-.818Q635.111-907.636 644-893l60.69 104.803L823-764q19 4 29.5 18.125T860-714l-14 115.703L922-510q10 13.39 10 30.195T922-451l-76 90.296L860-245q3 17.75-7.5 31.875T823-196l-118 25-61 104q-8.889 14.636-25.944 18.818Q601-44 585-49L480-98 376-49q-17 5-34.056.318Q324.889-53.364 316-68Zm60.736-83 103.121-43.564L586-151l65-96 112-29-11-116.191 77-87.894L752-570l11-116-112-27-66.659-96-104.159 43.458L374-809l-64.718 96.241L198-686.448 208-570l-77 90 77 88-10 118.462 111.099 26.307L376.736-151ZM480-480Z">
                    </path>
                </svg>
                <span>{{ __('Brands') }}</span>
            </a>
        </li>
        <li>
            <a href="{{ route('views.guest.categories') }}"
                class="flex-wrap w-full p-2 flex gap-2 items-center font-x-thin text-start outline-none text-x-black !bg-opacity-10 hover:bg-x-black focus:bg-x-black focus-within:bg-x-black {{ request()->routeIs('views.guest.categories') ? '!bg-x-black' : '' }}">
                <svg class="block w-5 h-5 pointer-events-none text-[var(--color-2)]" fill="currentcolor"
                    viewBox="0 -960 960 960">
                    <path
                        d="m264-572 178-288q5.818-10.053 16.493-15.526Q469.167-881 480.584-881q11.416 0 21.916 5.263T520-860l179 288q6 10.375 5.5 23.607t-5.125 23.841q-5.47 10.349-16.615 16.45Q671.614-502 659-502H302q-12.786 0-24.125-5.902-11.339-5.901-15.25-16.65-5.625-10.545-6.125-23.621Q256-561.25 264-572ZM725.882-39q-81.235 0-138.559-57.23Q530-153.461 530-235.647 530-317 587.206-375q57.206-58 138.735-58 82.363 0 139.211 57.882Q922-317.235 922-235.088q0 82.147-57.025 139.117Q807.951-39 725.882-39ZM65-111v-257q0-18.25 12.625-32.125T112-414h257q19.775 0 32.388 13.875Q414-386.25 414-368v257q0 21.75-12.612 34.375Q388.775-64 369-64H112q-21.75 0-34.375-12.625T65-111Zm661.31-20q44.69 0 74.19-29.88 29.5-29.881 29.5-74.5 0-44.62-29.584-75.12-29.585-30.5-74.275-30.5-44.69 0-74.916 30.552Q621-279.896 621-235.028q0 44.448 30.31 74.238t75 29.79ZM157-156h166v-166H157v166Zm227-438h192l-95-156-97 156Zm97 0ZM323-322Zm403 87Z">
                    </path>
                </svg>
                <span>{{ __('Categories') }}</span>
            </a>
        </li>
        <li>
            <a href="{{ route('views.guest.products') }}"
                class="flex-wrap w-full p-2 flex gap-2 items-center font-x-thin text-start outline-none text-x-black !bg-opacity-10 hover:bg-x-black focus:bg-x-black focus-within:bg-x-black {{ request()->routeIs('views.guest.products') ? '!bg-x-black' : '' }}">
                <svg class="block w-5 h-5 pointer-events-none text-[var(--color-3)]" fill="currentcolor"
                    viewBox="0 -960 960 960">
                    <path
                        d="M190-641v451h580v-451H653v266q0 27-22 39.5t-44 2.5l-107-54-107 54q-22 10-43-2.5T309-375v-266H190Zm1 542q-37.75 0-64.875-27.1T99-192v-490q0-14.632 5-29.434 5-14.801 15.186-27.524L192-833q11.298-15.448 28.981-22.224T259-862h443q18.712 0 35.864 6.69Q755.016-848.621 767-834l75.814 95.042Q851-725.722 856.5-710.677 862-695.632 862-681v489q0 38.8-27.419 65.9Q807.163-99 769-99H191Zm33-626h512l-36.409-46H258.449L224-725Zm169 84v204l87-43 89 43v-204H393Zm-203 0h580-580Z">
                    </path>
                </svg>
                <span>{{ __('Products') }}</span>
            </a>
        </li>
        <li>
            <a href="{{ route('views.guest.maintenance') }}"
                class="flex-wrap w-full p-2 flex gap-2 items-center font-x-thin text-start outline-none text-x-black !bg-opacity-10 hover:bg-x-black focus:bg-x-black focus-within:bg-x-black {{ request()->routeIs('views.guest.maintenance') ? '!bg-x-black' : '' }}">
                <svg class="block w-5 h-5 pointer-events-none text-[var(--color-4)]" fill="currentcolor"
                    viewBox="0 -960 960 960">
                    <path
                        d="M797-30q-8.909 0-17.455-3.5Q771-37 765-44L507-303q-7.182-4.929-10.591-13.679Q493-325.429 493-334q0-8.571 3.409-17.821Q499.818-361.071 507-368l84-84q5.929-6.182 14.679-10.591Q614.429-467 624-467q8.571 0 17.321 4.409Q650.071-458.182 656-452l259 260q6 6 10 14.067 4 8.066 4 18 0 8.933-4.909 18.033-4.909 9.1-9.091 13.9l-84 85q-6.929 5.182-15.679 9.09Q806.571-30 797-30Zm-634-1q-9 0-18.143-3T130-44l-83-83q-7-4.714-10-13.357Q34-149 34-159q0-9 3-18.1 3-9.1 10-14.9l251-250h91l34-34-188-189h-63L29-807l120-120 143 142v63l188 189 134-134-72-72 58-57H484l-26-26 152-153 27 27v115l57-57 188.931 189.931Q900-681 910.5-659.075 921-637.149 921-613q0 25.647-10.5 49.323Q900-540 885-522l-94-94-62 62-57-57-226 226v91L195-44q-5.929 7-14.179 10T163-31Z" />
                </svg>
                <span>{{ __('Maintenance') }}</span>
            </a>
        </li>
        <li>
            <a href="{{ route('views.guest.catalogs') }}"
                class="flex-wrap w-full p-2 flex gap-2 items-center font-x-thin text-start outline-none text-x-black !bg-opacity-10 hover:bg-x-black focus:bg-x-black focus-within:bg-x-black {{ request()->routeIs('views.guest.catalogs') ? '!bg-x-black' : '' }}">
                <svg class="block w-5 h-5 pointer-events-none text-[var(--color-5)]" fill="currentcolor"
                    viewBox="0 -960 960 960">
                    <path
                        d="M481.769-118Q434-155 377.5-179q-56.5-24-117.088-24Q220-203 181.5-192 143-181 109-162q-33 16-62-1.5T18-216v-480q0-22.056 9-39.833Q36-753.611 55-763q45.63-22 97.815-33.5Q205-808 258.235-808q59.263 0 115.514 15T480-745.533V-216q51-33 106.5-51T700-285q36 0 78.5 7.5T860-247v-535q11.517 6 22.017 10.5T906-763q18 10.389 27 27.667 9 17.277 9 39.333v492q0 30-29.5 44t-61.5-2q-34-19-72.5-30t-78.912-11Q639-203 584.269-179.5t-102.5 61.5ZM540-309v-377l260-265v411L540-309Z" />
                </svg>
                <span>{{ __('Catalogs') }}</span>
            </a>
        </li>
        <li>
            <a href="{{ route('views.guest.contact') }}"
                class="flex-wrap w-full p-2 flex gap-2 items-center font-x-thin text-start outline-none text-x-black !bg-opacity-10 hover:bg-x-black focus:bg-x-black focus-within:bg-x-black {{ request()->routeIs('views.guest.contact') ? '!bg-x-black' : '' }}">
                <svg class="block w-5 h-5 pointer-events-none text-[var(--color-6)]" fill="currentcolor"
                    viewBox="0 -960 960 960">
                    <path
                        d="M424-99v-91l343-1v-304.167q0-113.444-84.552-192.638Q597.895-767 480.642-767q-117.999 0-202.821 80.202Q193-606.596 193-493l-2 267h-39q-38.363 0-65.681-26.384Q59-278.769 59-317.5V-410q0-19.724 11.412-39.362Q81.823-469 100.569-482l.117-21q1.99-74.022 32.763-140.194 30.773-66.172 82.162-114.489Q267-806 335.566-833.5 404.132-861 479.888-861q77.112 0 145.176 28.432 68.064 28.433 119 76.5Q795-708 826-642.63q31 65.369 33 140.63l2 21q18.475 12.446 29.737 30.696Q902-432.055 902-411v94q0 25.214-10.5 47.607T861.192-235v46q0 37.25-25.188 63.625Q810.817-99 775-99H424Zm-55-295q-13.6 0-22.8-9.281-9.2-9.28-9.2-23Q337-440 346.483-449q9.482-9 22.657-9 13.6 0 23.23 9.213 9.63 9.212 9.63 22.261 0 13.898-9.487 23.212Q383.025-394 369-394Zm221.614 0q-14.189 0-23.401-9.281-9.213-9.28-9.213-23Q558-440 567.684-449q9.685-9 23.158-9 13.898 0 23.528 9.213 9.63 9.212 9.63 22.261 0 13.898-9.598 23.212Q604.803-394 590.614-394ZM263-488q-9-89 56.919-152 65.92-63 160.06-63 73.61 0 129.816 50.5Q666-602 682-526q-75.406-.969-138.703-36.984Q480-599 440.719-666 423-600 375.393-553.003 327.787-506.006 263-488Z" />
                </svg>
                <span>{{ __('Contact') }}</span>
            </a>
        </li>
    </ul>
</os-modal>
<os-modal id="search_modal" label="{{ __('Search') }}">
    <form action="{{ route('views.guest.products') }}" method="GET"
        class="flex flex-col p-4 gap-4 lg:p-6 lg:gap-6">
        <p class="text-base text-x-black">
            {{ __('Explore our vast selection of products and Find what you\'re looking for!') }}
        </p>
        <os-text class="search" label="{{ __('Query') }}" name="search" value="{{ request('search') ?? '' }}">
            <svg slot="start" class="block w-6 h-6 pointer-events-none" fill="currentcolor"
                viewBox="0 -960 960 960">
                <path
                    d="M794-96 525.787-364Q496-341.077 457.541-328.038 419.082-315 373.438-315q-115.311 0-193.875-78.703Q101-472.406 101-585.203T179.703-776.5q78.703-78.5 191.5-78.5T562.5-776.356Q641-697.712 641-584.85q0 45.85-13 83.35-13 37.5-38 71.5l270 268-66 66ZM371.441-406q75.985 0 127.272-51.542Q550-509.083 550-584.588q0-75.505-51.346-127.459Q447.309-764 371.529-764q-76.612 0-128.071 51.953Q192-660.093 192-584.588t51.311 127.046Q294.623-406 371.441-406Z" />
            </svg>
        </os-text>
        <os-button
            class="w-full rounded-x-huge px-4 py-2 text-base lg:text-lg font-x-huge text-x-white bg-gradient-to-br rtl:bg-gradient-to-bl bg-x-core focus-within:outline-none">
            {{ __('Search') }}
        </os-button>
    </form>
</os-modal>
