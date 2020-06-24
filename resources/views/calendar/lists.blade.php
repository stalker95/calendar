@extends('layouts.calendar')

@section('content')
<div class="container">
	
    <div class="row justify-content-center">

        <div class="col-md-12">
          <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Push event</th>
      <th scope="col">Start data</th>
      <th scope="col">End data</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach($events as $event)
    <tr>
      <th scope="row">{{ $event->id }}</th>
      <th>{{ $event->title }}</th>
      <th> {{ $event->push_event }} </th>
      <th> {{ $event->start_data }} </th>
      <th> {{ $event->end_data }} </th>
       <th>
        <a class="btn btn-primary" href="{{ route('calendar.edit', $event->id) }}">Edit</a>
        <form style="display: inline-block;" onsubmit="return confirm('Delete?');" action="{{ route('calendar.destroy',$event->id)}}" method="POST">
            <input type="hidden" name="_method" value="DELETE">
            {{ csrf_field() }}
            <button type="submit" class="btn btn-danger">delete</button>
            
          </form>
      </th>
    </tr>
    @endforeach
    
  </tbody>
</table>
{{ $events->links() }}

           
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>

</script>
@endsection