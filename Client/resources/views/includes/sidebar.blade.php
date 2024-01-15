<aside class="app-sidebar" id="sidebar">
        <!-- Start::main-sidebar-header -->
        <div class="main-sidebar-header">
          <a href="/" class="header-logo">
            <img
              src="{{ asset('assets/images/brand-logos/toggle-dark.png') }}"
              alt="logo"
              class="desktop-logo"
            />
            <img
              src="{{ asset('assets/images/brand-logos/toggle-dark.png') }}"
              alt="logo"
              class="toggle-logo"
            />
            <img
              src="{{ asset('assets/images/brand-logos/toggle-dark.png') }}"
              alt="logo"
              class="desktop-dark"
            />
            <img
              src="{{ asset('assets/images/brand-logos/toggle-dark.png') }}"
              alt="logo"
              class="toggle-dark"
            />
            <img
              src="{{ asset('assets/images/brand-logos/toggle-dark.png') }}"
              alt="logo"
              class="desktop-white"
            />
            <img
              src="{{ asset('assets/images/brand-logos/toggle-white.png') }}"
              alt="logo"
              class="toggle-white"
            />
          </a>
        </div>
        <!-- End::main-sidebar-header -->

        <!-- Start::main-sidebar -->
        <div class="main-sidebar" id="sidebar-scroll">
          <!-- Start::nav -->
          <nav class="main-menu-container nav nav-pills flex-column sub-open">
            <div class="slide-left" id="slide-left">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="#7b8191"
                width="24"
                height="24"
                viewBox="0 0 24 24"
              >
                <path
                  d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"
                ></path>
              </svg>
            </div>
            <ul class="main-menu">
              <!-- Start::slide__category -->
              <li class="slide__category">
                <span class="category-name"></span>
              </li>
              <!-- End::slide__category -->

              <!-- Start::slide -->
              <li class="slide has-sub">
                <a href="javascript:void(0);" class="side-menu__item">
                  <i class="bx bx-home side-menu__icon"></i>
                  <span class="side-menu__label"
                    >Dashboard
                
                </a>
                <ul class="slide-menu child1">
                  <li class="slide side-menu__label1">
                    <a href="javascript:void(0)">Dashboard</a>
                  </li>
              
                </ul>
              </li>
              <!-- End::slide -->
              <!-- Start::slide__category -->
              <li class="slide__category">
                <span class="category-name"></span>
              </li>
              <!-- End::slide__category -->

              <!-- Start::slide -->
             
              <!-- End::slide -->

              <!-- Start::slide -->
              <li class="slide has-sub">
                <a href="javascript:void(0);" class="side-menu__item">
                  <i class="bx bx-task side-menu__icon"></i>
                  <span class="side-menu__label"
                    >Task<span
                      class="text-secondary text-[0.75em] rounded-sm badge !py-[0.25rem] !px-[0.45rem] !bg-secondary/10 ms-2"
                      ></span
                    ></span
                  >
                  <i class="fe fe-chevron-right side-menu__angle"></i>
                </a>
                <ul class="slide-menu child1">
                  <li class="slide side-menu__label1">
                    <a href="javascript:void(0)">Task</a>
                  </li>
                  <li class="slide">
                    <a href="task-kanban-board.html" class="side-menu__item"
                      >Kanban Board</a
                    >
                  </li>
                  <li class="slide">
                    <a href="task-listview.html" class="side-menu__item"
                      >List View</a
                    >
                  </li>
                  <li class="slide">
                    <a href="task-details.html" class="side-menu__item"
                      >Task Details</a
                    >
                  </li>
                </ul>
              </li>
              <!-- End::slide -->

              <!-- Start::slide -->
              <li class="slide has-sub">
                <a href="javascript:void(0);" class="side-menu__item">
                   <i class="bx bx-bar-chart-square side-menu__icon"></i>
                  <span class="side-menu__label">Companies</span>
                  <i class="fe fe-chevron-right side-menu__angle"></i>
                </a>
                <ul class="slide-menu child1">
                  <li class="slide side-menu__label1">
                    <a href="javascript:void(0);">Companies</a>
                  </li>
                  <li class="slide">
                    <a href="{{ url('/companies') }}" class="side-menu__item"
                      >Company List</a
                    >
                  </li>
                  <li class="slide">
                    <a href="{{ url('/companies/create') }}" class="side-menu__item"
                      >Add Company</a
                    >
                  </li>
                    
                </ul>
              </li>
              <!-- End::slide -->

              <!-- Start::slide -->
              <li class="slide has-sub">
                <a href="#" class="side-menu__item">
                  <i class="bx bx-fingerprint side-menu__icon"></i>
                  <span class="side-menu__label">Contacts</span>
                  <i class="fe fe-chevron-right side-menu__angle"></i>
                </a>
                <ul class="slide-menu child1">
                  <li class="slide side-menu__label1">
                    <a href="#">Contacts</a>
                  </li>
                  <li class="slide">
                    <a href="" class="side-menu__item"
                      >Add Contact</a
                    >
                  </li>
                  <li class="slide">
                    <a href="" class="side-menu__item"
                      >Contact List</a
                    >
                  </li>
                    
                </ul>
              </li>
              <!-- End::slide -->

              <!-- Start::slide__category -->
              <li class="slide__category">
                <span class="category-name">General</span>
              </li>
              <!-- End::slide__category -->

              <!-- Start::slide -->
              <li class="slide has-sub">
                <a href="#" class="side-menu__item">
                  <i class="bx bx-box side-menu__icon"></i>
                  <span class="side-menu__label">Leads</span>
                  <i class="fe fe-chevron-right side-menu__angle"></i>
                </a>
                <ul class="slide-menu child1 mega-menu">
                  <li class="slide side-menu__label1">
                    <a href="#">Leads</a>
                  </li>
                  <li class="slide">
                    <a href="#" class="side-menu__item"
                      >Add Lead</a
                    >
                  </li>
                  <li class="slide">
                    <a href="#" class="side-menu__item"
                      >View Leads</a
                    >
                  </li>
                  
                </ul>
              </li>
              <!-- End::slide -->

              <!-- Start::slide -->
              <li class="slide has-sub">
                <a href="#" class="side-menu__item">
                  <i class="bx bx-medal side-menu__icon"></i>
                  <span class="side-menu__label">Email</span>
              
                </a>
                <ul class="slide-menu child1">
                  <li class="slide side-menu__label1">
                    <a href="#">Email</a>
                  </li>
                  
                </ul>
              </li>
              <!-- End::slide -->

              <!-- Start::slide -->
              <li class="slide has-sub">
                <a href="#" class="side-menu__item">
                  <i class="bx bx-file side-menu__icon"></i>
                  <span class="side-menu__label">Reports</span>
               
                </a>
                <ul class="slide-menu child1">
                 
                 
                  
                </ul>
              </li>
              <!-- End::slide -->

              <!-- Start::slide -->
              <li class="slide has-sub">
                <a href="#" class="side-menu__item">
                  <i class="bx bx-party side-menu__icon"></i>
                  <span class="side-menu__label">Notifications</span>
               
                </a>
                <ul class="slide-menu child1">
                  <li class="slide side-menu__label1">
                    <a href="#">Notifications</a>
                  </li>
                  
                </ul>
              </li>
              <!-- End::slide -->

              <!-- Start::slide -->
              <li class="slide">
                <a href="widgets.html" class="side-menu__item">
                  <i class="bx bx-gift side-menu__icon"></i>
                  <span class="side-menu__label"
                    >Action Plan
                    </span
                  >
                </a>
              </li>
              <!-- End::slide -->

              <!-- Start::slide__category -->
              
              <!-- End::slide__category -->

              <!-- Start::slide -->
            
              <!-- End::slide -->

              <!-- Start::slide -->
              
              <!-- End::slide -->

              <!-- Start::slide__category -->
              
              <!-- End::slide__category -->

              <!-- Start::slide -->
             
              <!-- End::slide -->

              <!-- Start::slide -->
             
              <!-- End::slide -->

              <!-- Start::slide__category -->
             
              <!-- End::slide__category -->

              <!-- Start::slide -->
              
              <!-- End::slide -->

              <!-- Start::slide -->
              
              <!-- End::slide -->
            </ul>
            <div class="slide-right" id="slide-right">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="#7b8191"
                width="24"
                height="24"
                viewBox="0 0 24 24"
              >
                <path
                  d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"
                ></path>
              </svg>
            </div>
          </nav>
          <!-- End::nav -->
        </div>
        <!-- End::main-sidebar -->
      </aside>