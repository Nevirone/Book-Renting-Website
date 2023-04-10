<x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Lista wypożyczonych książek') }}
            </h2>
        </x-slot>
        <br />

        <div class="table-container text-center">
            <table data-toggle="table">
                <thead>
                    <tr>
                        <th>Tytuł</th>
                        <th>Autor</th>
                        <th>Gatunek</th>
                        <th>Koszt spóźnienia za dzień</th>
                        <th>Data wypożyczenia</th>
                        <th>Pozostały czas wypożyczenia</th>
                        <th>Kara za spóźnienie</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        for($i=0; $i<count($books); $i++) {
                            $book = $books[$i];
                            $id = $borrow_ids[$i];
                        ?>
                    <tr>
                        <th>{{$book->title}}</th>
                        <td>{{$book->author}}</td>
                        <td>{{$book->genre}}</td>
                        <td>{{$book->cost / 100}}</td>
                        <?php 
                            $date_begin = app\Models\Borrow::find($borrow_ids[$i])->created_at->format("d-m-Y");
                            $date_end = date("d-m-Y", time());

                            $days = (strtotime($date_end) - strtotime($date_begin)) / (60 * 60 * 24); 
                            $cost = 0;
                            if(14-$days < 0){
                                $cost = -1 * (14-$days) * $book->cost / 100;
                            }
                        ?>
                        <td>{{$date_begin}}</td>
                        @if(14-$days < 0)
                            <td>{{-(14-$days)}} dni spóźnienia</td>
                        @endif
                        @if(14-$days>=0)
                            <td>{{14-$days}} dni pozostało</td>
                       @endif
                            <td>{{number_format($cost, 2, ',', ' ')}}</td>
                        <td><a href="{{ route('returnBook', $id) }}"
                            class="btn btn-danger btn-xs"
                            onclick="return confirm('Czy na pewno chcesz zwrócić tę książkę?')"
                            title=""> Zwróć
                            </a></td>
                    </tr>   
                    <?php } ?>
                </tbody>
            </table>
            <br>       
        </div>     
</x-app-layout>
