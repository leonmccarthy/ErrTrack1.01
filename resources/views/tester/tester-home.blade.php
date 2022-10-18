<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>ErrTrack | Tester </title>
  
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

