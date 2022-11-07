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
            @foreach ($contactMessages as $contact)
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card text-center">
                <div class="card-header text-muted">Contact Us Message</div>
                  <div class="card-body">
                    <h5 class="card-title mb-2">Name</h5>
                    <p class="card-text">{{ $contact->name }}</p>
                    <h5 class="card-title mt-2 mb-2">Email</h5>
                    <p class="card-text">{{ $contact->email }}</p>
                    <h5 class="card-title mt-2 mb-2">Message</h5>
                    <p class="card-text">{{ $contact->message }}</p> 
                  </div>
                  <div class="card-footer text-muted">
                    Sent Date: {{ $contact->created_at }}
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