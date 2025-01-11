<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <!--<meta name=description content="This site was generated with Anima. www.animaapp.com"/>-->
    <!-- <link rel="shortcut icon" type=image/png href="https://animaproject.s3.amazonaws.com/home/favicon.png" /> -->
    <meta name="viewport" content="width=1440, maximum-scale=1.0" />
    <link rel="shortcut icon" type="image/png" href="https://animaproject.s3.amazonaws.com/home/favicon.png" />
    <meta name="og:type" content="website" />
    <meta name="twitter:card" content="photo" />

    <link rel="stylesheet" type="text/css" href="{{ asset('css1/visitoru95dashboard.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css1/styleguide.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css1/globals.css') }}" />

  </head>
  <body style="margin: 0; background: #ffffff">
    <input type="hidden" id="anPageName" name="page" value="visitoru95dashboard" />
    <div class="container-center-horizontal">
      <div class="visitoru95dashboard screen">
        <div class="overlap-group-container">
          <div class="overlap-group2">
            <div class="side_div"></div>

            <form id="logout-form" action="{{ route('user.logout') }}" method="POST" style="display: inline;">
    @csrf
    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
    class="logout_btn" style="cursor: pointer;">
        LOGOUT
    </a>
</form>
<a href="{{ route('visitor.profile') }}">
            <div class="profile_btn">
           PROFILE
            </div>
            </a>

            <a href="{{ route('visitor.visit_req_list') }}">
                <div class="visit_btn">
                    <div class="visit-requested-properties">VISIT REQUESTED PROPERTIES</div>
                </div>
            </a>



                <div class="navbar-link-container">
                  <div class="navbar-link-estate-ease_logo montserrat-semi-bold-beaver-18px">EstateEase</div>
                  <a href="{{ route('visitor.user_home') }}"><div class="navbar-link-place navbar-link montserrat-normal-black-16px">Home</div> </a
            > <a href="{{ route('visitor.user_home') }}"><div class="navbar-link-about navbar-link montserrat-normal-black-16px">About</div> </a
            >  <a href="{{ route('visitor.property_list') }}"><div class="navbar-link-properties montserrat-normal-black-16px">Properties</div> </a
              >


              <a href="{{ route('visitor.profile') }}"><div class="head_pic">
                  @if($profilePicture)
                      <img src="{{ asset('storage/' . $profilePicture) }}" alt="User Profile Picture" style="width: 100%; height: 100%; border-radius: 50%;">
                  @else
                      <img src="path/to/default/image.png" alt="Default Profile Picture" style="width: 100%; height: 100%; border-radius: 50%;">
                  @endif
              </div>

          </a>
            <div class="estate-ease_logo-1 estate-ease_logo-4 lexendzetta-extra-bold-white-15px">VISITOR DASHBOARD</div>
          </div>
          <div class="flex-col">
            <div class="flex-row">
              <h1 class="estate-ease_logo-2 estate-ease_logo-4 lexendzetta-medium-beaver-25px">VISITOR DASHBOARD</h1>
              <a href="{{ route('visitor.edit_profile') }}">
                <img class="edit" src="{{ asset('img/edit.svg') }}" alt="edit" />
            </a>

            <img class="trash-2" src="{{ asset('img/trash-2.svg') }}" alt="trash-2" />

            </div>
            <div class="flex-row-1">
              <div class="flex-col-1 flex-col-4">
                <div class="pic"> @if($profilePicture)
                    <img src="{{ asset('storage/' . $profilePicture) }}" alt="User Profile Picture" style="width: 100%; height: 100%; ">
                @else
                    <img src="path/to/default/image.png" alt="Default Profile Picture" style="width: 100%; height: 100%; ">
                @endif</div>
                <div class="account-type">ACCOUNT TYPE</div>
                <span class="font-bold">{{ $account_type }}  </span>            </div>
              <div class="flex-col-2 flex-col-4">
                <div class="name-container">
                  <div class="full-name montserrat-medium-black-16px">FULL NAME :</div>
                  <span class="font-bold">{{ $name }}</span>
                </div>
                <div class="email-container">
                  <div class="email montserrat-medium-black-16px">EMAIL :</div>
                  <span class="font-bold"> {{ $email }}</span>
                </div>
                <div class="address-container">
                  <div class="current-address montserrat-medium-black-16px">CURRENT ADDRESS :</div>
                  <span class="font-bold">{{ $address }}   </span>             </div>
                <div class="flex-row-2">
                  <div class="phone-number montserrat-medium-black-16px">PHONE NUMBER :</div>
                  <span class="font-bold">{{ $phone }}</span>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </body>
</html>
