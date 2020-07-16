@extends('layouts.app')
@push('css')
    <link href="{{asset('assets/css/customs/products.css')}}" rel="stylesheet"/>
@endpush
@section('content')
    <div class="row">
        <h5 class="product-header"> Produk </h5>
    </div>
    <div class="row margin-top-15">
        @if($products['status'])
            @foreach($products['data'] as $product)
            <div class="col-lg-4 col-md-4 col-xs-4 card-products">
                <div class="panel panel-flat">
                    <img src="{{url("$product->file_path")}}" class="card-image"/>
                    <div class="panel-body">
                        <div class="row" style="padding-left: 10px;padding-right: 10px;">
                            <h6 class="card-title"> 
                               {{ $product->name }}
                            </h6>
                            <p class="card-description">
                                {{ $product->description }}
                            </p>
                            <h5 class="card-txt-money">
                                IDR. <span class="span-product-price">{{ number_format($product->price, 0,'','.') }}</span>,-
                            </h5>
                            <div class="col-lg-12 col-md-12 col-xs-12 no-padding" style="margin-top: 10px;">
                                <div class="col-lg-1 col-md-1 col-xs-2 no-padding btn-minus-total disabled">
                                    <span>
                                        <i class="icon-minus-circle2 btn-total"></i>
                                    </span>
                                </div>
                                <div class="col-lg-2 col-md-2 col-xs-2" style="text-align: center;">
                                    <span class="txt-total" data-product_id="{{$product->id}}" data-product_price="{{$product->price}}"> 0 </span>
                                </div>
                                <div class="col-lg-1 col-md-1 col-xs-2 no-padding btn-plus-total">
                                    <span>
                                        <i class="icon-plus-circle2 btn-total"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        @endif

        {{-- @if($products['status'])
            @foreach($products['data'] as $product)
            <div class="col-lg-6 col-md-6 col-xs-12 card-product">
                <div class="col-lg-4 col-md-4 col-xs-4">
                    <img src="{{asset("$product->file_path")}}" class="card-image"/>
                </div>
                <div class="col-lg-8 col-md-8 col-xs-8">
                    <h4 class="card-header">
                        {{$product->name}}
                        @if($product->recommended)
                        <span style="margin-left: 5%;"> <img src="{{asset('assets/images/lalemon/icon-top-finger.png')}}"/></span>
                        @endif
                    </h4>
                    <h5 class="card-txt-money">
                        <span style="margin-right: 5%;"> <img src="{{asset('assets/images/lalemon/icon-dollar-money.png')}}"/></span>
                        Rp. {{ number_format((int)$product->price, 0,'',',') }}
                    </h5>
                    <p class="card-description">
                        {{$product->description}}
                    </p>
                </div>
            </div>
            @endforeach
        @endif --}}
    </div>
    <div class="row margin-top-15">
        <h5 class="product-header"> Tujuan Pengiriman </h5>
    </div>
    <div class="row margin-top-15">
        <form class="form-login" id="form-order">
            {{csrf_field()}}
            <div class="row">
                <div class="col-lg-4 col-md-4 col-xs-12">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Nama lengkap" name="txt-fullname">
                        <span class="help-block"> *This field cannot be empty</span>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4 col-md-4 col-xs-12">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Alamat email" name="txt-email">
                        <span class="help-block"> *This field cannot be empty</span>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4 col-md-4 col-xs-12">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Alamat" name="txt-alamat">
                        <span class="help-block"> *This field cannot be empty</span>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-lg-4 col-md-4 col-xs-12">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Kecamatan" name="txt-kecamatan">
                        <span class="help-block"> *This field cannot be empty</span>
                    </div>
                </div>
            </div>

            
            <div class="row">
                <div class="col-lg-4 col-md-4 col-xs-12">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Kota" name="txt-kota">
                        <span class="help-block"> *This field cannot be empty</span>
                    </div>
                </div>
            </div>

            
            <div class="row">
                <div class="col-lg-4 col-md-4 col-xs-12">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Kode Pos" name="txt-kodepos">
                        <span class="help-block"> *This field cannot be empty</span>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4 col-md-4 col-xs-12">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Nomor Handphone" name="txt-phone_number">
                        <span class="help-block"> *This field cannot be empty</span>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4 col-md-4 col-xs-12">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Total Harga" name="txt-total-harga" disabled>
                        <span class="help-block"> *This field cannot be empty</span>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-lg-4 col-md-4 col-xs-12">
                    <button class="btn btn-success" id="btn-confirm-order"> Pesan sekarang! </button>
                </div>
            </div>
        </form>
    </div>
