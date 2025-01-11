<html>
  <head>
    <meta charset="utf-8" />
    <!--<meta name=description content="This site was generated with Anima. www.animaapp.com"/>-->
    <!-- <link rel="shortcut icon" type=image/png href="https://animaproject.s3.amazonaws.com/home/favicon.png" /> -->
    <meta name="viewport" content="width=1440, maximum-scale=1.0" />
    <link rel="shortcut icon" type="image/png" href="https://animaproject.s3.amazonaws.com/home/favicon.png" />
    <meta name="og:type" content="website" />
    <meta name="twitter:card" content="photo" />


    <link rel="stylesheet" type="text/css" href="{{ asset('css1/styleguide.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css1/globals.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css1/propertyu95details.css') }}" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
       /* Make sure the overlay is hidden by default */
       .hidden {
    display: none;
}

.overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 9999; /* Ensure it overlays the content */
}
.popup-actions {
    display: flex; /* Use flexbox to align the buttons */
    flex-direction: column; /* Stack the buttons vertically */
    align-items: center; /* Center the buttons horizontally */
    gap: 5px; /* Add space between the buttons */
    margin-top: 20px; /* Margin to separate from other elements */
}

.popup {
    background-color: white;
    padding: 20px;
    border-radius: 8px;
    width: 600px;
    text-align: center;
}
.btn12 {
    margin: 5px;
    text-decoration: none;
    height: 34px;
    width: 329px;
    box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); /* Soft shadow */
    cursor: pointer;

    display: flex;
    justify-content: center; /* Center horizontally */
    align-items: center; /* Center vertically */

    font-family: "Montserrat", sans-serif; /* Ensure font matches */
    font-weight: 900; /* Black font weight */
    font-size: 16px; /* Font size */
    text-transform: uppercase; /* Uppercase text */
}
.btn112 {
    background-color: white;
    color: var(--mongoose);
    padding: 10px 20px;
    border-radius: 5px;
}
.btn212 {
    background-color: var(--mongoose);
    color: white;
    padding: 10px 20px;
    border-radius: 5px;
}
.close-btn12 {
    color: var(--mongoose);
    font-family: "Montserrat", sans-serif; /* Ensure font matches */
    font-weight: 900; /* Match "black" weight */
    font-size: 16px;
    border-color: #ffffff;
    background-color: #ffffff;
    margin-top: 10px; /* Add space between the buttons */
    height: 34px;
    width: 329px;
}



    </style>

    <!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap JS (including Popper.js) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

  </head>
  <body style="margin: 0; background: #ffffff">
    <input type="hidden" id="anPageName" name="page" value="propertyu95details" />
    <div class="container-center-horizontal">
      <div class="propertyu95details screen">
        <div class="flex-col">
        <div class="navbar">
            <div class="navbar-link-estate-ease_logo montserrat-semi-bold-beaver-18px">EstateEase</div>
            <a href="{{ route('public.home') }}">
            <div class="navbar-link-place montserrat-normal-black-16px">Home</div>
        </a>
        <a href="{{ route('public.home') }}">
            <div class="navbar-link-about montserrat-normal-black-16px">About</div>
        </a>

            <a href="{{ route('user.properties') }}">
                <div class="navbar-link-properties montserrat-normal-black-16px">Properties</div>
            </a>
            <a href="{{ route('user.service') }}">
                <div class="navbar-link-services montserrat-normal-black-16px">Services</div>
            </a>

        <a href="{{ route('admin.login') }}">
            <div class="navbar-link-sign-up montserrat-normal-black-16px">ADMIN</div>
        </a>




          </div>


          <h1 class="estate-ease_logo lexendzetta-medium-beaver-25px">PROPERTY DETAILS</h1>
          <div class="navbar-1 navbar-2 montserrat-bold-black-12px">
            <div class="navbar-link-property-id">PROPERTY ID:</div>
            <div class="pro_id">
        {{ $property->property_ID }}
    </div>
                <div class="navbar-link-rent navbar-link">RENT:</div>
            <div class="rent">
        {{ $property->rent }} tk
    </div>

            <div class="navbar-link-payment-status">PAYMENT STATUS:</div>

            <div class="overlap-group10 {{ $paymentStatus == 'paid' ? 'paid-status' : 'unpaid-status' }}">
    <div class="pro_detail_btn {{ $paymentStatus == 'paid' ? 'btn-paid' : 'btn-unpaid' }}"></div>
    <div class="unpaid montserrat-normal-white-11px {{ $paymentStatus == 'paid' ? '' : 'unpaid-active' }}">
        UNPAID
    </div>
    <div class="paid montserrat-normal-mongoose-11px {{ $paymentStatus == 'paid' ? 'paid-active' : '' }}">
        PAID
    </div>
