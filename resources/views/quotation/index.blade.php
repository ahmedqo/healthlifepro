@extends('shared.core.base')
@section('title', __('Quotations List'))

@section('content')
    <div class="flex flex-col gap-2">
        <div class="flex flex-wrap items-center justify-between">
            <h1 class="min-w-max text-xl lg:text-2xl text-x-black font-x-thin">
                {{ __('Quotations List') }}
            </h1>
            <div class="w-max ms-auto flex flex-wrap">
                <button data-type="search" data-for="#search" title="{{ __('Search') }}"
                    class="block p-2 rounded-x-huge text-x-black outline-none !bg-opacity-10 hover:bg-x-black hover:text-x-prime focus:bg-x-black focus:text-x-prime focus-within:bg-x-black focus-within:text-x-prime">
                    <svg class="block w-6 h-6 pointer-events-none" fill="currentcolor" viewBox="0 -960 960 960">
                        <path
                            d="M794-96 525.787-364Q496-341.077 457.541-328.038 419.082-315 373.438-315q-115.311 0-193.875-78.703Q101-472.406 101-585.203T179.703-776.5q78.703-78.5 191.5-78.5T562.5-776.356Q641-697.712 641-584.85q0 45.85-13 83.35-13 37.5-38 71.5l270 268-66 66ZM371.441-406q75.985 0 127.272-51.542Q550-509.083 550-584.588q0-75.505-51.346-127.459Q447.309-764 371.529-764q-76.612 0-128.071 51.953Q192-660.093 192-584.588t51.311 127.046Q294.623-406 371.441-406Z" />
                    </svg>
                </button>
                <button data-type="download" title="{{ __('Download') }}"
                    class="block p-2 rounded-x-huge text-x-black outline-none !bg-opacity-10 hover:bg-x-black hover:text-x-prime focus:bg-x-black focus:text-x-prime focus-within:bg-x-black focus-within:text-x-prime">
                    <svg class="block w-6 h-6 pointer-events-none" fill="currentcolor" viewBox="0 -960 960 960">
                        <path
                            d="M253-138q-95 0-163.5-67.5T21-370q0-82 51-148t132-79q23-90 89-150t154-72v372l-78-80-49 49 161 163 161-163-48-49-78 80v-372q103 13 174 91t77 187v24q75 8 123.5 60.5T939-327q0 79-55 134t-134 55H253Z" />
                    </svg>
                </button>
                <button data-type="print" title="{{ __('Print') }}"
                    class="block p-2 rounded-x-huge text-x-black outline-none !bg-opacity-10 hover:bg-x-black hover:text-x-prime focus:bg-x-black focus:text-x-prime focus-within:bg-x-black focus-within:text-x-prime">
                    <svg class="block w-6 h-6 pointer-events-none" fill="currentcolor" viewBox="0 -960 960 960">
                        <path
                            d="M741-701H220v-160h521v160Zm-17 236q18 0 29.5-10.812Q765-486.625 765-504.5q0-17.5-11.375-29.5T724.5-546q-18.5 0-29.5 12.062-11 12.063-11 28.938 0 18 11 29t29 11Zm-75 292v-139H311v139h338Zm92 86H220v-193H60v-264q0-53.65 36.417-91.325Q132.833-673 186-673h588q54.25 0 90.625 37.675T901-544v264H741v193Z" />
                    </svg>
                </button>
                <os-dropdown label="Columns" position="{{ Core::lang('ar') ? 'start' : 'end' }}" class="W160 sharp">
                    <button slot="trigger" title="{{ __('Columns') }}"
                        class="block p-2 rounded-x-huge text-x-black outline-none !bg-opacity-10 hover:bg-x-black hover:text-x-prime focus:bg-x-black focus:text-x-prime focus-within:bg-x-black focus-within:text-x-prime">
                        <svg class="block w-6 h-6 pointer-events-none" fill="currentcolor" viewBox="0 -960 960 960">
                            <path
                                d="M161-178q-30 0-50.5-21T90-249v-463q0-29.412 20.5-50.206Q131-783 161-783h90q29 0 49 20.794T320-712v463q0 29-20 50t-49 21h-90Zm275 0q-29 0-50-21t-21-50v-463q0-29.412 21-50.206Q407-783 436-783h90q29 0 49.5 20.794T596-712v463q0 29-20.5 50T526-178h-90Zm275 0q-30 0-50.5-21T640-249v-463q0-29.412 20.5-50.206Q681-783 711-783h89q29.412 0 50.706 20.794Q872-741.412 872-712v463q0 29-21.294 50T800-178h-89Z" />
                        </svg>
                    </button>
                    <ul class="w-full flex flex-col p-4 gap-2">
                        <li class="w-full">
                            <label class="flex flex-wrap gap-2 items-center">
                                <input checked data-type="column" data-for="id" type="checkbox"
                                    class="w-4 h-4 rounded-x-thin checked:accent-x-prime outline-2 outline-x-prime -outline-offset-2 focus:outline focus-within:outline">
                                <span class="text-base text-x-black">
                                    {{ __('Id') }}
                                </span>
                            </label>
                        </li>
                        <li class="w-full">
                            <label class="flex flex-wrap gap-2 items-center">
                                <input checked data-type="column" data-for="reference" type="checkbox"
                                    class="w-4 h-4 rounded-x-thin checked:accent-x-prime outline-2 outline-x-prime -outline-offset-2 focus:outline focus-within:outline">
                                <span class="text-base text-x-black">
                                    {{ __('Reference') }}
                                </span>
                            </label>
                        </li>
                        <li class="w-full">
                            <label class="flex flex-wrap gap-2 items-center">
                                <input checked data-type="column" data-for="name" type="checkbox"
                                    class="w-4 h-4 rounded-x-thin checked:accent-x-prime outline-2 outline-x-prime -outline-offset-2 focus:outline focus-within:outline">
                                <span class="text-base text-x-black">
                                    {{ __('Name') }}
                                </span>
                            </label>
                        </li>
                        <li class="w-full">
                            <label class="flex flex-wrap gap-2 items-center">
                                <input checked data-type="column" data-for="email" type="checkbox"
                                    class="w-4 h-4 rounded-x-thin checked:accent-x-prime outline-2 outline-x-prime -outline-offset-2 focus:outline focus-within:outline">
                                <span class="text-base text-x-black">
                                    {{ __('Email') }}
                                </span>
                            </label>
                        </li>
                        <li class="w-full">
                            <label class="flex flex-wrap gap-2 items-center">
                                <input checked data-type="column" data-for="phone" type="checkbox"
                                    class="w-4 h-4 rounded-x-thin checked:accent-x-prime outline-2 outline-x-prime -outline-offset-2 focus:outline focus-within:outline">
                                <span class="text-base text-x-black">
                                    {{ __('Phone') }}
                                </span>
                            </label>
                        </li>
                        <li class="w-full">
                            <label class="flex flex-wrap gap-2 items-center">
                                <input checked data-type="column" data-for="quantity" type="checkbox"
                                    class="w-4 h-4 rounded-x-thin checked:accent-x-prime outline-2 outline-x-prime -outline-offset-2 focus:outline focus-within:outline">
                                <span class="text-base text-x-black">
                                    {{ __('Quantity') }}
                                </span>
                            </label>
                        </li>
                        <li class="w-full">
                            <label class="flex flex-wrap gap-2 items-center">
                                <input checked data-type="column" data-for="Total" type="checkbox"
                                    class="w-4 h-4 rounded-x-thin checked:accent-x-prime outline-2 outline-x-prime -outline-offset-2 focus:outline focus-within:outline">
                                <span class="text-base text-x-black">
                                    {{ __('Total') }}
                                </span>
                            </label>
                        </li>
                        <li class="w-full">
                            <label class="flex flex-wrap gap-2 items-center">
                                <input checked data-type="column" data-for="charges" type="checkbox"
                                    class="w-4 h-4 rounded-x-thin checked:accent-x-prime outline-2 outline-x-prime -outline-offset-2 focus:outline focus-within:outline">
                                <span class="text-base text-x-black">
                                    {{ __('Charges') }}
                                </span>
                            </label>
                        </li>
                        <li class="w-full">
                            <label class="flex flex-wrap gap-2 items-center">
                                <input data-type="column" data-for="note_en" type="checkbox"
                                    class="w-4 h-4 rounded-x-thin checked:accent-x-prime outline-2 outline-x-prime -outline-offset-2 focus:outline focus-within:outline">
                                <span class="text-base text-x-black">
                                    {{ __('Note') }} (en)
                                </span>
                            </label>
                        </li>
                        <li class="w-full">
                            <label class="flex flex-wrap gap-2 items-center">
                                <input data-type="column" data-for="note_fr" type="checkbox"
                                    class="w-4 h-4 rounded-x-thin checked:accent-x-prime outline-2 outline-x-prime -outline-offset-2 focus:outline focus-within:outline">
                                <span class="text-base text-x-black">
                                    {{ __('Note') }} (fr)
                                </span>
                            </label>
                        </li>
                        <li class="w-full">
                            <label class="flex flex-wrap gap-2 items-center">
                                <input data-type="column" data-for="note_ar" type="checkbox"
                                    class="w-4 h-4 rounded-x-thin checked:accent-x-prime outline-2 outline-x-prime -outline-offset-2 focus:outline focus-within:outline">
                                <span class="text-base text-x-black">
                                    {{ __('Note') }} (ar)
                                </span>
                            </label>
                        </li>
                        <li class="w-full">
                            <label class="flex flex-wrap gap-2 items-center">
                                <input checked data-type="column" data-for="date" type="checkbox"
                                    class="w-4 h-4 rounded-x-thin checked:accent-x-prime outline-2 outline-x-prime -outline-offset-2 focus:outline focus-within:outline">
                                <span class="text-base text-x-black">
                                    {{ __('Date') }}
                                </span>
                            </label>
                        </li>
                        <li class="w-full">
                            <label class="flex flex-wrap gap-2 items-center">
                                <input checked data-type="column" data-for="actions" type="checkbox"
                                    class="w-4 h-4 rounded-x-thin checked:accent-x-prime outline-2 outline-x-prime -outline-offset-2 focus:outline focus-within:outline">
                                <span class="text-base text-x-black">
                                    {{ __('Actions') }}
                                </span>
                            </label>
                        </li>
                    </ul>
                </os-dropdown>
                <a title="{{ __('Create') }}" href="{{ route('views.quotations.store') }}"
                    class="block p-2 rounded-x-huge text-x-black outline-none !bg-opacity-10 hover:bg-x-black hover:text-x-prime focus:bg-x-black focus:text-x-prime focus-within:bg-x-black focus-within:text-x-prime">
                    <svg class="block w-6 h-6 pointer-events-none" fill="currentcolor" viewBox="0 -960 960 960">
                        <path
                            d="M479.825-185q-18.45 0-31.637-12.625Q435-210.25 435-231v-203H230q-18.375 0-31.688-13.56Q185-461.119 185-479.86q0-20.14 13.312-32.64Q211.625-525 230-525h205v-205q0-19.775 13.358-32.388Q461.716-775 480.158-775t32.142 12.612Q526-749.775 526-730v205h204q18.8 0 32.4 12.675 13.6 12.676 13.6 32.316 0 19.641-13.6 32.825Q748.8-434 730-434H526v203q0 20.75-13.65 33.375Q498.699-185 479.825-185Z" />
                    </svg>
                </a>
            </div>
        </div>
        <div class="bg-x-white rounded-x-huge shadow-x-core">
            <form id="search" action="{{ route('views.quotations.index') }}" method="GET"
                class="hidden relative m-4 w-[calc(100%-2rem)] lg:w-max lg:ms-auto">
                <os-text class="search" name="search" placeholder="{{ __('Search') }}"
                    value="{{ request('search') ?? '' }}">
                    <svg slot="start" class="block w-6 h-6 pointer-events-none" fill="currentcolor"
                        viewBox="0 -960 960 960">
                        <path
                            d="M794-96 525.787-364Q496-341.077 457.541-328.038 419.082-315 373.438-315q-115.311 0-193.875-78.703Q101-472.406 101-585.203T179.703-776.5q78.703-78.5 191.5-78.5T562.5-776.356Q641-697.712 641-584.85q0 45.85-13 83.35-13 37.5-38 71.5l270 268-66 66ZM371.441-406q75.985 0 127.272-51.542Q550-509.083 550-584.588q0-75.505-51.346-127.459Q447.309-764 371.529-764q-76.612 0-128.071 51.953Q192-660.093 192-584.588t51.311 127.046Q294.623-406 371.441-406Z" />
                    </svg>
                </os-text>
            </form>
            <div class="scroll w-full overflow-auto">
                <table data-type="display" class="w-max min-w-full">
                    <caption class="border-b border-b-x-shade no-show">
                        <h1 class="text-2xl text-x-black font-x-thin mb-4">
                            {{ __('Quotations List') }}
                        </h1>
                    </caption>
                    <thead>
                        <tr>
                            <td data-is="id" class="text-x-black text-sm font-x-thin py-2 px-4 ps-6 text-center w-10">
                                {{ __('Id') }}
                            </td>
                            <td data-is="reference" class="text-x-black text-sm font-x-thin py-2 px-4">
                                {{ __('Reference') }}
                            </td>
                            <td data-is="name" class="text-x-black text-sm font-x-thin py-2 px-4">
                                {{ __('Name') }}
                            </td>
                            <td data-is="email" class="text-x-black text-sm font-x-thin py-2 px-4">
                                {{ __('Email') }}
                            </td>
                            <td data-is="phone" class="text-x-black text-sm font-x-thin py-2 px-4">
                                {{ __('Phone') }}
                            </td>
                            <td data-is="quantity" class="text-x-black text-sm font-x-thin py-2 px-4 text-center w-20">
                                {{ __('Quantity') }}
                            </td>
                            <td data-is="total" class="text-x-black text-sm font-x-thin py-2 px-4 text-center w-20">
                                {{ __('Total') }}
                            </td>
                            <td data-is="charges" class="text-x-black text-sm font-x-thin py-2 px-4 text-center w-20">
                                {{ __('Charges') }}
                            </td>
                            <td data-is="note_en" class="text-x-black text-sm font-x-thin py-2 px-4">
                                {{ __('Note') }} (en)
                            </td>
                            <td data-is="note_fr" class="text-x-black text-sm font-x-thin py-2 px-4">
                                {{ __('Note') }} (fr)
                            </td>
                            <td data-is="note_ar" class="text-x-black text-sm font-x-thin py-2 px-4">
                                {{ __('Note') }} (ar)
                            </td>
                            <td data-is="date" class="text-x-black text-sm font-x-thin py-2 px-4">
                                {{ __('Date') }}
                            </td>
                            <td data-is="actions"
                                class="w-32 text-x-black text-sm font-x-thin py-2 px-4 pe-6 text-center">
                                {{ __('Actions') }}
                            </td>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($data as $row)
                            <tr class="border-t border-t-x-shade">
                                <td data-is="id"
                                    class="text-x-black text-sm font-x-thin py-2 px-4 ps-6 text-center w-10">
                                    #{{ $row->id }}
                                </td>
                                <td data-is="reference" class="text-x-black text-base py-2 px-4">
                                    {{ $row->reference }}
                                </td>
                                <td data-is="name" class="text-x-black text-base py-2 px-4">
                                    {{ $row->name }}
                                </td>
                                <td data-is="email" class="text-x-black text-base py-2 px-4">
                                    {{ $row->email }}
                                </td>
                                <td data-is="phone" class="text-x-black text-base py-2 px-4">
                                    {{ $row->phone }}
                                </td>
                                <td data-is="quantity" class="text-x-black text-base py-2 px-4 text-center w-20">
                                    {{ $row->Items->count() }} ({{ $row->Length() }})
                                </td>
                                <td data-is="total" class="text-x-black text-base py-2 px-4 text-center w-20">
                                    {{ Core::format($row->Total()) }} {{ $row->currency }}
                                </td>
                                <td data-is="charges" class="text-x-black text-base py-2 px-4 text-center w-20">
                                    {{ Core::format($row->Charges()) }} {{ $row->currency }}
                                </td>
                                <td data-is="note_en" class="text-x-black text-base py-2 px-4">
                                    {{ $row->note_en ?? '_' }}
                                </td>
                                <td data-is="note_fr" class="text-x-black text-base py-2 px-4">
                                    {{ $row->note_fr ?? '_' }}
                                </td>
                                <td data-is="note_ar" class="text-x-black text-base py-2 px-4">
                                    {{ $row->note_ar ?? '_' }}
                                </td>
                                <td data-is="date" class="text-x-black text-base py-2 px-4">
                                    {{ $row->created_at }}
                                </td>
                                <td data-is="actions" class="w-32 text-x-black text-base py-2 px-4 pe-6">
                                    @include('shared.core.action', [
                                        'print' => route('views.quotations.scene', [
                                            'id' => $row->id,
                                            'print' => 'true',
                                        ]),
                                        'scene' => route('views.quotations.scene', $row->id),
                                        'patch' => route('views.quotations.patch', $row->id),
                                        'clear' => route('actions.quotations.clear', $row->id),
                                    ])
                                </td>
                            </tr>
                        @empty
                            <tr class="border-t border-t-x-shade">
                                <td colspan="100" class="px-8 py-4 font-x-huge text-base text-x-black text-center">
                                    {{ __('NO DATA FOUND') }}
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <nav class="flex items-center justify-center gap-4 mt-2">
            {{ $data->appends(request()->input())->links('shared.base.paginate') }}
        </nav>
    </div>
@endsection

@section('scripts')
    <script>
        DataTable({
            print: "[data-type=print]",
            table: "[data-type=display]",
            search: "[data-type=search]",
            filter: "[data-type=column]",
            download: "[data-type=download]",
        });
    </script>
@endsection
