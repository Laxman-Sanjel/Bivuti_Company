@include('Userlayout.admin_header')

<!DOCTYPE html>
<html>
<head>
    <title>Companies</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container mt-4">
        <h2>Companies List</h2>

        @if(session('status'))
            <h6 class="alert alert-success">{{ session('status') }}</h6>
        @endif

        <div class="text-right mb-3">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#companyModal">
                Create New Company
            </button>
        </div>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>logo</th>
                    <th>Website</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($result as $company)
                    <tr>
                        <td>{{ $company->name }}</td>
                        <td>{{ $company->logo }}</td>
                        <td>{{ $company->website }}</td>
                        <td>{{ $company->email }}</td>
                        <td>
                        <a href="{{url('Edit/'.$company->id)}}"><button type="button" class="btn btn-success">
                           Edit
                           </button></a>
                            <a href="{{url('/delete_data/')}}/{{$company->id}}"><button class="btn btn-danger btn-sm">Delete</button></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-4">
        {{$result->links()}}
</div>
    </div>

    <!-- Modal for Adding a New Company -->
    <div class="modal fade" id="companyModal" tabindex="-1" role="dialog" aria-labelledby="companyModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="companyModalLabel">Add Company</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Form to Add Company -->
                    <form action="{{url('/store_form')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name"class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="website">Website</label>
                            <input type="url" name="website" id="website" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="logo">Logo (minimum 100x100)</label>
                            <input type="file" name="logo" id="logo" class="form-control">
                        </div>
                        <a href="{{url('/store_form')}}"><button type="submit" class="btn btn-primary">Submit</button></a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- update -->

</body>
</html>