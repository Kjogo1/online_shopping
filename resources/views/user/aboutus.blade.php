@extends('user.partials')
@section('content')
<div class="text-gray-800 dark:text-white">
        <div class="md:h-screen flex md:flex-row items-center flex-col my-5">
            <div class="flex flex-col justify-center items-center w-3/6 md:mx-5">
                <h3 class="text-2xl md:text-3xl">
                    Our Mission
                </h3>
                <span>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin id risus vel augue tincidunt congue ac id eros. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Cras consectetur viverra erat, nec vulputate felis molestie ut. Phasellus ut lacinia dui, a rutrum purus. Fusce a molestie quam, eu egestas nulla. Aliquam ligula massa, gravida at nunc eget, commodo maximus quam. Nulla volutpat risus id vulputate vehicula. Maecenas a ante in diam pharetra consequat. Nam sed luctus massa. Proin hendrerit mauris nec iaculis maximus.
                </span>
            </div>
            <img src="{{asset('assets/image/image5.jpg')}}" class="w-3/6 h-3/6 object-cover rounded-lg md:mx-5 md:my-0 my-5">
        </div>

        <div class=" flex md:flex-row justify-center flex-col my-5 md:my-0">
            <div class="flex flex-col md:w-3/6 md:mx-5 items-center place-items-center">
                <h3 class="text-2xl md:text-3xl">
                    Our Team
                </h3>
                <span class="text-start md:w-full w-3/6">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin id risus vel augue tincidunt congue ac id eros. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Cras consectetur viverra erat, nec vulputate felis molestie ut. Phasellus ut lacinia dui, a rutrum purus. Fusce a molestie quam, eu egestas nulla. Aliquam ligula massa, gravida at nunc eget, commodo maximus quam. Nulla volutpat risus id vulputate vehicula. Maecenas a ante in diam pharetra consequat. Nam sed luctus massa. Proin hendrerit mauris nec iaculis maximus.
                </span>
            </div>
        </div>

        <div class="md:h-screen flex md:flex-row items-center flex-col">
            <div class="flex flex-col justify-center items-center w-3/6 md:mx-5">
                <h3 class="text-2xl md:text-3xl">
                    Join Us
                </h3>
                <span>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin id risus vel augue tincidunt congue ac id eros. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Cras consectetur viverra erat, nec vulputate felis molestie ut. Phasellus ut lacinia dui, a rutrum purus. Fusce a molestie quam, eu egestas nulla. Aliquam ligula massa, gravida at nunc eget, commodo maximus quam. Nulla volutpat risus id vulputate vehicula. Maecenas a ante in diam pharetra consequat. Nam sed luctus massa. Proin hendrerit mauris nec iaculis maximus.
                </span>
            </div>
            <img src="{{asset('assets/image/image5.jpg')}}" class="w-3/6 h-3/6 object-cover rounded-lg md:mx-5 md:my-0 my-5">
        </div>

</div>
@endsection
