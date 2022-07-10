@extends('layouts.master')
@section('head')
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo asset('assets/css/datatables/tools/css/dataTables.tableTools.css'); ?>" />
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo asset('assets/css/custom.css'); ?>" />
<script type="text/javascript" src="<?php echo asset('assets/js/ng-form-plugin.js'); ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.6.1/angular.js" ></script>
<script stype="text/javascript">
    var ngLspApp = angular.module('ngLspApp', [], function($interpolateProvider)
    {$interpolateProvider.startSymbol('<%'); $interpolateProvider.endSymbol('%>'); });
    ngLspApp.controller('ngLspAppcontroller', function($scope) {
    $scope.user = [];
    
    $('#Lsp-form').Add({Type:'POST',Headers:{'X-CSRF-TOKEN':'<?php echo csrf_token();?>'}, ModuleName:'Lsp', ModuleItemName:'LspItem', NgAppName:'ngLspApp'});
    $('#Lsp-form').Edit({Type:'GET',Headers:{'X-CSRF-TOKEN':'<?php echo csrf_token();?>'}, ModuleName:'Lsp', ModuleItemName:'LspItem', NgAppName:'ngLspApp'});
    $('#Lsp-form').Delete({Type:'DELETE',Headers:{'X-CSRF-TOKEN':'<?php echo csrf_token();?>'}, ModuleName:'Lsp', ModuleItemName:'LspItem', NgAppName:'ngLspApp'});
    $('#Lsp-form').Submit({Type:'POST',Headers:{'X-CSRF-TOKEN':'<?php echo csrf_token();?>'}, ModuleName:'Lsp', ModuleItemName:'LspItem', NgAppName:'ngLspApp'});
    });</script>
