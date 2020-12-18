@extends('layout/main')
@section('title', 'Kledo Payment')
    
@section('container')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1 class="mt-3">KLEDO PAYMENT</h1>

                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif                

                <a href="/payment/create" class="btn btn-primary my-3">Insert New Payment Data</a>
                

                <table class="table table-striped table-hover table-responsive">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">                                
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Select All
                                </label>
                            </th>
                            <th scope="col">ID</th>
                            <th scope="col">Customer ID</th>
                            <th scope="col">Payment Name</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($payment as $py)
                                <tr>
                                    <td>
                                        <input class="form-check-input" type="checkbox" value="{{ $py->id }}" id="flexCheckDefault" name="payment[]">
                                    </td>
                                    <td scope="row">{{ $py -> id }}</td>
                                    <td>{{ $py -> customer_id }}</td>
                                    <td>{{ $py -> payment_name }}</td>
                                    <td>
                                        <a class="btn btn-success" href="/payment/{{$py -> id}}/edit">Edit</a>
                
                                        <form action="/payment/{{ $py -> id }}" method="POST" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>                                
                                @endforeach
                            </tbody>
                        </table>
                        {{-- <form action="/payment/{{ $payment->id }}" method="POST">
                            @method('deleteAll')
                            @csrf
                            <input type="hidden" name="_method" value="delete">
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form> --}}
            </div>
        </div>
    </div>
@endsection