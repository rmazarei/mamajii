@include('Admin.Panel.Layouts.Empty')



<div class="content-wrapper" style="height: 100vh;">
    <div class="row">
        <div class="col-md-11 grid-margin stretch-card" style="margin: 5px auto;">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title" style="text-align: center;">{{__('all_strings.uploadnewfile')}}</h4>
                    <form method="post" enctype="multipart/form-data" action="{{ route('admin.hospitals.gallery.save', $hospi_id) }}">
                        <div style="display: flex;margin-bottom: 20px;">
                            <input type="hidden" value="{{csrf_token()}}" name="_token"/>
                            <input type="file" name="img"/>
                        </div>
                        <button style="width: 100%;" type="submit" class="btn btn-gradient-primary mr-2">{{__('all_strings.done')}}</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-11 grid-margin stretch-card" style="margin: 25px auto;">
            <div class="card">
                <div class="card-body">
                    @if(count($images)>0)
                    <h4 class="card-title" style="text-align: center;">{{__('all_strings.EditHospital')}}</h4>
                    <div>
                        @foreach($images as $image)
                            <a href="/Admin/Hospitals/Gallery/Remove/{{$hospi_id}}/{{$image->id}}"><img src="/File/{{ \App\Models\File::Where('id',$image->file_id)->first()->file_hash }}" width="270px"/></a>
                        @endforeach
                    </div>
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



@include('Admin.Panel.Layouts.Footer_Empty')
