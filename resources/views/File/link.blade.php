<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Upload File</title>
</head>
<body>
    <header class="mb-auto my-5">
        <div>
          <nav class="nav nav-masthead justify-content-start float-md-end">
            <a class="nav-link fw-bold py-1 px-3 mx-5 active btn btn-primary" aria-current="page" href="#">Home</a>
            <a class="nav-link fw-bold py-1 px-3" href="#">Features</a>
            <a class="nav-link fw-bold py-1 px-3" href="#">Contact</a>
          </nav>
        </div>
      </header>

      <main>
    @if(session()->has('success'))

    <div class="alert alert-success m-5">
        {{ session('success') }}
      </div>

    @endif

    <div style="text-align: center;">
        <h1>Download Link</h1>
        <img src="{{ asset('image/goodJob.jpg') }}" alt="Good Job">
        <p>You did a great job!</p>
        <p>Click the link below to download your reward:</p>
        @if(isset($filelink))
        <a href="{{ route('files.download') }}">{{$filelink}}</a>
        @endif
    </div>
</main>
<script src="/docs/5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

</body>
</html>
