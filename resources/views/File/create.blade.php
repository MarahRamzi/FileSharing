<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Upload File</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="d-flex h-100 text-center text-bg-dark" data-new-gr-c-s-check-loaded="14.1117.0" data-gr-ext-installed="">


<div class="container d-flex w-100 h-100 p-3 mx-3 my-3 ">
  <header class="mb-auto">
    <div>
      <nav class="nav nav-masthead justify-content-start float-md-end">
        <a class="nav-link fw-bold py-1 px-3 mx-5 active btn btn-primary" aria-current="page" href="#">Home</a>
        <a class="nav-link fw-bold py-1 px-3" href="#">Features</a>
        <a class="nav-link fw-bold py-1 px-3" href="#">Contact</a>
      </nav>
    </div>
  </header>

  <main class="px-3">
    @if(session()->has('error'))

    <div class="alert alert-error m-5">
        {{ session('error') }}
      </div>

    @endif
    <div class="container my-5 py-3">
        <h2 class="mb-5"> Upload File</h2>
        <form action="" method="post" enctype="multipart/form-data">
            @csrf
          <div class="form-group">
            <label for="File">Choose File:</label>
            <input type="file" @class(['form-control-file' , 'is-invalid'=>$errors->has('name')]) id="File" name="File">
          @error('File')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
          @enderror
        </div>
          <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" @class(['form-control ' , 'is-invalid' => $errors->has('email')])id="email" name="email" required>
            @error('email')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
          <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" @class(['form-control ' , 'is-invalid' => $errors->has('title')]) id="title" name="title" required>
            @error('title')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
          <div class="form-group">
            <label for="message">Message:</label>
            <textarea @class(['form-control ' , 'is-invalid' => $errors->has('message')]) id="message" name="message" rows="4" required></textarea>
            @error('title')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

          <button type="submit" class="btn btn-primary">Upload</button>
        </form>
      </div>

  </main>
{{--
  <footer class="bg-light py-4 mt-5">
    <div class="container text-center">
      <p>&copy; 2023 Your Company. All rights reserved.</p>
    </div>
  </footer> --}}
</div>
<script src="/docs/5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>


  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
