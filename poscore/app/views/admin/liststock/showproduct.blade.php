@section('sidebar')
<div class="red logoarea">
	<a href={{URL::route('adminShowCategory', array(slug($brand->name)))}}>{{imging($brand->brandlogo)}}</a>
</div>
 
<li>
	<a href="#myModal" modal-urlx={{ URL::route( 'adminAddProduct', array($addProductLink['brand_id'],$addProductLink['productcat_id'] )) }} title="Add Product Type">
		<i class="icon-plus bigger-160 blue"></i>
		<span class="menu-text">Add Product</span>
	</a>
</li>

<li>
	<a href="#" class="multipletogglestatus">
		<i class="icon-ok-sign bigger-80 green"></i><span class="menu-text">On</span> 
		| 
		<i class="icon-minus-sign bigger-120 red"></i><span class="menu-text">Off</span> Status
	</a>
</li>

<li>
	<a class="multiple_delete" href="#">
		<i class="icon-trash bigger-160 red"></i>
		<span class="menu-text">Delete Product</span>
	</a>
</li>

<li>
	<a href="../{{slug($brand->name)}}">
		<i class="icon-arrow-left bigger-160 orange"></i>
		<span class="menu-text">One step back</span>
	</a>
</li>

@stop

<div class="alert  alert-success" style="margin:5px 0">
	<div class="row-fluid">
		<div class="span12">
			<div class="span6">
				<i class="icon-briefcase bigger-160 orange"></i>
				<h4 style="display:inline-block" class="small">
					ITEMS <i class="icon-double-angle-right"></i> {{ucwords($mode)}}
					<small class="green">
						<strong>
						<i class="icon-ellipsis-vertical"></i>
						{{ucwords($cat)}}
						</strong>
					</small>
					<span class="loadertargetplace"></span>
				</h4>
			</div>
			<div class="span6">

		<div class="sum_total bolder grey" style="position:absolute; right:10px; top:-3px; font-size:12px"> All total price: <div class="purple inline">{{{currency()}}}<span class="sum_total_money">{{format_money($sum_total)}}</span>k</div></div>

		<div class="sum_cost bolder grey" style="position:absolute; right:10px; top:10px; font-size:12px"> All total cost price: <div class="purple inline">{{{currency()}}}<span class="sum_cost_money">{{format_money($sum_cost)}}</span>k</div></div>

		<div class="sum_profit bolder grey" style="position:absolute; right:10px; top:23px; font-size:12px"> All profit margin: <div class="purple inline">{{{currency()}}}<span class="sum_profit_margin">{{format_money($profit_margin)}}</span>k</div></div>
			</div>
		</div>
	</div>
</div>


