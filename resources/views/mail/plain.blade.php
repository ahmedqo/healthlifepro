<table style="width: 100%;">
    <tr>
        <td style="padding: 16px;">
            <div style="width: 500px; max-width: 100%; margin: auto;">
                <a href="{{ route('views.guest.home') }}"
                    style="width: 160px; max-width: 100%; display: block; text-decoration: unset; margin: auto;">
                    <img src="{{ asset('img/logo.png') }}?v={{ env('APP_VERSION') }}"
                        style="width: 100%; display: block;" />
                </a>
                <p style="color: #1d1d1d; text-align: center; font-size: 16px; margin: 20px 0 30px 0;">
                    {!! nl2br($data['content']) !!}
                </p>
                @if (isset($data['link']))
                    <div
                        style="max-width: 100%;text-align: center;color: #fcfcfc;font-weight: 600;font-size: 14px;border-radius: 6px;width: max-content;padding: 12px 32px;margin: auto;background: #02c93b;">
                        <a href="{{ $data['link']['url'] }}" style="text-decoration: unset;display: block;width: 100%;">
                            {{ $data['link']['txt'] }}
                        </a>
                    </div>
                @endif
            </div>
        </td>
    </tr>
</table>
