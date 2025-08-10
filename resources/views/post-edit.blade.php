<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LARAVEL CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@400..800&display=swap" rel="stylesheet">
</head>
<style>
    body {
        font-family: 'Baloo 2', cursive;
    }
</style>

<body>
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="card p-3">
                        <h2>Edit {{ $post->title }}</h2>
                        <form action="{{ route('post.update', $post->id) }}" method="POST"
                            enctype="multipart/form-data">

                            @csrf

                            @method('PUT')

                            <div class="mb-3">
                                <label for="title">Title</label>
                                <input type="text" name="title" class="form-control" id="title"
                                    value="{{ $post->title }}">
                                @error('title')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="">Image</label>
                                <input type="file" name="image" class="form-control" id="">
                                <?php
                                $imagePath = public_path('uploads/images/' . $post->image);
                                $imageExists = file_exists($imagePath);
                                ?>
                                <img width="300px" src="{{ asset('uploads/images/' . $post->image) }}" alt="">
                                @error('image')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                            </div>

                            <div class="mb-3">
                                <label for="body">Body</label>
                                <textarea name="body" class="form-control" id="body" rows="5" cols="30">
                                    {{ $post->body }}</textarea>
                                @error('body')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>


                        </form>
                        {{-- <div class="d-flex align-items-center mb-3">
                            <img class="rounded-circle" src="https://i.pravatar.cc?u={{ $post->id }}" alt="Avatar" width="40" height="40">
                            <div class="ms-3">
                                <h6 class="mb-0"></h6>
                                <small>{{ $post->created_at->diffForHumans() }}</small>
                            </div>
                        </div>
                        <p class="mb-0">{{ $post->body }}</p> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
