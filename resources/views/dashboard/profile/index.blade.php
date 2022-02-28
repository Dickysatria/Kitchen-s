
@extends('dashboard.layouts.main')


@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">My Profile</h1>
  </div>

  @if(session()->has('success'))
    <div class="alert alert-success col-lg-8" role="alert">
    {{  session('success') }}
    </div>
@endif

  <div class="col-lg-8">
  <form>
    @foreach ($users as $user)
    <div class="mb-3">
        <label for="image" class="form-label">Foto Profile</label>
        <input type="hidden" name="oldImage" value="{{ $user->image }}">
        @if($user->image)
        <img src="{{ asset ('storage/'. $user->image)}}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
        @else
            <img class="img-preview img-fluid mb-3 col-sm-5">
        @endif
        <input class="form-control @error('image') is-invalid @enderror" type="file" id="image"
        name="image" onchange="previewImage()">
        @error('image')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
      </div>


    <div class="mb-3">
      <label for="name" class="form-label">Nama</label>
      <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
      name="name" required autofocus value="{{ old('name', $user->name) }}" disabled readonly>
      @error('name')
      <div class="invalid-feedback">
          {{ $message }}
      </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="username" class="form-label @error('username') is-invalid @enderror">Username</label>
      <input type="text" class="form-control" id="username" name="username" required value="{{ old('username',$user->username) }}" disabled readonly>
      @error('username')
      <div class="invalid-feedback">
          {{ $message }}
      </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="email" class="form-label @error('email') is-invalid @enderror">Email</label>
      <input type="text" class="form-control" id="email" name="email" required value="{{ old('email',$user->email) }}" disabled readonly>
      @error('email')
      <div class="invalid-feedback">
          {{ $message }}
      </div>
      @enderror
    </div>
    <button type="submit" class="btn btn-primary">Update user</button>
  </form>
  @endforeach
</div>

<script>
    const title = document.querySelector('#title');
    const slug = document.querySelector('#slug');

    title.addEventListener('change', function(){
        fetch('/dashboard/posts/checkSlug?title=' + title.value)
        .then(response => response.json())
        .then(data => slug.value = data.slug)
    });

    document.addEventListener('tric-file-accept', function(e){
        e.preventDefault();
    })

    function previewImage(){
    const image = document.querySelector('#image');
    const imgPreview = document.querySelector('.img-preview');

    imgPreview.style.display='block';

    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);

    oFReader.onload = function(oFREvent){
        imgPreview.src = oFREvent.target.result;
    }
    }
</script>

@endsection