@stop
@section('content')
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Manage LSP</h3>
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
                       <div class="col-md-8 col-sm-8 col-xs-7"><h2>LSP List</h2></div>
                       <div class="col-md-4 col-sm-4 col-xs-5">
                           <button class="btn btn-primary form-modal-button pull-right" data-toggle="modal" data-target=".form-modal">Add New LSP</button>
                       </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                        <table class="table table-striped responsive-utilities jambo_table dataTable" id="Lsp-table">
                            <thead>
                                <tr>
                                    <th><input type="checkbox" id="check-all" class="flat"></th>
                                    <th>ID</th>
                                    <th>Company name</th><th>Company address</th><th>Name</th><th>First Name</th><th>Email</th><th>Phone</th><th>Country</th><th>City</th><th>Administrative file</th><th>Number of trucks</th><th>Trucks file</th><th>Transport License</th><th>Transportation countries</th>
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
                    <h4 class="modal-title" id="myLargeModalLabel">LSP
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </h4>
                </div>
                <div class="modal-body">
                    <form  ng-app="ngLspApp" ng-controller="ngLspAppcontroller" id="Lsp-form" class="form-horizontal form-label-left" method="post" action='{!! route("Lspcreateorupdate") !!}' autocomplete="off">
                        <input type="hidden" name="_token" value="{{ csrf_token()}}" />
                        <div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="compagny_name"> Company name <span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-12"><input ng-model="LspItem.compagny_name" type="text" id="compagny_name" name="compagny_name" required="required" class="form-control col-md-7 col-xs-12" ></div></div><div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="compagny_address"> Company address <span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-12"><input ng-model="LspItem.compagny_address" type="text" id="compagny_address" name="compagny_address" required="required" class="form-control col-md-7 col-xs-12" ></div></div><div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> Name <span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-12"><input ng-model="LspItem.name" type="text" id="name" name="name" required="required" class="form-control col-md-7 col-xs-12" ></div></div><div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="first_name"> First Name <span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-12"><input ng-model="LspItem.first_name" type="text" id="first_name" name="first_name" required="required" class="form-control col-md-7 col-xs-12" ></div></div><div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="email"> Email <span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-12"><input ng-model="LspItem.email" type="text" id="email" name="email" required="required" class="form-control col-md-7 col-xs-12" ></div></div><div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="phone"> Phone <span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-12"><input ng-model="LspItem.phone" type="text" id="phone" name="phone" required="required" class="form-control col-md-7 col-xs-12" ></div></div><div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="country"> Country <span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-12"><input ng-model="LspItem.country" type="text" id="country" name="country" required="required" class="form-control col-md-7 col-xs-12" ></div></div><div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="city"> City <span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-12"><input ng-model="LspItem.city" type="text" id="city" name="city" required="required" class="form-control col-md-7 col-xs-12" ></div></div><div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="lsp_admin_file"> Administrative file <span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-12"><input ng-model="LspItem.lsp_admin_file" type="file" id="lsp_admin_file" name="lsp_admin_file"  class="form-control col-md-7 col-xs-12" ></div></div><div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="lsp_number_of_trucks"> Number of trucks <span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-12"><select  class="form-control col-md-7 col-xs-12" id="lsp_number_of_trucks" name="lsp_number_of_trucks"><option ng-selected="LspItem.lsp_number_of_trucks=='1'" class="form-control col-md-7 col-xs-12" value="1" >1</option><option ng-selected="LspItem.lsp_number_of_trucks=='2'" class="form-control col-md-7 col-xs-12" value="2" >2</option><option ng-selected="LspItem.lsp_number_of_trucks=='3'" class="form-control col-md-7 col-xs-12" value="3" >3</option><option ng-selected="LspItem.lsp_number_of_trucks=='4'" class="form-control col-md-7 col-xs-12" value="4" >4</option><option ng-selected="LspItem.lsp_number_of_trucks=='5'" class="form-control col-md-7 col-xs-12" value="5" >5</option><option ng-selected="LspItem.lsp_number_of_trucks=='6'" class="form-control col-md-7 col-xs-12" value="6" >6</option><option ng-selected="LspItem.lsp_number_of_trucks=='7'" class="form-control col-md-7 col-xs-12" value="7" >7</option><option ng-selected="LspItem.lsp_number_of_trucks=='8'" class="form-control col-md-7 col-xs-12" value="8" >8</option><option ng-selected="LspItem.lsp_number_of_trucks=='9'" class="form-control col-md-7 col-xs-12" value="9" >9</option><option ng-selected="LspItem.lsp_number_of_trucks=='10'" class="form-control col-md-7 col-xs-12" value="10" >10</option><option ng-selected="LspItem.lsp_number_of_trucks=='11'" class="form-control col-md-7 col-xs-12" value="11" >11</option><option ng-selected="LspItem.lsp_number_of_trucks=='12'" class="form-control col-md-7 col-xs-12" value="12" >12</option><option ng-selected="LspItem.lsp_number_of_trucks=='13'" class="form-control col-md-7 col-xs-12" value="13" >13</option><option ng-selected="LspItem.lsp_number_of_trucks=='14'" class="form-control col-md-7 col-xs-12" value="14" >14</option><option ng-selected="LspItem.lsp_number_of_trucks=='15'" class="form-control col-md-7 col-xs-12" value="15" >15</option><option ng-selected="LspItem.lsp_number_of_trucks=='16'" class="form-control col-md-7 col-xs-12" value="16" >16</option><option ng-selected="LspItem.lsp_number_of_trucks=='17'" class="form-control col-md-7 col-xs-12" value="17" >17</option><option ng-selected="LspItem.lsp_number_of_trucks=='18'" class="form-control col-md-7 col-xs-12" value="18" >18</option><option ng-selected="LspItem.lsp_number_of_trucks=='19'" class="form-control col-md-7 col-xs-12" value="19" >19</option><option ng-selected="LspItem.lsp_number_of_trucks=='20'" class="form-control col-md-7 col-xs-12" value="20" >20</option><option ng-selected="LspItem.lsp_number_of_trucks=='21'" class="form-control col-md-7 col-xs-12" value="21" >21</option><option ng-selected="LspItem.lsp_number_of_trucks=='22'" class="form-control col-md-7 col-xs-12" value="22" >22</option><option ng-selected="LspItem.lsp_number_of_trucks=='23'" class="form-control col-md-7 col-xs-12" value="23" >23</option><option ng-selected="LspItem.lsp_number_of_trucks=='24'" class="form-control col-md-7 col-xs-12" value="24" >24</option><option ng-selected="LspItem.lsp_number_of_trucks=='25'" class="form-control col-md-7 col-xs-12" value="25" >25</option><option ng-selected="LspItem.lsp_number_of_trucks=='26'" class="form-control col-md-7 col-xs-12" value="26" >26</option><option ng-selected="LspItem.lsp_number_of_trucks=='27'" class="form-control col-md-7 col-xs-12" value="27" >27</option><option ng-selected="LspItem.lsp_number_of_trucks=='28'" class="form-control col-md-7 col-xs-12" value="28" >28</option><option ng-selected="LspItem.lsp_number_of_trucks=='29'" class="form-control col-md-7 col-xs-12" value="29" >29</option><option ng-selected="LspItem.lsp_number_of_trucks=='30'" class="form-control col-md-7 col-xs-12" value="30" >30</option><option ng-selected="LspItem.lsp_number_of_trucks=='31'" class="form-control col-md-7 col-xs-12" value="31" >31</option><option ng-selected="LspItem.lsp_number_of_trucks=='32'" class="form-control col-md-7 col-xs-12" value="32" >32</option><option ng-selected="LspItem.lsp_number_of_trucks=='33'" class="form-control col-md-7 col-xs-12" value="33" >33</option><option ng-selected="LspItem.lsp_number_of_trucks=='34'" class="form-control col-md-7 col-xs-12" value="34" >34</option><option ng-selected="LspItem.lsp_number_of_trucks=='35'" class="form-control col-md-7 col-xs-12" value="35" >35</option><option ng-selected="LspItem.lsp_number_of_trucks=='36'" class="form-control col-md-7 col-xs-12" value="36" >36</option><option ng-selected="LspItem.lsp_number_of_trucks=='37'" class="form-control col-md-7 col-xs-12" value="37" >37</option><option ng-selected="LspItem.lsp_number_of_trucks=='38'" class="form-control col-md-7 col-xs-12" value="38" >38</option><option ng-selected="LspItem.lsp_number_of_trucks=='39'" class="form-control col-md-7 col-xs-12" value="39" >39</option><option ng-selected="LspItem.lsp_number_of_trucks=='40'" class="form-control col-md-7 col-xs-12" value="40" >40</option><option ng-selected="LspItem.lsp_number_of_trucks=='41'" class="form-control col-md-7 col-xs-12" value="41" >41</option><option ng-selected="LspItem.lsp_number_of_trucks=='42'" class="form-control col-md-7 col-xs-12" value="42" >42</option><option ng-selected="LspItem.lsp_number_of_trucks=='43'" class="form-control col-md-7 col-xs-12" value="43" >43</option><option ng-selected="LspItem.lsp_number_of_trucks=='44'" class="form-control col-md-7 col-xs-12" value="44" >44</option><option ng-selected="LspItem.lsp_number_of_trucks=='45'" class="form-control col-md-7 col-xs-12" value="45" >45</option><option ng-selected="LspItem.lsp_number_of_trucks=='46'" class="form-control col-md-7 col-xs-12" value="46" >46</option><option ng-selected="LspItem.lsp_number_of_trucks=='47'" class="form-control col-md-7 col-xs-12" value="47" >47</option><option ng-selected="LspItem.lsp_number_of_trucks=='48'" class="form-control col-md-7 col-xs-12" value="48" >48</option><option ng-selected="LspItem.lsp_number_of_trucks=='49'" class="form-control col-md-7 col-xs-12" value="49" >49</option><option ng-selected="LspItem.lsp_number_of_trucks=='50'" class="form-control col-md-7 col-xs-12" value="50" >50</option><option ng-selected="LspItem.lsp_number_of_trucks=='51'" class="form-control col-md-7 col-xs-12" value="51" >51</option><option ng-selected="LspItem.lsp_number_of_trucks=='52'" class="form-control col-md-7 col-xs-12" value="52" >52</option><option ng-selected="LspItem.lsp_number_of_trucks=='53'" class="form-control col-md-7 col-xs-12" value="53" >53</option><option ng-selected="LspItem.lsp_number_of_trucks=='54'" class="form-control col-md-7 col-xs-12" value="54" >54</option><option ng-selected="LspItem.lsp_number_of_trucks=='55'" class="form-control col-md-7 col-xs-12" value="55" >55</option><option ng-selected="LspItem.lsp_number_of_trucks=='56'" class="form-control col-md-7 col-xs-12" value="56" >56</option><option ng-selected="LspItem.lsp_number_of_trucks=='57'" class="form-control col-md-7 col-xs-12" value="57" >57</option><option ng-selected="LspItem.lsp_number_of_trucks=='58'" class="form-control col-md-7 col-xs-12" value="58" >58</option><option ng-selected="LspItem.lsp_number_of_trucks=='59'" class="form-control col-md-7 col-xs-12" value="59" >59</option><option ng-selected="LspItem.lsp_number_of_trucks=='60'" class="form-control col-md-7 col-xs-12" value="60" >60</option><option ng-selected="LspItem.lsp_number_of_trucks=='61'" class="form-control col-md-7 col-xs-12" value="61" >61</option><option ng-selected="LspItem.lsp_number_of_trucks=='62'" class="form-control col-md-7 col-xs-12" value="62" >62</option><option ng-selected="LspItem.lsp_number_of_trucks=='63'" class="form-control col-md-7 col-xs-12" value="63" >63</option><option ng-selected="LspItem.lsp_number_of_trucks=='64'" class="form-control col-md-7 col-xs-12" value="64" >64</option><option ng-selected="LspItem.lsp_number_of_trucks=='65'" class="form-control col-md-7 col-xs-12" value="65" >65</option><option ng-selected="LspItem.lsp_number_of_trucks=='66'" class="form-control col-md-7 col-xs-12" value="66" >66</option><option ng-selected="LspItem.lsp_number_of_trucks=='67'" class="form-control col-md-7 col-xs-12" value="67" >67</option><option ng-selected="LspItem.lsp_number_of_trucks=='68'" class="form-control col-md-7 col-xs-12" value="68" >68</option><option ng-selected="LspItem.lsp_number_of_trucks=='69'" class="form-control col-md-7 col-xs-12" value="69" >69</option><option ng-selected="LspItem.lsp_number_of_trucks=='70'" class="form-control col-md-7 col-xs-12" value="70" >70</option><option ng-selected="LspItem.lsp_number_of_trucks=='71'" class="form-control col-md-7 col-xs-12" value="71" >71</option><option ng-selected="LspItem.lsp_number_of_trucks=='72'" class="form-control col-md-7 col-xs-12" value="72" >72</option><option ng-selected="LspItem.lsp_number_of_trucks=='73'" class="form-control col-md-7 col-xs-12" value="73" >73</option><option ng-selected="LspItem.lsp_number_of_trucks=='74'" class="form-control col-md-7 col-xs-12" value="74" >74</option><option ng-selected="LspItem.lsp_number_of_trucks=='75'" class="form-control col-md-7 col-xs-12" value="75" >75</option><option ng-selected="LspItem.lsp_number_of_trucks=='76'" class="form-control col-md-7 col-xs-12" value="76" >76</option><option ng-selected="LspItem.lsp_number_of_trucks=='77'" class="form-control col-md-7 col-xs-12" value="77" >77</option><option ng-selected="LspItem.lsp_number_of_trucks=='78'" class="form-control col-md-7 col-xs-12" value="78" >78</option><option ng-selected="LspItem.lsp_number_of_trucks=='79'" class="form-control col-md-7 col-xs-12" value="79" >79</option><option ng-selected="LspItem.lsp_number_of_trucks=='80'" class="form-control col-md-7 col-xs-12" value="80" >80</option><option ng-selected="LspItem.lsp_number_of_trucks=='81'" class="form-control col-md-7 col-xs-12" value="81" >81</option><option ng-selected="LspItem.lsp_number_of_trucks=='82'" class="form-control col-md-7 col-xs-12" value="82" >82</option><option ng-selected="LspItem.lsp_number_of_trucks=='83'" class="form-control col-md-7 col-xs-12" value="83" >83</option><option ng-selected="LspItem.lsp_number_of_trucks=='84'" class="form-control col-md-7 col-xs-12" value="84" >84</option><option ng-selected="LspItem.lsp_number_of_trucks=='85'" class="form-control col-md-7 col-xs-12" value="85" >85</option><option ng-selected="LspItem.lsp_number_of_trucks=='86'" class="form-control col-md-7 col-xs-12" value="86" >86</option><option ng-selected="LspItem.lsp_number_of_trucks=='87'" class="form-control col-md-7 col-xs-12" value="87" >87</option><option ng-selected="LspItem.lsp_number_of_trucks=='88'" class="form-control col-md-7 col-xs-12" value="88" >88</option><option ng-selected="LspItem.lsp_number_of_trucks=='89'" class="form-control col-md-7 col-xs-12" value="89" >89</option><option ng-selected="LspItem.lsp_number_of_trucks=='90'" class="form-control col-md-7 col-xs-12" value="90" >90</option><option ng-selected="LspItem.lsp_number_of_trucks=='91'" class="form-control col-md-7 col-xs-12" value="91" >91</option><option ng-selected="LspItem.lsp_number_of_trucks=='92'" class="form-control col-md-7 col-xs-12" value="92" >92</option><option ng-selected="LspItem.lsp_number_of_trucks=='93'" class="form-control col-md-7 col-xs-12" value="93" >93</option><option ng-selected="LspItem.lsp_number_of_trucks=='94'" class="form-control col-md-7 col-xs-12" value="94" >94</option><option ng-selected="LspItem.lsp_number_of_trucks=='95'" class="form-control col-md-7 col-xs-12" value="95" >95</option><option ng-selected="LspItem.lsp_number_of_trucks=='96'" class="form-control col-md-7 col-xs-12" value="96" >96</option><option ng-selected="LspItem.lsp_number_of_trucks=='97'" class="form-control col-md-7 col-xs-12" value="97" >97</option><option ng-selected="LspItem.lsp_number_of_trucks=='98'" class="form-control col-md-7 col-xs-12" value="98" >98</option><option ng-selected="LspItem.lsp_number_of_trucks=='99'" class="form-control col-md-7 col-xs-12" value="99" >99</option><option ng-selected="LspItem.lsp_number_of_trucks=='100'" class="form-control col-md-7 col-xs-12" value="100" >100</option></select></div></div><div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="lsp_trucks_files"> Trucks file <span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-12"><input ng-model="LspItem.lsp_trucks_files" type="file" id="lsp_trucks_files" name="lsp_trucks_files"  class="form-control col-md-7 col-xs-12" ></div></div><div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="lsp_transport_license"> Transport License <span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-12"><input ng-model="LspItem.lsp_transport_license" type="file" id="lsp_transport_license" name="lsp_transport_license"  class="form-control col-md-7 col-xs-12" ></div></div><div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="lsp_transport_countries"> Transportation countries <span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-12"><input type="radio" name="lsp_transport_countries" ng-model="LspItem.lsp_transport_countries"  value="Cameroon" > Cameroon <input type="radio" name="lsp_transport_countries" ng-model="LspItem.lsp_transport_countries"  value="Central Africa Republic" > Central Africa Republic <input type="radio" name="lsp_transport_countries" ng-model="LspItem.lsp_transport_countries"  value="Chad" > Chad <input type="radio" name="lsp_transport_countries" ng-model="LspItem.lsp_transport_countries"  value="Gabon" > Gabon <input type="radio" name="lsp_transport_countries" ng-model="LspItem.lsp_transport_countries"  value="Equatorial Guinea" > Equatorial Guinea </div></div>
                        <input ng-model='LspItem.id' type="text" id="id" name="id" style="display: none" />
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
            var SelectedCheckboxes = function() { return $('input:checkbox:checked.Lsp_record').map(function () { return this.value; }).get(); }
            $.ajaxSetup({
                headers: { 'X-CSRF-TOKEN':'{{ csrf_token() }}','X-Requested-With': 'XMLHttpRequest'}
            });
            ListTable = $('#Lsp-table').DataTable({    
            dom: '<"row"<"col-sm-7 col-md-8"<"hidden-xs hidden-sm"l>B><"col-sm-5 col-md-4"f>><"row"<"col-sm-12 table-responsive"rt>><"row"<"col-sm-5"i><"col-sm-7"p>>',
                    processing: true,
                    serverSide: true,
                    ajax: { url:'{!! route("Lsplist") !!}' ,
                        headers: {'X-CSRF-TOKEN': '<?php echo csrf_token();?>'}
                    },
                    columns: [
                    {data: 'Select', name: 'Select',searchable:false,sortable:false},
                    {data: 'id', name: 'id'},
                    {data: 'compagny_name', name: 'compagny_name'},{data: 'compagny_address', name: 'compagny_address'},{data: 'name', name: 'name'},{data: 'first_name', name: 'first_name'},{data: 'email', name: 'email'},{data: 'phone', name: 'phone'},{data: 'country', name: 'country'},{data: 'city', name: 'city'},{data: 'lsp_admin_file', name: 'lsp_admin_file'},{data: 'lsp_number_of_trucks', name: 'lsp_number_of_trucks'},{data: 'lsp_trucks_files', name: 'lsp_trucks_files'},{data: 'lsp_transport_license', name: 'lsp_transport_license'},{data: 'lsp_transport_countries', name: 'lsp_transport_countries'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'updated_at', name: 'updated_at'},
                    {data: 'actions', name: 'actions', 'searchable':false}
                    ],
                    buttons: ['copy', 'csv', 'excel', 'pdf', 'print','colvis',
                        {  text: 'Delete',
                           action: function ( e, dt, node, config ) {   
                                var TrashItem = confirm('Are Your sure you want to Delete this Item/s');
                                if (TrashItem) {ajaxAction("{!! route('Lspdeletemultiple') !!}",'DELETE');}
                        }
                        }
                    ],
                    order: [[1, 'asc']],
                    drawCallback:function(){$('.dataTable input').iCheck({checkboxClass: 'icheckbox_flat-green'});}
            });
            $('body').on('ifToggled','#check-all', function (event) {
                    if($(this).is(':checked')){$('input.Lsp_record').iCheck('check'); } else	       { $('input.Lsp_record').iCheck('uncheck');}
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