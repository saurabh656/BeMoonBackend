<x-admin.app-layout>
    <x-slot name="header">
        <x-admin.action-heading title="Create New Card" backlink="{{ url('/admin/cards') }}" /> 
    </x-slot> 
    <x-admin.form-container>
        {!! Form::open(['url' => '/admin/cards', 'class' => 'form-horizontal', 'files' => true]) !!}
            <div class="max-w-7xl md:max-w-5xl mx-auto">
                <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
                    @include ('admin.cards.form', ['formMode' => 'create'])
                </div>
            </div>
        {!! Form::close() !!}
    </x-admin.form-container> 
</x-admin.app-layout> 