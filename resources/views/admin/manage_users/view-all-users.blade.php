<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Admin | Manage Users</title>
  
  {{-- STYLESHEET --}}
  @include('admin.admin-stylesheet')
</head>
<body>
  <div class="container-scroller">
    
    {{-- TOP NAVBAR --}}
    @include('admin.admin-topnavbar')
    <!-- partial -->

    {{-- CENTER BODY --}}
    <div class="container-fluid page-body-wrapper">
      
      {{-- THEME SETTING --}}
      @include('admin.admin-themesetting')
      <!-- partial -->

      {{-- SIDEBAR --}}
      @include('admin.admin-sidebar')
      <!-- partial -->

      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">User Table</h4>
                    <p class="card-description">
                      Table for <code>all users in the application</code>
                    </p>
                    @if (session('message'))
                      <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('message') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">X</button>
                      </div>
                    @endif
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Action 1</th>
                            <th>Action 2</th>
                            <th>Action 3</th>
                            <th>Action 4</th>
                            <th>Account Creation Date</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($allUsers as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>

                                  {{-- TO DETERMINE THE BADGE COLOR FOR ROLE --}}
                                    @if ($user->usertype=='0')
                                        <label class="badge badge-primary">Tester</label>
                                    @elseif($user->usertype=='49')
                                        <label class="badge badge-success">Developer</label>
                                    @elseif($user->usertype=='99')
                                        <label class="badge badge-warning">Admin</label>
                                    @elseif($user->usertype=='1')
                                        <label class="badge badge-info">Unassigned Role</label>
                                    @endif
                                </td>

                                {{-- TO DETERMINE IF THE BUTTON IS TO BE DISABLED OR NOT DEPENDING ON ROLE --}}
                                {{-- TESTER --}}
                                @if ($user->usertype=='0' || $user->usertype=='99')
                                  <td><p class="btn btn-rounded btn-secondary">Make Tester</p></td>
                                @else
                                  <form action="{{ url('/make-tester', $user->id) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <td><input type="submit" class="btn btn-rounded btn-outline-primary" value="Make Tester"/></td>
                                  </form>
                                @endif

                                {{-- DEVELOPER --}}
                                @if ($user->usertype=='49' || $user->usertype=='99')
                                  <td><p class="btn btn-rounded btn-secondary ">Make Developer</p></td>
                                @else
                                  <form action="{{ url('/make-developer', $user->id) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <td><input type="submit" class="btn btn-rounded btn-outline-success" value="Make Developer"/></td>
                                  </form>
                                  
                                @endif

                                {{-- ADMIN --}}
                                @if ($user->usertype=='99')
                                  <td><p class="btn btn-rounded btn-secondary">Make Admin</p></td>
                                @else
                                  <form action="{{ url('/make-admin', $user->id) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <td><input type="submit" class="btn btn-rounded btn-outline-warning" value="Make Admin"></td>
                                  </form>
                                @endif

                                {{-- DELETING USER --}}
                                @if ($user->usertype=='99')
                                  <td><p class="btn btn-rounded btn-secondary ">Delete</p></td>
                                @else
                                  <td><a href="{{ url('/delete-user', $user->id) }}" class="btn btn-rounded btn-danger">Delete</a></td>
                                @endif

                                <td>{{ $user->created_at }}</td>
                              </tr>
                            @endforeach
                          
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
          </div>
        </div>
        <!-- content-wrapper ends -->

        {{-- FOOTER --}}
        @include('admin.admin-footer')
        <!-- partial -->

      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  {{--  SCRIPTS --}}
  @include('admin.admin-scripts')
  <!-- End custom js for this page-->
</body>

</html>