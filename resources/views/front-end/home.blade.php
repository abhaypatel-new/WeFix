
    @include('layouts.header.front-end')

    <div class="homediv">
        <div class="btn-div text-center">
            <h1>Best Repair Services For <br> WE FIX </h1>
            <!-- <a class="box-btn">Our Services</a>
                <a class="border-btn">Contact Us </a> -->
            <button type="button" class="buttonmain"><a href="{{url('services')}}" style="color: #fff;">Our Service</a></button>
            <button type="button" class="buttontwo"><a href="#contacts" style="color: #fff;">Contact Us</a></button>
        </div>
    </div>
   
        <div class="featureOuter"> 
            <div  class="container">

                <div class="row">
                    <div class="col-md-4">
                    <div class="single-feature text-center">
                        <div class="feature-icon">
                            <div class="img-div">
                                <img src="{{ asset('images') }}/image/repaired and Enjoy.png" alt="" height="50px" width="50px">
                            </div>
                        </div>
                        <div class="feature-content">
                            <h4>Repaired and Enjoy</h4>
                        </div>
                        <div class="feature-content-descripcetion">
                            <p>There are many variations of
                                passages available but the
                                majority have suffered alter
                                humour</p>
                        </div>
                    </div></div>


                      <div class="col-md-4"><div class="single-feature text-center">
                        <div class="feature-icon">
                            <div class="img-div">
                                <img src="{{ asset('images') }}/image/Online Scheduling icon.png" alt="" height="50px" width="50px">
                            </div>
                        </div>
                        <div class="feature-content">
                            <h4>Online Scheduling</h4>
                        </div>
                        <div class="feature-content-descripcetion">
                            <p>There are many variations of
                                passages available but the
                                majority have suffered alter
                                humour</p>
                        </div>
                    </div></div>
                      <div class="col-md-4"><div class="single-feature text-center">
                        <div class="feature-icon">
                            <div class="img-div">
                                <img src="{{ asset('images') }}/image/Repairing Service icon.png" alt="" height="50px" width="50px">
                            </div>
                        </div>
                        <div class="feature-content">
                            <h4>Repairing Service</h4>
                        </div>
                        <div class="feature-content-descripcetion">
                            <p>There are many variations of
                                passages available but the
                                majority have suffered alter
                                humour</p>
                        </div>
                    </div></div>
                </div>

            </div>
        </div>
   
    </div>
    <div class="about-main">
        <div class="module-border-wrap">
            <div class="body-about">
                <h3>ABOUT COMPANY </h3>
            </div>
        </div>
    </div>

    <div class="about-img">
        <img src="{{ asset('images')}}/image/WE Are.jpg" alt="" width="527px" height="466px">
        <div class="we-are-text">
            <h1 class="we-are-text-h1">WE ARE MOST POPULAR <br>REPAIR WE FIX </h1>
            <p>Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil
                <br> impedit quo minus id quod maxime placeat facere possimus, omnis
                <br> voluptas assumenda est, omnis dolor repellendus,
            </p>
            <div class="row we-are">
                <div class="we-are-main-01">
                    <div class="we-are-main">
                        <h2 class="we-are-text-h2">
                        <span id="vendor-count" class="we-are-text-h2"></span>
                        </h2>
                        <h5 class="we-are-text-h5">
                            Member
                            <br> Professional
                        </h5>
                    </div>
                    <div class="we-are-main">
                        <h2 class="we-are-text-h2">
                        <span id="user-count"  class="we-are-text-h2"></span>
                        </h2>
                        <h5 class="we-are-text-h5">
                            Total
                            <br> owner
                        </h5>
                    </div>
                    <div class="we-are-main">
                        <h2 class="we-are-text-h2">
                        <span id="confirmed-count"  class="we-are-text-h2"></span>
                        </h2>
                        <h5 class="we-are-text-h5">
                            Project
                            <br>Complated
                        </h5>
                    </div>
                    <div class="we-are-main">
                        <h2 class="we-are-text-h2">
                        <span id="pending-count"  class="we-are-text-h2"></span>
                        </h2>
                        <h5 class="we-are-text-h5">
                            Project
                            <br> Pending
                        </h5>
                    </div>
                </div>
            </div>
            <a href="{{url('/about-us')}}"> <button class="about-button">Learn More</button></a>
        </div>
    </div>
    </div>
   
    <div class="about-main">
        <div class="module-border-wrap">
            <div class="body-about">
                <h3>OUR SERVICES</h3>
            </div>
        </div>
    </div>
    <div>
        <h1 class="Product-01">All Our Product</h1>
    </div>
      <section class="swiper-sec">
      <div class="d-flex justify-content-center">
            <div class="spinner-border"
                 role="status" id="loading">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
      <div class="swiper mySwiper container">
      <div class="swiper-button-next"></div>
            <div class="swiper-wrapper content" id="product-list">




            </div>
            <div class="swiper-button-prev"></div>
        </div>



        <div class="swiper-pagination" ></div>
    </section>
    <!--


    <section class="scrollerContainer ">


