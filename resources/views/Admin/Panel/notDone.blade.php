@include('Admin.Panel.Layouts.Empty')


<!--Login Main Content Start-->
<div style="width:100vw;height: 100vh;display: flex;justify-content: center;align-items: center;">
    <div>
        <img src="{{asset("admin-assets/images/icons/red_circle.png")}}" style="width: 100px;display: block;margin: 18px auto;"/>
        <p style="width: 100%;text-align: center;">{{ $message }}</p>
    </div>
</div>
<!--Login Main Content End-->

@include('Admin.Panel.Layouts.Footer_Empty')
