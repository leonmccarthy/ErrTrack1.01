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

            @if (session('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  {{ session('message') }}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">X</button>
                </div>
            @endif

        <div class="container">
          <div class="row align-items-center">
            <div class="col-md-7 col-lg-6 py-6 text-sm-start text-center">
              <h1 class="fw-bold display-4 fs-4 fs-lg-6 fs-xxl-7 text-gradient"> ErrTrack</h1>
              <h1 class="text-700">crafted by <span class="fw-bold">McTech</span></h1>
              <p class="mb-5 fs-0">ErrTrack is a system brought to you by McTech  <br class="d-none d-lg-block" />It enables  identification, monitoring, and reporting of errors in software projects</p>
              
            </div>
          </div>
        </div>
      </section>

      <!-- ============================================-->

      {{-- FEATURES --}}
      @include('users.unassignedroleusers')


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