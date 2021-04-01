  <!-- partial:partials/_sidebar.html -->
  <div class="sidebar">
      <div class="user-profile">
          <div class="display-avatar animated-avatar">
              <img class="profile-img img-xl rounded-circle" src="../<?php echo $_SESSION['user']['profile_pic']; ?>" loading="lazy" alt="profile image">
          </div>
          <div class="info-wrapper">
              <p class="user-name"><?php echo $_SESSION['user']['name']; ?></p>
              <h6 class="display-income"><?php echo $_SESSION['user']['member_type']; ?></h6>
          </div>
      </div>
      <ul class="navigation-menu">
          <li class="nav-category-divider">Master's</li>

          <li>
              <a href="dashboard">
                  <span class="link-title">Dashboard</span>
                  <i class="mdi mdi-gauge link-icon"></i>
              </a>
          </li>
          <li>
              <a href="#staff-pages" data-toggle="collapse" aria-expanded="false">
                  <span class="link-title">Staff</span>
                  <i class="mdi mdi-account link-icon"></i>
              </a>
              <ul class="collapse navigation-submenu" id="staff-pages">
                  <li>
                      <a href="teacher-add">New Teacher</a>
                  </li>
                  <li>
                      <a href="teacher-view">Show Teacher</a>
                  </li>
              </ul>
          </li>
          <li>
              <a href="#ui-catogery" data-toggle="collapse" aria-expanded="false">
                  <span class="link-title">Catogery</span>
                  <i class="mdi mdi-book-multiple-variant link-icon"></i>
              </a>
              <ul class="collapse navigation-submenu" id="ui-catogery">
                  <li>
                      <a href="category-add">Add Category</a>
                  </li>
                  <li>
                      <a href="category-view">Show Category</a>
                  </li>
              </ul>
          </li>
           <li>
              <a href="#ui-course" data-toggle="collapse" aria-expanded="false">
                  <span class="link-title">Courses</span>
                  <i class="mdi mdi-book-multiple-variant link-icon"></i>
              </a>
              <ul class="collapse navigation-submenu" id="ui-course">
                  <li>
                      <a href="course-add">Add Course</a>
                  </li>
                  <li>
                      <a href="course-view">Show Course</a>
                  </li>
              </ul>
          </li>
          <li>
              <a href="#profile-pages" data-toggle="collapse" aria-expanded="false">
                  <span class="link-title">Admin Profile</span>
                  <i class="mdi mdi-account link-icon"></i>
              </a>
              <ul class="collapse navigation-submenu" id="profile-pages">
                  <li>
                      <a href="profile-view">Profile View</a>
                  </li>
                  <li>
                      <a href="profile-update">Profile Update</a>
                  </li>
              </ul>
          </li>
          <li>
              <a href="web-setting">
                  <span class="link-title">Web Setting</span>
                  <i class="mdi mdi-settings link-icon"></i>
              </a>
          </li>
          <li>
              <a href="logout">
                  <span class="logo">Logout</span>
                  <i class="mdi mdi-logout link-icon"></i>
              </a>
          </li>
      </ul>
  </div>
  <!-- partial -->
