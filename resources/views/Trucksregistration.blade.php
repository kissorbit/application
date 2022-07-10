@extends('layouts.master')
@section('head')
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo asset('assets/css/datatables/tools/css/dataTables.tableTools.css'); ?>" />
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo asset('assets/css/custom.css'); ?>" />
<script type="text/javascript" src="<?php echo asset('assets/js/ng-form-plugin.js'); ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.6.1/angular.js" ></script>
<script stype="text/javascript">
    var ngTrucksregistrationApp = angular.module('ngTrucksregistrationApp', [], function($interpolateProvider)
    {$interpolateProvider.startSymbol('<%'); $interpolateProvider.endSymbol('%>'); });
    ngTrucksregistrationApp.controller('ngTrucksregistrationAppcontroller', function($scope) {
    $scope.user = [];
    $scope.Lsp={!! App\Lsp::all()->toJson() !!};
    $('#Trucksregistration-form').Add({Type:'POST',Headers:{'X-CSRF-TOKEN':'<?php echo csrf_token();?>'}, ModuleName:'Trucksregistration', ModuleItemName:'TrucksregistrationItem', NgAppName:'ngTrucksregistrationApp'});
    $('#Trucksregistration-form').Edit({Type:'GET',Headers:{'X-CSRF-TOKEN':'<?php echo csrf_token();?>'}, ModuleName:'Trucksregistration', ModuleItemName:'TrucksregistrationItem', NgAppName:'ngTrucksregistrationApp'});
    $('#Trucksregistration-form').Delete({Type:'DELETE',Headers:{'X-CSRF-TOKEN':'<?php echo csrf_token();?>'}, ModuleName:'Trucksregistration', ModuleItemName:'TrucksregistrationItem', NgAppName:'ngTrucksregistrationApp'});
    $('#Trucksregistration-form').Submit({Type:'POST',Headers:{'X-CSRF-TOKEN':'<?php echo csrf_token();?>'}, ModuleName:'Trucksregistration', ModuleItemName:'TrucksregistrationItem', NgAppName:'ngTrucksregistrationApp'});
    });</script>
