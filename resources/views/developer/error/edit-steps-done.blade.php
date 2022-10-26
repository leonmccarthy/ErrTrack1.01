<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Edit Assigned Error </title>
  
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
          <div class="row flex-grow">
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Edit Assigned Error</h4>
                  <p class="card-description">
                    Please fill in the details below
                  </p>
                  <form class="forms-sample" action="{{ url('/edit-steps-done-action', $assignedErrorToBeEdited->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="form-group">
                        <label for="error_name">Error Title</label>
                        <input type="text" class="form-control rounded-pill" name="error_name" id="error_name" value="{{  $assignedErrorToBeEdited->error_name }}" required disabled>
                      </div>
                      <div class="form-group">
                        <label for="error_description">Error Description</label>
                        <textarea class="form-control rounded-pill" name="error_description" id="error_description" rows="4" required disabled>{{ $assignedErrorToBeEdited->error_description }}</textarea>
                      </div>
                      <div class="form-group">
                        <label for="error_steps">Error Steps</label>
                        <input type="text" class="form-control rounded-pill" name="error_steps" id="error_steps" value="{{ $assignedErrorToBeEdited->error_steps }}" required disabled>
                      </div>
                      <div class="form-group">
                          <label for="error_reporter">Error Reporter</label>
                          <input type="text" class="form-control rounded-pill" name="error_steps" id="error_steps" value="{{ $assignedErrorToBeEdited->error_reporter }}" required disabled>
                        </div>
                        <div class="form-group">
                          <label for="error_priority">Error Priority</label>
                                @if ($assignedErrorToBeEdited->error_priority==="1")
                                    <input type="text" class="form-control rounded-pill" name="error_priority" id="error_priority" value="High" required disabled>
                                @elseif($assignedErrorToBeEdited->error_priority==="2")
                                    <input type="text" class="form-control rounded-pill" name="error_priority" id="error_priority" value="Medium" required disabled>
                                @else
                                    <input type="text" class="form-control rounded-pill" name="error_priority" id="error_priority" value="Low" required disabled>
                                @endif
                        </div>
                        <div class="form-group">
                            <label for="error_dev_assigned">Developer Assigned</label>
                            <input type="text" class="form-control rounded-pill" name="error_dev_assigned" id="error_dev_assigned" value="{{ $assignedErrorToBeEdited->error_dev_assigned }}" required disabled>
                        </div>
                        <div class="form-group">
                            <label for="error_steps_done">Steps Done To Rectify Error</label>
                            <input type="number" class="form-control rounded-pill" name="error_steps_done" id="error_steps_done" max="{{ $assignedErrorToBeEdited->error_steps_to_complete }}" min="0" required >
                        </div>
                        <div class="form-group">
                            <label for="error_steps_to_complete">Total Steps Required To Rectify Error</label>
                            <input type="number" class="form-control rounded-pill" name="error_steps_to_complete" id="error_steps_to_complete" value="{{ $assignedErrorToBeEdited->error_steps_to_complete }}" required disabled>
                        </div>
                      <button type="submit" class="btn btn-outline-primary me-2 btn-rounded">Submit</button>
                      <a class="btn btn-outline-danger btn-rounded" href="{{ url('/view-my-errors') }}">Cancel</a>
                    
                  </form>
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