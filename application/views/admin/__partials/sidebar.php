<aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
              <!-- User profile -->
              <div class="user-profile">
                <!-- User profile image -->
                <div class="profile-img">
                  <img src="<?php echo base_url('assets/images/users/1.jpg'); ?>" alt="user" />
                </div>
                <!-- User profile text-->
                <div class="profile-text">
                  <h5>Markarn Doe</h5>
                </div>
              </div>
              <!-- End User profile text-->
              <!-- Sidebar navigation-->
              <nav class="sidebar-nav">
                <ul id="sidebarnav">
                  <li class="nav-devider"></li>
                  <li class="nav-small-cap">PERSONAL</li>
                  <li> <a class="waves-effect waves-dark" active href="<?php echo base_url('admin/overview'); ?>" aria-expanded="false"><i class="mdi mdi-gauge"></i><span class="hide-menu">Dashboard</span></a>
                  </li>
                  <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-bullseye"></i><span class="hide-menu">Manajemen Data</span></a>
                    <ul aria-expanded="false" class="collapse">
                      <li><a href="app-calendar.html">CRUD Data Atribut</a></li>
                      <li><a href="app-chat.html">CRUD Data Centroid</a></li>
                    </ul>
                  </li>
                  <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-email"></i><span class="hide-menu">Analisis Data</span></a>
                    <ul aria-expanded="false" class="collapse">
                      <li><a href="app-email.html">Rata2 Data</a></li>
                      <li><a href="app-email-detail.html">Penghitungan K-Means</a></li>
                    </ul>
                  </li>
                  <li> <a class="waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-chart-bubble"></i><span class="hide-menu">Hasil Analisis</span></a>
                  </li>
                </ul>
              </nav>
              <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
          </aside>