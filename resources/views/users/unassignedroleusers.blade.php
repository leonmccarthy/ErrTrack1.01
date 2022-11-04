@if (Auth::user())
    @if (Auth::user()->usertype=="1")
        <section class="py-5 circle-blend circle-blend-right-feature circle-cyan" id="feature">
            <div class="bg-holder" style="background-image:url(imports/user/assets/img/illustrations/feature-bg.png);background-position:right;background-size:auto;">
            </div>
            <!--/.bg-holder-->

            <div class="container text-danger">
                <div class="row justify-content-center mb-6">
                <div class="col-lg-6 text-center mx-auto mb-3 mb-md-5 mt-4">
                    <h5 class="fw-bold fs-3 fs-lg-5 lh-sm mb-3 text-danger" >Notice</h5>
                    <p class="mb-0">Your account has been created successfully created, please wait for the Administrator to assign you a role</p>
                    <p class="mb-0">Your are seing this because your account has not been assigned a role yet</p>
                </div>
                </div>
            </div>
        </section>
    @endif
@endif
