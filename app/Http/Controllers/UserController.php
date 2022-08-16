<?php

namespace App\Http\Controllers;

use App\Models\Register;
use Illuminate\Http\Request;
use App\Models\Member_Register;
use Illuminate\Support\Facades\File;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create1');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required',
            'mobile_no' => 'required|numeric',
            'address' => 'required',
            'dob' => 'date|nullable',
        ]);

        $form_id = '10' . ((Member_Register::count()) ? Member_Register::count() + 1 : 1);

        $member1 = new Member_Register();
        $member1->member_id     = $form_id;
        $member1->full_name     = $request->full_name;
        $member1->mobile_no     = $request->mobile_no;
        $member1->instagram_id     = $request->instagram_id;
        $member1->dob     = $request->dob;
        $member1->parent_member_id     = Null;
        $member1->entry_type = $request->entry_type;
        $member1->ref_name = $request->ref_name;
        $member1->ref_number = $request->ref_number;
        $member1->address = $request->address;
        $member1->save();
        QrCode::generate($member1->member_id, 'images/' . $member1->member_id . '.svg');

        //for attachments
        $dirPath = 'attachments/';
        File::isDirectory($dirPath) or File::makeDirectory($dirPath, 0777, true, true);
        $attachmentPath = public_path($dirPath);
        if (!File::isDirectory($attachmentPath)) {
            File::makeDirectory($attachmentPath, 0777, true, true);
        }

        if ($request->has('photo')) {
            $mark_sheet = $request->file('photo');
            $mark_sheet_name = rand() . '.' . $mark_sheet->getClientOriginalExtension();
            $mark_sheet->move(public_path($dirPath), $mark_sheet_name);
            $member1->photo = $dirPath . $mark_sheet_name;
            $member1->save();
        }

        if ($request->has('id_proof')) {
            $id_proof = $request->file('id_proof');
            $id_proof_name = rand() . '.' . $id_proof->getClientOriginalExtension();
            $id_proof->move(public_path($dirPath), $id_proof_name);
            $member1->id_proof = $dirPath . $id_proof_name;
            $member1->save();
        }

        if ($request->entry_type == 'couple') {

            $member1->instagram_id =  $request->mem1_insta_id;
            $member1->dob =  $request->mem1_dob;


            if ($request->has('mem1_photo')) {
                $mark_sheet = $request->file('mem1_photo');
                $mark_sheet_name = rand() . '.' . $mark_sheet->getClientOriginalExtension();
                $mark_sheet->move(public_path($dirPath), $mark_sheet_name);
                $member1->photo = $dirPath . $mark_sheet_name;
            }


            if ($request->has('mem1_id_proof')) {
                $id_proof = $request->file('mem1_id_proof');
                $id_proof_name = rand() . '.' . $id_proof->getClientOriginalExtension();
                $id_proof->move(public_path($dirPath), $id_proof_name);
                $member1->id_proof = $dirPath . $id_proof_name;
            }
            $member1->save();

            $member2 = new Member_Register();
            $member2->member_id     = $form_id + 1;
            $member2->full_name     = $request->mem2_name;
            $member2->mobile_no     = $request->mem2_mobile_no;
            $member2->instagram_id     = $request->mem2_insta_id;
            $member2->dob     = $request->mem2_dob;
            $member2->parent_member_id     = $member1->id;
            $member2->entry_type = $request->entry_type;
            $member2->save();
            QrCode::generate($member2->member_id, 'images/' . $member2->member_id . '.svg');

            if ($request->has('mem2_photo')) {
                $mark_sheet = $request->file('mem2_photo');
                $mark_sheet_name = rand() . '.' . $mark_sheet->getClientOriginalExtension();
                $path = $mark_sheet->move(public_path($dirPath), $mark_sheet_name);
                $member2->photo = $dirPath . $mark_sheet_name;
            }

            if ($request->has('mem2_id_proof')) {
                $id_proof = $request->file('mem2_id_proof');
                $id_proof_name = rand() . '.' . $id_proof->getClientOriginalExtension();
                $id_proof->move(public_path($dirPath), $id_proof_name);
                $member2->id_proof = $dirPath . $id_proof_name;
            }
            $member2->save();

            foreach ($request->childs as $key => $value) {
                $child = new Member_Register();
                $child->member_id     =  $form_id + ($key + 2);
                $child->full_name     = $value['child_name'];
                $child->dob     = $value['child_dob'];
                $child->parent_member_id     = $member1->id;
                $child->entry_type = $request->entry_type;
                $child->save();
                QrCode::generate($child->member_id, 'images/' . $child->member_id . '.svg');
            }
        }

        if ($request->entry_type == 'group') {
            foreach ($request->group_a as $key => $value) {

                if ($key != 0) {
                    $member[$key] = new Member_Register();
                    $member[$key]->member_id     = $form_id + ($key);
                    $member[$key]->full_name     = $value['member_name'];
                    $member[$key]->mobile_no     = $value['mobile_no'];
                    $member[$key]->instagram_id     = $value['mem_insta_id'];
                    $member[$key]->dob     = $value['dob'];
                    $member[$key]->entry_type = $request->entry_type;
                    $member[$key]->parent_member_id     = $member1->id;
                    $member[$key]->save();
                    QrCode::generate($member[$key]->member_id, 'images/' . $member[$key]->member_id . '.svg');
                } else {
                    $member1->instagram_id     = $value['mem_insta_id'];
                    $member1->dob     = $value['dob'];
                    $member1->entry_type = $request->entry_type;
                    $member1->parent_member_id     = NUll;
                    $member1->save();
                }

                $value = collect($value);
                if (isset($value['mem_photo'])) {
                    $mem_photo = $value['mem_photo'];
                    $mem_photo_name = rand() . '.' . $mem_photo->getClientOriginalExtension();
                    $mem_photo->move(public_path($dirPath), $mem_photo_name);

                    if ($key != 0) {
                        $member[$key]->photo = $dirPath . $mem_photo_name;
                        $member[$key]->save();
                    } else {
                        $member1->photo = $dirPath . $mem_photo_name;
                        $member1->save();
                    }
                }
                if (isset($value['mem_id_proof'])) {
                    $id_proof = $value['mem_id_proof'];
                    $id_proof_name = rand() . '.' . $id_proof->getClientOriginalExtension();
                    $id_proof->move(public_path($dirPath), $id_proof_name);
                    if ($key != 0) {
                        $member[$key]->id_proof = $dirPath . $id_proof_name;
                        $member[$key]->save();
                    } else {
                        $member1->id_proof = $dirPath . $id_proof_name;
                        $member1->save();
                    }
                }
            }
        }

        // QrCode::generate($member1->id, 'images/'.$time.'.svg');

        return response()->json(['success' => true, 'message' => 'Registered successfully']);
    }

    /**
     * Ajax request for list resources.
     *
     * @param  \Illuminate\Http\Request  $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function server_side(Request $request)
    {
        // dd($request->all());
        $search = $request->filter;
        $filter = (array)json_decode($search);
        $sort = $request->sort;
        $order = $request->order;
        $offset = $request->offset;
        $limit = $request->limit;
        $i = 1;
        // query 
        // dd(Member_Register::with('Parent')->first());
        $query = Member_Register::when($search, function ($q) use ($filter, $i) {
            foreach ($filter as $key => $item) {
                $q->where($key, 'like', '%' . $item . '%');
            }
        })->when($sort, function ($q1) use ($sort, $order) {
            $q1->orderBy($sort, $order);
        });
        if (!$sort) {
            $query->orderBy('created_at', 'desc');
        }
        $count =  $query->count();
        $row = $query->when($offset, function ($q) use ($offset) {
            $q->offset($offset);
        })->when($limit, function ($q) use ($limit) {
            $q->limit($limit);
        })->get()->toArray();
        // dd(DB::getQueryLog());
        $index = $offset + 1;
        foreach ($row as $key => $item) {
            $row[$key]['dob'] = date("d-m-Y", strtotime($item['dob']));
            $row[$key]['photo'] = '<a href="' . $item['photo'] . '">' . $item['photo'] . '</a>';
            $row[$key]['created_at'] = date("d-m-Y  h:i:s a", strtotime($item['created_at']));
            $row[$key]['counter'] = $index++;
        }
        $data = [];

        $data['items'] = $row;
        $data['count'] = $count;
        return $data;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function changeStatus($id, Request $request)
    {
        $brand = Member_Register::findOrFail($id);
        $brand->update(['status' => $request->status]);
        return response()->json(['success' => true, 'message' => 'User changed successfully']);
    }
}
