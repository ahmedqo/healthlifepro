@if ($paginator->hasPages())
    @if ($paginator->onFirstPage())
        <span
            class="uppercase rtl:rotate-180 flex items-center px-4 py-1 text-sm font-x-huge text-x-prime bg-transparent border border-x-prime rounded-x-huge">
            <svg class="block w-8 h-8 pointer-events-none" fill="currentcolor" viewBox="0 -960 960 960">
                <path
                    d="M452-219 190-481l262-262 64 64-199 198 199 197-64 65Zm257 0L447-481l262-262 63 64-198 198 198 197-63 65Z" />
            </svg>
        </span>
    @else
        <a href="{{ $paginator->previousPageUrl() }}"
            class="uppercase rtl:rotate-180 flex items-center px-4 py-1 text-sm font-x-huge text-x-prime bg-transparent border border-x-prime rounded-x-huge outline-none hover:text-x-white hover:bg-x-prime focus:text-x-white focus:bg-x-prime">
            <svg class="block w-8 h-8 pointer-events-none" fill="currentcolor" viewBox="0 -960 960 960">
                <path
                    d="M452-219 190-481l262-262 64 64-199 198 199 197-64 65Zm257 0L447-481l262-262 63 64-198 198 198 197-63 65Z" />
            </svg>
        </a>
    @endif

    @if ($paginator->hasMorePages())
        <a href="{{ $paginator->nextPageUrl() }}"
            class="uppercase rtl:rotate-180 flex items-center px-4 py-1 text-sm font-x-huge text-x-prime bg-transparent border border-x-prime rounded-x-huge outline-none hover:text-x-white hover:bg-x-prime focus:text-x-white focus:bg-x-prime">
            <svg class="block w-8 h-8 pointer-events-none" fill="currentcolor" viewBox="0 -960 960 960">
                <path
                    d="M388-481 190-679l64-64 262 262-262 262-64-65 198-197Zm257 0L447-679l63-64 262 262-262 262-63-65 198-197Z" />
            </svg>
        </a>
    @else
        <span
            class="uppercase rtl:rotate-180 flex items-center px-4 py-1 text-sm font-x-huge text-x-prime bg-transparent border border-x-prime rounded-x-huge">
            <svg class="block w-8 h-8 pointer-events-none" fill="currentcolor" viewBox="0 -960 960 960">
                <path
                    d="M388-481 190-679l64-64 262 262-262 262-64-65 198-197Zm257 0L447-679l63-64 262 262-262 262-63-65 198-197Z" />
            </svg>
        </span>
    @endif
@endif
