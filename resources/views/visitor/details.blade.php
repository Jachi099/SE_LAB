<html>
  <head>
    <meta charset="utf-8" />
    <!--<meta name=description content="This site was generated with Anima. www.animaapp.com"/>-->
    <!-- <link rel="shortcut icon" type=image/png href="https://animaproject.s3.amazonaws.com/home/favicon.png" /> -->
    <meta name="viewport" content="width=1440, maximum-scale=1.0" />
    <link rel="shortcut icon" type="image/png" href="https://animaproject.s3.amazonaws.com/home/favicon.png" />
    <meta name="og:type" content="website" />
    <meta name="twitter:card" content="photo" />


    <link rel="stylesheet" type="text/css" href="{{ asset('css1/visit-request.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css1/styleguide.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css1/globals.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css1/propertyu95details.css') }}" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.7);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 1000;
            display: none; /* Initially hidden */
        }

        .overlay-content {
            background: #fff;
            padding: 20px;
            border-radius: 5px;
            width: 80%;
            max-width: 600px;
        }

        .close {
            cursor: pointer;
            float: right;
            font-size: 20px;
        }

        input[type="date"].booked {
    background-color: #ffcccc; /* Light red for booked dates */
    pointer-events: none; /* Prevent selection */
    color: #888; /* Gray out the text */
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
          <div class="navbar navbar-2">
            <div class="navbar-link-estate-ease_logo montserrat-semi-bold-beaver-18px">EstateEase</div>
            <a href="{{ route('visitor.user_home') }}">
              <div class="navbar-link-place navbar-link montserrat-normal-black-16px">Home</div> </a
            ><a href="{{ route('visitor.user_home') }}">
              <div class="navbar-link-about navbar-link montserrat-normal-black-16px">About</div>
            </a>

            <a href="{{ route('visitor.property_list') }}"><div class="navbar-link-properties navbar-link montserrat-normal-black-16px">Properties</div>
            </a>


            <a href="{{ route('visitor.profile') }}">
                <div class="head_pic">
                    @if(isset($profilePicture) && $profilePicture)
                        <img src="{{ asset('storage/' . $profilePicture) }}" alt="User Profile Picture" style="width: 100%; height: 100%; border-radius: 50%;">
                    @else
                        <img src="path/to/default/image.png" alt="Default Profile Picture" style="width: 100%; height: 100%; border-radius: 50%;">
                    @endif
                </div>
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

            <div class="overlap-group1012 {{ $paymentStatus == 'paid' ? 'paid-status' : 'unpaid-status' }}">
    <div class="pro_detail_btn12 {{ $paymentStatus == 'paid' ? 'btn-paid' : 'btn-unpaid' }}"></div>

    <!-- Display "UNPAID" only if the payment status is not "paid" -->
    <div class="unpaid montserrat-normal-white-11px {{ $paymentStatus == 'unpaid' ? 'unpaid-active' : '' }}">
        UNPAID
    </div>

    <!-- Display "PAID" only if the payment status is "paid" -->
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
            <a href="{{ route('visitor.property_list') }}" data-turbolinks="false">
              <div class="go_back"> <div class="go-back montserrat-black-beaver-16px">GO BACK</div></div
            >

            </a>
          </div>

<!-- Example Blade Template -->
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
    <a onclick="ShowOverlay('visit-request', 'animate-appear');">
        <div class="visit-container montserrat-black-white-16px">VISIT REQUEST</div>
    </a>
@endif





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











    <div id="visit-request" class="overlay" style="display: none;">
        <div class="overlay-content">
            <span class="close" onclick="ShowOverlay('visit-request');">&times;</span>
            <h2>Select Visit Date and Time</h2>

            <label for="visit-date">Visit Date:</label>
            <input
                type="date"
                id="visit-date"
                class="form-control"
                min="{{ now()->format('Y-m-d') }}"
                max="{{ now()->addWeek()->format('Y-m-d') }}">

            <label for="visit-time" style="margin-top: 10px;">Visit Time:</label>
            <input
                type="time"
                id="visit-time"
                class="form-control">

            <input
                type="hidden"
                id="property-id"
                value="{{ $property->property_ID }}"> <!-- Hidden input for property ID -->

            <button id="submit-visit" class="btn btn-primary" style="margin-top: 10px;">Submit</button>
        </div>
    </div>

    <!-- JavaScript -->
    <script>
        // Show or hide the overlay
        function ShowOverlay(overlayId) {
            const overlay = document.getElementById(overlayId);
            overlay.style.display = overlay.style.display === 'none' || overlay.style.display === '' ? 'flex' : 'none';

            // Only fetch booked dates if the overlay is being shown
            if (overlay.style.display === 'flex') {
                const propertyId = document.getElementById('property-id').value;
                fetchBookedDates(propertyId);
            }
        }

        // Fetch booked dates for the selected property
        function fetchBookedDates(propertyId) {
            fetch(`/visit-requests/booked-dates/${propertyId}`)
                .then(response => response.json())
                .then(data => {
                    const bookedDates = data.map(visit => visit.visit_date); // Extract booked dates
                    updateDateInput(bookedDates);
                })
                .catch(error => {
                    console.error('Error fetching booked dates:', error);
                });
        }

        // Disable booked dates and set min/max limits
        function updateDateInput(bookedDates) {
            const dateInput = document.getElementById('visit-date');
            const today = new Date();
            const maxDate = new Date(today);
            maxDate.setDate(maxDate.getDate() + 7);

            // Set min and max attributes for the input
            dateInput.min = today.toISOString().split('T')[0];
            dateInput.max = maxDate.toISOString().split('T')[0];

            // Disable booked dates
            bookedDates.forEach(date => {
                const option = Array.from(options).find(opt => opt.value === date);
                if (option) {
                    option.disabled = true;
                }
            });
        }

        // Validate visit time input
        document.getElementById('visit-time').addEventListener('input', function () {
            const time = this.value;
            const [hour, minute] = time.split(':').map(Number);

            if (hour < 9 || (hour >= 20 && minute > 0)) {
                alert('Visit times must be between 9:00 AM and 8:00 PM.');
                this.value = ''; // Reset invalid time
            }
        });

        // Handle the submit button click
        document.getElementById('submit-visit').addEventListener('click', function() {
        const date = document.getElementById('visit-date').value;
        const time = document.getElementById('visit-time').value;
        const propertyId = document.getElementById('property-id').value; // Get the property ID

        if (date && time) {
            fetch('/visit-requests', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}' // Add CSRF token for security
                },
                body: JSON.stringify({
                    visit_date: date,
                    visit_time: time,
                    property_id: propertyId // Include the property ID in the request
                })
            })
            .then(response => {
                if (!response.ok) {
                    return response.text().then(text => {
                        throw new Error(text); // Throw the plain text error
                    });
                }
                return response.json();
            })
            .then(data => {
                alert(data.success);
                ShowOverlay('visit-request'); // Hide overlay after scheduling
            })
            .catch((error) => {
                alert(error.message);
            });
        } else {
            alert('Please select both date and time.');
        }
    });



    document.addEventListener('DOMContentLoaded', function () {
    // Select all zoomable images
    const images = document.querySelectorAll('.zoomable-image');
    const zoomedImage = document.getElementById('zoomedImage');
    const imageModal = new bootstrap.Modal(document.getElementById('imageModal'));

    // Add click event listener to each image
    images.forEach(image => {
        image.addEventListener('click', function () {
            // Set the source of the modal's image
            zoomedImage.src = this.src;

            // Show the modal
            imageModal.show();
        });
    });
});




        // Close the modal when the close button is clicked
        document.querySelector('.modal .close').addEventListener('click', function() {
            document.getElementById('imageModal').style.display = 'none';
        });

        // Close the modal when clicking outside the modal
        window.addEventListener('click', function(event) {
            if (event.target === document.getElementById('imageModal')) {
                document.getElementById('imageModal').style.display = 'none';
            }
        });

        function checkTenantStatus(propertyId) {
    fetch(`/api/check-tenant/${propertyId}`)
        .then(response => response.json())
        .then(data => {
            if (data.hasTenant) {
                document.querySelector('.visit-container').classList.add('disabled');
                document.querySelector('.visit-container').innerText = 'VISIT REQUEST (Unavailable)';
            }
        });
}


</script>



<!-- Bootstrap and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>



  </body>
</html>