<div class="row-fluid">
	<table id="sample-table-2" class="table table-bordered table-hover">
		<thead>
			<tr style="">
				<th class="center">
					<label>
						<input type="checkbox" id="default_checkbox"/>
						<span class="lbl"></span>
					</label>
				</th>
				<th>#</th>
				<th>Products<br/><small class="muted">Barcode-ID</small></th>
				<th><small>Status</small></th>
				<th><small>Qty / <br> Qty.Warning</small></th>
				<th>Unit price <br/><small class="muted">Cost price</small><br/><small class="muted">Profit margin</small></th>
				<th><small>Discount / <br>Discounted Unit Price </small></th>
				<th>Total price<br/><small class="muted">Total cost price</small> <br/><small class="muted">Total profit margin</small></th>
				<th></th>
			</tr>
		</thead>

		<tbody>
		
 @if( isset($products) && $products != null)
 <?php $productCounter=0; ?>
	@foreach($products as $product)
			<tr id="data-{{$product['id']}}" class="deletethis">
				<td class="center">
					<label>
						<input type="checkbox" name="checkbox" value="{{$product['id']}}"/>
						<span class="lbl"></span>
					</label>
				</td>
				<td class="center">{{++$productCounter}}</td>
				<td class="productname">
					<div class="span12">

						<span class="blue tooltip-info force-smalltext force-bolder" style="border-bottom:none;" data-name='name' data-title='Change product name' data-pk="{{{$product['id']}}}" data-placement="right" data-productname="{{{$product['id']}}}">
							{{{istr::title($product['name'])}}}
						</span><br/>
						<small class="muted"><span class="barcodeID tooltip-info force-smalltext force-bolder" style="border-bottom:none;" data-name='barcodeid' data-title="Barcode ID for {{{istr::title($product['name'])}}}" data-pk="{{{$product['id']}}}" data-placement="right" data-productname="{{{$product['id']}}}">{{barcodeID($product['barcodeid'])}}</span></small>

					</div>
				</td>
				
				<td class="status center"> 
					<a href="#" class="togglepublished" status-id={{$product['id']}} status-url={{URL::route('productStatus')}}> 
						<i class="@if($product['published'] == 1) green icon-ok-sign @else red icon-minus-sign @endif bigger-160"></i>
					</a> 
				</td>

				<td class="productquantity"> 
					<div class="span12">
						<div class="span7 @if($product['almost_finished'] > 0 && $product['quantity'] <= $product['almost_finished']) orange @endif">
							<span style="border-bottom:none;" data-name='quantity' data-title='Adjust quantity' data-pk="{{{$product['id']}}}" data-quantity="{{{$product['id']}}}">{{{$product['quantity']}}}</span>

							<!-- ADD OR REMOVE PRODUCT HERE -->
							<!--<span style="width: 10px; height: 29px; position:relative" class="pull-right">
								<span data-name='quantity' data-display=false data-title='Add quantity' data-pk="{{{$product['id']}}}" data-quantity="{{{$product['id']}}}" class="green tooltip-success"><i style="margin:0; padding:0; position:absolute; top:0" class="icon-plus smaller-80"></i></span>

								<span data-name='subtract_quantity' data-display=false data-title="Subtract quantity" data-pk="{{{$product['id']}}}" data-quantity="{{{$product['id']}}}" class="red tooltip-error"><i style="margin:0; padding:0; position:absolute; top:15px" class="icon-minus smaller-80"></i></span>
							</span>-->
						</div>

						<div class="span5 center purple">
							<span class="label label-purple" style="border-bottom:none;" data-name='almost_finished' data-title='Set Almost Out of stock warning' data-pk="{{{$product['id']}}}" data-quantity="{{{$product['id']}}}">{{{$product['almost_finished']}}}</span>
						</div>
						
					</div>
				</td>

				<td class="blue force-bolder">
					{{{currency()}}}<span class="tooltip-warning" style="border-bottom:none; font-weight:bold" data-name='price' data-title='Set unit price' data-pk="{{{$product['id']}}}" data-price="{{{$product['id']}}}">{{{format_money($product['price'])}}}</span>k
					<br/>
					<small class="muted">{{{currency()}}}<span class="tooltip-warning" style="border-bottom:none; font-weight:bold" data-name='costprice' data-title='Set cost price' data-pk="{{{$product['id']}}}" data-price="{{{$product['id']}}}">{{{format_money($product['costprice'])}}}</span>k</small>
					<br/>
					<?php 
						$cdiff = $product['price'] - $product['costprice']; 
						$cdcolor = ( $cdiff < 0 ) ? 'red' : 'green'; 
					?>
					<small class="{{$cdcolor}}">{{{currency()}}}<span class="price_difference">{{{format_money($cdiff)}}}</span>k </small>
				</td>

				<td> 
					<span class="blue"><span style="border-bottom:none;" class="" data-name='discount' data-title='Set discount. E.g 10' data-pk="{{{$product['id']}}}" data-discount="{{{$product['id']}}}">{{{$product['discount']}}}</span>%</span>

					<span class="label label-large label-yellow arrowed-in">
						{{{currency()}}}<span datax-name='discountedprice' datax-pk="{{{$product['id']}}}">{{{format_money($product['discountedprice'])}}}</span>k
					</span>
				</td>
				
				<td>
					<span class="bolder">
	<?php 
		$totalprice = $product['quantity'] * ( (int)$product['discountedprice'] > 0 ? $product['discountedprice'] : $product['price'] );
	?>
						{{{currency()}}}<span datax-name='totalprice' datax-pk="{{{$product['id']}}}">{{{format_money($totalprice)}}}</span>k
					</span>
					<br/>
					<small class="muted"><span class="bolder">
	<?php $totalcostprice =  $product['quantity'] * $product['costprice']; ?>
						{{{currency()}}}<span datax-name='totalcostprice' datax-pk="{{{$product['id']}}}">{{{format_money($totalcostprice)}}}</span>k
					</span></small>
					<br/>
					<?php $tdiff = $totalprice - $totalcostprice; $dcolor = ( $tdiff < 0 ) ? 'red' : 'green'; ?>
					<small class="{{$dcolor}} bolder"> {{{currency()}}}<span class="totalprice_difference">{{{format_money($tdiff)}}}</span>k </small>
				</td>

				<td class="td-actions">
					<div class="hidden-phone visible-desktop action-buttons">
						<a class="red single_delete" href="#" ref-type="delete" ref-url="" title="Delete {{{$product['name']}}}">
							<i class="icon-trash bigger-130"></i>
						</a>
					</div>
				</td>
			</tr>
