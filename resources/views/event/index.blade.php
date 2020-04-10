@extends('layout.master')

@section('content')
        <h2>Events</h2>

        <?php 
            //dump($tab);
        ?>
       <ul>
              <?php //foreach ($tab as $event): ?>
                   <li>
                       <?PHP //=$event 
                       ?>
                   </li>
              <?php //endforeach ; ?>
              
              @foreach($tab as $event)
                   <li>{{$event}}</li>
              @endforeach
              
       </ul>
       @endsection
       @section('footer')
@endsecti0n
    
