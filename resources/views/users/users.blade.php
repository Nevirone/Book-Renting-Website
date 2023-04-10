
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lista użytkowników') }}
        </h2>
    </x-slot>
    <br />

    <div class="table-container">
        <table data-toggle="table">
            <thead>
                <tr class="text-center">
                    <th>Id</th>
                    <th>Status</th>
                    <th>Nazwa</th>
                    <th>E-mail</th>
                    <th>Data utworzenia</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr class="text-center">
                    <td>{{$user->id}}</td>
                    @if($user->admin == 1)
                        <th>Administrator</th>
                    @endif
                    @if($user->admin == 0)
                        <th>Użytkownik</th>
                    @endif
                    <th>{{$user->name}}</th>
                    <th>{{$user->email}}</th>
                    <td>{{$user->created_at}}</td>
                    <td class="d-flex justify-content-center">
                        <a href="{{ route('manageUser', $user->id) }}" class="btn btn-warning">Zarządzaj</a>
                    </td>
                    <td class="d-flex justify-content-center">
                        <a href="{{ route('deleteUser', $user->id) }}"
                        class="btn btn-danger",
                        onclick="return confirm('Czy na pewno chcesz usunąć tego użytkownika?')"
                        >Usuń
                        </a>
                    </td>
                </tr>             
                @endforeach
            </tbody>
        </table>
    </div>          
</x-app-layout>
