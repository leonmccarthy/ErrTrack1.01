      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="/redirect">
              <i class="mdi mdi-grid-large menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="add-developer">
              <i class="menu-icon  mdi mdi-plus"></i>
              <span class="menu-title">Report Error</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="form-elements">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="{{  url('/report-error') }}">Report Error</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="manage-developers">
              <i class="menu-icon  mdi mdi-biohazard "></i>
              <span class="menu-title">Error Report</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="charts">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ url('/view-reported-errors') }}">View Reported Errors</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ url('') }}">View Assigned Errors</a></li>
              </ul>
            </div>
          </li>
        </ul>
      </nav>