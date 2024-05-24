@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Ajouter une image</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('images.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="name" class="text-black">alt</label>
                            <input id="alt" type="text" class="form-control @error('alt') is-invalid @enderror" name="alt" value="{{ old('alt') }}" autocomplete="caption" autofocus>
                            
                            @error('alt')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <input type="radio" name="format" id="paysage" value="0" checked class="me-2">
                            <label for="paysage">paysage</label>
                        </div>
                        <div class="mb-3">
                            <input type="radio" name="format" id="portrait" value="1" class="me-2">
                            <label for="portrait">portrait</label>
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label text-black">Ajouter une image</label>
                            <input class="form-control  @error('image') is-invalid @enderror" type="file" name="image" id="formFile">

                            @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
    
                        <button type="submit" class="btn btn-primary">
                           Ajouter image
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection