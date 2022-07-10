<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Registered;
use Validator;
use Datatables;
use Storage;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\ResponseController;

class RegisteredController extends Controller
{
    
    public $Now;
    public $Response;
    public function __construct(){
        parent::__construct();
        $this->Now=date('Y-m-d H:i:s');
        $this->Response=new ResponseController();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return View('Registered');
    }
    
    /**
     * 
     * @return type 
     */
    public function All()
    {
        $Registered=Registered::query();
        $Registered=$Registered->with('lsr_select');
        return Datatables::of($Registered)->addColumn('Select', function($Registered) { return '<input class="flat Registered_record" name="Registered_record"  type="checkbox" value="'.$Registered->id.'" />';})
                ->addColumn('actions', function ($Registered) {
                $column='<a href="javascript:void(0)"  data-url="'.route('Registerededit',$Registered->id).'" class="edit btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
                $column.='<a href="javascript:void(0)" data-url="'.route('Registereddelete',$Registered->id).'" class="delete btn btn-xs btn-primary"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
                return $column;})->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function CreateOrUpdate(Request $request)
    {
        try {
            if($request['id'] !=''):
                $Registered = Registered::where('id',$request['id'])->first();    
                $Registered->nat_transport=strip_tags($request["nat_transport"]);$Registered->estimed_value=strip_tags($request["estimed_value"]);$Registered->tonnage=strip_tags($request["tonnage"]);$Registered->go_destination=strip_tags($request["go_destination"]);$Registered->arrived_destination=strip_tags($request["arrived_destination"]);$Registered->city_go=strip_tags($request["city_go"]);$Registered->city_arrival=strip_tags($request["city_arrival"]);$Registered->transit=strip_tags($request["transit"]);$Registered->date_loading=strip_tags($request["date_loading"]);$Registered->pick_up_sevice=strip_tags($request["pick_up_sevice"]);$Registered->service_delivery=strip_tags($request["service_delivery"]);$Registered->notes=$request["notes"];$Registered->lsr_select=$request["lsr_select"];
                $Registered->save();
                return $this->Response->prepareResult(200,$Registered,[],'Registered Saved successfully ','ajax');
            else:
                $Registered=new Registered();    
                $Registered->nat_transport=strip_tags($request["nat_transport"]);$Registered->estimed_value=strip_tags($request["estimed_value"]);$Registered->tonnage=strip_tags($request["tonnage"]);$Registered->go_destination=strip_tags($request["go_destination"]);$Registered->arrived_destination=strip_tags($request["arrived_destination"]);$Registered->city_go=strip_tags($request["city_go"]);$Registered->city_arrival=strip_tags($request["city_arrival"]);$Registered->transit=strip_tags($request["transit"]);$Registered->date_loading=strip_tags($request["date_loading"]);$Registered->pick_up_sevice=strip_tags($request["pick_up_sevice"]);$Registered->service_delivery=strip_tags($request["service_delivery"]);$Registered->notes=$request["notes"];$Registered->lsr_select=$request["lsr_select"];
                $Registered->save();
                return $this->Response->prepareResult(200,$Registered,[],'Registered Created successfully ','ajax');
            endif;
        } catch (Exception $exc) {
                return $this->Response->prepareResult(400,null,[],null,'ajax','Registered Could not be  Saved');
        }

        
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $ID
     * @return \Illuminate\Http\Response
     */
    public function edit($ID)
    {
        try {
                $data=Registered::where('id',$ID)->get();
                return $this->Response->prepareResult(200,$data,[],null,'ajax');
            } catch (\Exception $exc) {
                 return $this->Response->prepareResult(400,[],null,'ajax','Could not get This item');
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $ID
     * @return \Illuminate\Http\Response
     */
    public function Delete($ID)
    {
        try {
                Registered::where('id',$ID)->delete();
                return  $this->Response->prepareResult(200,[],'Registered Item deleted Successfully','ajax');
            } catch (\Exception $exc) {
        }        return $this->Response->prepareResult(400,[],null,'ajax','Registered Item Could be not deleted');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $ID
     * @return \Illuminate\Http\Response
     */
    public function DeleteMultiple(Request $request)
    {
        try {
                Registered::whereIn('id',$request->selected_rows)->delete();
                return  $this->Response->prepareResult(200,[],'Registered Item/s deleted Successfully','ajax');
            } catch (\Exception $exc) {
        }        return $this->Response->prepareResult(400,[],null,'ajax','Registered Item/s Could be not deleted');
    }
    
    /**
     * Upload Attachment Or Image
     */
    protected function Upload(Request $request,$FieldName)
    {
        $path='';
        $Image = $request->file($FieldName);
        if($Image):
            $Extension = $Image->getClientOriginalExtension();
            $path = $Image->getFilename() . '.' . $Extension;
            Storage::disk('files_folder')->put($path, File::get($request->file($FieldName)));
        endif;
        return $path;
    }
}