</div>

            <div class="navbar-link-rented-date">RENTED DATE:</div>
            <div class="rent_date">

@if ($tenant && $tenant->rental_start_date)
    {{ $tenant->rental_start_date }}
@else
    <span>Not Rented</span>
@endif
</div>
          </div>
          <div class="overlap-group-container montserrat-bold-black-12px">
            <div class="overlap-group7">
              <div class="images">IMAGES</div>
              <img class="line-3 line" src="img/line-1.svg" alt="Line 3" />
              <div class="rectangle-59 rectangle"></div>
            </div>
            <div class="overlap-group4">
              <div class="additional-information">ADDITIONAL INFORMATION</div>
              <img class="line-5 line" src="img/line-1-2.svg" alt="Line 5" />
              <div class="rectangle-60 rectangle"></div>
            </div>
          </div>
        </div>
        <div class="flex-row">
          <div class="flex-col-1 flex-col-6">

          <div class="overlap-group-container-12">

@php
    $propertyImages = \App\Models\PropertyImage::where('property_ID', $property->property_ID)->limit(15)->get();
@endphp

@if($propertyImages->isNotEmpty())
    @foreach($propertyImages as $image)
        <div class="pic">
            <img src="{{ asset('storage/' . $image->image_path) }}" alt="Property Image" class="pro_pic1 pro_pic-12">
        </div>
    @endforeach
@else
    <p>No images available for this property.</p>
