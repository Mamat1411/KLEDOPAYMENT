@extends('layout/main')
@section('title', 'Payment Data Edit Form')

@section('container')
<div class="container">
    <div class="column">
        <div class="row">
            <h1 class="my-3">Payment Data Edit Form</h1>
        </div>
    </div>

    <form action="/payment/{{ $payment -> id }}" method="post" class="col-md-8">
        @method('patch')
        @csrf
        <table class="table table-light table-borderless">
                <tbody>
                <tr>
                    <td>
                    <label for="customer_id">Customer ID</label>
                    </td>
                    <td>
                    <input type="text" class="form-control @error('customer_id') is-invalid @enderror" name="customer_id" id="customer_id" placeholder="Insert The Customer ID" value="{{ $payment -> customer_id }}">
                        @error('customer_id')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror                        
                    </td>
                </tr>
                <tr>
                    <td>
                    <label for="payment_name">Payment Name</label>
                    </td>
                    <td>
                        <input type="text" class="form-control @error('payment_name') is-invalid @enderror" name="payment_name" id="payment_name" placeholder="Insert The Payment Name" value="{{ $payment -> payment_name }}">
                        @error('payment_name')
                            <div class="invalid-feedback">{{$message}}</div>                            
                        @enderror
                    </td>
                </tr>
                </tbody>
        </table>
        <button type="submit" class="btn btn-primary">Save</button>
        <button class="btn btn-secondary" type="reset">Reset</button>
        <a href="/payment" class="btn btn-warning">Back</a>
    </form>
</div>
@endsection