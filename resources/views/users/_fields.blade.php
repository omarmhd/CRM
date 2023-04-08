<div class="row g-9 mb-8">




    <div class="col-md-6 fv-row">
        <!--begin::Label-->
        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
            <span class="required">اسم المستخدم</span>
            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
               title=" الاسم الذي يتم استخدامه للدخول لنظام و يجب أن يكون باللغة الإنجليزية "></i>
        </label>
        <!--end::Label-->
        <input id="" type="text" class="form-control form-control-solid"
               placeholder="اسم المستخدم"
               name="name" value="{{old('name',$user->name)}}"/>

    </div>
    <div class="col-md-6 fv-row">
        <!--begin::Label-->
        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
            <span class="required">الاسم رباعي</span>
            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
               title="يرجى إدخال الاسم رباعي"></i>
        </label>

        <!--end::Label-->
        <input id="" type="text" class="form-control form-control-solid"
               placeholder="الاسم رباعي"
               name="full_name" value="{{old("full_name",$user->full_name)}}"/>

    </div>




    <div class="col-md-6 fv-row">
        <!--begin::Label-->
        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
            <span class="required">كلمة المرور</span>
            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
               title=""></i>
        </label>

        <!--end::Label-->
        <input id="id_number" type="text" class="form-control form-control-solid"
               placeholder="كلمة المرور"
               name="password"/>
    </div>
    <div class="col-md-6 fv-row">
        <!--begin::Label-->
        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
            <span class="required">البريد الإلكتروني</span>
            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
               title="يرجى إدخال البريد الإلكتروني"></i>
        </label>

        <input id="id_number" type="text" class="form-control form-control-solid"
               placeholder="البريد الإلكتروني"
               name="email" value="{{old("email",$user->email)}}"/>

        <!--end::Label-->


    </div>

    <div class="col-md-6 fv-row">
        <!--begin::Label-->
        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
            <span class="required">الصلاحيات</span>
            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
               title="يرجى إختيار الصلاحيات الوصول للمستخدم"></i>
        </label>

        <select  name="role"  class="form-control form-control-solid">
            <option  disabled selected>اختيار</option>
            <option {{old('role',$user->role=="employee"?"selected":"") }}  value="employee">موظف</option>


            <option {{old('role',$user->role=="administrator"?"selected":"") }} value="administrator">مسؤول النظام</option>


        </select>


        <!--end::Label-->


    </div>

</div>
