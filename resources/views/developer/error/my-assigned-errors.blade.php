<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Developer | My Assigned Errors</title>
  
  {{-- STYLESHEET --}}
  @include('developer.developer-stylesheet')
</head>
<body>
  <div class="container-scroller">
    
    {{-- TOP NAVBAR --}}
    @include('developer.developer-topnavbar')
    <!-- partial -->

    {{-- CENTER BODY --}}
    <div class="container-fluid page-body-wrapper">
      
      {{-- THEME SETTING --}}
      @include('developer.developer-themesetting')
      <!-- partial -->

      {{-- SIDEBAR --}}
      @include('developer.developer-sidebar')
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
                    @elseif(session('error'))
                      <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">X</button>
                      </div>
                    @endif
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th>Error Title</th>
                            <th>Error Description</th>
                            <th>Error Steps</th>
                            <th>Error Reporter</th>
                            <th>Developer Assigned</th>
                            <th>Error Assigner</th>
                            <th>Priority</th>
                            <th>Error Steps Done</th>
                            <th>Action 1</th>
                            <th>Total Steps To Completion</th>
                            <th>Action 2</th>
                            <th>Percentage Completed</th>
                            <th>Assigned Date</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($assignedErrors as $error)
                            <tr>
                                <td>{{ $error->error_name }}</td>
                                <td>{{ $error->error_description }}</td>
                                <td>{{ $error->error_steps }}</td>
                                <td>{{ $error->error_reporter }}</td>
                                <td>{{ $error->error_dev_assigned }}</td>
                                <td>{{ $error->error_assigner }}</td>
                                @if ($error->error_priority==="1")
                                  <td><label class="badge badge-danger">High</label></td>
                                @elseif($error->error_priority==="2")
                                  <td><label class="badge badge-warning">Medium</label></td>
                                @else
                                  <td><label class="badge badge-success">Low</label></td>
                                @endif
                                <td>{{ $error->error_steps_done }}</td>
                                <td><a class="btn btn-rounded btn-outline-info" href="{{ url('/edit-steps-done', $error->id) }}">Edit Steps Done</a></td>
                                <td>{{ $error->error_steps_to_complete }}</td>
                                <td><a class="btn btn-rounded btn-outline-primary" href="{{ url('/edit-steps-to-complete', $error->id) }}">Edit Completion Steps</a></td>
                                <td>{{ round(($error->error_steps_done/$error->error_steps_to_complete)*100) }}%</td>
                                <td>{{ $error->created_at }}</td>

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
        @include('developer.developer-footer')
        <!-- partial -->

      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  {{--  SCRIPTS --}}
  @include('developer.developer-scripts')
  <!-- End custom js for this page-->
</body>

</html>