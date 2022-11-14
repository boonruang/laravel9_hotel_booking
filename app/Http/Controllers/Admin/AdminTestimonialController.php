<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testimonial;

class AdminTestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::get();
        return view('admin.testimonial_view',compact('testimonials'));
    }

    public function add()
    {
        return view('admin.testimonial_add');
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'photo' => 'required|mimes:jpg,jpeg,png,gif|max:2048',
            'name' => 'required',
            'designation' => 'required',
            'comment' => 'required',
        ]);  
        
        $ext = $request->file('photo')->extension();
        $final_name = time().'.'.$ext;
        $request->file('photo')->move(public_path('uploads/testimonials/'),$final_name);
        
        $obj = new Testimonial();
        $obj->photo = $final_name;
        $obj->name = $request->name;
        $obj->designation = $request->designation;
        $obj->comment = $request->comment;
        $obj->save();

        return redirect()->back()->with('success','Testimonial is added successfully');

    }

    public function edit($id)
    {
        $testimonial_data = Testimonial::where('id',$id)->first();
        return view('admin.testimonial_edit',compact('testimonial_data'));
    }

    public function update(Request $request,$id)
    {
        $obj = Testimonial::where('id',$id)->first();

        if($request->hasFile('photo')) {
            
            $request->validate([
                'photo' => 'required|mimes:jpg,jpeg,png,gif|max:2048',
            ]); 
            
            unlink(public_path('uploads/testimonials/'.$obj ->photo));

            $ext = $request->file('photo')->extension();
        
            $final_name = time().'.'.$ext;
            
            $request->file('photo')->move(public_path('uploads/testimonials/'),$final_name);            

            $obj->photo = $final_name;
        }
        

        $obj->name = $request->name;
        $obj->designation = $request->designation;
        $obj->comment = $request->comment;
        $obj->update();

        return redirect()->back()->with('success','Testimonial is updated successfully');
    }    

    public function delete($id)
    {
        $single_data = Testimonial::where('id',$id)->first();

        unlink(public_path('uploads/testimonials/'.$single_data->photo));

        $single_data->delete();
         
        return redirect()->back()->with('success','Testimonial is deleted successfully');
    }    
}
