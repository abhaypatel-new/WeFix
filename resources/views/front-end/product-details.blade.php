@include('layouts.header.front-end')
    <div class="maindiv">
        <div class="btn-div">
            <h1 class="main-h1">Product Details</h1>
            <p></p>
            <!-- <a class="box-btn">Our Services</a>
                <a class="border-btn">Contact Us </a> -->

        </div>

    </div>
    <section class="main-sec">

        <div class="appointment-div">
            <h1>Service Note</h1>
            <div id="editor" height="150"></div>

            <input name="description" id="description" class="text-dark" type="hidden">
            <div class="image-drop">
                <img src="{{ asset('images')}}/image/Upload icon.png" height="50" alt="">


                <h3>Drop you image here </h3>
               <div class="file-upload-wrapper btn btn-success">
               <input type="file" class="file-upload" name="product-img" id="product-img" alt="product-img"/>
            </div>
            </div>

            @if(auth('owner')->check())

            @if(auth('owner')->user()->roleid == 1)
            <h5>Price</h5>  @csrf
            <input type="text" placeholder="Enter Price" class="search-input" id="price">
            <h5 class="ml-2">Please Select Date and Time</h5>
            <input type="date" id="date" name="birthday" class="search-input">
            <p></p>
            <input type="time" id="time" name="appt" class="search-input">
            <button class="last-btn" id="add_notes">Submit</button>
            @else
            <h5>Select Vendor</h5>
            <input type="text" placeholder="Search the Vendor Name" class="search-input" id="vendor-search">
            <div id="vendor-list" class="text-dark overflow-scroll" >

                </div>

                <button class="last-btn" id="submit-issue">Submit</button>
            @endif
            @else
            <h5>Select Vendor</h5>
            <input type="text" placeholder="Search the Vendor Name" class="search-input" id="vendor-search">
            <div id="vendor-list" class="text-dark overflow-scroll" >

                </div>

                <button class="last-btn" id="submit-issue" disabled>Submit</button>
            @endif

        </div>
        <div class="history-details">
        <div class="d-flex justify-content-center">
            <div class="spinner-border"
                 role="status" id="loading">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
            <div class="img-div-details">
                <div id="product-details-data">
               </div>
                <div class="befor">
                    <div class="div">

                    </div>
                    <div class="accordion" id="myAccordion">
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
                <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapseOne">History</button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#myAccordion">
                <div class="card-body">
                <div class="history-main-details" id="assign-history">


                  </div>
                </div>
            </div>
        </div>
                </div>



            </div>

        </div>
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

                <li>Home </li>
                <li>Service</li>
                <li>About US </li>
                <li>Tarot Cards</li>
                <li>Blog</li>
            </ul>
        </div>
        <div class="footer-third-div">
            <ul>
                <li style="font-family: 'Lato'sans-serif;
                        font-style: normal;
                        font-weight: 700;
                        font-size: 20px;
                        color: #6759FF;"> Services</li>

                <li>Blog</li>
                <li>Refrigerator</li>
                <li>Mobile</li>
                <li>Laptop</li>
                <li>Blender</li>
                <li>Air purifier</li>
            </ul>
        </div>
        <div class="footer-four-div">
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
            <p>© 2021 . All Rights Reserved. With love by Pathfinder Studio</p>
        </div>
    </section>
</body>
<!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script> -->
<script>
     $(document).ready(function() {
        // $('.file-upload').file_upload();
        var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = window.location.search.substring(1),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
        }
    }
    return false;
};
        let id = getUrlParameter('id');

        let order_id = getUrlParameter('order_id');
        let userid = $('#owner_id').val();

        var imgUrl ="{{env('ASSET_URL')}}";
        var appUrl ="{{env('APP_URL')}}";
        const api_url =
        appUrl+"/owner/click_product?id="+id



// Defining async function
async function getapi(api_url) {

    // Storing response

    const response = await fetch(api_url);

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
    let tab1 ='';

    for (let r of data.data) {
        var x = new Array();


             if(r.images != null){
                x = r.images
             }else{
              tab1 += `<img src="${assetUrl + 'product-dummy.png'}" height="100" width="100" alt="" class="img-thumbnail hover-zoom" style="height: 100px !important;">`;
             }



        for (let i of x) {
            tab1 += `<img src="${i}" height="100" width="100" alt="" class="img-thumbnail hover-zoom" style="height: 100px !important;">`;

        }
     let img = r.thumbnail_image == null?"https://miro.medium.com/max/600/0*jGmQzOLaEobiNklD":r.thumbnail_image;
    //  let img1 = r.images == null?"https://miro.medium.com/max/600/0*jGmQzOLaEobiNklD":r.images;

     $("orderid").val(r.order_id)
     tab += ` <div class="hover03"><div><figure><img src="${imgUrl}/images/products/${img}" height="400" width="700" alt="" class="img-thumbnail" style="height: 400px !important;"></figure></div></div>
                <div class="container mt-3" width="500" id="multi-img">${tab1}</div>
                <h1 class="">${r.product_name}<small class="text-muted" style="font-size: 20px;">(${r.brand})</small></h1>
                <h6>${r.product_name} services we provide include</h6>

                <p>
                ${r.product_description}
                </p>`;
 }
    // // Setting innerHTML as tab variable
     document.getElementById("product-details-data").innerHTML = tab;
}
// History Start
const api =
appUrl+"/owner/History_list?owner_id="+userid+"&product_id="+id;

