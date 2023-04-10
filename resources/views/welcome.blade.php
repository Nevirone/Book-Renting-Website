<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('O stronie') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="container">
                    <div class="container">
                        <div class="row">
                            <div class=" col-sm text-center">
                                Ta strona została stworzona z wykorzystaniem framework'a Laravel w wersji 9 na projekt zaliczeniowy przedmiotu PHP <br /><br />
                                Przedstawia prosty model biblioteki, implementując funkcjonalności: <br /><br />
                                    -dodawania i usuwania książek z listy jako administrator <br />
                                    -wyświetlanie książek jako gość <br />
                                    -wyświetlanie i wypożyczanie książek z listy jako osoba zalogowana <br />
                                    -wyświetlanie i zwracanie książek z listy wypożyczonych przez użytkownika książek <br />
                                    -wyświetlanie i edytowanie kont użytkowników <br />
                                    -ograniczenie dostępu do stron względem stanu konta (gość, użytkownik, administrator)
                                
                            </div>
                            <div class="col-sm text-center">
                            <h2>Czym jest Laravel? </h2>
                            To jeden z frameworków PHP, który powstał w 2011 roku w ramach darmowego oprogramowania open source.
                            Co ciekawe, już w ciągu dwóch lat od wypuszczenia na rynek Laravel stał się najczęściej wyszukiwanym 
                                frameworkiem w zapytaniach Google’a. <br /><br />
                            To, co charakterystyczne dla Laravela, to elegancka i prosta składnia 
                                (w porównaniu z innymi frameworkami) oraz wzorzec architektoniczny Model View Controller, 
                                który zakłada podział aplikacji na trzy części: <br /><br />
                                – model, czyli problem lub logika aplikacji <br />
                                – widok, który wyświetla część modelu w interfejsie użytkownika <br />
                                – kontroler, który reaguje na akcje użytkownika, odświeża widoki i jest odpowiedzialny za aktualizację modelu <br />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>