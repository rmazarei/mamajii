@include('Admin.Panel.Layouts.Panel')



<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                  <i class="mdi mdi-card"></i>
                </span>{{__('all_strings.transations')}}
            </h3>
        </div>

        <div class="row">


            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        @if(count($all_trans)>0)
                        <table class="table">
                            <thead>
                            <tr>
                                <th>{{__('all_strings.Id')}}</th>
                                <th>{{__('all_strings.name')}} {{__('all_strings.family')}}</th>
                                <th>{{__('all_strings.date')}}</th>
                                <th>{{__('all_strings.value')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($all_trans as $trans)
                                    <tr>
                                        <td>{{$trans->id}}</td>
                                        <td>{{$trans->name}} {{$trans->family}}</td>
                                        <td>{{$trans->date}}</td>
                                        <td>{{$trans->value}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @else
                            <div style="width: 100%;height: 250px;display: flex;justify-content: center;align-items: center;">
                                <div style="width: 150px;">
                                    <img style="margin: 0 auto;" src="{{asset('Admin/images/icons/empty.png')}}" width="150px"/>
                                    <p style="margin: 10px auto;text-align: center;">{{__('all_strings.notfound')}}</p>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

        </div>

    </div>
    <!-- content-wrapper ends -->












@include('Admin.Panel.Layouts.Footer_Panel')
