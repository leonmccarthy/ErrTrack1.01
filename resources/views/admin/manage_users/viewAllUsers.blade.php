<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Star Admin2 </title>
  
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
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Account Creation Date</th>
                            <th>Role</th>
                            <th>Action 1</th>
                            <th>Action 2</th>
                            <th>Action 3</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($allUsers as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->created_at }}</td>
                                <td>
                                    @if ($user->usertype=='0')
                                        <label class="badge badge-success">Tester</label>
                                    @elseif($user->usertype=='49')
                                        <label class="badge badge-warning">Developer</label>
                                    @elseif($user->usertype=='99')
                                        <label class="badge badge-danger">Admin</label>
                                    @endif
                                </td>
                                <td>Make Developer</td>
                                <td>Make Admin</td>
                                <td>Make Normal User</td>
                                <td>Delete</td>
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