</section> -->

    <div class="Get-a-discount">
        <img src="{{ asset('images')}}/image/Get-a-discount.png" alt="" height="400" width="100%">
        <img class="man-img" src="{{ asset('images')}}/image/young-electrician-man.png" alt="" width="560" height="400" style="margin-left: 700px;">
        <div class="heading-get">
            <h2>Get a discount for new users</h2>
            <h1>25% OFF</h1>
            <h4>Get 25% discount for shipping cost</h4>
        </div>
    </div>
    <div class="about-main">
        <div class="module-border-wrap">
            <div class="body-about">
                <h3>TESTIMONIALS</h3>
            </div>
        </div>
    </div>
    <div>
        <h1 class="Product-01">What Clients Says</h1>
    </div>
    <div class="TESTIMONIALS-card-main flex-wrap">
        <div class="TESTIMONIALS-card">
            <img class="TESTIMONIALS-card-png" src="{{ asset('images')}}/image/TESTIMONIALS-card-png.jpg" alt="">
            <p>On the other hand, we denounce with <br> righteous indignation and dislike men who <br> are so beguiled
                and.
            </p>
            <div class="border-div"></div>
            <div class="TESTIMONIALS-card-02">
                <img src="{{ asset('images')}}/image/TESTIMONIALS.jpg" alt="" width="65" height="65">
                <div>
                    <h5 class="TESTIMONIALS-card-02-01">Serhiy Hipskyy</h5>
                    <p class="TESTIMONIALS-card-02-02">CEO Universal</p>
                </div>
            </div>
        </div>
        <div class="TESTIMONIALS-card">
            <img class="TESTIMONIALS-card-png" src="{{ asset('images')}}/image/TESTIMONIALS-card-png.jpg" alt="">
            <p>On the other hand, we denounce with <br> righteous indignation and dislike men who <br> are so beguiled
                and.
            </p>
            <div class="border-div"></div>
            <div class="TESTIMONIALS-card-02">
                <img src="{{ asset('images')}}/image/TESTIMONIALS.jpg" alt="" width="65" height="65">
                <div>
                    <h5 class="TESTIMONIALS-card-02-01">Serhiy Hipskyy</h5>
                    <p class="TESTIMONIALS-card-02-02">CEO Universal</p>
                </div>
            </div>
        </div>
        <div class="TESTIMONIALS-card">
            <img class="TESTIMONIALS-card-png" src="{{ asset('images')}}/image/TESTIMONIALS-card-png.jpg" alt="">
            <p>On the other hand, we denounce with <br> righteous indignation and dislike men who <br> are so beguiled
                and.
            </p>
            <div class="border-div"></div>
            <div class="TESTIMONIALS-card-02">
                <img src="{{ asset('images')}}/image/TESTIMONIALS.jpg" alt="" width="65" height="65">
                <div>
                    <h5 class="TESTIMONIALS-card-02-01">Serhiy Hipskyy</h5>
                    <p class="TESTIMONIALS-card-02-02">CEO Universal</p>
                </div>
            </div>
        </div>
    </div>





    <div class="about-main">
        <div class="module-border-wrap">
            <div class="body-about">
                <h3>TEAM</h3>
            </div>
        </div>
    </div>
    <div>
        <h1 class="Product-01">Meet Our Team</h1>
    </div>

    <section class="swiper-sec">

        <div class="swiper mySwiper container">
        <div class="swiper-button-next"></div>
        <div class="swiper-wrapper" id="our-vendors">
            </div>
            <div class="swiper-button-prev"></div>
        </div>
           
        </div>

        <!-- <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div> -->
        <div class="swiper-pagination" style="position: absolute; top: 350px;"></div>
    </section>


    <div class="about-main">
                <div class="module-border-wrap">
            <div class="body-about">
                <h3>OUR BLOG</h3>
            </div>
        </div>
    </div>
    <div>
        <h1 class="Product-01">Every Single Update
            <br>Story From Our Journal
        </h1>
    </div>
 
