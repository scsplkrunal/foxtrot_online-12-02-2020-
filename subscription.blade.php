@include('header')
	<div class="main-content">
		<div class="main-content-inner">
			<div class="page-content">
				<div class="row">
					<div class="col-xs-12">
						<!-- PAGE CONTENT BEGINS -->
                        @include('alerts')
                        
                        <div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
                                    <div class="row">
                                        <h4 class="white" style="padding:10px; background: #259cea;border-color:#259cea;">Vendor Subscription Detail</h4>
                                            @foreach($subscription as $key=>$val)
                                                @if($val->application_no==session()->get('application_no'))
                                                Application No:
                                                <span class="label label-success arrowed-in">{{$val->application_no}}</span>
                                                <br /><br />
                                                From:
                                                <span class="label label-success arrowed-in">{{Carbon\Carbon::parse($val->from_date)->format('d-m-Y')}}</span>
                                                To 
                                                <span class="label label-info arrowed-in-right arrowed">{{Carbon\Carbon::parse($val->to_date)->format('d-m-Y')}}</span>
                                                @endif
                                            @endforeach
                                            @if($isExpired==1)
                                            <br /><br />
                                            <div class="form-group">
                                                <div class="alert alert-danger fade in">
                                                    <i class="ace-icon fa fa-warning"></i>
                        							<strong>Error!</strong>
                                                    Your subscription is expired!!!
                        						</div>
                                            </div>
                                            {!! Form::open(['id'=>'subsribeForm']) !!}
                                                <input type="hidden" name="payment_amount" value="{{$amount->payment_amount}}" />
                                                <input type="hidden" name="payment_type_id" value="{{$amount->id}}" />
                                                <button type="button" class="btn btn-lg btn-primary">INR {{$amount->payment_amount}}</button>
                                                <button type="button" onclick="return submitForm();" class="btn btn-lg btn-success">Pay And Subscribe Now</button>
                                            {!! Form::close() !!}
                                            @endif
                                        <hr />
                                    </div>
                                    <div class="row">
                                        <div class="space-18"></div>
    									<div class="table-header">
    										Previous Subscribe Detail
    									</div>
    									<!-- div.table-responsive -->
    									<div class="table-responsive">
    										<table id="dynamic-table" class="table table-striped table-bordered table-hover responsive">
    											<thead>
                                                    <tr>
                                                        <th class="center">Sr No.</th>
                                                        <th>Application No.</th>
                                                        <th>From Date</th>
                                                        <th>To Date</th>
                                                        <th>Amount</th>
                                                        <th>Transaction Id</th>
                                                    </tr>
                                                </thead>
    											<tbody>
                                                    @foreach($subscription as $key=>$val)
                                                    <tr>
                                                        <td class="center">{{++$key}}</td>
                                                        <td>{{$val->application_no}}</td>
                                                        <td>{{Carbon\Carbon::parse($val->from_date)->format('d-m-Y')}}</td>
                                                        <td>{{Carbon\Carbon::parse($val->to_date)->format('d-m-Y')}}</td>
                                                        <td>{{$val->payment_amount}}</td>
                                                        <td>{{$val->transaction_id}}</td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
    										</table>
    									</div>
    								</div>
								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
						<!-- PAGE CONTENT ENDS -->
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.page-content -->
		</div>
	</div><!-- /.main-content -->
@include('footer')

<script src="{{asset('assets/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.dataTables.bootstrap.min.js')}}"></script>
        
<script type="text/javascript">
    function submitForm(){
        var msg = 'Are You Sure?';
        bootbox.confirm({
            title: "Confirm",
            message: msg,
            buttons: {
                cancel: {
                    className: 'btn-sm btn-primary btn-flat',
                    label: '<i class="fa fa-times"></i> Cancel'
                },
                confirm: {
                    className: 'btn-sm btn-success btn-flat',
                    label: '<i class="fa fa-save"></i> Confirm'
                }
            },
            callback: function (result) {
                if(result){
                    var url = "{{ url('/Subscribe') }}";
                    $('#subsribeForm').attr('action',url);
                    $('#subsribeForm').submit();
                }
            }
        });
        return false;
    }
    
    $(document).ready(function(){
        var myTable = 
    		$('#dynamic-table')
    		//.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
    		.DataTable( {
    			bAutoWidth: false,
                //"bLengthChange": false,
                //"bFilter": false,
                //"bPaginate": false,
    			"aoColumnDefs": [
                  {
                     "bSortable": false,
                     "aTargets": [ -1 ]
                  }
                ],
    			//"bProcessing": true,
    	        //"bServerSide": true,
    	        //"sAjaxSource": "http://127.0.0.1/table.php"	,
    			//,
    			//"sScrollY": "200px",
    			//"bPaginate": false,
    			//"sScrollX": "100%",
    			//"sScrollXInner": "120%",
    			//"bScrollCollapse": true,
    			//Note: if you are applying horizontal scrolling (sScrollX) on a ".table-bordered"
    			//you may want to wrap the table inside a "div.dataTables_borderWrap" element
    			//"iDisplayLength": 50
    			
    	    } );
    })
</script>