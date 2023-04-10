<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Dzięki za rejestracje. Zanim zaczniemy, czy mógłbyś zweryfikować swój adres e-mail klikając na link w wiadomości którą Ci wysłaliśmy? Jeżeli nie otrzymałeś wiadmości z przyjemnością wyślemy ją ponownie.') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ __('Nowy link weryfikacji został wysłany na Twój adres e-mail.') }}
        </div>
    @endif

    <div class="mt-4 flex items-center justify-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                <x-primary-button>
                    {{ __('Prześlij link ponownie') }}
                </x-primary-button>
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                {{ __('Wyloguj') }}
            </button>
        </form>
    </div>
</x-guest-layout>
