@include('Admin.Panel.Layouts.Panel')



<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                  <i class="mdi mdi-comment-question-outline"></i>
                </span>پرسش پاسخ
            </h3>
        </div>

        <div class="row">


            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        @if(count($questions)>0)
                        <table class="table">
                            <thead>
                            <tr>
                                <th>{{__('all_strings.date')}}</th>
                                <th>عملیات</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($questions as $quesion)
                                    <tr>
                                        <td>{{$quesion->date}}</td>
                                        <td><i onclick="Open_Link_Dialog(this,'{{url('/Admin/Questions')}}/{{$quesion->user_id}}')" class="mdi mdi-table-edit" style="color: #F00;font-size: 20px;cursor: pointer;"></i></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @else
                            <div style="width: 100%;height: 250px;display: flex;justify-content: center;align-items: center;">
                                <div style="width: 150px;">
                                    <img style="margin: 0 auto;" src="{{asset('admin-assets/images/icons/empty.png')}}" width="150px"/>
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
