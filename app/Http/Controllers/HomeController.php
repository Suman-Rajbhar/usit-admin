<?php

namespace App\Http\Controllers;

use App\Model\Blog;
use App\Model\Customer;
use App\Model\Feature;
use App\Model\Member;
use App\Model\Package;
use App\Model\PackageFeature;
use App\Model\PackageFeatureOffer;
use App\Model\Portfolio;
use App\Model\PortfolioFeature;
use App\Model\Service;
use App\Model\ServiceFeature;
use Illuminate\Http\Request;
use Validator;
use Session;
use Redirect;
use DB;
use Image;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function about_usit()
    {
        $about_info = DB::table('abouts')->first();
        $home_content = view('usit.view_about_page')->with('about_info', $about_info);
        return view('layouts.master')->with('home_content', $home_content);
    }

    public function set_about_usit()
    {
        $about_info = DB::table('abouts')->first();
        $home_content = view('usit.about_page')->with('about_info', $about_info);
        return view('layouts.master')->with('home_content', $home_content);
    }

    public function update_about_info(Request $request)
    {
        $id = $request->input('id');
        $data = array(
            'about_us' => $request->input('about_us'),
            'why_usit' => $request->input('why_usit'),
            'mission' => $request->input('mission'),
            'vision' => $request->input('vision'),
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s'),
        );
        DB::table('abouts')->where('id', $id)->update($data);

        Session::flash('success', 'Information updated successfully!');
        return redirect('about-usit');
    }

    public function usit_features()
    {
        $home_content = view('usit.usit_feature_page');
        return view('layouts.master')->with('home_content', $home_content);
    }

    public function save_usit_features(Request $request)
    {
        $features = $request->input('featuremore');

        for($i = 0; $i < count($features); $i++)
        {
            $feature = new Feature();
            $feature->feature = $features[$i];
            $feature->created_at = date('Y-m-d h:i:s');
            $feature->updated_at = date('Y-m-d h:i:s');
            $feature->save();
        }

        Session::flash('success', 'Features added successfully!');
        return redirect('get-usit-features');
    }

    public function get_usit_features()
    {
        $features = Feature::get();
        $home_content = view('usit.usit_features_list')->with('features', $features);
        return view('layouts.master')->with('home_content', $home_content);

    }

    public function edit_usit_feature($id)
    {
        $feature = Feature::find($id);
        $home_content = view('usit.usit_features_edit')->with('feature', $feature);
        return view('layouts.master')->with('home_content', $home_content);
    }

    public function update_usit_feature(Request $request)
    {
        $id = $request->input('id');
        $feature = Feature::find($id);
        $feature->feature = $request->input('feature');
        $feature->save();
        Session::flash('success', 'Features updated successfully!');
        return redirect('get-usit-features');
    }

    public function usit_services()
    {
        $home_content = view('usit.usit_service_page');
        return view('layouts.master')->with('home_content', $home_content);
    }

    public function save_usit_service(Request $request)
    {
        $services = $request->input('servicemore');

        for($i = 0; $i < count($services); $i++)
        {
            $service = new Service();
            $service->service_id = "serv-".rand(000, 999).date('i');
            $service->service = $services[$i];
            $service->service_description = "";
            $service->service_image = "";
            $service->created_at = date('Y-m-d h:i:s');
            $service->updated_at = date('Y-m-d h:i:s');
            $service->save();
        }

        Session::flash('success', 'Services added successfully!');
        return redirect('get-usit-services');
    }

    public function get_usit_services()
    {
        $services = Service::get();
        $home_content = view('usit.usit_service_list')->with('services', $services);
        return view('layouts.master')->with('home_content', $home_content);
    }

    public function edit_usit_service($id)
    {
        $service = Service::find($id);
        $home_content = view('usit.usit_service_edit')->with('service', $service);
        return view('layouts.master')->with('home_content', $home_content);
    }

    public function update_usit_service(Request $request)
    {
        $id = $request->input('id');
        $service = Service::find($id);
        $service->service = $request->input('service');
        $service->service_description = $request->input('description');
        $service->save();
        Session::flash('success', 'Service updated successfully!');
        return redirect('get-usit-services');
    }

    public function update_service_picture($sid)
    {
        $service = Service::where('service_id', $sid)->first();
        $home_content = view('usit.usit_service_picture_edit')->with('service', $service);
        return view('layouts.master')->with('home_content', $home_content);
    }

    public function update_usit_service_picture(Request $request)
    {
        $file = $request->file('service_picture');
        $service_id = $request->input('service_id');
        if($_FILES['service_picture']['size'] > 0){
            // single file
            $rules = array('service_picture'=>'required|image|mimes:jpeg,png,jpg|max:2048');
            $validator = Validator::make(array('service_picture'=> $file), $rules);
            if($validator->passes()){
                $destination_path = 'service_picture';
                $input['service_picture'] = "service-".rand(000,9999).date('i').".".$file->getClientOriginalExtension();
                $img = Image::make($file->getRealPath());
                $pic_to_save = $destination_path.'/'.$input['service_picture'];
                $img->resize(200, 200, function ($constraint) {$constraint->aspectRatio();
                })->save($pic_to_save);

                $service = Service::where('service_id', $service_id)->first();
                $service->service_image = $pic_to_save;
                $service->save();
                Session::flash('success', 'Service picture updated successfully!');
                return Redirect::to('get-usit-services');
            }else{
                return Redirect::to('get-usit-services')->withInput()->withErrors($validator);
            }
        }
        else{
            Session::flash('success', 'Please insert file');
            return Redirect::to('get-usit-services');
        }
    }

    public function edit_service_feature($id)
    {
        $s_feature = ServiceFeature::find($id);
        $home_content = view('usit.usit_service_feature_edit')->with('s_feature', $s_feature);
        return view('layouts.master')->with('home_content', $home_content);
    }

    public function update_usit_service_feature(Request $request)
    {
        $id = $request->input('id');
        $service_feature = ServiceFeature::find($id);
        $service_feature->feature = $request->input('s_feature');
        $service_feature->save();
        Session::flash('success', 'Service Feature updated successfully!');
        return redirect('get-usit-services');
    }

    public function add_service_features($sid)
    {
        $service = Service::where('service_id', $sid)->first();
        $home_content = view('usit.usit_service_feature_page')->with('service', $service);
        return view('layouts.master')->with('home_content', $home_content);
    }

    public function save_usit_service_features(Request $request)
    {
        $service_features = $request->input('featuremore');
        $service_id = $request->input('service_id');

        for($i = 0; $i < count($service_features); $i++)
        {
            $service_f = new ServiceFeature();
            $service_f->service_id = $service_id;
            $service_f->feature = $service_features[$i];
            $service_f->created_at = date('Y-m-d h:i:s');
            $service_f->updated_at = date('Y-m-d h:i:s');
            $service_f->save();
        }

        Session::flash('success', 'Services Features added successfully!');
        return redirect('get-usit-services');
    }

    public function add_service_description($sid)
    {
        $service = Service::where('service_id', $sid)->first();
        $home_content = view('usit.usit_service_description_page')->with('service', $service);
        return view('layouts.master')->with('home_content', $home_content);
    }

    public function save_usit_service_description(Request $request)
    {
        $service_desc = $request->input('description');
        $service_id = $request->input('service_id');
        $service = Service::where('service_id', $service_id)->first();
        $service->service_description = $service_desc;
        $service->save();
        Session::flash('success', 'Services Description added successfully!');
        return redirect('get-usit-services');
    }

    public function add_usit_customers()
    {
        $home_content = view('usit.usit_new_customer_page');
        return view('layouts.master')->with('home_content', $home_content);
    }

    public function save_customer_info(Request $request)
    {
        $file = $request->file('c_pic');
        if($_FILES['c_pic']['size'] > 0){
            // single file
            $rules = array('c_pic'=>'required|image|mimes:jpeg,png,jpg|max:2048');
            $validator = Validator::make(array('c_pic'=> $file), $rules);
            if($validator->passes()){
                $destination_path = 'customer_picture';
                $input['customer_picture'] = "customer-".rand(000,9999).date('i').".".$file->getClientOriginalExtension();
                $img = Image::make($file->getRealPath());
                $pic_to_save = $destination_path.'/'.$input['customer_picture'];
                $img->resize(200, 200, function ($constraint) {$constraint->aspectRatio();
                })->save($pic_to_save);

                $customer = new Customer();
                $customer->customer_name = $request->input('c_name');
                $customer->image_path = $pic_to_save;
                $customer->organization = $request->input('c_org');
                $customer->designation = $request->input('c_designation');
                $customer->feedback = $request->input('c_feedback');
                $customer->created_at = date('Y-m-d h:i:s');
                $customer->updated_at = date('Y-m-d h:i:s');
                $customer->save();

                Session::flash('success', 'Customer added successfully!');
                return redirect('get-usit-customers');
            }else{
                return Redirect::to('add-usit-customers')->withInput()->withErrors($validator);
            }
        }
        else{
            Session::flash('success', 'Please insert file');
            return Redirect::to('add-usit-customers');
        }

    }

    public function get_usit_customers()
    {
        $customers = Customer::get();
        $home_content = view('usit.usit_customers_page')->with('customers', $customers);
        return view('layouts.master')->with('home_content', $home_content);
    }

    public function edit_usit_customer($cid)
    {
        $customer = Customer::find($cid);
        $home_content = view('usit.usit_edit_customer_page')->with('customer', $customer);
        return view('layouts.master')->with('home_content', $home_content);
    }

    public function update_customer_info(Request $request)
    {
//        echo "<pre>";
//        print_r($request->all());
//        exit;

        $file = $request->file('c_pic');
        $c_id = $request->input('c_id');
        if($_FILES['c_pic']['size'] > 0){
            // single file
            $rules = array('c_pic'=>'required|image|mimes:jpeg,png,jpg|max:2048');
            $validator = Validator::make(array('c_pic'=> $file), $rules);
            if($validator->passes()){
                $destination_path = 'customer_picture';
                $input['customer_picture'] = "customer-".rand(000,9999).date('i').".".$file->getClientOriginalExtension();
                $img = Image::make($file->getRealPath());
                $pic_to_save = $destination_path.'/'.$input['customer_picture'];
                $img->resize(200, 200, function ($constraint) {$constraint->aspectRatio();
                })->save($pic_to_save);

                $customer = Customer::find($c_id);
                unlink($customer->image_path);
                $customer->customer_name = $request->input('c_name');
                $customer->image_path = $pic_to_save;
                $customer->organization = $request->input('c_org');
                $customer->designation = $request->input('c_designation');
                $customer->feedback = $request->input('c_feedback');
                $customer->created_at = date('Y-m-d h:i:s');
                $customer->updated_at = date('Y-m-d h:i:s');
                $customer->save();

                Session::flash('success', 'Customer updated successfully!');
                return redirect('get-usit-customers');
            }else{
                return Redirect::to('edit-usit-customer/'.$c_id)->withInput()->withErrors($validator);
            }
        }
        else{
            $customer = Customer::find($c_id);
            $customer->customer_name = $request->input('c_name');
            $customer->organization = $request->input('c_org');
            $customer->designation = $request->input('c_designation');
            $customer->feedback = $request->input('c_feedback');
            $customer->created_at = date('Y-m-d h:i:s');
            $customer->updated_at = date('Y-m-d h:i:s');
            $customer->save();
            Session::flash('success', 'Customer updated successfully!');
            return Redirect::to('get-usit-customers');
        }
    }

    public function add_usit_portfolio()
    {
        $home_content = view('usit.usit_new_portfolio_page');
        return view('layouts.master')->with('home_content', $home_content);
    }

    public function save_portfolio_info(Request $request)
    {
        $file = $request->file('p_pic');
        if($_FILES['p_pic']['size'] > 0){
            // single file
            $rules = array('p_pic'=>'required|image|mimes:jpeg,png,jpg|max:50120');
            $validator = Validator::make(array('p_pic'=> $file), $rules);
            if($validator->passes()){
                $destination_path = 'project_picture';
                $input['project_picture'] = "project-".rand(000,9999).date('i').".".$file->getClientOriginalExtension();
                $img = Image::make($file->getRealPath());
                $pic_to_save = $destination_path.'/'.$input['project_picture'];
                $img->resize(200, 200, function ($constraint) {$constraint->aspectRatio();
                })->save($pic_to_save);

                $portfolio = new Portfolio();
                $portfolio->portfolio_id = "project-".rand(000, 9999).date('i');
                $portfolio->product_name = $request->input('p_name');
                $portfolio->image_path = $pic_to_save;
                $portfolio->description = $request->input('p_desc');
                $portfolio->url = $request->input('p_url');
                $portfolio->created_at = date('Y-m-d h:i:s');
                $portfolio->updated_at = date('Y-m-d h:i:s');
                $portfolio->save();

                Session::flash('success', 'Portfolio added successfully!');
                return redirect('get-usit-portfolios');
            }else{
                return Redirect::to('add-usit-portfolios')->withInput()->withErrors($validator);
            }
        }
        else{
            Session::flash('success', 'Please insert file');
            return Redirect::to('add-usit-portfolio');
        }
    }

    public function get_usit_portfolios()
    {
        $portfolios = Portfolio::get();
        $home_content = view('usit.usit_portfolio_page')->with('portfolios', $portfolios);
        return view('layouts.master')->with('home_content', $home_content);
    }

    public function add_portfolio_features($pid)
    {
        $portfolio = Portfolio::where('portfolio_id', $pid)->first();
        $home_content = view('usit.usit_portfolio_feature_page')->with('portfolio', $portfolio);
        return view('layouts.master')->with('home_content', $home_content);
    }

    public function save_usit_portfolio_features(Request $request)
    {
        $portfolio_features = $request->input('featuremore');
        $portfolio_id = $request->input('portfolio_id');

        for($i = 0; $i < count($portfolio_features); $i++)
        {
            $portfolio_f = new PortfolioFeature();
            $portfolio_f->portfolio_id = $portfolio_id;
            $portfolio_f->feature = $portfolio_features[$i];
            $portfolio_f->created_at = date('Y-m-d h:i:s');
            $portfolio_f->updated_at = date('Y-m-d h:i:s');
            $portfolio_f->save();
        }

        Session::flash('success', 'Portfolio Features added successfully!');
        return redirect('get-usit-portfolios');
    }

    public function edit_portfolio_feature($fid)
    {
        $p_feature = PortfolioFeature::find($fid);
        $home_content = view('usit.usit_portfolio_feature_edit')->with('p_feature', $p_feature);
        return view('layouts.master')->with('home_content', $home_content);
    }

    public function update_usit_portfolio_feature(Request $request)
    {
        $portfolio_feature = $request->input('p_feature');
        $f_id = $request->input('id');

            $portfolio_f = PortfolioFeature::find($f_id);
            $portfolio_f->feature = $portfolio_feature;
            $portfolio_f->created_at = date('Y-m-d h:i:s');
            $portfolio_f->updated_at = date('Y-m-d h:i:s');
            $portfolio_f->save();

        Session::flash('success', 'Portfolio Features updated successfully!');
        return redirect('get-usit-portfolios');
    }

    public function edit_usit_portfolio($pid)
    {
        $portfolio = Portfolio::where('portfolio_id', $pid)->first();
        $home_content = view('usit.usit_edit_portfolio_page')->with('portfolio', $portfolio);
        return view('layouts.master')->with('home_content', $home_content);
    }

    public function update_portfolio_info(Request $request)
    {

        $file = $request->file('p_pic');
        $p_id = $request->input('p_id');

        if($_FILES['p_pic']['size'] > 0){
            // single file
            $rules = array('p_pic'=>'required|image|mimes:jpeg,png,jpg|max:50120');
            $validator = Validator::make(array('p_pic'=> $file), $rules);
            if($validator->passes()){
                $destination_path = 'project_picture';
                $input['project_picture'] = "project-".rand(000,9999).date('i').".".$file->getClientOriginalExtension();
                $img = Image::make($file->getRealPath());
                $pic_to_save = $destination_path.'/'.$input['project_picture'];
                $img->resize(200, 200, function ($constraint) {$constraint->aspectRatio();
                })->save($pic_to_save);

                $portfolio = Portfolio::where('portfolio_id', $p_id)->first();
                unlink($portfolio->image_path);
                $portfolio->product_name = $request->input('p_name');
                $portfolio->image_path = $pic_to_save;
                $portfolio->description = $request->input('p_desc');
                $portfolio->url = $request->input('p_url');
                $portfolio->created_at = date('Y-m-d h:i:s');
                $portfolio->updated_at = date('Y-m-d h:i:s');
                $portfolio->save();

                Session::flash('success', 'Portfolio updated successfully!');
                return redirect('get-usit-portfolios');
            }else{
                return Redirect::to('add-usit-portfolios')->withInput()->withErrors($validator);
            }
        }
        else{
            $portfolio = Portfolio::where('portfolio_id', $p_id)->first();
            $portfolio->product_name = $request->input('p_name');
            $portfolio->description = $request->input('p_desc');
            $portfolio->url = $request->input('p_url');
            $portfolio->created_at = date('Y-m-d h:i:s');
            $portfolio->updated_at = date('Y-m-d h:i:s');
            $portfolio->save();

            Session::flash('success', 'Portfolio updated successfully!');
            return redirect('get-usit-portfolios');
        }

    }

    public function add_usit_address()
    {
        $home_content = view('usit.usit_new_address_page');
        return view('layouts.master')->with('home_content', $home_content);
    }

    public function save_new_address(Request $request)
    {
        $data = array(
            'branch' => $request->input('b_name'),
            'address_line_one' => $request->input('address_line_one'),
            'address_line_two' => $request->input('address_line_two'),
            'state_city' => $request->input('state_city'),
            'country' => $request->input('country'),
            'mobile' => $request->input('mobile'),
            'office_phone' => $request->input('office_phone'),
            'email' => $request->input('email'),
            'map' => $request->input('map'),
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s')
        );

        DB::table('contacts')->insert($data);
        Session::flash('success', 'Contact address added successfully!');
        return redirect('get-usit-addresses');
    }

    public function get_usit_addresses()
    {
        $addresses = DB::table('contacts')->get();
        $home_content = view('usit.usit_address_page')->with('addresses', $addresses);
        return view('layouts.master')->with('home_content', $home_content);
    }

    public function edit_address($cid)
    {
        $address = DB::table('contacts')->where('id', $cid)->first();
        $home_content = view('usit.usit_edit_address_page')->with('address', $address);
        return view('layouts.master')->with('home_content', $home_content);
    }

    public function update_address(Request $request)
    {
        $cid = $request->input('id');
        $data = array(
            'branch' => $request->input('b_name'),
            'address_line_one' => $request->input('address_line_one'),
            'address_line_two' => $request->input('address_line_two'),
            'state_city' => $request->input('state_city'),
            'country' => $request->input('country'),
            'mobile' => $request->input('mobile'),
            'office_phone' => $request->input('office_phone'),
            'email' => $request->input('email'),
            'map' => $request->input('map')
        );

        DB::table('contacts')->where('id', $cid)->update($data);
        Session::flash('success', 'Contact address updated successfully!');
        return redirect('get-usit-addresses');
    }

    public function add_usit_slider()
    {
        $home_content = view('usit.usit_new_slider_page');
        return view('layouts.master')->with('home_content', $home_content);
    }

    public function save_slider(Request $request)
    {
        $file = $request->file('s_pic');

        if($_FILES['s_pic']['size'] > 0){
            // single file
            $rules = array('s_pic'=>'required|image|mimes:jpeg,png,jpg|max:50120');
            $validator = Validator::make(array('s_pic'=> $file), $rules);
            if($validator->passes()){
                $destination_path = 'slider_picture';
                $input['slider_picture'] = "slider-".rand(000,9999).date('i').".".$file->getClientOriginalExtension();
                $img = Image::make($file->getRealPath());
                $pic_to_save = $destination_path.'/'.$input['slider_picture'];
                $img->resize(1660, 778)->save($pic_to_save);

                $slider = array(
                    'slider_path' => $pic_to_save,
                    'is_active' => 0,
                    'created_at' => date('Y-m-d h:i:s'),
                    'updated_at' => date('Y-m-d h:i:s')
                );
                DB::table('sliders')->insert($slider);

                Session::flash('success', 'Slider added successfully!');
                return redirect('get-usit-sliders-titles');
            }else{
                return Redirect::to('add-usit-slider')->withInput()->withErrors($validator);
            }
        }
        else{
            Session::flash('success', 'Slider images not found!');
            return redirect('add-usit-slider');
        }
    }

    public function get_usit_sliders_titles()
    {
        $sliders = DB::table('sliders')->get();
        $titles = DB::table('slider_texts')->get();
        $home_content = view('usit.usit_all_slider_title_page')->with('sliders', $sliders)->with('titles', $titles);
        return view('layouts.master')->with('home_content', $home_content);
    }

    public function active_slider_image($sid)
    {
        $deactive_data = array(
            'is_active' => 0
        );
        DB::table('sliders')->where('is_active', 1)->update($deactive_data);

        $active_data = array(
            'is_active' => 1
        );
        DB::table('sliders')->where('id', $sid)->update($active_data);

        Session::flash('success', 'Slider activate successfully!');
        return redirect('get-usit-sliders-titles');
    }

    public function change_slider_image($sid)
    {
        $slider = DB::table('sliders')->find($sid);
        $home_content = view('usit.usit_edit_slider_page')->with('slider', $slider);
        return view('layouts.master')->with('home_content', $home_content);
    }

    public function update_slider(Request $request)
    {
        $file = $request->file('s_pic');
        $sid = $request->input('sid');

        if($_FILES['s_pic']['size'] > 0){
            // single file
            $rules = array('s_pic'=>'required|image|mimes:jpeg,png,jpg|max:50120');
            $validator = Validator::make(array('s_pic'=> $file), $rules);
            if($validator->passes()){
                $destination_path = 'slider_picture';
                $input['slider_picture'] = "slider-".rand(000,9999).date('i').".".$file->getClientOriginalExtension();
                $img = Image::make($file->getRealPath());
                $pic_to_save = $destination_path.'/'.$input['slider_picture'];
                $img->resize(1660, 778)->save($pic_to_save);

                $slider = array(
                    'slider_path' => $pic_to_save,
                    'created_at' => date('Y-m-d h:i:s'),
                    'updated_at' => date('Y-m-d h:i:s')
                );

                $old_slider = DB::table('sliders')->find($sid);
                unlink($old_slider->slider_path);

                DB::table('sliders')->where('id', $sid)->update($slider);

                Session::flash('success', 'Slider updated successfully!');
                return redirect('get-usit-sliders-titles');
            }else{
                return Redirect::to('change-slider-image/'.$sid)->withInput()->withErrors($validator);
            }
        }
        else{
            Session::flash('success', 'Slider images not found!');
            return redirect('change-slider-image/'.$sid);
        }
    }

    public function add_usit_slider_title()
    {
        $home_content = view('usit.usit_new_slider_title');
        return view('layouts.master')->with('home_content', $home_content);
    }

    public function save_slider_title(Request $request)
    {
        $title = $request->input('title');
        $sub = $request->input('sub');

        $data = array(
            'slider_text' => $title,
            'sub_text' => $sub,
            'is_active' => 1,
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s')
        );

        DB::table('slider_texts')->insert($data);

        Session::flash('success', 'Slider Title added successfully!');
        return redirect('get-usit-sliders-titles');
    }

    public function edit_slider_title($tid)
    {
        $title = DB::table('slider_texts')->find($tid);
        $home_content = view('usit.usit_edit_slider_title')->with('title', $title);
        return view('layouts.master')->with('home_content', $home_content);
    }

    public function update_slider_title(Request $request)
    {
        $title = $request->input('title');
        $sub = $request->input('sub');
        $tid = $request->input('tid');

        $data = array(
            'slider_text' => $title,
            'sub_text' => $sub,
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s')
        );

        DB::table('slider_texts')->where('id', $tid)->update($data);

        Session::flash('success', 'Slider Title updated successfully!');
        return redirect('get-usit-sliders-titles');
    }

    public function add_usit_blog()
    {
        $services = Service::get();
        $home_content = view('usit.usit_new_blog_page')->with('services', $services);
        return view('layouts.master')->with('home_content', $home_content);
    }

    public function save_new_blog(Request $request)
    {
        $file = $request->file('b_pic');
        if($_FILES['b_pic']['size'] > 0){
            // single file
            $rules = array('b_pic'=>'required|image|mimes:jpeg,png,jpg|max:2048');
            $validator = Validator::make(array('b_pic'=> $file), $rules);
            if($validator->passes()){
                $destination_path = 'blog_picture';
                $input['blog_picture'] = "blog-".rand(000,9999).date('i').".".$file->getClientOriginalExtension();
                $img = Image::make($file->getRealPath());
                $pic_to_save = $destination_path.'/'.$input['blog_picture'];
                $img->resize(1000, 800, function ($constraint) {$constraint->aspectRatio();
                })->save($pic_to_save);

                $blog = new Blog();
                $blog->blog_id = "blog-".rand(000, 9999).date('i');
                $blog->blog_title = $request->input('title');
                $blog->service_id = $request->input('service_id');
                $blog->description = $request->input('desc');
                $blog->blog_image = $pic_to_save;
                $blog->tags = $request->input('tags');
                $blog->is_active = 1;
                $blog->created_at = date('Y-m-d h:i:s');
                $blog->updated_at = date('Y-m-d h:i:s');
                $blog->save();

                Session::flash('success', 'Blog added successfully!');
                return redirect('get-usit-blogs');
            }else{
                return Redirect::to('add-usit-blog')->withInput()->withErrors($validator);
            }
        }
        else{
            Session::flash('success', 'Please insert Blog Picture!');
            return Redirect::to('add-usit-blog');
        }
    }

    public function get_usit_blogs()
    {
        $blogs = Blog::get();
        $home_content = view('usit.usit_all_blogs_page')->with('blogs', $blogs);
        return view('layouts.master')->with('home_content', $home_content);
    }

    public function view_usit_blog($bl_id)
    {
        $blog = Blog::where('blog_id', $bl_id)->first();
        $home_content = view('usit.usit_view_blog_page')->with('blog', $blog);
        return view('layouts.master')->with('home_content', $home_content);
    }

    public function edit_usit_blog($bl_id)
    {
        $blog = Blog::where('blog_id', $bl_id)->first();
        $services = Service::get();
        $home_content = view('usit.usit_edit_blog_page')->with('blog', $blog)->with('services', $services);
        return view('layouts.master')->with('home_content', $home_content);
    }

    public function update_blog(Request $request)
    {
        $bl_id = $request->input('blog_id');
        $file = $request->file('b_pic');
        if($_FILES['b_pic']['size'] > 0){
            // single file
            $rules = array('b_pic'=>'required|image|mimes:jpeg,png,jpg|max:2048');
            $validator = Validator::make(array('b_pic'=> $file), $rules);
            if($validator->passes()){
                $destination_path = 'blog_picture';
                $input['blog_picture'] = "blog-".rand(000,9999).date('i').".".$file->getClientOriginalExtension();
                $img = Image::make($file->getRealPath());
                $pic_to_save = $destination_path.'/'.$input['blog_picture'];
                $img->resize(1000, 800, function ($constraint) {$constraint->aspectRatio();
                })->save($pic_to_save);

                $blog = Blog::where('blog_id', $bl_id)->first();
                unlink($blog->blog_image);
                $blog->blog_title = $request->input('title');
                $blog->service_id = $request->input('service_id');
                $blog->description = $request->input('desc');
                $blog->blog_image = $pic_to_save;
                $blog->tags = $request->input('tags');
                $blog->is_active = 1;
                $blog->created_at = date('Y-m-d h:i:s');
                $blog->updated_at = date('Y-m-d h:i:s');
                $blog->save();

                Session::flash('success', 'Blog updated successfully!');
                return redirect('get-usit-blogs');
            }else{
                return Redirect::to('edit-usit-blog/'.$bl_id)->withInput()->withErrors($validator);
            }
        }
        else{
            $blog = Blog::where('blog_id', $bl_id)->first();
            $blog->blog_title = $request->input('title');
            $blog->service_id = $request->input('service_id');
            $blog->description = $request->input('desc');
            $blog->tags = $request->input('tags');
            $blog->is_active = 1;
            $blog->created_at = date('Y-m-d h:i:s');
            $blog->updated_at = date('Y-m-d h:i:s');
            $blog->save();

            Session::flash('success', 'Blog updated successfully!');
            return redirect('get-usit-blogs');
        }
    }

    public function add_usit_price_package()
    {
        $home_content = view('usit.usit_new_price_package');
        return view('layouts.master')->with('home_content', $home_content);
    }

    public function save_usit_price_package(Request $request)
    {
        $title = $request->input('title');
        $price = $request->input('price');
        $offer = $request->input('offer');
        $total_pack = count($title);

        for($x = 0; $x < $total_pack; $x++)
        {
            $price_package = new Package();
            $price_package->package_id = "pack-".rand(000, 9999).date('i');
            $price_package->package_name = $title[$x];
            $price_package->price_range = $price[$x];
            $price_package->offer = $offer[$x];
            $price_package->created_at = date('Y-m-d h:i:s');
            $price_package->updated_at = date('Y-m-d h:i:s');
            $price_package->save();
        }

        Session::flash('success', 'Price package added successfully!');
        return redirect('get-usit-price-chart');

    }

    public function get_usit_price_chart()
    {
        $packages = Package::get();
        $features = PackageFeature::get();
        $home_content = view('usit.usit_price_chart')->with('packages', $packages)->with('features', $features);
        return view('layouts.master')->with('home_content', $home_content);
    }

    public function add_usit_price_package_feature()
    {
        $home_content = view('usit.usit_new_price_package_feature');
        return view('layouts.master')->with('home_content', $home_content);
    }

    public function save_usit_price_package_features(Request $request)
    {
        $features = $request->input('featuremore');

        $total_features = count($features);

        for($x = 0; $x < $total_features; $x++)
        {
            $feature = new PackageFeature();
            $feature->package_feature_id = "p-feature-".rand(000, 9999).date('i');
            $feature->package_id = 0;
            $feature->package_feature = $features[$x];
            $feature->created_at = date('Y-m-d h:i:s');
            $feature->updated_at = date('Y-m-d h:i:s');
            $feature->save();
        }

        Session::flash('success', 'Package Features added successfully!');
        return redirect('get-usit-price-chart');
    }

    public function delete_from_package($id)
    {
        DB::table('package_feature_offers')->where('id', $id)->delete();
        Session::flash('success', 'Package Features updated successfully!');
        return redirect('get-usit-price-chart');
    }

    public function add_to_package($package_id, $package_feature_id, $offer_id)
    {
        $pack_feature_offer = new PackageFeatureOffer();
        $pack_feature_offer->package_id = $package_id;
        $pack_feature_offer->package_feature_id = $package_feature_id;
        $pack_feature_offer->package_feature_offer = $offer_id;
        $pack_feature_offer->created_at = date('Y-m-d h:i:s');
        $pack_feature_offer->updated_at = date('Y-m-d h:i:s');
        $pack_feature_offer->save();
        Session::flash('success', 'Package Features updated successfully!');
        return redirect('get-usit-price-chart');
    }

    public function edit_package_info($pack_id)
    {
        $package = Package::where('package_id', $pack_id)->first();
        $home_content = view('usit.usit_edit_price_package')->with('package', $package);
        return view('layouts.master')->with('home_content', $home_content);
    }

    public function update_usit_price_package(Request $request)
    {
        $pack_id = $request->input('pack_id');
        $price_package = Package::where('package_id', $pack_id)->first();
        $price_package->package_name = $request->input('title');
        $price_package->price_range = $request->input('price');
        $price_package->offer = $request->input('offer');
        $price_package->updated_at = date('Y-m-d h:i:s');
        $price_package->save();

        Session::flash('success', 'Price package updated successfully!');
        return redirect('get-usit-price-chart');
    }












































}
