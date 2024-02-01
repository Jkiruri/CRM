<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-vertical-style="overlay" class="light" data-header-styles="light" data-menu-styles="light" data-toggled="close">
    <head>
    <!-- META DATA -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="Author" content="Spruko Technologies Private Limited" />
    <meta
      name="Description"
      content="Laravel Tailwind CSS Responsive Admin Web Dashboard Template"
    />
    <meta
      name="keywords"
      content="admin panel in laravel, tailwind, tailwind template admin, laravel admin panel, tailwind css dashboard, admin dashboard template, admin template, tailwind laravel, template dashboard, admin panel tailwind, tailwind css admin template, laravel tailwind template, laravel tailwind, tailwind admin dashboard"
    />

    <!-- TITLE -->
    <title> JCRM</title>

    <!-- FAVICON -->
    <link
      rel="icon"
      href="{{ asset('assets/images/brand-logos/favicon.ico') }}"
      type="image/x-icon"
    />

    <!-- ICONS CSS -->
    <link href="{{ asset('assets/iconfonts/icons.css') }}" rel="stylesheet" />
   

    <!-- APP SCSS -->
    <link rel="preload" as="style" href="{{ asset('assets/app-6b44ca98.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/app-6b44ca98.css') }}" />

    <!-- SIMPLEBAR CSS -->
    <link
      rel="stylesheet"
      href="{{ asset('assets/libs/simplebar/simplebar.min.css') }}"
    />

    <!-- COLOR PICKER CSS -->
    <link
      rel="stylesheet"
      href="{{ asset('assets/libs/@simonwep/pickr/themes/nano.min.css') }}"
    />

    <!-- MAIN JS -->
    <script src="{{ asset('assets/main.js') }}"></script>
    <link href="{{ asset('assets/bootstrap.min.css') }}" rel="stylesheet"  crossorigin="anonymous">
    <link href="{{ asset('assets/iconfonts/bootstrap-icons/icons/font/fonts/bootstrap-icons.woff2') }}" rel="stylesheet"  crossorigin="anonymous">
    <script src="{{ asset('assets/jquery-3.6.4.min.js') }}"></script>
    <script src="{{ asset('assets/axios.min.js') }}"></script>
    <!-- In your Blade template -->
    <script>
    var sanctumToken = '{{ env('SANCTUM_TOKEN') }}';
    </script>

  </head>

    <body>

        

          <div class="page error-bg dark:!bg-bodybg" id="particles-js">
            <!-- Start::error-page -->
            <div class="error-page">
              <div class="container text-defaulttextcolo dark:text-defaulttextcolor/70r text-defaultsize">
                <div class="text-center p-5 my-auto">
                  <div class="flex items-center justify-center h-full !text-defaulttextcolor">
                    <div class="xl:col-span-3"></div>
                    <div class="xl:col-span-6 col-span-12">
                      <p class="error-text sm:mb-0 mb-2"style="font-size: 20px">These are not the endpoints you're looking for. Move along, developer.😂😂😂</p>
                      {{-- <p class="text-[1.125rem] font-semibold mb-4">Oops 😭,The page you are looking for is not available.</p> --}}
                      
                    </div>
                    <div class="xl:col-span-3"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>


        
        <!-- SCRIPTS -->

        
        <!-- Particles JS -->
        
        <script src="{{ asset('assets/libs/particles.js/particles.js') }}"></script>

        <!-- Error JS -->
        <link rel="modulepreload" href="{{ asset('assets/error-97cc9c6c.js') }}" /><script type="module" src="{{ asset('assets/error-97cc9c6c.js') }}"></script>


        <!-- END SCRIPTS -->

	</body>
</html>
