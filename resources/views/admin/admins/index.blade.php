<x-admin.app-layout> 
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="text-xl font-semibold text-gray-900">
                Admins
            </h2>
            <div>
                <a class="btn-primary" href="{{ route('admin.admins.create') }}">
                    <svg class="w-5 h-5 mr-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg> 
                    {{ __('admin.add_new') }}
                </a>
            </div>
        </div>    
    </x-slot>
    <x-admin.table-list> 
        <x-slot name="search"> 
            {!! Form::open(['method' => 'GET', 'url' => route('admin.admins.index'), 'class' => 'sm:flex', 'role' => 'search'])  !!}  
                <x-admin.input id="text" class="mr-2"
                                        type="text"
                                        name="search"
                                        value="{{ request('search') }}"
                                        placeholder="Search..." /> 
                <x-admin.button type="submit">{{ __('admin.search') }}</x-admin.button> 
            {!! Form::close() !!}
        </x-slot> 
        <table>
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Updated At</th>
                    <th class="th-col-action" scope="col"><span class="sr-only">Actions</span></th>
                </tr>
            </thead>
            <tbody>
            @foreach($admins as $item)
                <tr class="hover:bg-gray-100">
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td><x-admin.status :status="$item->enabled" /></td> 
                    <td>{{ $item->updated_at->format('Y/m/d H:i') }}</td>
                    <td class="col-action"> 
                        <x-admin.edit-button url="{{ url('/admin/admins/' . $item->id . '/edit') }}" />
                        <x-admin.delete-button url="{{ url('/admin/admins/' . $item->id) }}" />  
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <x-slot name="pagination"> 
            {!! $admins->appends(request()->query())->render() !!}
        </x-slot>
    </x-admin.table-list>    
</x-admin.app-layout>