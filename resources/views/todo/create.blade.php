@extends('components.app')
@section('content')
<h1 id='heading'>Add your Task</h1>
<h3></h3>
    <x-alert/>
</h3>
<form action="/upload" method="post" class="inputField">
    @csrf
    <input type="text" name="title" class="task_input">
    <button type="submit" name="submit" id="add_btn" ><i class="fa fa-plus"></i></button>
</form>
<br>
<br>
<br>
<a href="/index" class="back" style="margin-top: 10px">Back</a>
@endsection