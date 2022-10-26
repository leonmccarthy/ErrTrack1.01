<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Tester | Report Error </title>
  
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
          <div class="row flex-grow">
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Report Error</h4>
                  <p class="card-description">
                    Please fill in the details below
                  </p>
                  <form class="forms-sample" action="{{ url('/report-error-action') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                      <label for="error_name">Error Title</label>
                      <input type="text" class="form-control rounded-pill" name="error_name" id="error_name" placeholder="Enter error title" required>
                    </div>
                    <div class="form-group">
                      <label for="error_description">Error Description</label>
                      <textarea class="form-control rounded-pill" name="error_description" id="error_description" rows="4" placeholder="Describe the error" required></textarea>
                    </div>
                    <div class="form-group">
                      <label for="error_steps">Error Steps</label>
                      <input type="text" class="form-control rounded-pill" name="error_steps" id="error_steps" placeholder="Enter the steps taken to reach the error" required>
                    </div>
                    <button type="submit" class="btn btn-outline-primary me-2 btn-rounded">Submit</button>
                    <a class="btn btn-outline-danger btn-rounded" href="{{ url("/redirect") }}">Cancel</a>
                  </form>
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