@stop
@section('content')
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Manage Trucks</h3>
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
                       <div class="col-md-8 col-sm-8 col-xs-7"><h2>Registred trucks</h2></div>
                       <div class="col-md-4 col-sm-4 col-xs-5">
                           <button class="btn btn-primary form-modal-button pull-right" data-toggle="modal" data-target=".form-modal">Add New</button>
                       </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                        <table class="table table-striped responsive-utilities jambo_table dataTable" id="Trucksregistration-table">
                            <thead>
                                <tr>
                                    <th><input type="checkbox" id="check-all" class="flat"></th>
                                    <th>ID</th>
                                    <th>LSP Company</th><th>Truck Immatriculation</th><th>Type of truck</th><th>Truck's picture</th><th>Truck insurance</th><th>Truck Insurance expiration date</th><th>Truck patent</th><th>Truck registration document</th><th>Truck availability</th>
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
                    <h4 class="modal-title" id="myLargeModalLabel">Submit a truck
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </h4>
                </div>
                <div class="modal-body">
                    <form  ng-app="ngTrucksregistrationApp" ng-controller="ngTrucksregistrationAppcontroller" id="Trucksregistration-form" class="form-horizontal form-label-left" method="post" action='{!! route("Trucksregistrationcreateorupdate") !!}' autocomplete="off">
                        <input type="hidden" name="_token" value="{{ csrf_token()}}" />
                        <div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="lsp_name_reference"> LSP Company <span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-12"><select  class="form-control col-md-7 col-xs-12" id="lsp_name_reference" name="lsp_name_reference"><option ng-selected="TrucksregistrationItem.lsp_name_reference==Lspitem.id" ng-repeat=" Lspitem in Lsp" class="form-control col-md-7 col-xs-12" value="<% Lspitem.id %>" ><% Lspitem.compagny_name %></option></select></div></div><div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="lsp_trucks_immatriculation"> Truck Immatriculation <span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-12"><input ng-model="TrucksregistrationItem.lsp_trucks_immatriculation" type="text" id="lsp_trucks_immatriculation" name="lsp_trucks_immatriculation" required="required" class="form-control col-md-7 col-xs-12" ></div></div><div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="lsp_truck_type"> Type of truck <span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-12"><input ng-model="TrucksregistrationItem.lsp_truck_type" type="text" id="lsp_truck_type" name="lsp_truck_type" required="required" class="form-control col-md-7 col-xs-12" ></div></div><div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="lsp_truck_picture"> Truck's picture <span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-12"><input ng-model="TrucksregistrationItem.lsp_truck_picture" type="file" id="lsp_truck_picture" name="lsp_truck_picture"  class="form-control col-md-7 col-xs-12" ></div></div><div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="lsp_truck_insurance"> Truck insurance <span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-12"><input ng-model="TrucksregistrationItem.lsp_truck_insurance" type="file" id="lsp_truck_insurance" name="lsp_truck_insurance"  class="form-control col-md-7 col-xs-12" ></div></div><div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="lsp_truck_insurance_strdate"> Truck Insurance start date <span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-12"><input ng-model="TrucksregistrationItem.lsp_truck_insurance_strdate" type="text" id="lsp_truck_insurance_strdate" name="lsp_truck_insurance_strdate" required="required" class="form-control col-md-7 col-xs-12" ></div></div><div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="lsp_truck_insurance_expdate"> Truck Insurance expiration date <span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-12"><input ng-model="TrucksregistrationItem.lsp_truck_insurance_expdate" type="text" id="lsp_truck_insurance_expdate" name="lsp_truck_insurance_expdate" required="required" class="form-control col-md-7 col-xs-12" ></div></div><div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="lsp_truck_patent"> Truck patent <span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-12"><input ng-model="TrucksregistrationItem.lsp_truck_patent" type="file" id="lsp_truck_patent" name="lsp_truck_patent"  class="form-control col-md-7 col-xs-12" ></div></div><div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="lsp_truck_registration_doc"> Truck registration document <span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-12"><input ng-model="TrucksregistrationItem.lsp_truck_registration_doc" type="file" id="lsp_truck_registration_doc" name="lsp_truck_registration_doc"  class="form-control col-md-7 col-xs-12" ></div></div><div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="lsp_truck_availability"> Truck availability <span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-12"><select  class="form-control col-md-7 col-xs-12" id="lsp_truck_availability" name="lsp_truck_availability"><option ng-selected="TrucksregistrationItem.lsp_truck_availability=='Yes'" class="form-control col-md-7 col-xs-12" value="Yes" >Yes</option><option ng-selected="TrucksregistrationItem.lsp_truck_availability=='No'" class="form-control col-md-7 col-xs-12" value="No" >No</option></select></div></div>
                        <input ng-model='TrucksregistrationItem.id' type="text" id="id" name="id" style="display: none" />
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
            var SelectedCheckboxes = function() { return $('input:checkbox:checked.Trucksregistration_record').map(function () { return this.value; }).get(); }
            $.ajaxSetup({
                headers: { 'X-CSRF-TOKEN':'{{ csrf_token() }}','X-Requested-With': 'XMLHttpRequest'}
            });
            ListTable = $('#Trucksregistration-table').DataTable({    
            dom: '<"row"<"col-sm-7 col-md-8"<"hidden-xs hidden-sm"l>B><"col-sm-5 col-md-4"f>><"row"<"col-sm-12 table-responsive"rt>><"row"<"col-sm-5"i><"col-sm-7"p>>',
                    processing: true,
                    serverSide: true,
                    ajax: { url:'{!! route("Trucksregistrationlist") !!}' ,
                        headers: {'X-CSRF-TOKEN': '<?php echo csrf_token();?>'}
                    },
                    columns: [
                    {data: 'Select', name: 'Select',searchable:false,sortable:false},
                    {data: 'id', name: 'id'},
                    {data: 'lsp_name_reference.compagny_name', name: 'lsp_name_reference'},{data: 'lsp_trucks_immatriculation', name: 'lsp_trucks_immatriculation'},{data: 'lsp_truck_type', name: 'lsp_truck_type'},{data: 'lsp_truck_picture', name: 'lsp_truck_picture'},{data: 'lsp_truck_insurance', name: 'lsp_truck_insurance'},{data: 'lsp_truck_insurance_expdate', name: 'lsp_truck_insurance_expdate'},{data: 'lsp_truck_patent', name: 'lsp_truck_patent'},{data: 'lsp_truck_registration_doc', name: 'lsp_truck_registration_doc'},{data: 'lsp_truck_availability', name: 'lsp_truck_availability'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'updated_at', name: 'updated_at'},
                    {data: 'actions', name: 'actions', 'searchable':false}
                    ],
                    buttons: ['copy', 'csv', 'excel', 'pdf', 'print','colvis',
                        {  text: 'Delete',
                           action: function ( e, dt, node, config ) {   
                                var TrashItem = confirm('Are Your sure you want to Delete this Item/s');
                                if (TrashItem) {ajaxAction("{!! route('Trucksregistrationdeletemultiple') !!}",'DELETE');}
                        }
                        }
                    ],
                    order: [[1, 'asc']],
                    drawCallback:function(){$('.dataTable input').iCheck({checkboxClass: 'icheckbox_flat-green'});}
            });
            $('body').on('ifToggled','#check-all', function (event) {
                    if($(this).is(':checked')){$('input.Trucksregistration_record').iCheck('check'); } else	       { $('input.Trucksregistration_record').iCheck('uncheck');}
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