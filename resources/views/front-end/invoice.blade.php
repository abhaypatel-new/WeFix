
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>A simple, clean, and responsive HTML invoice template</title>

		<style>
			.invoice-box {
				max-width: 800px;
				margin: auto;
				padding: 30px;
				border: 1px solid #eee;
				box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
				font-size: 16px;
				line-height: 24px;
				font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
				color: #555;
			}
            .title{
            	text-align: center;
            }
			.invoice-box table {
				width: 100%;
				line-height: inherit;
				text-align: left;
			}

			.invoice-box table td {
				padding: 5px;
				vertical-align: top;
			}

			.invoice-box table tr td:nth-child(2) {
				text-align: right;
			}

			.invoice-box table tr.top table td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.top table td.title {
				font-size: 45px;
				line-height: 45px;
				color: #333;
			}

			.invoice-box table tr.information table td {
				padding-bottom: 40px;
			}

			.invoice-box table tr.heading td {
				background: #eee;
				border-bottom: 1px solid #ddd;
				font-weight: bold;
			}

			.invoice-box table tr.details td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.item td {
				border-bottom: 1px solid #eee;
			}

			.invoice-box table tr.item.last td {
				border-bottom: none;
			}

			.invoice-box table tr.total td:nth-child(2) {
				border-top: 2px solid #eee;
				font-weight: bold;
			}

			@media only screen and (max-width: 600px) {
				.invoice-box table tr.top table td {
					width: 100%;
					display: block;
					text-align: center;
				}

				.invoice-box table tr.information table td {
					width: 100%;
					display: block;
					text-align: center;
				}
			}

			/** RTL **/
			.invoice-box.rtl {
				direction: rtl;
				font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
			}

			.invoice-box.rtl table {
				text-align: right;
			}

			.invoice-box.rtl table tr td:nth-child(2) {
				text-align: left;
			}
		</style>
	</head>

	<body>
		<div class="invoice-box">

		<div class="row">
        <div class="col-xl-12">
          <p style="color: #6759FF;font-size: 20px; margin-left:5px;">Invoice >> <strong class="text-danger">ID: #{{$viewReport->order_id}}</strong></p>
        </div>
			<table cellpadding="0" cellspacing="0">
				<tr class="top">

					<td colspan="2">
						<table>
							<tr>
								<td>
									 <img src="{{ asset('images') }}/services-icon-png-2296.png" width="80" height="80" />
								</td>
                           
									<td colspan="5">
										WeFix Pvt Ltd,<br />
									in Canada Postal Code:02541<br />
									<i class="fa fa-phone-alt" style="color:black;"></i>{{$viewReport->phone}}
								</td>
							</tr>
						</table>
					</td>
					<hr>
				</tr>

				<tr class="information">
					<td colspan="2">
						<table>
							<tr class="item">
								<td>
									{{$viewReport->owner_name}},<br />
									{{$viewReport->address}} MP, India<br />
									<i class="fa fa-phone-alt" style="color:black;"></i>{{$viewReport->phone}}
								</td>

								<td>
									<b>Invoice #: </b>{{$viewReport->order_id}}<br />
									<b> Created:</b>   {{$viewReport->data}} {{$viewReport->time}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br />
									<b> Status:</b>    {{$viewReport->payment_status}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								</td>
							</tr>
						</table>
					</td>
				</tr>

				 <table class="table table-striped table-borderless">
            <thead style="background-color:#6759FF ;" class="text-white">
              <tr class="heading">
                <td>#</td>
                <td>Image</td>
                <td>Name</td>
                <td>Description</td>
                <td>Qty</th>
                <td>Unit Price</td>
                <td>Amount</td>
              </tr>
            </thead>
            <tbody>
              <tr class="details">

                <td>1</td>
                <td><img src="{{ asset('images') }}/services-icon-png-2296.png" height="50" width="50" alt="" class="img-thumbnail hover-zoom"></td>
                <td>{{$viewReport->product_name}}</td>
                <td>{{$viewReport->description}}</td>
                <td>{{$viewReport->qty}}</td>
                <td>${{$viewReport->price}}</td>
                <td>${{$viewReport->total}}</td>
              </tr>

            </tbody>

          </table>
           <tr class="information">
					<td colspan="2">
						<table>
							<tr>
								<td>
									
								</td>

								<td>
									 <p class="">SubTotal: ${{$viewReport->sub_total}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
								   <p class="">Track Charge: ${{$viewReport->track_charge}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
								
								  <p class="">Labour Charge: ${{$viewReport->labour_charge}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
								
								  <p class="ms-3">Extra Charge: ${{$viewReport->extra_charge}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
								
								  <p class="ms-3">Tax: ${{$viewReport->tax}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
								<hr>
								  <p class="total"><b>Grand Total: ${{$viewReport->order_amount}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></p>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			

			
          <tr class="information">
					<td >
						<table>
							<tr class="item">
								<td>
									Thank You.
								</td>

								
							</tr>
						</table>
					</td>
				</tr>
        </div>
			</table>
		</div>
	</body>
</html>