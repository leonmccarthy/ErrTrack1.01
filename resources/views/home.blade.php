<!DOCTYPE html>
<html lang="en-US" dir="ltr">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>ErrTrack |Error Reporting, Management &amp; Tracking</title>


    <!-- ===============================================-->
    {{-- STYLE --}}
    @include('users.style')

  </head>


  <body>

    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">

      {{-- NAVBAR --}}
      @include('users.navbar')

      <section id="home">
        <div class="bg-holder d-none d-md-block bg-size" style="background-image:url(imports/user/assets/img/illustrations/hero.png);background-position:right bottom;">
        </div>
        <!--/.bg-holder-->

        <div class="bg-holder" style="background-image:url(imports/user/assets/img/illustrations/heroheader-bg.png);background-position:center;background-size:contain;">
        </div>
        <!--/.bg-holder-->

        <div class="container">
          <div class="row align-items-center">
            <div class="col-md-7 col-lg-6 py-6 text-sm-start text-center">
              <h1 class="fw-bold display-4 fs-4 fs-lg-6 fs-xxl-7 text-gradient"> Bootstrap 5 theme</h1>
              <h1 class="text-700">crafted by <span class="fw-bold">ThemeWagon</span></h1>
              <p class="mb-5 fs-0">ThemeWagon offers an wide array of category-oriented <br class="d-none d-lg-block" />Free and Premium Bootstrap HTML Templates and Themes.</p><a class="btn hover-top btn-glow btn-klean" href="#">Check Demo</a>
            </div>
          </div>
        </div>
      </section>


      <!-- ============================================-->

      {{-- FEATURES --}}
      @include('users.features')

      <!-- ============================================-->
      {{-- COMPANY TEAM --}}
      @include('users.companyteam')
        
      <!-- ============================================-->
      {{-- CONTACT US --}}
      @include('users.contactus')

      <!-- ============================================-->
      {{-- FOOTER --}}
      @include('users.footer')
      
    </main>
    <!-- ===============================================-->
    <!--    SCRIPTS-->
    @include('users.scripts')
  </body>

</html>