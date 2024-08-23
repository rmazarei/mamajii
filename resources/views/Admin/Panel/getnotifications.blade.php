@include('Admin.Panel.Layouts.Empty')


<!--Send Notification To User Start-->
<div class="content-wrapper" style="height: 100vh;">
    <div class="row">
        <div class="col-md-11 grid-margin stretch-card" style="margin: 50px auto;">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title" style="text-align: center;">{{__('all_strings.old_notifications1')}}</h4>
                    @if(count($all_notifications)>0)
                    <table class="table">
                        <thead>
                        <tr>
                            <th>{{__('all_strings.Title')}}</th>
                            <th>{{__('all_strings.Text')}}</th>
                            <th>{{__('all_strings.Link')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($all_notifications as $notifications)
                            <tr>
                                <td>{{$notifications->title}}</td>
                                <td>{{$notifications->content}}</td>
                                <td><a href="{{$notifications->link}}">{{__('all_strings.Link')}}</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    @else
                        <div class="card-body">
                            <img src="{{asset('admin-assets\images\icons\empty.png')}}" style="width: 150px;display: block;margin: 0 auto;"/>
                            <p style="text-align: center;">{{__('all_strings.notfound')}}</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<!--Send Notification To User End-->


@include('Admin.Panel.Layouts.Footer_Empty')
