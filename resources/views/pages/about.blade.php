@extends('layout.master')

@section('content')
        <h2>About</h2>

        {{$name}}
        <?php /*if($date){
            echo" vas t'amuser";
        } */?>

        @if($date)
            {{"vas t'amuser"}}
        @else
            {{"vas travailler"}}
        @endif
@endsection
@section('footer')
@endsecti0n