@endsection
@push('js')
    <script src="//cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js"></script>
    <script type="text/javascript">
        const BASE_URL = window.location.origin;

        const validateForm = () => {
            let email_regex  = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i;
            let fullname     = $('input[name="txt-fullname"]');
            let email        = $('input[name="txt-email"]');
            let alamat       = $('input[name="txt-alamat"]');
            let kecamatan    = $('input[name="txt-kecamatan"]');
            let kota         = $('input[name="txt-kota"]');
            let kodepos      = $('input[name="txt-kodepos"]');
            let phone_number = $('input[name="txt-phone_number"]');
            let error = false;

            if(fullname.val() == "") {
                error = true;
                fullname.parent().addClass('has-error');
                fullname.siblings('span').show();
                // setTimeout(() => {
                //     fullname.parent().removeCl('has-error');
                //     fullname.siblings('span').show();
                // }, 1500);
            }
            if(email.val() == "") {
                error = true;
                email.parent().addClass('has-error');
                email.siblings('span').text('*This field cannot be empty').show();
            }
            else {
                if(!email_regex.test(email.val())){
                    error = true;
                    email.parent().addClass('has-error');
                    email.siblings('span').text('Invalid email format, try to use another one.').show();
                }
            }

            if(alamat.val() == "") {
                error = true;
                alamat.parent().addClass('has-error');
                alamat.siblings('span').show();
                // setTimeout(() => {
                //     fullname.parent().removeCl('has-error');
                //     fullname.siblings('span').show();
                // }, 1500);
            }

            if(kecamatan.val() == "") {
                error = true;
                kecamatan.parent().addClass('has-error');
                kecamatan.siblings('span').show();
                // setTimeout(() => {
                //     fullname.parent().removeCl('has-error');
                //     fullname.siblings('span').show();
                // }, 1500);
            }

            if(kota.val() == "") {
                error = true;
                kota.parent().addClass('has-error');
                kota.siblings('span').show();
                // setTimeout(() => {
                //     fullname.parent().removeCl('has-error');
                //     fullname.siblings('span').show();
                // }, 1500);
            }

            if(kodepos.val() == "") {
                error = true;
                kodepos.parent().addClass('has-error');
                kodepos.siblings('span').show();
                // setTimeout(() => {
                //     fullname.parent().removeCl('has-error');
                //     fullname.siblings('span').show();
                // }, 1500);
            }

            if(phone_number.val() == "") {
                error = true;
                phone_number.parent().addClass('has-error');
                phone_number.siblings('span').show();
                // setTimeout(() => {
                //     fullname.parent().removeCl('has-error');
                //     fullname.siblings('span').show();
                // }, 1500);
            }

            if(fullname.val() != "" && email.val() != "" && email_regex.test(email.val()) && alamat.val() != "" && kecamatan.val() != "" && kota.val() != "" && kodepos.val() != "" && phone_number.val() != ""){
                error = false;
            }
            console.log(error);
            return error;
        };

        // on ready function0
        $(function() {
            $.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			}); 

            let totalPrice = 0;

            $('span.help-block').hide();

            $('#btn-confirm-order').on('click', function(e) {
                e.preventDefault();
                let isError = validateForm();
                let orderExisting = false;
                $('span.txt-total').each(function(){
                    let total = parseInt($(this).text());
                    if(total > 0) {
                        orderExisting = true;
                    }
                });

                if(orderExisting && !isError) {
                    let ajaxData = $('#form-order').serialize();
                    let products = [];
                    $('span.txt-total').each(function(){
                        let total = parseInt($(this).text());
                        if(total > 0) {
                            products.push({
                                product_id: $(this).data('product_id'),
                                product_total: total
                            });
                        }
                    });
                    
                    ajaxData += "&products="+JSON.stringify(products);
                    let request = $.post(BASE_URL + '/customer-confirm-order', ajaxData, 'json');

                    request.done((responses) => {
                        ModalResponse(responses);
                    });

                    request.fail((xhr, textStatus, error) => {
                        console.log(textStatus);
                    });
                }
                else if(!orderExisting) {
                    alert("Whoops! At least order one item to continue this process");
                }
            })

            $('div.btn-minus-total').on('click', function() {
                if(!$(this).hasClass('disabled')) {
                    let parent = $(this).parent();
                    let root = parent.parent();
                    let price = parseInt(root.children('.card-txt-money').children('span.span-product-price').text().replace(".", ""));
                    
                    let total = parseInt(parent.children().eq(1).find('span.txt-total').text());
                    if(total > 0) {
                        total -= 1;
                        totalPrice -= price;
                    }
                    else if(total == 0) {
                        $(this).addClass('disabled');
                    }
                    else {
                        $(this).addClass('disabled');
                    }
                    $('input[name="txt-total-harga"]').val('Total harga: IDR ' + numeral(totalPrice).format('0,0'));
                    parent.children().eq(1).find('span.txt-total').text(total.toString());
                }
            });

            $('div.btn-plus-total').on('click', function() {
                let parent = $(this).parent();
                let root = parent.parent();
                let price = parseInt(root.children('.card-txt-money').children('span.span-product-price').text().replace(".", ""));
                
                let total = parseInt(parent.children().eq(1).find('span.txt-total').text());
                total += 1;
                totalPrice += price;
                if(total > 0) {
                    parent.children('div.btn-minus-total').removeClass('disabled');
                }
                $('input[name="txt-total-harga"]').val('Total harga: IDR ' + numeral(totalPrice).format('0,0'));
                parent.children().eq(1).find('span.txt-total').text(total.toString());
            });

            $('input').on('keyup', function() {
                if($(this).val() == "") {
                    console.log('test');
                    $(this).siblings('span').hide();
                    $(this).parent().removeClass('has-error');
                }
                else {
                    if($(this).attr('name') == 'txt-phone_number') {
                        console.log();
                        if(!new RegExp(/^[0-9]/g).test($(this).val()) || !new RegExp(/^[0-9]/g).test($(this).val()[$(this).val().length - 1])){
                            $(this).siblings('span').text('Number allowed only').show();
                            $(this).parent().addClass('has-error');
                            $(this).val($(this).val().replace(/[^0-9]/g, ''));
                        }
                        else if($(this).val().length > 16) {
                            $(this).siblings('span').text('Maximal for phone number is 16 digit only').show();
                            $(this).parent().addClass('has-error');
                            $(this).val(($(this).val().toString()).substring(0, $(this).val().length - 1))
                        }
                        else {
                            console.log('allowed');
                            $(this).siblings('span').text('*This field cannot be empty').hide();
                            $(this).parent().removeClass('has-error');
                        }
                    }
                }
            });
        });
    </script>
@endpush