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
            <a class="nav-link" data-bs-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="manage-users">
              <i class="menu-icon mdi mdi-account-multiple "></i>
              <span class="menu-title">Manage Users</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="charts">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ url('/view-all-users') }}">View All Users</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="manage-errors">
              <i class="menu-icon  mdi mdi-biohazard"></i>
              <span class="menu-title">Manage Errors</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="tables">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ url('/view-all-reported-errors') }}">View Reported Errors</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ url('/view-all-assigned-errors') }}">View Assigned Errors</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#messages" aria-expanded="false" aria-controls="manage-messages">
              <i class="menu-icon   mdi mdi-email"></i>
              <span class="menu-title">Manage Messages</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="messages">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ url('/view-contact-us-messages') }}">View Contact Us Messages</a></li>
              </ul>
            </div>
          </li>
        </ul>
      </nav>