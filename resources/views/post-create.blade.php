<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@400..800&display=swap" rel="stylesheet">
    <title>LARAVEL CRUD </title>
</head>
<style>
    body {
        font-family: 'Baloo 2', cursive;
    }
</style>

<body>
    <section>
        <div class="container py-5">
            <div class="row">
                <div class="col-md-5">

                    @if (session()->has('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                    @endif
                    <div class="card p-3">
                        <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <h2>Add Post</h2>

                            <div class="mb-3">
                                <label for="title">Title</label>
                                <input type="text" name="title" class="form-control" id="title"
                                    value="{{ old('title') }}">
                                @error('title')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="image">Image</label>
                                <input type="file" name="image" class="form-control" id="image">

                                @error('image')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="body">Body</label>
                                <textarea name="body" class="form-control" id="body" rows="5" cols="30">
                                    {{ old('body') }}</textarea>

                                @error('body')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>

                </div>
                <div class="col-md-7">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Image</th>
                                <th scope="col">Body</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                                <tr>
                                    <th scope="row">{{ $post->id }}</th>
                                    <td>{{ $post->title }}</td>
                                    <?php
                                    $imagePath = public_path('uploads/images/' . $post->image);
                                    $imageExists = file_exists($imagePath);
                                    // $defaultImage = asset('uploads/images/default.png');
                                    ?>
                                    <td>
                                        <img class="img-fluid" width="100px"
                                            src="{{ !$imageExists ? asset('uploads/default.png') : asset('uploads/images/' . $post->image) }}"
                                            {{-- src="{{ $imageExists ? asset('uploads/images/'.$post->image) : asset('uploads/default.png') }}"  --}} alt="">
                                    </td>
                                    <td>{{ Str::limit($post->body, 150, '...') }}</td>

                                    {{-- <td>Edit</td> --}}
                                    <td><a href="{{ route('post.edit', $post->id) }}"
                                            class="btn btn-warning">Editer</a></td>
                                    {{-- <td>Delete</td> --}}
                                    <td>
                                        <form action="{{ route('post.destroy', $post->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Supprimer</button>
                                        </form>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
</body>

</html>
