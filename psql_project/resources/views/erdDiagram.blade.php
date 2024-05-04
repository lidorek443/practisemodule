@extends('components/navbar')
@section('content')
<div style="background-color: #DAE4E4; overflow: hidden;">
    <div class="position-sticky" style="margin-left: 2%; padding-top: 10px;">
        @include('components/erdMenu')
    </div>
    <div class="row">
        <div id="erdDiagramDiv" style="width:100%; height:74vh; background-color: #DAE4E4;"></div>
    </div>
</div>
@include('js/erdDiagram')
@endsection