// Defining async function
async function getapi1(url) {

    // Storing response
    const response = await fetch(url);

    // Storing data in form of JSON
    var data = await response.json();
    console.log(data);
    if (response) {
        hideloader1();
    }
    show1(data);
}
// Calling that async function
getapi1(api);
function hideloader1() {
    document.getElementById('loading').style.display = 'none';
}
function show1(data) {
    console.log(data.data)
    let tab ='';
    let tab1 ='';
    let date ='';
    let time ='';
    let count = 0;
    let multiimage = '';
    // Loop to access all rows
    if(data.status==true)
    {
     for (let r of data.data) {
        let multiimage = '';
        let x = r.images;
        for (let i of x) {
             multiimage += i == null?"{{ asset('images')}}/default-profile.png":`<img src=" ${i}" height="40" width="40" alt="" class="img-thumbnail hover-zoom" style="height: 100px !important;">`;
            // tab1 = `<img src="${i}" height="100" width="100" alt="" class="img-thumbnail hover-zoom" style="height: 100px !important;">`;

        }
        // let multiimage = r.images == null?"{{ asset('images')}}/default-profile.png":r.images;
    //    console.log("mul",r.image_arr)
        let date = r.date == null?"":r.date;
        let time = r.time == null?"":r.time;
        let img = r.vendor_image == null?"{{ asset('images')}}/default-profile.png":r.vendor_image;
     tab += ` <div class="vendor-name-history"><div class="images-div"><img src="${img}" alt="" width="50" class="float-start rounded-circle" id="${r.vendor_id}"><small class="text-muted h5 muted">${r.vendor_name}</small></div>
              <h6><small class="text-muted h5 muted">${time} ${date}</small></h6>
                <p>${r.description}
                </p>
                <div class="container mt-3" width="500" id="multi-img">
                ${multiimage}
               </div>
            </div>`;

         }
      document.getElementById("assign-history").innerHTML = tab;
         } else{
            tab += ` <div class="vendor-name-history"><div class="images-div"></div>

<p>You have no data!
</p>
</div>`;
            document.getElementById("assign-history").innerHTML = tab;
      }
}

// Vendor List Start
let ownerid = $("#ownerid").val();
let owner_id = $("#owner_id").val();
if(ownerid == 4 || owner_id == null)
{


var appUrl ="{{env('APP_URL')}}";
const api_vendor_list =
appUrl+"/owner/get_vendor_list/"+id;

// Defining async function
async function getVendor(url) {

    // Storing response
    const response = await fetch(url);

    // Storing data in form of JSON
    var data = await response.json();
    console.log(data);

    showVendor(data);
}
// Calling that async function
getVendor(api_vendor_list);

function showVendor(data) {

    let tab ='';
    let count = 0;
    // Loop to access all rows
     for (let r of data.data) {

       let img = r.image == null?"{{ asset('images')}}/default-profile.png":r.image;
     tab += ` <div class="list-vendor"><div class="image-div"><img src="${img}" alt="" width="50" class="float-start rounded-circle" id="${r.vendor_id}"><small class="text-muted h5 muted" id="vname">${r.first_name} ${r.last_name}</small> <div class="form-check">
  <input type="radio" class="form-check-input" id="radio1" name="optradio" value="${r.id}, ${r.first_name} ${r.last_name}" checked>

</div></div>

                <p>Code: #D-V00${r.id}<input type="hidden" value="${r.id}" id="vid"></p>

            </div><hr style="width:490">`;

         }
         console.log(tab)
      document.getElementById("vendor-list").innerHTML = tab;
}
     }

