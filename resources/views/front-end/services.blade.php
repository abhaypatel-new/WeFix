@include('layouts.header.front-end')
    <div class="maindiv">
        <div class="btn-div">
            <h1>Services</h1>
            <p>Public Building Service Maintenance Contracts: <br>Prevailing wages are also required on all public building service maintenance (janitorial) contracts.</p>
            <!-- <a class="box-btn">Our Services</a>
                <a class="border-btn">Contact Us </a> -->

        </div>

    </div>
    <div>

    </div>
    </div>
    <section class="services">
        <h1 style="margin: 50px 0px 50px 0px;">All Our Product</h1>

        <div class="Product-card-al row justify-content-center mt-3l" id="service-list">
            <tr>
        <div class="d-flex justify-content-center">
            <div class="spinner-border"
                 role="status" id="loading">
                <span class="sr-only">Loading...</span>
            </div>
        </div>

        </div>
        <div class="Product-card-all" id="service-list-1" width="1200">
            <!-- <div class="row"></div> -->


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
<script>


     $(document).ready(function() {

        $("#menu1").removeClass("active");
        $("#menu3").removeClass("active");
        $("#menu4").removeClass("active");
       $("#menu2").addClass("active");

        var appUrl ="{{env('APP_URL')}}";
        const api_url =
        appUrl+"/owner/get_all_product";
        let userId = $("#owner_id").val();
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
    let sum = 0;
    let link = '';
    // Loop to access all rows
    let count = 0;
    for (let r of data.data) {
        sum = count/3;
   
    let img = r.thumbnail_image == null?"https://miro.medium.com/max/600/0*jGmQzOLaEobiNklD":r.thumbnail_image;

       if(userId != null){
        
        link = `
        <div class="col-md-2 col-sm-3">
        <div class="productCard">
        <a href="./product-details?id=${r.id}" style="text-decoration: none;"><img src="${img}" alt="" width="100px" height="100px" id="${r.id}">
            <h2></h2>
            <h3 style="margin:0"><span style="display:inline-block;white-space: nowrap;overflow: hidden;text-overflow: ellipsis;max-width: 100%;color:#453d3d;font-size:16px; font-weight:500">${r.product_name}</span></h3>
            <p style="margin:0"><span style="display:inline-block;white-space: nowrap;overflow: hidden;text-overflow: ellipsis;max-width: 100%;color:#808080; font-size:14px;">${r.product_description}</span></p>
            </a></div></div>
       `;
       }else{
        
        link =`<div class="col-md-2 col-sm-4" onclick="login_alert()"><div class="productCard">
        <a style="text-decoration: none;"><img src="${img}" alt="" width="100px" height="100px" id="${r.id}" >
            <h2></h2>
            <h3 style="margin:0"><span style="display:inline-block;white-space: nowrap;overflow: hidden;text-overflow: ellipsis;max-width: 100%;color:#453d3d;font-size:16px; font-weight:500">${r.product_name}</span></h3>
            <p style="margin:0"><span style="display:inline-block;white-space: nowrap;overflow: hidden;text-overflow: ellipsis;max-width: 100%;color:#808080; font-size:14px;">${r.product_description}</span></p>
            </a></div></div>`;
       }
       

            tab +=  link;
          
           



    

    }
    console.log(count);
    // Setting innerHTML as tab variable
    document.getElementById("service-list").innerHTML = tab;
}

     });
     function login_alert(){
        $.toast({
    heading: 'Alert',
    text: 'Please login first',
    icon: 'info',
    position:"top-right",

    fadeDelay: 10000,
    offset: 40,
    loader: true,        // Change it to false to disable loader
    loaderBg: '#9EC600'  // To change the background
});

location.href = 'owner';
}
</script>
</html>
