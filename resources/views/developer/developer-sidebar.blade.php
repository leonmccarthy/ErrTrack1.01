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
            <a class="nav-link" data-bs-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="manage-developers">
              <i class="menu-icon  mdi mdi-biohazard "></i>
              <span class="menu-title">Manage Errors</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="charts">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ url('/view-my-errors') }}">My Assigned Errors</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ url('/dev-view-all-assigned-errors') }}">All Assigned Errors</a></li>
              </ul>
            </div>
          </li>
        </ul>
      </nav>