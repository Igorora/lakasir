@extends('adminlte::page')

@section('content')
  <div class="row col">
    <v-button float="right" text="{{ __('app.global.create') }}" to="{{ route($resources.'.create') }}" icon="fas fa-plus"></v-button>
  </div>
  <br>

  <x-index-table :title="__('app.user.title')" :resources="$resources">
    @slot('thead')
      <th> {{ __('app.user.column.username') }} </th>
      <th> {{ __('app.user.column.email') }} </th>
      <th> {{ __('app.user.column.role') }} </th>
    @endslot
  </x-index-table>
@endsection

@push('js')
  <script>
    $(function() {
      $('#{{ $resources }}-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route($resources.'.index') !!}',
        columns: [
          { data: 'checkbox', name: '#', orderable: false, searchable: false, width: '3%' },
          { data: 'username', name: 'username', render: function ( data, type, row ) {
            return '<a href='+ route('{{ $resources }}.edit', row) +'>'+data+'</a>'
          }},
          { data: 'email', name: 'email' },
          { data: 'role', name: 'role' },
          { data: 'created_at', name: 'Created At' },
          { data: 'action', name: 'action', orderable: false, searchable: false, width: '3%' },
        ]
      });
    });
  </script>
@endpush
