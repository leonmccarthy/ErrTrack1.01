<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>ErrTrack | Developer </title>
  
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

