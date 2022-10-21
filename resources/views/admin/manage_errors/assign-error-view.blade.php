<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Assign Error </title>
  
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
          <div class="row flex-grow">
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Assign Error</h4>
                  <p class="card-description">
                    Please fill in the details below
                  </p>
                  <form class="forms-sample" action="{{ url('/assignerroraction', $errorToBeAssigned->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="form-group">
                        <label for="error_name">Error Title</label>
                        <input type="text" class="form-control rounded-pill" name="error_name" id="error_name" value="{{  $errorToBeAssigned->error_name }}" required disabled>
                      </div>
                      <div class="form-group">
                        <label for="error_description">Error Description</label>
                        <textarea class="form-control rounded-pill" name="error_description" id="error_description" rows="4" required disabled>{{ $errorToBeAssigned->error_description }}</textarea>
                      </div>
                      <div class="form-group">
                        <label for="error_steps">Error Steps</label>
                        <input type="text" class="form-control rounded-pill" name="error_steps" id="error_steps" value="{{ $errorToBeAssigned->error_steps }}" required disabled>
                      </div>
                      <div class="form-group">
                          <label for="error_reporter">Error Reporter</label>
                          <input type="text" class="form-control rounded-pill" name="error_steps" id="error_steps" value="{{ $errorToBeAssigned->error_reporter }}" required disabled>
                        </div>
                        <div class="form-group">
                          <label for="error_priority">Error Priority</label>
                            <select class="form-control rounded-pill" name="error_priority" id="error_priority" required>
                                <option value="1">High</option>
                                <option value="2" selected>Medium</option>
                                <option value="3">Low</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="error_dev_assigned">Developer To Assign</label>
                            <select class="form-control rounded-pill" name="error_dev_assigned" id="error_dev_assigned" required>
                              @foreach ($developer as $developer)
                                  <option value="{{ $developer->email }}">{{ $developer->email }}</option>
                              @endforeach
                              </select>
                          </div>
                      <button type="submit" class="btn btn-outline-primary me-2 btn-rounded">Submit</button>
                      <button class="btn btn-outline-danger btn-rounded">Cancel</button>
                    
                  </form>
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