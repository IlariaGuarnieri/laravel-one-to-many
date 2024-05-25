@extends('layouts.admin')

@section('content')
    <h2>Progetti</h2>

    {{-- messaggio errore se gia c'è --}}
    @if(session('error'))
    <div class="alert alert-danger" role="alert">
        {{session('error')}}
      </div>
    @endif
{{-- messaggio di successo --}}
    @if (session('success'))
    <div class="alert alert-success" role="alert">
        {{session('success')}}
      </div>
    @endif

    <div class="my-4">
        <form action="{{route('admin.Project.store')}}" method="POST" class="d-flex">
            @csrf
            <input class="form-control me-2" type="search" placeholder="Nuovo progetto" name="name">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">invia</button>
        </form>
    </div>
    <table class="table crud-table">
        <thead>
          <tr>
            <th scope="col">progetti</th>
            <th scope="col">nomi</th>
          </tr>
        </thead>
        <tbody>
            @foreach ( $projects as $category )

            <tr>
                <td>
                    <form action="{{route('admin.Project.update', $category)}}"
                    method="POST"
                    id="form-edit-{{$category->id}}"
                    >
                        @csrf
                        @method('PUT')
                        <input type="text" value="{{$category->title}}">
                    </form>
                </td>
                <td>
                    <button
                    class="btn btn-warning"
                    onclick="submitForm({{$category->id}})"
                    ><i class="fa-solid fa-pen"></i> </button>
                    <button class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                </td>
            </tr>
            @endforeach
        </tbody>
      </table>

      <script>
        function submitForm(id){
            // console.log(id);
            const form = document.getElementById(`form-editid-${id}`);
            form.submit();
        }
      </script>

@endsection
