@extends('layouts.admin')

@section('content')
<section class="h-100 overflow-scroll ">
    <div class="container pt-2">
        <div class="mb-2">
            <a href="{{route('admin.projects.create')}}" class="btn btn-primary"><i class="fa-solid fa-plus"></i></a>
        </div>
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">Title</th>
            <th scope="col">Link</th>
            <th scope="col">Tipo</th>
            <th scope="col">Descrizione</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
            @foreach ($projects as $project )
            <tr>
                <th scope="row">{{$project->title}}</th>
                <td>{{$project->href}}</td>
                <td>{{$project->type}}</td>
                <td>{{$project->description}}</td>
                <td>
                    <form action="" method="post">

                        <button type="submit" class="btn"></button><i class="fa-solid fa-pencil"></i></a>
                    </form>

                    <form action="" method="post">

                        <button type="submit" class="btn"></button><i class="fa-solid fa-trash"></i></a>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="paginator">
          {{$projects->links()}}

      </div>
</div>
</section>

@endsection
