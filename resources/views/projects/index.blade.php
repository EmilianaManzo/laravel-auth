@extends('layouts.admin')

@section('content')
<div class="container mt-3 pt-5">
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">Title</th>
            <th scope="col">Link</th>
            <th scope="col">Tipo</th>
            <th scope="col">Descrizione</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($projects as $project )
            <tr>
                <th scope="row">{{$project->title}}</th>
                <td>{{$project->href}}</td>
                <td>{{$project->type}}</td>
                <td>{{$project->description}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="paginator">
          {{$projects->links()}}

      </div>
</div>
@endsection
