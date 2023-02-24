@include('layouts.header.front-end')
    <div class="maindiv">
        <div class="btn-div">
            <h1>Services</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit ut aliquam, purus sitsit amet ,<br> consectetur
                adipiscing elit ut aliquam, purus sit</p>
            <!-- <a class="box-btn">Our Services</a>
                <a class="border-btn">Contact Us </a> -->

        </div>

    </div>
    <div>

    </div>
    </div>
    <section class="services">
        <h1>All Our Product</h1>

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
<script>


     $(document).ready(function() {
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
        <div class="Product-card-services proposal-hover">
        <a href="./product-details?id=${r.id}" style="text-decoration: none;"><img src="${img}" alt="" width="150px" height="150px" id="${r.id}">
            <h2></h2>
            <h3><span style="display:inline-block;white-space: nowrap;overflow: hidden;text-overflow: ellipsis;max-width: 13ch;color:#453d3d;font-size:20px;">${r.product_name}</span></h3>
            <p><span style="display:inline-block;white-space: nowrap;overflow: hidden;text-overflow: ellipsis;max-width: 13ch;color:#808080; font-size:14px;">${r.product_description}</span></p>
            </a></div>
       `;
       }else{
        
        link =`<div class="Product-card-services proposal-hover" style="cursor: pointer;" onclick="login_alert()">
        <a style="text-decoration: none;"><img src="${img}" alt="" width="150px" height="150px" id="${r.id}" >
            <h2></h2>
            <h3><span style="display:inline-block;white-space: nowrap;overflow: hidden;text-overflow: ellipsis;max-width: 13ch;color:#453d3d;font-size:20px;">${r.product_name}</span></h3>
            <p><span style="display:inline-block;white-space: nowrap;overflow: hidden;text-overflow: ellipsis;max-width: 13ch;color:#808080; font-size:14px;">${r.product_description}</span></p>
            </a></div>`;
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
