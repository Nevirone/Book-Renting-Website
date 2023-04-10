<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Book list') }}
        </h2>
    </x-slot>
    <br />

    <div class="table-container text-center">
        <table data-toggle="table">
            <thead>
                <tr class="text-center">
                    <th>{{ __('books.amount') }}</th>
                    <th>Tytuł</th>
                    <th>Autor</th>
                    <th>Gatunek</th>
                    <th>Koszt dzienny spóźnienia</th>
                    <td>-</td>
                    @auth
                        @if (\Auth::user()->isAdmin())
                            <td>-</td>
                        @endif
                    @endauth
                </tr>
            </thead>
            <tbody>
                <?php
                function compare($a, $b) {
                    return strcmp($a->title, $b->title) == -1;
                }
                $sorted = false;
                while(!$sorted){
                    $sorted = true;
                    for($i=1; $i<count($books);$i++) {
                        if(compare($books[$i], $books[$i-1])){
                            $temp = $books[$i];
                            $books[$i] = $books[$i-1];
                            $books[$i-1] = $temp;
                            $sorted = false;
                        }

                    }
                }
                ?>
                @foreach($books as $book)
                <tr class="text-center">
                    <th>{{$book->amount}}</th>
                    <th>{{$book->title}}</th>
                    <td>{{$book->author}}</td>
                    <td>{{$book->genre}}</td>
                    <td>{{$book->cost / 100}}</td>
                    @auth
                        <td>
                            @if($book->amount>0)
                            <a href="{{ route('borrowBook', $book->id) }}"
                            class="btn btn-success btn-xs"
                            title=""> Wypożycz
                            </a>
                            @endif
                            @if($book->amount<=0)
                                -
                            
                            @endif
                        </td>
                        
                        @if(\Auth::user()->isAdmin())
                            <td class="d-flex justify-content-center">
                                <a href="{{ route('removeBook', $book->id) }}"
                                class="btn btn-danger btn-xs"
                                onclick="return confirm('Czy na pewno chcesz usunąć tą książkę?')">
                                Usuń
                                </a>
                            </td>
                        @endif
                    @endif
                </tr>     
                @endforeach   
                
                @auth
                    @if(\Auth::user()->isAdmin())
                    <tr>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td class="d-flex justify-content-center">
                            <a href="{{ route('addBook') }}" class="btn btn-success">Dodaj</a>
                        </td>
                        <td>-</td>
                    </tr>
                    @endif   
                @endif 
            </tbody>
        </table>
    <br>      
</x-app-layout>
