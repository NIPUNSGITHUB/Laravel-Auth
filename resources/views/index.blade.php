@extends('layouts.app')

@section('content')

<div class="container">
    <a class="btn btn-success" href="{{url('/create/ticket')}}">Create Ticket</a>
   
</div>
    
    <div class="container">
         
        <table class="table table-striped">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Title</td>
                    <td>Description</td>
                    <td colspan="2">Action</td>
                </tr>
            </thead>
            
            <tbody>
                   @foreach ($tickets as $ticket)
                    <tr>
                        <td>{{$ticket->id}}</td>
                        <td>{{$ticket->title}}</td>
                        <td>{{$ticket->description}}</td>
                        <td>
                            <a class="btn btn-primary"  href="{{action('TicketController@edit',$ticket->id)}}">Edit</a> 
                        </td>
                        <td>
                            <form action="{{url('/delete/ticket',$ticket->id)}}" method="get">
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                   @endforeach
            </tbody>

        </table>
    </div>
@endsection