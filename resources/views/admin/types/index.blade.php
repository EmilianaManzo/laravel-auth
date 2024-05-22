@extends('layouts.admin')

@section('content')
<section class="h-100 w-100">
    <div class="container pt-4 w-100 ">
        <div class="row">
            <div class="col">
                <div class="card">

                </div>
                @if(session('success'))
                <div class="alert alert-success" role="alert">
                {{ session('success')}}
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
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>

                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($types as $type )
                        <tr>
                            <form action="{{route('admin.types.update', $type)}}" method="post"
                            id="form-edit-{{$type->id}}">
                                @csrf
                                @method('PUT')
                            <th scope="row">
                                {{$type->id}}
                            </th>

                            <td>

                            <input
                                type="text"
                                class="form-control  @error('name') is-invalid @enderror brd-no"
                                id="name"
                                name="name"
                                value="{{$type->name}}">
                                @error('href')
                                    <small class="text-danger">
                                    {{$message}}
                                    </small>
                                @enderror
                            </td>
                        </form>
                            <td>
                                    <button
                                    type="submit"
                                    onclick="submitForm({{$type->id}})"
                                    class="btn btn-warning my-2"
                                    ><i
                                    class="fa-solid fa-pencil"></i></button>

                                    <form
                                    action="{{route('admin.types.destroy', $type)}}"
                                    method="post"
                                    onsubmit="return confirm('Sei sicuro di voler eliminare {{$type->name}} ?')">
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
                    {{$types->links()}}
                </div>
            </div>
            <div class="col">
                <h1>Nuovo Tipo</h1>
                @if ($errors->any())
                <div class="alert alert-danger " role="alert">
                     <ul>
                         @foreach ($errors->all() as $error )
                             <li>{{$error}}</li>
                         @endforeach
                     </ul>
                </div>
                @endif

                @if(session('error'))
                <div class="alert alert-danger" role="alert">
                {{ session('error')}}
                </div>
                @endif

                <form
                  action="{{route('admin.types.store')}}"
                  method="post" >
                  @csrf
                  <div class="mb-3">
                        <label for="name" class="form-label">Tipo</label>
                        <input
                        type="text"
                        class="form-control @error('name') is-invalid @enderror"
                        id="name"
                        name="name"
                        value="{{old('name')}}">
                        @error('name')
                            <small class="text-danger">
                                {{$message}}
                            </small>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Crea</button>

                </form>
            </div>
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
