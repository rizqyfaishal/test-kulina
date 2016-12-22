<?php

namespace App\Http\Controllers;

use App\Review;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = [];
        $result['data'] = Review::all();
        $result['status'] = 'ok';
        return response()->json($result,200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->json([
            'status' => 'ok',
            'data' => [
                'message' => 'not found'
            ]
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'rating' => 'required|numeric|between:0,5',
            'order_id' => 'required|integer',
            'product_id' => 'required|integer',
            'user_id' => 'required|integer',
            'review' => 'required|max:255|min:2'
        ]);
        if($validator->fails()){
            return response()->json([
                'status' => 'ok',
                'data' => [
                    'message' => 'error',
                    'errors' => $validator->errors()
                ]
            ]);
        } else {
            $user = User::where('id' ,'=',$request->user_id)->first();
            $review = Review::create($request->all());
            if($review){
                return response()->json([
                    'status' => 'ok',
                    'data' => $review
                ]);
            } else {
                return response()->json([
                    'status' => 'ok',
                    'data' => [
                        'message' => 'an error occured'
                    ]
                ]);
            }
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $review = Review::where('id','=',$id)->first();
        if($review){
            return response()->json([
                'status' => 'ok',
                'data' => $review
            ]);
        } else {
            return response()->json([
                'status' => 'ok',
                'data' => [
                    'message' => 'review with id: '.$id.' not found.'
                ]
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return response()->json([
            'status' => 'ok',
            'data' => [
                'message' => 'not found'
            ]
        ]);
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
        $validator = Validator::make($request->all(),[
            'rating' => 'required|numeric|between:0,5',
            'order_id' => 'required|integer',
            'product_id' => 'required|integer',
            'user_id' => 'required|integer',
            'review' => 'required|max:255|min:2'
        ]);
        if($validator->fails()){
            return response()->json([
                'status' => 'ok',
                'data' => [
                    'message' => 'error',
                    'errors' => $validator->errors()
                ]
            ]);
        } else {
            $review = Review::where('id','=',$id)->first();
            if($review){
                $status = $review->update($request->all());
                if($status){
                    return response()->json([
                        'status' => 'ok',
                        'data' => $review
                    ]);
                } else {
                    return response()->json([
                        'status' => 'ok',
                        'data' => [
                            'message' => 'an error occured'
                        ]
                    ]);
                }

            } else {
                return response()->json([
                    'status' => 'not found',
                    'data' => [
                        'message' => 'review with id: '.$id.' not found.'
                    ]
                ]);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $review = Review::where('id','=',$id)->first();
        if($review){
            $status = $review->delete();
            if($status){
                return response()->json([
                    'status' => 'ok',
                    'data' => [
                        'message' => 'review with id: '.$id.' has been deleted.'
                    ]
                ]);
            } else {
                return response()->json([
                    'status' => 'ok',
                    'data' => [
                        'message' => 'an error occured'
                    ]
                ]);
            }
        } else {
            return response()->json([
                'status' => 'ok',
                'data' => [
                    'message' => 'review with id: '.$id.' not found.'
                ]
            ]);
        }

    }
}
