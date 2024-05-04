@section('content')
<div>
    <div class="row">
        <div class="col-3" style="padding: 0px; border-top: 2px solid gray; height: 100vh;">
            @extends('components/navbar')
            @include('components/listDatabases')
        </div>
        <div class="col-9" style="padding: 0px; border-top: 2px solid gray; border-left: 2px solid gray;">
            @include('components/tableOptionsNavbar')
            <div id="tableDiv">
                @include('components/table')
            </div>
        </div>
    </div>
</div>
@include('components/createTableModel')
@include('components/deleteTableColModel')
@include('components/addTableColModel')
@include('components/editTableColModel')
@include('components/addForeignKeyModel')
@include('components/dropTableModel')

@include('js/main')
@endsection
