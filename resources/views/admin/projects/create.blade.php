@extends('layouts.admin')

@section('content')
<section class="h-100 w-100 ">
    <div class="container pt-4">
        <h1>Crea un nuovo progetto</h1>

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

        <form action="{{route('admin.projects.store')}}" method="post">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Titolo</label>
                <input
                  type="text"
                  class="form-control @error('title') is-invalid @enderror"
                  id="title"
                  name="title"
                  value="{{old('title')}}">
                  @error('title')
                      <small class="text-danger">
                        {{$message}}
                      </small>
                  @enderror
            </div>
            <div class="mb-3">
                <label for="href" class="form-label">Link</label>
                <input
                  type="text"
                  class="form-control @error('href') is-invalid @enderror"
                  id="href"
                  name="href"
                  value="{{old('href')}}">
                  @error('href')
                      <small class="text-danger">
                        {{$message}}
                      </small>
                  @enderror
            </div>
            <div class="mb-3">
                <label for="type" class="form-label">Tipo</label>
                <input
                  type="text"
                  class="form-control @error('type') is-invalid @enderror"
                  id="type"
                  name="type"
                  value="{{old('type')}}">
                  @error('type')
                      <small class="text-danger">
                        {{$message}}
                      </small>
                  @enderror
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Descrizione</label>
                <textarea cols="30" rows="10" class="form-control" id="description" name="description" value="{{old('description')}}"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Crea</button>
            <a class="btn btn-primary" href="{{route('admin.projects.index')}}">Torna ai Progetti</a>
        </form>

    </div>
</section>
@endsection