@endforeach	
@endif
		</tbody>
	</table>
</div>
							

<!--inline scripts related to this page-->
<script type="text/javascript">
	$(document).ready(function() {

		//Toggles status for products
		$('.togglepublished, .multipletogglestatus').toggleStatus();

		var oTable1 = $('#sample-table-2').dataTable( {
			"bPaginate": false,
			"aoColumns": [
						{ "bSortable": false }, null, null, null, null, null, null, null, { "bSortable": false }
					]
				} );
		
		$('table th input:checkbox').on('click' , function(){
			var that = this;
			$(this).closest('table').find('tr > td:first-child input:checkbox')
			.each(function(){
				this.checked = that.checked;
				$(this).closest('tr').toggleClass('selected');
			});
		});

//Xeditable Bootstrap starts
		$(this).on('click', 'a[data-controller]', function(e){
			e.preventDefault();
		    e.stopPropagation();
		    var val = $(this).attr('data-controller');
		    var ctype = $(this).attr('clicked');

			$('span[data-'+ctype+'="'+ val +'"]').editable({
			    display: function(value) {
			       $('span[data-'+ctype+'="'+ val +'"]').text(value);
			    }
			});

			$('span[data-'+ctype+'="'+ val +'"]').editable('toggle');

		});

		$('span[data-pk]').editable({
			validate: function(value) {
				var v = $.trim(value);
			    if(v == '') {
			        return 'This field is required';
			    }
			},

			placement 	: 'top',
			type 		: 'text',
			url 		: "{{URL::route('updateproduct')}}",
			params 		:{mode:"{{$mode}}", cat_type:'product'},
			success 	:ajaxAction,
			highlight 	:false,
			emptytext 	:false,
		});

		function ajaxAction(response){
			$(document).ajaxComplete(function() {
				if(response.status == 'success'){

//Function to change the profit margin between unitprice and costprice
//To either red or green color
function changeProfitMarginColor( pmargin, $tpmargin ){
		if( pmargin < 0 ){
			$tpmargin.closest('small').removeClass('green').addClass('red');
		}else{
			$tpmargin.closest('small').removeClass('red').addClass('green');
		}
}

function profitMarginCalculate(){
	var $price_difference, $totalprice_difference, price_difference, totalprice_difference;

	//We'll set the price difference value
	$price_difference =  $('tr#data-'+response.id+ ' span.price_difference');
	price_difference = unformat_money($('span[data-name="price"][data-pk="'+response.id+'"]').text()) - 
     		unformat_money($('span[data-name="costprice"][data-pk="'+response.id+'"]').text());

   	$price_difference.text( format_money( price_difference, 2) );
   	changeProfitMarginColor( price_difference, $price_difference );

	//Setting the total cost price on a single item
	$('span[datax-name="totalcostprice"][datax-pk="'+ response.id +'"]')
				        .text(response.totalcostprice);

	//Setting the profit margin
	$totalprice_difference = $('tr#data-'+response.id+ ' span.totalprice_difference')
	totalprice_difference = unformat_money($('tr#data-'+response.id+ ' span[datax-name="totalprice"]').text()) - 
     		unformat_money(response.totalcostprice);

 	$totalprice_difference.text( format_money( totalprice_difference, 2) );
 	changeProfitMarginColor( totalprice_difference, $totalprice_difference );
}

function allProfitMarginCalculate(){
	var sum_cost_moneyx = 0;
	$('span[datax-name="totalcostprice"]').each(function(){
	 	if( unformat_money($(this).closest('td').find('span[datax-name="totalprice"]').text()) > 0 ){
	 		sum_cost_moneyx += unformat_money($(this).text());
	 	}
	 });

	 $('.sum_cost_money').text(format_money(sum_cost_moneyx, 2));

    $('.sum_profit_margin').text( format_money((unformat_money($('span.sum_total_money').text()) - sum_cost_moneyx), 2) );
}


				    if( response.ctype !== undefined ){
				        $('tr#data-'+response.id+ ' td span[data-name="'+ response.ctype +'"]').text(response.value);

				    	//Function in g56_function.js
						//We update the stock alert counter
						checkStockAlertAfterPayment("{{URL::route('outofstockwarning_count')}}");

						//We'll set the total cost price difference
						if( response.totalcost_price !== undefined ){
							$('span[datax-name="totalcostprice"][datax-pk="'+ response.id +'"]')
				        	.text( response.totalcost_price );
						}

						//Should be remove after proper testing
						//profitMarginCalculate();

					}

				    if( response.total_price !== undefined ){

				        $('span[datax-name="totalprice"][datax-pk="'+ response.id +'"]')
				        .text(response.total_price);

				        //Do profit margin
				        profitMarginCalculate();

				         /** WORKING TO GET ALL TOTAL PRICE **/
				        var sum_total_money=0;

				      	$('span[datax-name="totalprice"]').each(function(){
				        	sum_total_money += unformat_money($(this).text());
				        });

				      	//This is where we'll sum total price in real time
				        $('.sum_total_money').text( format_money(sum_total_money, 2) );

				        /** WORKING TO GET THE ALL PROFIT MARGIN **/
				        allProfitMarginCalculate();
				    }

				    if( response.discounted_price !== undefined ){
				        $('span[datax-name="discountedprice"][datax-pk="'+ response.id +'"]')
				        .text(response.discounted_price);
				    }

				    if( response.name !== undefined ){
				     	$('span[data-name="name"][data-pk="'+ response.id +'"]')
				        .text(response.name);
				    }

				    if( response.barcodeid !== undefined ){
				     	$('span[data-name="barcodeid"][data-pk="'+ response.id +'"]')
				        .text(response.barcodeid);
				    }

				        //COST PRICE
				    if( response.costprice !== undefined ){
				    	$('span[data-name="costprice"][data-pk="'+ response.id +'"]')
				        .text(response.costprice);

				        //Do profit margin
				        profitMarginCalculate();
						
						/** WORKING TO GET THE ALL PROFIT MARGIN **/
						allProfitMarginCalculate();

				    }

			    }else if( response.status == 'error' ){
			    	if( response.name !== undefined )
				     	$('span[data-name="name"][data-pk="'+ response.id +'"]')
				     	.text(response.name);

				    if( response.barcodeid !== undefined )
				     	$('span[data-name="barcodeid"][data-pk="'+ response.id +'"]')
				        .text(response.barcodeid);

				     	bootbox.alert(response.message);
			    }

			    $(this).unbind('ajaxComplete');
			   // $(this).unbind('alert');
			});
		}

		$.fn.editableform.buttons = '<button type="submit" class="btn btn-success editable-submit btn-mini"><i class="icon-ok icon-white"></i></button>' +
 '<button type="button" class="btn editable-cancel btn-mini"><i class="icon-remove"></i></button>';
//Xeditable Bootstrap ends	
	
	//Deleting of items
	$('.single_delete, .multiple_delete').deleteItemx({
		url: "{{URL::route('deleteproducts')}}",
		rollNameClass:'productname',
		afterDelete:checkStockAlertAfterPayment,
		afterDelete_args:"{{URL::route('outofstockwarning_count')}}"
	});


	//Modal call for Add Service
	var addProduct = function (e){
		var $that = $(this), url = $(this).attr('modal-urlx');

		$("a[modal-urlx]").off('click.addProduct', addProduct);

		$.get(url, function(data) {

			cloneModalbox($('#myModal'))
			.css({'width':'600px'})
			.centerModal()
			.find('.modal-body').html(data)
				.end()
			.find('.modal-header h3')
			.text('Add Services')
			.css({'color':'white'}).removeClass('red lighter')
			.end()
			.modal();

			$("a[modal-urlx]").on('click.addProduct', addProduct);

		});
	};

	$("a[modal-urlx]").on('click.addProduct', addProduct);

});
</script>