@endif
</div>

            <div class="overlap-group-container-1 overlap-group-container-3 montserrat-bold-black-12px">
              <div class="overlap-group2">
                <div class="x-information">BASIC INFORMATION</div>
                <img class="line-2 line" src="img/line-2.svg" alt="Line 2" />
                <div class="flex-row-1">
                  <div class="bedroom montserrat-normal-black-12px">BEDROOM:</div>
                  <div class="bed_count">  {{ $property->num_of_rooms ?? 'N/A' }}</div>
                </div>
                <div class="bath-container">
                  <div class="bathroom montserrat-normal-black-12px">BATHROOM:</div>
                  <div class="bath_count">    {{ $property->num_of_bathrooms ?? 'N/A' }}
                  </div>
                </div>
                <div class="balcony-container">
                  <div class="balcony montserrat-normal-black-12px">BALCONY:</div>
                  <div class="balcony_count">    {{ $property->num_of_balcony ?? 'N/A' }}
                  </div>
                </div>
                <div class="floor-container">
                  <div class="floor-no montserrat-normal-black-12px">FLOOR NO.:</div>
                  <div class="floor_count">    {{ $property->floor ?? 'N/A' }}
                  </div>
                </div>
                <div class="size-container">
                  <div class="size-sq-ft montserrat-normal-black-12px">SIZE (sq ft).:</div>
                  <div class="size">    {{ $property->size ?? 'N/A' }} m²
                  </div>
                </div>
              </div>
              <div class="overlap-group3">
                <div class="x-information">LOCATION INFORMATION</div>
                <img class="line-4 line" src="img/line-1-1.svg" alt="Line 4" />
                <div class="division-container">
                  <div class="division montserrat-normal-black-12px">HOUSE NO.:</div>
                  <div class="division-1">    {{ $property->house_no ?? 'N/A' }}
                  </div>
                </div>
                <div class="district-container">
                  <div class="district montserrat-normal-black-12px">AREA:</div>
                  <div class="district-1">   {{ $property->area ?? 'N/A' }}
                  </div>
                </div>
                <div class="area-container">
                  <div class="area montserrat-normal-black-12px">THANA:</div>
                  <div class="area-1">{{ $property->thana ?? 'N/A' }}
                  </div>
                </div>
                <div class="flex-row-2">
                  <div class="surname surname-2 montserrat-normal-black-12px">CITY:</div>
                  <div class="house_no">{{ $property->city ?? 'N/A' }}
                  </div>
                </div>
                <div class="flex-row-3">
                  <div class="surname-1 surname-2 montserrat-normal-black-12px">SHORT ADDRESS:</div>
                  <div class="short_add"> {{ $property->house_no ? $property->house_no . ', ' : '' }}
    {{ $property->area ? $property->area . ', ' : '' }}
    {{ $property->thana ? $property->thana . ', ' : '' }}
    {{ $property->city ?? 'N/A' }}
    {{ $property->postal_code ? ' - ' . $property->postal_code : '' }}</div>
                </div>
              </div>
            </div>
          </div>
          <div class="flex-col-2 flex-col-6">

    <div class="checkbox-group">
        <!-- First Column -->
        <div class="checkbox-column">
            <div>
                <input type="checkbox" name="amenities[]" value="parking" id="parking"
                    @if(in_array('parking', json_decode($property->amenities))) checked @endif disabled>
                <label for="parking">Parking</label>
            </div>
            <div>
                <input type="checkbox" name="amenities[]" value="lift" id="lift"
                    @if(in_array('lift', json_decode($property->amenities))) checked @endif disabled>
                <label for="lift">Lift/Elevator</label>
            </div>
            <div>
                <input type="checkbox" name="amenities[]" value="generator_backup" id="generator_backup"
                    @if(in_array('generator_backup', json_decode($property->amenities))) checked @endif disabled>
                <label for="generator_backup">Generator Backup</label>
            </div>
            <div>
                <input type="checkbox" name="amenities[]" value="security" id="security"
                    @if(in_array('security', json_decode($property->amenities))) checked @endif disabled>
                <label for="security">Security</label>
            </div>
            <div>
                <input type="checkbox" name="amenities[]" value="gym" id="gym"
                    @if(in_array('gym', json_decode($property->amenities))) checked @endif disabled>
                <label for="gym">Gym</label>
            </div>
            <div>
                <input type="checkbox" name="amenities[]" value="swimming_pool" id="swimming_pool"
                    @if(in_array('swimming_pool', json_decode($property->amenities))) checked @endif disabled>
                <label for="swimming_pool">Swimming Pool</label>
            </div>
            <div>
                <input type="checkbox" name="amenities[]" value="private_pool" id="private_pool"
                    @if(in_array('private_pool', json_decode($property->amenities))) checked @endif disabled>
                <label for="private_pool">Private Pool (for villas)</label>
            </div>
        </div>

        <!-- Second Column -->
        <div class="checkbox-column">

            <div>
                <input type="checkbox" name="amenities[]" value="playground" id="playground"
                    @if(in_array('playground', json_decode($property->amenities))) checked @endif disabled>
                <label for="playground">Playground</label>
            </div>
            <div>
                <input type="checkbox" name="amenities[]" value="garden" id="garden"
                    @if(in_array('garden', json_decode($property->amenities))) checked @endif disabled>
                <label for="garden">Garden/Lawn</label>
            </div>
        <div>
                <input type="checkbox" name="amenities[]" value="hot_water" id="hot_water"
                    @if(in_array('hot_water', json_decode($property->amenities))) checked @endif disabled>
                <label for="hot_water">Hot Water</label>
            </div>
            <div>
                <input type="checkbox" name="amenities[]" value="gated_community" id="gated_community"
                    @if(in_array('gated_community', json_decode($property->amenities))) checked @endif disabled>
                <label for="gated_community">Gated Community</label>
            </div>
            <div>
                <input type="checkbox" name="amenities[]" value="built_in_wardrobes" id="built_in_wardrobes"
                    @if(in_array('built_in_wardrobes', json_decode($property->amenities))) checked @endif disabled>
                <label for="built_in_wardrobes">Built-in Wardrobes</label>
            </div>
            <div>
                <input type="checkbox" name="amenities[]" value="rooftop_access" id="rooftop_access"
                    @if(in_array('rooftop_access', json_decode($property->amenities))) checked @endif disabled>
                <label for="rooftop_access">Rooftop Access</label>
            </div>
            <div>
                <input type="checkbox" name="amenities[]" value="pets_allowed" id="pets_allowed"
                    @if(in_array('pets_allowed', json_decode($property->amenities))) checked @endif disabled>
                <label for="pets_allowed">Pets Allowed</label>
            </div>
    </div>
    </div>


          </div>
        </div>
        <div class="overlap-group-container-2 overlap-group-container-3">
          <div class="back-container">
            <a href="propertyu95detailsu95guest.html#propertyu95listu95foru95visitor" data-turbolinks="false">
              <div class="go_back"></div
            ></a>
            <div class="go-back montserrat-black-beaver-16px">GO BACK</div>
          </div>

          @php
    // Check if the property has a tenant or if it's coming soon
    $isComingSoon = $property->available_from > now();