<section class="swiper-sec">

<div class="swiper mySwiper container">
<div class="swiper-button-next"></div>
<div class="swiper-wrapper" id="our-blogs">
<div class="swiper-slide swipe-res proposal-hover" style="width: 260.333px !important; margin-right: 30px; !important">
                    <div class="tema-card">
            <div class="blog-img">
                <h5>13 Nov</h5>
                <h4>Excepteur sint occaecat
                    <br>cupidatat non proident
                </h4>
            </div>
        </div>
</div>
<div class="swiper-slide swipe-res proposal-hover" style="width: 260.333px !important; margin-right: 30px; !important">
                    <div class="tema-card">
            <div class="blog-img">
                <h5>13 Nov</h5>
                <h4>Excepteur sint occaecat
                    <br>cupidatat non proident
                </h4>
            </div>
        </div>
</div>
<div class="swiper-slide swipe-res proposal-hover" style="width: 260.333px !important; margin-right: 30px; !important">
                    <div class="tema-card">
            <div class="blog-img">
                <h5>13 Nov</h5>
                <h4>Excepteur sint occaecat
                    <br>cupidatat non proident
                </h4>
            </div>
        </div>
</div>
<div class="swiper-slide swipe-res proposal-hover" style="width: 260.333px !important; margin-right: 30px; !important">
                    <div class="tema-card">
            <div class="blog-img">
                <h5>13 Nov</h5>
                <h4>Excepteur sint occaecat
                    <br>cupidatat non proident
                </h4>
            </div>
        </div>
</div>
<div class="swiper-slide swipe-res proposal-hover" style="width: 260.333px !important; margin-right: 30px; !important">
                    <div class="tema-card">
            <div class="blog-img">
                <h5>13 Nov</h5>
                <h4>Excepteur sint occaecat
                    <br>cupidatat non proident
                </h4>
            </div>
        </div>
</div>
<div class="swiper-slide swipe-res proposal-hover" style="width: 260.333px !important; margin-right: 30px; !important">
                    <div class="tema-card">
            <div class="blog-img">
                <h5>13 Nov</h5>
                <h4>Excepteur sint occaecat
                    <br>cupidatat non proident
                </h4>
            </div>
        </div>
</div>
    </div>
    <div class="swiper-button-prev"></div>
</div>
   
</div>

