<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Tester | Reported Errors </title>
  
  {{-- STYLESHEET --}}
  @include('tester.tester-stylesheet')
</head>
<body>
  <div class="container-scroller">
    
    {{-- TOP NAVBAR --}}
    @include('tester.tester-topnavbar')
    <!-- partial -->

    {{-- CENTER BODY --}}
    <div class="container-fluid page-body-wrapper">
      
      {{-- THEME SETTING --}}
      @include('tester.tester-themesetting')
      <!-- partial -->

      {{-- SIDEBAR --}}
      @include('tester.tester-sidebar')
      <!-- partial -->

      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Reported Error Table</h4>
                    <p class="card-description">
                      Table for <code>all errors reported and have not been assigned to a developer.</code>
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
                            <th>Error Title</th>
                            <th>Error Description</th>
                            <th>Error Steps</th>
                            <th>Error Reporter</th>
                            <th>Report Date</th>
                            <th>Assignment status</th>

                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($allReportedErrors as $error)
                            <tr>
                                <td>{{ $error->error_name }}</td>
                                <td>{{ $error->error_description }}</td>
                                <td>{{ $error->error_steps }}</td>
                                <td>{{ $error->error_reporter }}</td>
                                <td>{{ $error->created_at }}</td>
                                <td>

                                    {{-- TO DETERMINE THE BADGE COLOR FOR ASSIGNMENT STATUS --}}
                                      @if ($error->assignment_status=='0')
                                          <label class="badge badge-danger">Not Assigned</label>
                                      @else
                                          <label class="badge badge-success">Assigned</label>
                                      
                                      @endif                             
                                
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
        @include('tester.tester-footer')
        <!-- partial -->

      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  {{--  SCRIPTS --}}
  @include('tester.tester-scripts')
  <!-- End custom js for this page-->
</body>

</html>