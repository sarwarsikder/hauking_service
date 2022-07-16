@extends('dashboard.layouts.master')

@section('title')
    Frequency
@endsection

@section('content')
    <div class="main-content-inner pt-4">
        <div class="row pb-3 pt-3">
            <div class="col-md-2 col-sm-2">
                <h4 style="margin-bottom: 0;">Frequencys</h4>
            </div>
            <div class="col-md-10 col-sm-10"> </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="frequency-table shadow">
                    <div class="frequencyAddBtn">
                        <button class="add-user " id="add-frequency"> Add Frequency</button>
                        <input type="text" placeholder="Enter Frequency Name.." id="frequency" class="hide">
                        <span class="hide" id="addFrequencyBtn"><i class="bi bi-plus"></i></span>
                    </div>
                    <table style="width:100%" class="current-data-table">
                        <tr>
                            <th>Frequency 1</th>
                            <td class="text-end">
                                <button class="edit-btn"><i class="bi bi-pencil-square"></i></button>
                                <button class="del-btn"><i class="bi bi-trash"></i></button>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