<!-- <div class="swiper-button-next"></div>
<div class="swiper-button-prev"></div> -->
<div class="swiper-pagination" style="position: absolute; top: 350px;"></div>
</section>
    <section class="footers">

        <div class="footer-first-div">
            <h1>LOGO</h1>
            <p>The world’s first and largest digital marketplace for crypto <br> collectibles and non-fungible tokens
                (NFTs).
                Buy, sell, and <br> discover exclusive digital assets. Ut enim ad minima veniam, quis <br> nostrum
                exercitationem
                ullam corporis suscipit laboriosam, nisi ut <br> aliquid ex ea commodi consequatur</p>
            <h6>Call Us:</h6>
            <h4 style="color: #6759FF;">
                +01 234 567 89
            </h4>
        </div>
        <div class="footer-second-div">

            <ul>

                <li style="font-family: 'Lato'sans-serif;
                   font-style: normal;
                   font-weight: 700;
                   font-size: 20px;
                   color: #6759FF;"> Menu Links</li>

                <li><a href="{{url('/')}}">Home</a></li>
                <li><a href="{{url('/services')}}">Service</a></li>
                <li><a href="{{url('/about-us')}}">About US</a></li>
                <li><a href="{{url('/blog')}}">Blog</a></li>
            </ul>
        </div>
        <div class="footer-third-div">
            <ul>
                <li style="font-family: 'Lato'sans-serif;
                    font-style: normal;
                    font-weight: 700;
                    font-size: 20px;
                    color: #6759FF;"> Services</li>

              
                <li><a href="{{url('/services')}}">Refrigerator</a></li>
                <li><a href="{{url('/services')}}">Mobile</a></li>
                <li><a href="{{url('/services')}}">Laptop</a></li>
                <li><a href="{{url('/services')}}">Blender</a></li>
                <li><a href="{{url('/services')}}">Air purifier</a></li>
            </ul>
        </div>
        <div class="footer-four-div" id="contacts">
            <ul>
                <li style="font-family: 'Lato'sans-serif;
                    font-style: normal;
                    font-weight: 700;
                    font-size: 20px;
                    color: #6759FF;"> Contact info</li>

                <li>Collarado Demos
                    Beach, <br> New York</li>
                <li>Phone: +01 234 567 89</li>
                <li>Email: info@gmail.com</li>

            </ul>
        </div>
       
        <div class="foot">
            <h5>WeFix © 2023 . All Rights Reserved.</h5>
        </div>
        </section>
       
</body>
    <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 3,
            spaceBetween: 30,
            slidesPerGroup: 3,
            loop: true,
            loopFillGroupWithBlank: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
    </script>
