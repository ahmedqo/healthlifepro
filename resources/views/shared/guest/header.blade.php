<os-topbar transparent position="space-between">
    <div class="lg:w-max flex-[1] lg:flex-[0] flex flex-wrap gap-4 items-center">
        <div class="lg:hidden">
            <button id="menu"
                class="block p-2 rounded-x-huge text-x-black outline-none !bg-opacity-10 hover:bg-x-black focus:bg-x-black focus-within:bg-x-black">
                <svg class="block w-5 h-5 pointer-events-none" fill="currentcolor" viewBox="0 -960 960 960">
                    <path
                        d="M129-215q-20.75 0-33.375-12.675Q83-240.351 83-261.175 83-280 95.625-293T129-306h458q19.75 0 32.375 13.175 12.625 13.176 12.625 32Q632-240 619.375-227.5 606.75-215 587-215H129Zm0-221q-20.75 0-33.375-13.175Q83-462.351 83-482.175 83-502 95.625-514.5 108.25-527 129-527h339q18.75 0 31.875 12.675Q513-501.649 513-481.825 513-462 499.875-449 486.75-436 468-436H129Zm0-218q-20.75 0-33.375-13.175Q83-680.351 83-700.175 83-720 95.625-733 108.25-746 129-746h458q19.75 0 32.375 13.175 12.625 13.176 12.625 33Q632-680 619.375-667 606.75-654 587-654H129Zm605 173 114 113q13 14 12.5 33T847-304q-15 14-33.5 14T782-304L637-450q-14-13-14-31t14-32l145-146q13-13 31.5-13t33.5 13q13 14 12.5 33T847-594L734-481Z" />
                </svg>
            </button>
        </div>
        <a href="{{ route('views.guest.home') }}" class="max-w-full w-32 lg:w-48 mx-auto lg:mx-0">
            <img src="{{ asset('img/logo.webp') }}?v={{ env('APP_VERSION') }}" alt="health-life-pro-logo"
                class="block w-full" />
        </a>
    </div>
    <ul class="hidden lg:flex w-max gap-4">
        <li>
            <a href="{{ route('views.guest.home') }}"
                class="flex flex-col gap-2 items-center w-max font-x-thin text-xs uppercase outline-none text-x-black hover:text-x-prime focus:text-x-prime {{ request()->routeIs('views.guest.home') ? 'text-x-prime' : '' }}">
                <span>{{ __('Home') }}</span>
            </a>
        </li>
        <li>
            <a href="{{ route('views.guest.brands') }}"
                class="flex flex-col gap-2 items-center w-max font-x-thin text-xs uppercase outline-none text-x-black hover:text-x-prime focus:text-x-prime {{ request()->routeIs('views.guest.brands') ? 'text-x-prime' : '' }}">
                <span>{{ __('Brands') }}</span>
            </a>
        </li>
        <li>
            <a href="{{ route('views.guest.categories') }}"
                class="flex flex-col gap-2 items-center w-max font-x-thin text-xs uppercase outline-none text-x-black hover:text-x-prime focus:text-x-prime {{ request()->routeIs('views.guest.categories') ? 'text-x-prime' : '' }}">
                <span>{{ __('Categories') }}</span>
            </a>
        </li>
        <li>
            <a href="{{ route('views.guest.products') }}"
                class="flex flex-col gap-2 items-center w-max font-x-thin text-xs uppercase outline-none text-x-black hover:text-x-prime focus:text-x-prime {{ request()->routeIs('views.guest.products') ? 'text-x-prime' : '' }}">
                <span>{{ __('Products') }}</span>
            </a>
        </li>
        <li>
            <a href="{{ route('views.guest.maintenance') }}"
                class="flex flex-col gap-2 items-center w-max font-x-thin text-xs uppercase outline-none text-x-black hover:text-x-prime focus:text-x-prime {{ request()->routeIs('views.guest.maintenance') ? 'text-x-prime' : '' }}">
                <span>{{ __('Maintenance') }}</span>
            </a>
        </li>
        <li>
            <a href="{{ route('views.guest.catalogs') }}"
                class="flex flex-col gap-2 items-center w-max font-x-thin text-xs uppercase outline-none text-x-black hover:text-x-prime focus:text-x-prime {{ request()->routeIs('views.guest.catalogs') ? 'text-x-prime' : '' }}">
                <span>{{ __('Catalogs') }}</span>
            </a>
        </li>
        <li>
            <a href="{{ route('views.guest.contact') }}"
                class="flex flex-col gap-2 items-center w-max font-x-thin text-xs uppercase outline-none text-x-black hover:text-x-prime focus:text-x-prime {{ request()->routeIs('views.guest.contact') ? 'text-x-prime' : '' }}">
                <span>{{ __('Contact') }}</span>
            </a>
        </li>
    </ul>
    <div class="w-max flex justify-end flex-wrap gap-2">
        <button id="search"
            class="block p-2 rounded-x-huge text-x-black outline-none !bg-opacity-10 hover:bg-x-black focus:bg-x-black focus-within:bg-x-black">
            <svg class="block w-5 h-5 pointer-events-none" fill="currentcolor" viewBox="0 -960 960 960">
                <path
                    d="M794-96 525.787-364Q496-341.077 457.541-328.038 419.082-315 373.438-315q-115.311 0-193.875-78.703Q101-472.406 101-585.203T179.703-776.5q78.703-78.5 191.5-78.5T562.5-776.356Q641-697.712 641-584.85q0 45.85-13 83.35-13 37.5-38 71.5l270 268-66 66ZM371.441-406q75.985 0 127.272-51.542Q550-509.083 550-584.588q0-75.505-51.346-127.459Q447.309-764 371.529-764q-76.612 0-128.071 51.953Q192-660.093 192-584.588t51.311 127.046Q294.623-406 371.441-406Z" />
            </svg>
        </button>
        <os-dropdown label="{{ __('Languages') }}" position="{{ Core::lang('ar') ? 'start' : 'end' }}" class="W140">
            <button slot="trigger"
                class="block p-2 rounded-x-huge text-x-black outline-none !bg-opacity-10 hover:bg-x-black focus:bg-x-black focus-within:bg-x-black">
                <svg class="block w-5 h-5 pointer-events-none" fill="currentcolor" viewBox="0 -960 960 960">
                    <path
                        d="M610-196 568.513-90.019Q566-78 555.452-71q-10.548 7-23.606 7Q510-64 499.5-80.963 489-97.927 497-118.094L654.571-537.15Q658-549 668-556.5q10-7.5 22-7.5h31.552q11.821 0 21.672 7T758-538l164 419q6 20.462-5.6 37.73Q904.799-64 884.273-64q-14.692 0-26.733-7.76t-15.536-22.576L808.585-196H610Zm22-72h148l-73.054-202H705l-73 202ZM355.135-397l-179.34 178.842Q162.86-206 146.206-206.5q-16.654-.5-27.93-11Q107-229 108-246.689q1-17.69 11.654-28.321L303-458q-39.6-45.818-70.8-92.409Q201-597 179-646h90q16 34 38.329 64.567 22.328 30.566 48.274 63.433Q403-567 434.628-619.861 466.256-672.721 489-730H63.857q-17.753 0-29.305-12.289Q23-754.579 23-771.982q0-17.404 12.35-29.318 12.35-11.914 29.895-11.914h248.731v-41.893q0-17.529 11.748-29.211Q337.471-896 355.098-896t29.637 11.682q12.011 11.682 12.011 29.211v41.893h249.548q17.685 0 29.696 11.768Q688-789.679 688-771.895q0 17.509-12.282 29.702Q663.436-730 645.759-730h-74.975Q548-656 510-587.5T416-457l102 103-29.389 83.933L355.135-397Z" />
                </svg>
            </button>
            <ul class="w-full flex flex-col">
                <li class="w-full">
                    <a href="{{ route('actions.language.index', 'en') }}"
                        class="w-full flex flex-wrap gap-2 p-2 text-x-black items-center outline-none !bg-opacity-10 hover:bg-x-black focus:bg-x-black focus-within:bg-x-black {{ Core::lang('en') ? '!bg-x-black' : '' }}">
                        <img src="{{ asset('lang/en.png') }}" class="block w-6 h-4 object-contain bg-red-500" />
                        <span class="block flex-1 text-base">English</span>
                    </a>
                </li>
                <li class="w-full">
                    <a href="{{ route('actions.language.index', 'fr') }}"
                        class="w-full flex flex-wrap gap-2 p-2 text-x-black items-center outline-none !bg-opacity-10 hover:bg-x-black focus:bg-x-black focus-within:bg-x-black {{ Core::lang('fr') ? '!bg-x-black' : '' }}">
                        <img src="{{ asset('lang/fr.png') }}" class="block w-6 h-4 object-contain bg-red-500" />
                        <span class="block flex-1 text-base">Francais</span>
                    </a>
                </li>
                <li class="w-full">
                    <a href="{{ route('actions.language.index', 'ar') }}"
                        class="w-full flex flex-wrap gap-2 p-2 text-x-black items-center outline-none !bg-opacity-10 hover:bg-x-black focus:bg-x-black focus-within:bg-x-black {{ Core::lang('ar') ? '!bg-x-black' : '' }}">
                        <img src="{{ asset('lang/ar.png') }}" class="block w-6 h-4 object-contain bg-red-500" />
                        <span class="block flex-1 text-base">العربية</span>
                    </a>
                </li>
            </ul>
        </os-dropdown>
    </div>
</os-topbar>
