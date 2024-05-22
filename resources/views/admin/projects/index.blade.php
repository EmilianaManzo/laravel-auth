@extends('layouts.admin')

@section('content')
<section class="h-100 flex-grow-1 sec-index ">
    <div class="container pt-4 w-100 ">
        <div class="mb-2">
            <a href="{{route('admin.projects.create')}}" class="btn btn-primary"><i class="fa-solid fa-plus"></i></a>
        </div>

        @if(session('success'))
        <div class="alert alert-success" role="alert">
        {{ session('success')}}
        </div>
        @endif

        @if(session('errorexist'))
        <div class="alert alert-danger" role="alert">
        {{ session('errorexist')}}
        </div>
        @endif

        @if(session('deleted'))
        <div class="alert alert-success" role="alert">
        {{ session('deleted')}}
        </div>
        @endif

      <table class="table  w-100 ">
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
                <form action="{{route('admin.projects.update', $project)}}" method="post"
                id="form-edit-{{$project->id}}">
                    @csrf
                    @method('PUT')
                <th scope="row">

                <input
                    type="text"
                    class="form-control  @error('title') is-invalid @enderror"
                    id="'title"
                    name="title"
                    value="{{$project->title}}">
                    @error('title')
                        <small class="text-danger">
                        {{$message}}
                        </small>
                    @enderror

                </th>

                <td>

                <input
                    type="text"
                    class="form-control  @error('href') is-invalid @enderror"
                    id="href"
                    name="href"
                    value="{{$project->href}}">
                    @error('href')
                        <small class="text-danger">
                        {{$message}}
                        </small>
                    @enderror
                </td>

                <td>
                    <input
                    type="text"
                    class="form-control  @error('type') is-invalid @enderror"
                    id="type"
                    name="type"
                    value="{{$project->type}}">
                    @error('type')
                        <small class="text-danger">
                            {{$message}}
                        </small>
                    @enderror
                </td>

                <td>
                    <textarea cols="30" rows="10" class="form-control " id="description" name="description" value="">{{$project->description}}</textarea>
                </td>
            </form>
                <td>
                        <button
                          type="submit"
                          onclick="submitForm({{$project->id}})"
                          class="btn btn-warning my-2"
                          ><i
                          class="fa-solid fa-pencil"></i></button>

                        <form
                          action="{{route('admin.projects.destroy', $project)}}"
                          method="post"
                          onsubmit="return confirm('Sei sicuro di voler eliminare {{$project->title}} ?')">
                            @csrf
                            @method('DELETE')
                            <button
                          type="submit"
                          class="btn btn-danger my-2 "
                          ><i
                          class="fa-solid fa-trash"></i></button>
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
<script>
    function submitForm(id){
        const form = document.getElementById(`form-edit-${id}`);
        console.log(form);
        form.submit()
    }
</script>
@endsection
