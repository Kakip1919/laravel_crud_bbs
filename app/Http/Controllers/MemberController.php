<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Member;

class MemberController extends Controller
{

    public function index()
    {
        //Memberテーブルからname,telephone, emailを$membersに格納
        $members = DB::table("members")->select("id", "name", "telephone", "email")->get();
        //viewを返す(compactでviewに$membersを渡す)
        return view("member/index", compact("members"));
    }


    public function create()
    {
        return view("member/create");
    }


    public function store(Request $request)
    {
        $member = new Member;
        $member->name = $request->input("name");
        $member->telephone = $request->input("telephone");
        $member->email = $request->input("email");

        $member->save();
        return redirect("member/index");
    }


    public function show($id)
    {
        $member = Member::find($id);

        return view("member/show", compact("member"));
    }


    public function edit($id)
    {
        $member = Member::find($id);

        return view("member/edit", compact("member"));

    }

    public function update(Request $request, $id)
    {
        $member = Member::find($id);

        $member->name = $request->input("name");
        $member->telephone = $request->input("telephone");
        $member->email = $request->input("email");
        $member->save();

        return redirect("member/index");
    }



    public function destroy($id)
    {
        $member = Member::find($id);
        $member->delete();

        return redirect("member/index");

    }
}
