@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Creaet a new Thread</div>

                <div class="card-body">
                    <form action="/threads" method="POST">
                        {{csrf_field()}}
                        <div class="form-group">
                            <input type="text" class="form-control" name="title">
                        </div>
                        <div class="form-group">
                            <textarea name="body" id="" cols="30" rows="5" class="form-control"></textarea>
                        </div>
                        <button type="submit" class="btn btn-default">Publish</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
