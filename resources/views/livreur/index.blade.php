@extends('societelivraison')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel 8 CRUD with Image</h2>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Ville</th>
            <th>Tel</th>
        </tr>
        @foreach ($records as $record)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $record->nom }}</td>
            <td>{{ $record->prenom }}</td>
            <td>{{ $record->ville }}</td>
            <td>{{ $record->tel }}</td>
            <td>
                <a class="btn btn-sm btn-info" href="{{ route('livreurs.show',$record->id) }}">Show</a>
                <a class="btn btn-sm btn-primary" href="{{ route('livreurs.edit',$record->id) }}">Edit</a>
                <form action="{{ route('livreurs.destroy',$record->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    {!! $records->links() !!}
@endsection