<script>


     $(document).ready(function() {
        $("#menu1").addClass("active");
        $("#menu2").removeClass("active");
        $("#menu3").removeClass("active");
        $("#menu4").removeClass("active");
        var appUrl ="{{env('APP_URL')}}";
        let userId = $("#owner_id").val();
        const api_url =
        appUrl+"/owner/get_all_product";

// Defining async function
async function getapi(url) {

    // Storing response
    const response = await fetch(url);

    // Storing data in form of JSON
    var data = await response.json();
    console.log(data);
    if (response) {
        hideloader();
    }
    show(data);
}
// Calling that async function
getapi(api_url);
function hideloader() {
    document.getElementById('loading').style.display = 'none';
}
function show(data) {
    console.log(data.data)
    let tab ='';
    let count = 0;
    // Loop to access all rows
    for (let r of data.data) {
        let img = r.thumbnail_image == null?"https://miro.medium.com/max/600/0*jGmQzOLaEobiNklD":r.thumbnail_image;
        if(userId != null){
         tab += `  <div class="swiper-slide  product-swiper proposal-hover">
                <div class="Product-card" style="cursor: pointer; height: 290px !important;"><a href="./product-details?id=${r.id}" style="text-decoration: none;">
                <img src="${img}" alt="" width="150px" height="150px" class="rounded id="${r.id}">
                <h2 ></h2>
                <h3><span style="display:inline-block;white-space: nowrap;overflow: hidden;text-overflow: ellipsis;max-width: 13ch; color:#453d3d">${r.product_name}</span></h3>
            <p><span style="display:inline-block;white-space: nowrap;overflow: hidden;text-overflow: ellipsis;max-width: 13ch;color:#808080; font-size:14px;" >${r.product_description}</span></p>
       </a> </div>
                </div>`;
                count = count+1;
      if(count == 10){
       break;
       return false;
      }
        }else{
            tab += `  <div class="swiper-slide  product-swiper proposal-hover">
                <div class="Product-card" style="cursor: pointer; height: 290px !important;" style="cursor: pointer;" onclick="login_alert()"><a style="text-decoration: none;">
                <img src="${img}" alt="" width="150px" height="150px" class="rounded id="${r.id}">
                <h2 ></h2>
                <h3><span style="display:inline-block;white-space: nowrap;overflow: hidden;text-overflow: ellipsis;max-width: 13ch; color:#453d3d">${r.product_name}</span></h3>
            <p><span style="display:inline-block;white-space: nowrap;overflow: hidden;text-overflow: ellipsis;max-width: 13ch;color:#808080; font-size:14px;" >${r.product_description}</span></p>
       </a> </div>
                </div>`;
                count = count+1;
      if(count == 10){
       break;
       return false;
      }
        }

    }
    // Setting innerHTML as tab variable
 document.getElementById("product-list").innerHTML = tab;


}

/*--------Vendor slider-------------*/

const url =
        appUrl+"/owner/all_vendors_list";

// Defining async function
async function getapivendor(url) {

    // Storing response
    const response = await fetch(url);

    // Storing data in form of JSON
    var data = await response.json();
    console.log(data);
    if (response) {
        hidevendorloader();
    }
    show_vendor_list(data);
}
// Calling that async function
getapivendor(url);
function hidevendorloader() {
    document.getElementById('loading').style.display = 'none';
}
function show_vendor_list(data) {
    console.log(data.data)
    let tab ='';
    let count = 0;
    // Loop to access all rows
    for (let r of data.data) {
        let img = r.image == null?"{{ asset('images')}}/image/Mary Walden.jpg":r.image;
         tab += `     <div class="swiper-slide swipe-res proposal-hover" style="width: 260.333px !important; margin-right: 30px; !important">
                    <div class="tema-card">
                    <img src="${img}" alt="" width="220px" height="260px" style="height: 230px;">
                        <h5>${r.first_name} ${r.last_name}</h5>
                        <h6>${r.company}</h6>
                        <p>${r.desc}. </p>
                    </div>
                </div>`;

    }
    // Setting innerHTML as tab variable
 document.getElementById("our-vendors").innerHTML = tab;


}
/*-------End Vendor-----------*/

/*-------Start-Count----------*/



const counturl =
  '{!! route("get.count")!!}';

// Defining async function
async function getcount(counturl) {

  // Storing response
  const response = await fetch(counturl);

  // Storing data in form of JSON
  var data = await response.json();
  console.log(data);
  
  showcount(data);
}
// Calling that async function
getcount(counturl);


function showcount(data) {

  let tab = '';
  let count = 0;
  // Loop to access all rows
  if (data.status == 'true') {

  
    $("#vendor-count").text(data.data.vendor);
    $("#user-count").text(data.data.owner);
    $("#pending-count").text(data.data.pending);
    $("#confirmed-count").text(data.data.confirmed);
   
  } else {
    alert("failed")
    $("#show-report").show();
  }
}

/*----------End-Count---------*/
     });
     $(".navbar-toggler").click(function () {

$header = $(this);
//getting the next element
$content = $header.next();
//open up the content needed - toggle the slide- if visible, slide up, if not slidedown.
$content.slideToggle(500, function () {
    //execute this after slideToggle is done
    //change text of header based on visibility of content div
    $header.text(function () {
        //change text based on condition
        return $content.is(":visible") ? "Collapse" : "Expand";
    });
});

});
function login_alert(){
    Swal.fire({
  title: 'Please login first',
    text: 'Redirecting...',
    icon: 'warning',
    timer: 10000,
    buttons: false,
});

location.href = 'owner';
}

</script>
</html>
