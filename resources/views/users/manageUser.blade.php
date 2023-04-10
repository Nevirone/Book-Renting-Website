<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Zarządzanie użytkownikiem') }}
        </h2>
    </x-slot>
    <br />

    <div class="table-container text-center">
       <form role="form"  action="{{ route('saveUser', $user->id) }}" id="user-form" 
                method="post" enctype="multipart/form-data" >
                {{ csrf_field() }}
            <table data-toggle="table">
                <thead>
                    <tr>
                        <th>Pole</th>
                        <th>Wartość</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Id</td>
                        <td>
                            <input  class="text-center" type="number" name="id" id="id" value="{{$user->id}}" disabled>
                        </td>
                    </tr>

                    <tr>
                        <td>Status</td>
                        <td>
                            <select name="status" id="status" selected="">
                                
                            @if($user->admin == 1)
                                <option value="0">Użytkownik</option>
                                <option value="1" selected="selected">Administrator</option>
                            @endif

                            @if($user->admin != 1)
                                <option value="0" selected="selected">Użytkownik</option>
                                <option value="1">Administrator</option>
                            @endif
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td>Nazwa</td>
                        <td>
                            <input class="text-center" type="text" name="name" id="name" value="{{$user->name}}" required>
                        </td>
                    </tr>
                    
                    <tr>
                        <td>Email</td>
                        <td>
                            <input class="text-center" type="email" name="email" id="email" value="{{$user->email}}" required>
                        </td>
                    </tr>
                    
                    
                    <tr>
                        <td>Hasło (Puste - bez zmian)</td>
                        <td>
                            <input class="text-center" type="password" name="password" id="password">
                        </td>
                    </tr>
                    
                    <tr>
                        <td>
                                <div class="d-flex justify-content-center box-footer">
                                    <x-danger-button type="reset">{{ __('Wyczyść') }}</x-danger-button> 
                                </div>
                        </td>
                        <td>
                            <div class="d-flex justify-content-center box-footer">
                                <x-success-button type="submit">{{ __('Zapisz') }}</x-success-button> 
                            </div>
                        </td>
                    </tr>  
                </tbody>
            </table>
        </form>
        <br />       
    </div>   
</x-app-layout>
