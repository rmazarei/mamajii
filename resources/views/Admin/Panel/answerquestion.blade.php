@include('Admin.Panel.Layouts.Empty')


<!--Send Notification To User Start-->
<div class="content-wrapper" style="height: 100vh;">
    <div class="row">
        <div class="col-md-11 grid-margin stretch-card" style="margin: 50px auto;">
            <div class="card">
                <div class="card-body">

                <?php $counter=0; ?>
                    @foreach($questions as $quesion)
                    @if($counter%2 == 0)
                    <div class="form-group">
                        <label for="exampleInputUsername1">پرسش کاربر</label>
                        <label for="exampleInputUsername1">{{$quesion->content}}</label>
                    </div>
                    @else
                    <div class="form-group">
                        <label for="exampleInputUsername1">پاسخ پزشک</label>
                        <label for="exampleInputUsername1">{{$quesion->content}}</label>
                    </div>
                    @endif
                    <?php $counter++; ?>
                    @endforeach

                    @if($counter%2 != 0)
                    <form class="forms-sample" method="post" action="{{url('/Admin/AnswerQuestions')}}">

                        <input type="hidden" value="{{$questions[0]->user_id}}" name="user_id"/>
                        <input type="hidden" value="{{csrf_token()}}" name="_token"/>

                        <div class="form-group">
                            <label for="exampleInputPassword1">پاسخ</label>
                            <textarea style="height: 150px;" class="form-control" id="exampleInputPassword1" name="answer"></textarea>
                        </div>

                        <button style="width: 100%;" type="submit" class="btn btn-gradient-primary mr-2">{{__('all_strings.done')}}</button>

                    </form>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
<!--Send Notification To User End-->


@include('Admin.Panel.Layouts.Footer_Empty')
