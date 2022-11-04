<section class="pb-0" container container-lg-fluid container-xl="container container-lg-fluid container-xl">

    <div class="container">
      <div class="bg-holder" style="background-image:url(imports/user/assets/img/illustrations/team-bg.png);background-position:left top;background-size:auto;">
      </div>
      <!--/.bg-holder-->

      <div class="row justify-content-center mb-6">
        <div class="col-lg-6 text-center mx-auto mb-7">
          <h5 class="fw-bold fs-3 fs-lg-5 lh-sm mb-3">Our Team</h5>
          <p class="mb-0">People from various origins, cultures, and personalities make up our team. This blend makes it a powerful team</p>
        </div>
        <div class="col-xxl-9">
          <div class="row flex-center g-0">
            @foreach ($admin as $admin)
              <div class="col-sm-6 col-lg-3 text-center">
                <div class="wrapper shadow-square-right"><img class="team-card-1" src="imports/user/assets/img/gallery/john.png" width="200" alt="..." /></div>
                <h5 class="text-800 fw-bold mt-4 mb-1">{{ $admin->name }}</h5>
                <p>Administrator</p>
              </div>
            @endforeach
            @foreach ($developer as $developer)
              <div class="col-sm-6 col-lg-3 text-center">
                <div class="wrapper shadow-square-right"><img class="team-card-1" src="imports/user/assets/img/gallery/john.png" width="200" alt="..." /></div>
                <h5 class="text-800 fw-bold mt-4 mb-1">{{ $developer->name }}</h5>
                <p>Developer</p>
              </div>
            @endforeach
            @foreach ($tester as $tester)
              <div class="col-sm-6 col-lg-3 text-center">
                <div class="wrapper shadow-square-right"><img class="team-card-1" src="{{ $tester->my_photo }}" width="200" height="305" alt="..." /></div>
                <h5 class="text-800 fw-bold mt-4 mb-1">{{ $tester->name }}</h5>
                <p>Tester</p>
              </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
    <!-- end of .container-->

  </section>