@endphp

@if($property->tenant || $isComingSoon)
    <div class="visit-container montserrat-black-white-16px disabled">
        @if($property->tenant)
            VISIT REQUEST (Rented)
        @else
            VISIT REQUEST (Coming Soon)
        @endif
    </div>
@else
    @auth
        <!-- If logged in, allow visit request -->
        <a onclick="ShowOverlay('visit-request', 'animate-appear');">
            <div class="visit-container montserrat-black-white-16px">VISIT REQUEST</div>
        </a>
    @else
        <!-- If not logged in, show sign-up/login prompt -->
        <a onclick="ShowOverlay('login-prompt', 'animate-appear');">
            <div class="visit-container montserrat-black-white-16px">VISIT REQUEST</div>
        </a>
    @endauth
@endif

<!-- Pop-up for Sign-up/Login Prompt -->
<div id="login-prompt" class="overlay hidden">
    <div class="popup">
        <h2>You need to sign up or log in first</h2>
        <p>Please create an account or log in to request a visit.</p>
        <div class="popup-actions">
        <a href="{{ route('user.signup') }}" > <button class="btn12 btn212">Sign Up</button></a>

    <a href="{{ route('user.login') }}" > <button class="btn12 btn112">Log In</button></a>
</div>


        <button class="close-btn12" onclick="HideOverlay('login-prompt');">Close</button>
    </div>
</div>


<script>

    // Function to show the overlay
function ShowOverlay(id, animation) {
    const overlay = document.getElementById(id);
    if (overlay) {
        overlay.classList.remove('hidden');  // Remove hidden class to show overlay
        overlay.classList.add(animation);    // Add animation for showing overlay
    }
}

// Function to hide the overlay
function HideOverlay(id) {
    const overlay = document.getElementById(id);
    if (overlay) {
        overlay.classList.add('hidden');     // Add hidden class to hide overlay
        overlay.classList.remove('animate-appear');  // Remove animation class
    }
}

    </script>


        </div>
      </div>

      <!-- Modal for displaying the zoomed image -->
<div id="imageModal" class="modal" tabindex="-1" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <img id="zoomedImage" src="" alt="Zoomed Image" class="img-fluid" />
        </div>
    </div>
</div>
</div>
    </div>















  </body>
</html>
