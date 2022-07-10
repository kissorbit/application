@extends('layouts.master')
@section('head')
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo asset('assets/css/datatables/tools/css/dataTables.tableTools.css'); ?>" />
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo asset('assets/css/custom.css'); ?>" />
<script type="text/javascript" src="<?php echo asset('assets/js/ng-form-plugin.js'); ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.6.1/angular.js" ></script>
<script stype="text/javascript">
    var ngSubmit_lsrApp = angular.module('ngSubmit_lsrApp', [], function($interpolateProvider)
    {$interpolateProvider.startSymbol('<%'); $interpolateProvider.endSymbol('%>'); });
    ngSubmit_lsrApp.controller('ngSubmit_lsrAppcontroller', function($scope) {
    $scope.user = [];
    $scope.Lsr={!! App\Lsr::all()->toJson() !!};
    $('#Submit_lsr-form').Add({Type:'POST',Headers:{'X-CSRF-TOKEN':'<?php echo csrf_token();?>'}, ModuleName:'Submit_lsr', ModuleItemName:'Submit_lsrItem', NgAppName:'ngSubmit_lsrApp'});
    $('#Submit_lsr-form').Edit({Type:'GET',Headers:{'X-CSRF-TOKEN':'<?php echo csrf_token();?>'}, ModuleName:'Submit_lsr', ModuleItemName:'Submit_lsrItem', NgAppName:'ngSubmit_lsrApp'});
    $('#Submit_lsr-form').Delete({Type:'DELETE',Headers:{'X-CSRF-TOKEN':'<?php echo csrf_token();?>'}, ModuleName:'Submit_lsr', ModuleItemName:'Submit_lsrItem', NgAppName:'ngSubmit_lsrApp'});
    $('#Submit_lsr-form').Submit({Type:'POST',Headers:{'X-CSRF-TOKEN':'<?php echo csrf_token();?>'}, ModuleName:'Submit_lsr', ModuleItemName:'Submit_lsrItem', NgAppName:'ngSubmit_lsrApp'});
    });</script>
