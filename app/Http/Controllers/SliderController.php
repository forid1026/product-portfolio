<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;


class SliderController extends Controller
{
    public function AllSlider()
    {
        $allSlider = Slider::all();
        return view('admin.slider.all_slider', compact('allSlider'));
    }

    public function AddSlider()
    {
        return view('admin.slider.add_slider');
    } //end

    public function StoreSlider(Request $request)
    {
        if ($request->file('slider_image')) {
            $image = $request->file('slider_image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(1920, 516)->save('upload/slider_images/' . $name_gen);
            $save_url = 'upload/slider_images/' . $name_gen;
            $slider = new Slider();
            $slider->slider_image = $save_url;
            $slider->created_at = Carbon::now();
            $slider->save();
        }

        $notification = array(
            'message' => 'Slider Added Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.slider')->with($notification);
    } //end method

    public function EditSlider($id)
    {
        $sliderInfo = Slider::findOrFail($id);
        return view('admin.slider.edit_slider', compact('sliderInfo'));
    }

    public function UpdateSlider(Request $request)
    {
        $slider_id = $request->id;
        if ($request->file('slider_image')) {

            $sliderImg = Slider::findOrFail($slider_id);
            if ($sliderImg->slider_image != null) {
                $img = $sliderImg->slider_image;
                unlink($img);
            }

            $image = $request->file('slider_image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();

            Image::make($image)->resize(1920, 516)->save('upload/slider_images/' . $name_gen);
            $save_url = 'upload/slider_images/' . $name_gen;

            Slider::findOrFail($slider_id)->update([
                'slider_image' => $save_url,
            ]);

            $notification = array(
                'message' => 'Course Updated Successfully',
                'alert_type' => 'success'
            );
        }
        return redirect()->route('all.slider')->with($notification);
    }

    public function DeleteSlider($id)
    {
        $Slider = Slider::findOrFail($id);
        if ($Slider->slider_image != null) {
            $img = $Slider->slider_image;
            unlink($img);
        }


        $Slider->delete();
        $notification = array(
            'message' => 'Slider Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.slider')->with($notification);
    }
}
