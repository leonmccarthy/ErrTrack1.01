<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>ErrTrack | Admin </title>
  
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
          
          {{-- REPORTED ERRORS --}}
          <div class="row">
            @foreach ($allReportedErrors as $error)
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card text-center">
                <div class="card-header text-muted">Reported Error</div>
                  <div class="card-body">
                    <h5 class="card-title mb-2">Error title</h5>
                    <p class="card-text">{{ $error->error_name }}</p>
                    <h5 class="card-title mt-2 mb-2">Error description</h5>
                    <p class="card-text">{{ $error->error_description }}</p>
                    <h5 class="card-title mt-2 mb-2">Error Steps</h5>
                    <p class="card-text">{{ $error->error_steps }}</p>
                    <h5 class="card-title mt-2 mb-2">Reported by</h5>
                    <p class="card-text">{{ $error->error_reporter }}</p>
                    <h5 class="card-title mt-2 mb-2">Assignment Status</h5>
                    {{-- TO DETERMINE THE BADGE COLOR FOR ASSIGNMENT STATUS --}}
                    @if ($error->assignment_status=='0')
                      <label class="badge badge-danger">Not Assigned</label>
                    @else
                      <label class="badge badge-success">Assigned</label>
                    @endif
                    
                    <p></p>
                    <a href="{{ url('/view-all-reported-errors') }}" class="btn btn-primary mt-2">View in Table</a>
                  </div>
                  <div class="card-footer text-muted">
                    Report Date: {{ $error->created_at }}
                  </div>
                </div>
              </div>
            @endforeach
          </div>

          {{-- ASSIGNED ERRORS --}}
          <div class="row">
            @foreach ($allAssignedErrors as $error)
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card text-center">
                <div class="card-header text-muted">Assigned Error</div>
                  <div class="card-body">
                    <h5 class="card-title mb-2">Error title</h5>
                    <p class="card-text">{{ $error->error_name }}</p>
                    <h5 class="card-title mt-1 mb-2">Error description</h5>
                    <p class="card-text">{{ $error->error_description }}</p>
                    <h5 class="card-title mt-1 mb-2">Error Steps</h5>
                    <p class="card-text">{{ $error->error_steps }}</p>
                    <h5 class="card-title mt-1 mb-2">Reported by</h5>
                    <p class="card-text">{{ $error->error_reporter }}</p>
                    <h5 class="card-title mt-1 mb-2">Developer Assigned</h5>
                    <p class="card-text">{{ $error->error_dev_assigned }}</p>
                    <h5 class="card-title mt-1 mb-2">Error Assigner</h5>
                    <p class="card-text">{{ $error->error_assigner }}</p>
                    <h5 class="card-title mt-1 mb-2">Priority</h5>
                    @if ($error->error_priority==="1")
                      <label class="badge badge-danger">High</label>
                    @elseif($error->error_priority==="2")
                      <label class="badge badge-warning">Medium</label>
                    @else
                      <label class="badge badge-success">Low</label>
                    @endif
                    
                    <h5 class="card-title mt-1 mb-2">Completion Status</h5>
                    <div class="progress" style="height: 20px;">
                      <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: {{ round(($error->error_steps_done/$error->error_steps_to_complete)*100) }}%" aria-valuenow="{{ round(($error->error_steps_done/$error->error_steps_to_complete)*100) }}%" aria-valuemin="0" aria-valuemax="100">{{ round(($error->error_steps_done/$error->error_steps_to_complete)*100) }}%</div>
                    </div>

                    <p></p>
                    <a href="{{ url('/view-all-assigned-errors') }}" class="btn btn-primary mt-2">View in Table</a>
                  </div>
                  <div class="card-footer text-muted">
                    Assigned Date: {{ $error->created_at }}
                  </div>
                </div>
              </div>
            @endforeach
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