@stop
@section('content')
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Manage Requested LSR</h3>
        </div>
        <div class="title_right">
            <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button">Go!</button>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <div class="row">
                       <div class="col-md-8 col-sm-8 col-xs-7"><h2>Requested LSR List</h2></div>
                       <div class="col-md-4 col-sm-4 col-xs-5">
                           <button class="btn btn-primary form-modal-button pull-right" data-toggle="modal" data-target=".form-modal">Add New request LSR</button>
                       </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                        <table class="table table-striped responsive-utilities jambo_table dataTable" id="Submit_lsr-table">
                            <thead>
                                <tr>
                                    <th><input type="checkbox" id="check-all" class="flat"></th>
                                    <th>ID</th>
                                    <th>Selection of LSR</th><th>Types of goods</th><th>Estimated value</th><th>Weight</th><th>Origin Country</th><th>Destination country</th><th>Pick-up Location</th><th>Delivery Location</th><th>Transit</th><th>Bill of loading</th><th>Loading Date</th><th>Loading Services</th><th>Of-loading Service</th><th>Recipient name</th><th>Telephone Number</th><th>Observations</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                        </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Form modal -->
    <div class="modal fade form-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">Submit_lsr
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </h4>
                </div>
                <div class="modal-body">
                    <form  ng-app="ngSubmit_lsrApp" ng-controller="ngSubmit_lsrAppcontroller" id="Submit_lsr-form" class="form-horizontal form-label-left" method="post" action='{!! route("Submit_lsrcreateorupdate") !!}' autocomplete="off">
                        <input type="hidden" name="_token" value="{{ csrf_token()}}" />
                        <div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="select_lsr"> Selection of LSR <span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-12"><select  class="form-control col-md-7 col-xs-12" id="select_lsr" name="select_lsr"><option ng-selected="Submit_lsrItem.select_lsr==Lsritem.id" ng-repeat=" Lsritem in Lsr" class="form-control col-md-7 col-xs-12" value="<% Lsritem.id %>" ><% Lsritem.compagny_name %></option></select></div></div><div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="goods_type"> Types of goods <span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-12"><input ng-model="Submit_lsrItem.goods_type" type="text" id="goods_type" name="goods_type" required="required" class="form-control col-md-7 col-xs-12" ></div></div><div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="estimated_goods_value"> Estimated value <span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-12"><input ng-model="Submit_lsrItem.estimated_goods_value" type="text" id="estimated_goods_value" name="estimated_goods_value" required="required" class="form-control col-md-7 col-xs-12" ></div></div><div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="goods_tonnage"> Weight <span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-12"><input ng-model="Submit_lsrItem.goods_tonnage" type="text" id="goods_tonnage" name="goods_tonnage" required="required" class="form-control col-md-7 col-xs-12" ></div></div><div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="goods_origin"> Origin Country <span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-12"><input ng-model="Submit_lsrItem.goods_origin" type="text" id="goods_origin" name="goods_origin" required="required" class="form-control col-md-7 col-xs-12" ></div></div><div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="goods_destination"> Destination country <span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-12"><input ng-model="Submit_lsrItem.goods_destination" type="text" id="goods_destination" name="goods_destination" required="required" class="form-control col-md-7 col-xs-12" ></div></div><div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="goods_pickup_location"> Pick-up Location <span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-12"><input ng-model="Submit_lsrItem.goods_pickup_location" type="text" id="goods_pickup_location" name="goods_pickup_location" required="required" class="form-control col-md-7 col-xs-12" ></div></div><div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="goods_delivery_location"> Delivery Location <span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-12"><input ng-model="Submit_lsrItem.goods_delivery_location" type="text" id="goods_delivery_location" name="goods_delivery_location" required="required" class="form-control col-md-7 col-xs-12" ></div></div><div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="goods_transit"> Transit <span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-12"><select  class="form-control col-md-7 col-xs-12" id="goods_transit" name="goods_transit"><option ng-selected="Submit_lsrItem.goods_transit=='Yes'" class="form-control col-md-7 col-xs-12" value="Yes" >Yes</option><option ng-selected="Submit_lsrItem.goods_transit=='No'" class="form-control col-md-7 col-xs-12" value="No" >No</option></select></div></div><div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="goods_bl"> Bill of loading <span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-12"><input ng-model="Submit_lsrItem.goods_bl" type="file" id="goods_bl" name="goods_bl"  class="form-control col-md-7 col-xs-12" ></div></div><div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="goods_loading_date"> Loading Date <span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-12"><input ng-model="Submit_lsrItem.goods_loading_date" type="text" id="goods_loading_date" name="goods_loading_date" required="required" class="form-control col-md-7 col-xs-12" ></div></div><div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="goods_loading_services"> Loading Services <span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-12"><select  class="form-control col-md-7 col-xs-12" id="goods_loading_services" name="goods_loading_services"><option ng-selected="Submit_lsrItem.goods_loading_services=='Yes'" class="form-control col-md-7 col-xs-12" value="Yes" >Yes</option><option ng-selected="Submit_lsrItem.goods_loading_services=='No'" class="form-control col-md-7 col-xs-12" value="No" >No</option></select></div></div><div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="goods_of_loading_services"> Of-loading Service <span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-12"><select  class="form-control col-md-7 col-xs-12" id="goods_of_loading_services" name="goods_of_loading_services"><option ng-selected="Submit_lsrItem.goods_of_loading_services=='Yes'" class="form-control col-md-7 col-xs-12" value="Yes" >Yes</option><option ng-selected="Submit_lsrItem.goods_of_loading_services=='No'" class="form-control col-md-7 col-xs-12" value="No" >No</option></select></div></div><div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="goods_recipient_name"> Recipient name <span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-12"><input ng-model="Submit_lsrItem.goods_recipient_name" type="text" id="goods_recipient_name" name="goods_recipient_name" required="required" class="form-control col-md-7 col-xs-12" ></div></div><div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="goods_recipient_number"> Telephone Number <span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-12"><input ng-model="Submit_lsrItem.goods_recipient_number" type="text" id="goods_recipient_number" name="goods_recipient_number" required="required" class="form-control col-md-7 col-xs-12" ></div></div><div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="goods_lsr_observations"> Observations <span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-12"><textarea ng-model="Submit_lsrItem.goods_lsr_observations"  id="goods_lsr_observations" name="goods_lsr_observations" required="required" class="editor form-control col-md-7 col-xs-12" ></textarea></div></div>
                        <input ng-model='Submit_lsrItem.id' type="text" id="id" name="id" style="display: none" />
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button type="reset" class="btn btn-primary cancel">Cancel</button>
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('footer')
<script type="text/javascript">
            var ListTable;
            $(document).ready(function() {
            var ajaxAction=function(url,action){ $.ajax({url:url,type:action,data:{'_token':"{{ csrf_token()}}" ,'selected_rows':SelectedCheckboxes() },success:function(){ ListTable.ajax.reload(); }}); }
            var SelectedCheckboxes = function() { return $('input:checkbox:checked.Submit_lsr_record').map(function () { return this.value; }).get(); }
            $.ajaxSetup({
                headers: { 'X-CSRF-TOKEN':'{{ csrf_token() }}','X-Requested-With': 'XMLHttpRequest'}
            });
            ListTable = $('#Submit_lsr-table').DataTable({    
            dom: '<"row"<"col-sm-7 col-md-8"<"hidden-xs hidden-sm"l>B><"col-sm-5 col-md-4"f>><"row"<"col-sm-12 table-responsive"rt>><"row"<"col-sm-5"i><"col-sm-7"p>>',
                    processing: true,
                    serverSide: true,
                    ajax: { url:'{!! route("Submit_lsrlist") !!}' ,
                        headers: {'X-CSRF-TOKEN': '<?php echo csrf_token();?>'}
                    },
                    columns: [
                    {data: 'Select', name: 'Select',searchable:false,sortable:false},
                    {data: 'id', name: 'id'},
                    {data: 'select_lsr.compagny_name', name: 'select_lsr'},{data: 'goods_type', name: 'goods_type'},{data: 'estimated_goods_value', name: 'estimated_goods_value'},{data: 'goods_tonnage', name: 'goods_tonnage'},{data: 'goods_origin', name: 'goods_origin'},{data: 'goods_destination', name: 'goods_destination'},{data: 'goods_pickup_location', name: 'goods_pickup_location'},{data: 'goods_delivery_location', name: 'goods_delivery_location'},{data: 'goods_transit', name: 'goods_transit'},{data: 'goods_bl', name: 'goods_bl'},{data: 'goods_loading_date', name: 'goods_loading_date'},{data: 'goods_loading_services', name: 'goods_loading_services'},{data: 'goods_of_loading_services', name: 'goods_of_loading_services'},{data: 'goods_recipient_name', name: 'goods_recipient_name'},{data: 'goods_recipient_number', name: 'goods_recipient_number'},{data: 'goods_lsr_observations', name: 'goods_lsr_observations'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'updated_at', name: 'updated_at'},
                    {data: 'actions', name: 'actions', 'searchable':false}
                    ],
                    buttons: ['copy', 'csv', 'excel', 'pdf', 'print','colvis',
                        {  text: 'Delete',
                           action: function ( e, dt, node, config ) {   
                                var TrashItem = confirm('Are Your sure you want to Delete this Item/s');
                                if (TrashItem) {ajaxAction("{!! route('Submit_lsrdeletemultiple') !!}",'DELETE');}
                        }
                        }
                    ],
                    order: [[1, 'asc']],
                    drawCallback:function(){$('.dataTable input').iCheck({checkboxClass: 'icheckbox_flat-green'});}
            });
            $('body').on('ifToggled','#check-all', function (event) {
                    if($(this).is(':checked')){$('input.Submit_lsr_record').iCheck('check'); } else	       { $('input.Submit_lsr_record').iCheck('uncheck');}
            });
            });</script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" type="text/css"  href="https://cdn.datatables.net/buttons/1.3.1/css/buttons.dataTables.min.css" />
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.4.2/js/buttons.flash.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.print.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.4.2/js/buttons.colVis.min.js"></script>
@stop