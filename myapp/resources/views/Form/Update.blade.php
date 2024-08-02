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
        <div class="row justify-content-center align-items-center" style="height: 80vh;">
            <div class="col-md-8 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Update Company</h4>
                    </div>
                    <div class="card-body">
                        <!-- Form to Add or Update Company -->
                        <form action="{{url('Update/'.$company->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control" value="{{$company->name}}" required>
                            </div>
                            <div class="form-group">
                                <label for="website">Website</label>
                                <input type="url" name="website" id="website" class="form-control" value="{{$company->website}}">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control" value="{{$company->email}}">
                            </div>
                            <div class="form-group">
                                <label for="logo">Logo (minimum 100x100)</label>
                                <input type="file" name="logo" id="logo" class="form-control">
                            </div>
                            <a href="{{url('Update/'.$company->id)}}"><button type="submit" class="btn btn-primary">Submit</button></a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
