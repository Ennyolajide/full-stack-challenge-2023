@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap.min.css">
    <style>
        .dataTables_wrapper .dataTables_filter {
            float: right;
        }

        .dataTables_wrapper .dataTables_paginate {
            float: right;
        }

        tbody tr {
            cursor: pointer;
        }

        tbody tr:hover {
            background-color: #78abd2;
        }

        .highlighted-row {
            background-color: #83b9dd;
        }
    </style>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                <h1 class="pull-left">Referrals</h1>
                    <div class="pull-right">
                        <br>
                        @can('add-referrals')
                            @include('partials.createReferralButton')
                        @endcan
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    <div class="table-responsive">
                        <table id="example" class="table table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Country</th>
                                    <th>Reference No</th>
                                    <th>Organisation</th>
                                    <th>Province</th>
                                    <th>District</th>
                                    <th>City</th>
                                    <th>Street Address</th>
                                    <th>Gps Location</th>
                                    <th>Facility Name</th>
                                    <th>Facility Type</th>
                                    <th>Provider Name</th>
                                    <th>Position</th>
                                    <th>Phone</th>
                                    <th>eMail</th>
                                    <th>Website</th>
                                    <th>Pills Available</th>
                                    <th>Code To Use</th>
                                    <th>Type of Service</th>
                                    <th>Note</th>
                                    <th>Womens Evaluation</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($referrals as $referral)
                                <tr onclick="window.location='{{ route('view-referral', $referral->id) }}'"
                                class="clickable-row">
                                    <td>{{ $referral->country }} </td>
                                    <td>{{ $referral->reference_no }} </td>
                                    <td>{{ $referral->organisation }} </td>
                                    <td>{{ $referral->province }} </td>
                                    <td>{{ $referral->district }} </td>
                                    <td>{{ $referral->city }} </td>
                                    <td>{{ $referral->street_address }} </td>
                                    <td>{{ $referral->gps_location }} </td>
                                    <td>{{ $referral->facility_name }} </td>
                                    <td>{{ $referral->facility_type }} </td>
                                    <td>{{ $referral->provider_name }} </td>
                                    <td>{{ $referral->position }} </td>
                                    <td>{{ $referral->phone }} </td>
                                    <td>{{ $referral->email }} </td>
                                    <td>{{ $referral->website }} </td>
                                    <td>{{ $referral->pills_available }} </td>
                                    <td>{{ $referral->code_to_use }} </td>
                                    <td>{{ $referral->type_of_service }} </td>
                                    <td>{{ $referral->note }} </td>
                                    <td>{{ $referral->womens_evaluation }} </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#example').DataTable({
                "scrollX": true
            });
        });

        $('.clickable-row').on('mouseover', function() {
            $(this).addClass('highlighted-row');
        });

        $('.clickable-row').on('mouseout', function() {
            $(this).removeClass('highlighted-row');
        });
    </script>
@endsection
