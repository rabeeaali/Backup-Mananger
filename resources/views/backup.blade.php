<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
        </div>
    </nav>

    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        {{ __('Backup Page') }} 
                        <a href="{{ route('backup.create') }}" class="btn btn-success">Create New Backup <i class="fas fa-plus"></i></a>
                    </div>
                    <div class="card-body">
                        @if ($backups != null)
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Backup</th>
                                    <th scope="col">Size</th>
                                    <th scope="col">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($backups as $index => $backup)
                                        <tr>
                                            <td>{{  $index+1 }}</td>
                                            <td>{{ $backup['file_name'] }}</td>
                                            <td>{{ Convert::bytesToHuman($backup['file_size'])  }}</td>
                                            <td>
                                                <a href="{{ Storage::disk('backups')->url($backup['file_name']) }}" download="{{ $backup['file_name'] }}" class="btn btn-primary btn-sm">Download <i class="fas fa-download" aria-hidden="true"></i> </a>
                                                <a href="{{ route('backup.delete',$backup['file_name']) }}" class="btn btn-danger btn-sm">Delete <i class="fas fa-trash" aria-hidden="true"></i> </a>
                                            </td>
                                        </tr>
                                    @endforeach 
                                </tbody>
                            </table>
                        @else
                            <p class="text-center mb-0 text-capitalize">There is no backup right now</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.8.1/js/all.js"></script>
  </body>
</html>