// ------------Add Order ---------------------//

     $('#submit-issue').click(function(){
        let owner_id = $('#owner_id').val();
        let role_id = $('#ownerid').val();

        if(role_id == 4){

        let pid = getUrlParameter('id');
        let vid = $('input[name="optradio"]:checked').val();
        let vname =vid.split(',');

        let description = $('#description').val();


        var files = $('#product-img')[0].files[0];
        let formData = new FormData();
        formData.append('product_id', pid);
        formData.append('image', files);
        formData.append('vendor_id', vname[0]);
        formData.append('description', description);
        formData.append('vendor_name', vname[1]);
        formData.append('owner_id', owner_id);
        console.log(formData);
        var appUrl ="{{env('APP_URL')}}";
        const api_url =
        appUrl+"/owner/add_order";
      let options = {
        method: 'POST',
        body: formData,
        }
// Defining async function
 getapi3(api_url, options);
async function getapi3(api_url, options) {

    // Storing response

    const response =  await fetch(api_url, options);

    // Storing data in form of JSON
    var data1 = await response.json();
    console.log(response);
    sendNotification(data1);
   if(data1.status== true)
   {

    $.toast({
    heading: 'Alert',
    text: data1.message,
    icon: 'info',
    loader: true,        // Change it to false to disable loader
    loaderBg: '#9EC600'  // To change the background
});
// location.href = 'owner/dashboard';

   }


}
}else{

            $.toast({
    heading: 'Alert',
    text: 'You are not authorized',
    icon: 'info',
    loader: true,        // Change it to false to disable loader
    loaderBg: '#9EC600'  // To change the background
});
        }
// Calling that async function

});

/*-----------Add Notes----------*/
function sendNotification(data){


    let userId = $('#owner_id').val();


                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: '{{  route("send.web-notification") }}',
                    type: 'POST',
                    data: {
                        orderId: data.data,
                        id:userId
                    },
                    dataType: 'JSON',
                    success: function (response) {
                        alert('notification sent');
                    }
                });

    }


/*-----------Add Notes----------*/
$('#add_notes').click(function(){
        let ownerid = $('#ownerid').val();


        let pid = getUrlParameter('id');
        let vid = $('#radio1').val();
        let description = $('#description').val();
        let date = $('#date').val();
        let time = $('#time').val();
        console.log(description);
        let order_amount = $('#price').val();
        var files = $('#product-img')[0].files[0];
        let formData = new FormData();
        formData.append('order_id', order_id);
        formData.append('images', files);
        formData.append('order_amount', order_amount);
        formData.append('note', description);
        formData.append('time', time);
        formData.append('date', date);
        console.log(formData);
        var appUrl ="{{env('APP_URL')}}";
        const api_url =
        appUrl+"/owner/order_accept";
      let options = {
        method: 'POST',
        body: formData,
        }
// Defining async function
 getapi3(api_url, options);
async function getapi3(api_url, options) {

    // Storing response
    console.log(api_url, options);
    const response =  await fetch(api_url, options);

    // Storing data in form of JSON
    var data1 = await response.json();
   if(data1.status== true)
   {

    $.toast({
    heading: 'Alert',
    text: 'Notes has been submitted',
    icon: 'info',
    loader: true,        // Change it to false to disable loader
    loaderBg: '#9EC600'  // To change the background
});
location.href = 'owner/dashboard';
   }


}

// Calling that async function

});
/*----
/* --------- Vendor List---------- */
$('#vendor-search').keyup(function(){

        let search = $('#vendor-search').val();
        var appUrl ="{{env('APP_URL')}}";
        const api_url =
        appUrl+"/owner/search_vendorname?id="+id+"&search="+search;
// Defining async function
 getsearch(api_url);
async function getsearch(api_url) {

    // Storing response

    const response =  await fetch(api_url);

    // Storing data in form of JSON
    var getdata = await response.json();
   if(getdata.status== true)
   {
    showVendor(getdata)
   console.log(getdata)
   }else{
    document.getElementById("vendor-list").innerHTML = "Data not found!";
   }


}
// Calling that async function
function showVendor(data) {
    console.log(data.data)
    let tab ='';
    let count = 0;
    // Loop to access all rows
     for (let r of data.data) {

       let img = r.image == null?"{{ asset('images')}}/default-profile.png":r.image;
     tab += ` <div class="list-vendor"><div class="image-div"><img src="${img}" alt="" width="50" class="float-start rounded-circle" id="${r.vendor_id}"><small class="text-muted h5 muted" id="vname">${r.first_name} ${r.last_name}</small> <div class="form-check">
  <input type="radio" class="form-check-input" id="" name="optradio" value="${r.id},${r.first_name} ${r.last_name}" checked onclick="vendor_id(${r.id})">

</div></div>

                <p>Code: #D-V00${r.id}<input type="hidden" value="${r.id}" id="vid"></p>
            </div>
            </div><hr style="width:490">`;

         }
      document.getElementById("vendor-list").innerHTML = tab;
}
});

     });
</script>
</html>
