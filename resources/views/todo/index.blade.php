{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>TODO | Home</title>
    <style></style>
</head>
<body>
    
    
</body>
</html> --}}
@extends('components.app')
@section('content')
<h1 id='heading'>All Your TODO</h1>
<div id="heading" class="card text-center">
    <button type="button" class="btn btn-danger">
        Total Active <span class="badge badge-light">{{$active}}</span>
    </button>      
    <button type="button" class="btn btn-success">
        Total Complete <span class="badge badge-light">{{$completed}}</span>
    </button> 
</div>
<div class="box">
    <div class="table-head"><b>Task List</b>
        <br>
        <a href="{{route('deleteAllCompleted')}}" class="btn btn-danger">Delete All Task Completed <i class="fas fa-trash"></i></a>
        <a href="{{route('allCompleted')}}" class="btn btn-success">  Active to Completed <i class="fas fa-check"></i></a>
</div>

<h3 class="alert">
    <x-alert />
</h3>
<table>        		
    <tbody>			
    @foreach($todos as $todo)
        <tr class="task-list">
            <td><a href="{{asset('/' . $todo->id . '/completed')}}" class="complete"><span class="material-icons">task</span></a></td>
            @if($todo->completed)
               <td > <span style="text-decoration:line-through" class="title">{{$todo->title}}</span></td>
            @else 
                <td><span class="title">{{$todo->title}}</span></td>
            @endif
            <td><a href="{{asset('/' . $todo->id . '/edit')}}" class="edit">Edit</a></td>
            <td><a href="{{asset('/' . $todo->id . '/delete')}}" class="delete"><i class="fas fa-trash"></i></a></td>
        </tr>
    @endforeach    	
    </tbody>
</table>

<h3 class="add-task">
    <a href="/create"><i class="fas fa-plus">  New Task</i></a>
</h3>

</div>
@endsection