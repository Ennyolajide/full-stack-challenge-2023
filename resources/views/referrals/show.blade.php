@extends('layouts.app')

@section('styles')
    <style>
        .float-right {
            float: right
        }
    </style>

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1>Referral</h1>
                    </div>
                    <div class="panel-body">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <!-- Display Referral Information -->
                        <div>
                            <h2>Referral Details</h2>
                            <p><strong>Reference No:</strong> {{ $referral->reference_no }}</p>
                            <p><strong>Organisation:</strong> {{ $referral->organisation }}</p>
                            <p><strong>Province:</strong> {{ $referral->province }}</p>
                            <p><strong>District:</strong> {{ $referral->district }}</p>
                            <p><strong>City:</strong> {{ $referral->city }}</p>
                            <p><strong>Street Address:</strong> {{ $referral->street_address }}</p>
                            {{-- <p><strong>Zipcode:</strong> {{ $referral->zipcode }}</p> --}}
                            <p><strong>Country:</strong> {{ $referral->country }}</p>
                            <!-- Include other decrypted attributes here -->
                            <p><strong>GPS Location:</strong> {{ $referral->gps_location }}</p>
                            <p><strong>Facility Name:</strong> {{ $referral->facility_name }}</p>
                            <p><strong>Facility Type:</strong> {{ $referral->facility_type }}</p>
                            <p><strong>Provider Name:</strong> {{ $referral->provider_name }}</p>
                            <p><strong>Position:</strong> {{ $referral->position }}</p>
                            <p><strong>Phone:</strong> {{ $referral->phone }}</p>
                            <p><strong>Email:</strong> {{ $referral->email }}</p>
                            <p><strong>Website:</strong> {{ $referral->website }}</p>
                            <p><strong>Pills Available:</strong> {{ $referral->pills_available }}</p>
                            <p><strong>Code to Use:</strong> {{ $referral->code_to_use }}</p>
                            <p><strong>Type of Service:</strong> {{ $referral->type_of_service }}</p>
                            <p><strong>Note:</strong> {{ $referral->note }}</p>
                            <p><strong>Women's Evaluation:</strong> {{ $referral->womens_evaluation }}</p>
                        </div>

                        <hr>

                        <!-- Add a form for adding comments -->
                        @can('add-comments')
                            <div>
                                <h2>Add a Comment</h2>
                                <form action="{{ route('add.comment', $referral->id) }}" method="post">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="comment" placeholder="Add a comment">
                                    </div>
                                    <button type="submit" class="btn btn-primary float-right">Submit</button>
                                </form>
                            </div>
                            <br>
                            <br>
                        @endcan


                        <hr>

                        <!-- Display existing comments -->
                        <!-- Display existing comments -->
                        <div>
                            <h2>Comments</h2>
                            @if (count($referral->comments) > 0)
                                <ul>
                                    @foreach ($referral->comments as $comment)
                                    <blockquote>
                            
                                            
                                            <strong></strong> {{ $comment->comment }}
                                            <br><br/>
                                            <span style="font-size: 12px;"><strong>Comment By:</strong> {{ $comment->user->name }} </span>
                                            
                                            <span class="float-right" style="font-size: 12px;"><strong>Time:</strong> {{ $comment->created_at->format('Y-m-d H:i:s') }} </span>
                                        </blockquote>
                                    @endforeach
                                </ul>
                            @else
                                <p>No comments yet.</p>
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
