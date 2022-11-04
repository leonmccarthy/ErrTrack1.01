<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Admin | Assigned Errors </title>
  
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
                    <h4 class="card-title">Assigned Error Table</h4>
                    <p class="card-description">
                      Table for <code>all errors assigned to a developer.</code>
                    </p>
                    @if (session('message'))
                      <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('message') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">X</button>
                      </div>
                    @elseif (session('error'))
                      <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">X</button>
                      </div>
                    @endif
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th>Project Name</th>
                            <th>Error Description</th>
                            <th>Error Steps</th>
                            <th>Error Reporter</th>
                            <th>Developer Assigned</th>
                            <th>Error Assigner</th>
                            <th>Priority</th>
                            <th>Percentage Completed</th>
                            <th>Assigned Date</th>
                            <th>Action 1</th>
                            <th>Action 2</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($allAssignedErrors as $error)
                            <tr>
                                <td>{{ $error->project_name }}</td>
                                <td>{{ $error->error_description }}</td>
                                <td>{{ $error->error_steps }}</td>
                                <td>{{ $error->error_reporter }}</td>
                                <td>{{ $error->error_dev_assigned }}</td>
                                <td>{{ $error->error_assigner }}</td>
                                @if ($error->error_priority==="1")
                                  <td><label class="badge badge-danger">High</label></td>
                                @elseif($error->error_priority==="2")
                                  <td><label class="badge badge-success">Medium</label></td>
                                @else
                                  <td><label class="badge badge-primary">Low</label></td>
                                @endif
                                <td>{{ round(($error->error_steps_done/$error->error_steps_to_complete)*100) }}%</td>
                                <td>{{ $error->created_at }}</td>
                                <td><a class="btn btn-rounded btn-outline-info" href="{{ url('/edit-assigned-error', $error->id) }}">Edit</a></td>
                                <td><a class="btn btn-rounded btn-outline-danger" href="{{ url('/delete-assigned-error', $error->id) }}">Delete</a></td>
                                

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