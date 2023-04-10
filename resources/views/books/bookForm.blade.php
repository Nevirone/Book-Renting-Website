<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dodawanie książki') }}
        </h2>
    </x-slot>
    <br />

    <div class="table-container">
        <table>
            <form role="form"  action="{{ route('storeBook') }}" id="book-form" 
                method="post" enctype="multipart/form-data" >
                {{ csrf_field() }}
                <tr>
                    <th>
                        <label class="d-flex justify-content-center m-1">Ilość</label>
                        <input type="number" name="amount" id="amount" min="0" class="m-1 p-0" cols="10" rows="1" required>
                    </th>
                    <th>
                    <label class="d-flex justify-content-center m-1">Tytuł</label>
                        <input type="text" name="title" id="title" class="m-1 p-0" cols="25" rows="1" required>
                    </th>
                    <th>
                    <label class="d-flex justify-content-center m-1">Autor</label>
                        <input type="text" name="author" id="author" class="m-1 p-0" cols="25" rows="1" required>
                    </th>
                    <th>
                        <label class="d-flex justify-content-center m-1">Koszt spóźnienia</label>
                        <input type="number" name="cost" id="cost" value="0.00" placeholder="0.00" step="0.01" min="0" class="m-1 p-0" cols="10" rows="1" required/>
                    </th>
                    <th>
                    <label class="d-flex justify-content-center m-1">Gatunek</label>
                        <select name="genre" id="genre" class="m-1 p-0">
                            <option value="Akcja">Akcja</option>
                            <option value="Dramat">Dramat</option>
                            <option value="Fantasy">Fantasy</option>
                            <option value="Horror">Horror</option>
                            <option value="Komiks">Komiks</option>
                            <option value="Kryminał">Kryminał</option>
                            <option value="Przygoda">Przygoda</option>
                            <option value="Romans">Romans</option>
                            <option value="Sci-Fi">Sci-Fi</option>
                            <option value="Thriller">Thriller</option>
                        </select>
                    </th>
                </tr>
                <tr>
                    <th>
                        <div class="d-flex justify-content-center">
                            <x-danger-button type="reset">{{ __('Wyczyść') }}</x-danger-button> 
                        </div>
                    </th>
                    <th>
                        <div class="d-flex justify-content-center">
                            <x-success-button type="submit">{{ __('Dodaj') }}</x-danger-button> 
                        </div>
                    </th>
                </tr>
            </form>
        </table>

    <br>
</x-app-layout>
