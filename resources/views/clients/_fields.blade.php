<div class="row g-9 mb-8">



    <div class="col-md-6 fv-row">
        <!--begin::Label-->
        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
            <span class="required">اسم الزبون</span>
            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
               title=" الاسم "></i>
        </label>
        <!--end::Label-->
        <input id="" type="text" class="form-control form-control-solid"
               placeholder="اسم الزبون"
               name="full_name" value="{{old('full_name',$client->full_name)}}"/>

    </div>
    <div class="col-md-6 fv-row">
        <!--begin::Label-->
        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
            <span class="required">رقم الجوال</span>
            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
               title="يرجى إدخال رقم الجوال"></i>
        </label>

        <!--end::Label-->
        <input id="" type="text" class="form-control form-control-solid"
               placeholder="رقم الجوال "
               name="phone" value="{{old("phone",$client->phone)}}"/>

    </div>
    <div class="col-md-6 fv-row">
        <!--begin::Label-->
        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
            <span class="required">رقم الهوية</span>
            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
               title="يرجى إدخال الاسم رباعي"></i>
        </label>

        <!--end::Label-->
        <input id="" type="text" class="form-control form-control-solid"
               placeholder="رقم الهوية "
               name="id_number" value="{{old("id_number",$client->id_number)}}"/>

    </div>




    <div class="col-md-6 fv-row">
        <!--begin::Label-->
        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
            <span class="required">الحالة الإجتماعية</span>
            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
               title=""></i>
        </label>

        <select name="marital_status" id="" class="form-control form-control-solid">
            <option value="أعزب">أعزب</option>
            <option value="متزوج">متزوج</option>
        </select>

    </div>
    <div class="col-md-6 fv-row">
        <!--begin::Label-->
        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
            <span class="required">نوع الحساب</span>
            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
               title=""></i>
        </label>

        <select name="type" id="" class="form-control form-control-solid">

            <option value="مؤسسة">مؤسسة</option>
            <option value="أفراد">أفراد</option>
            <option value="شركة">شركة</option>
        </select>

    </div>

      <div class="col-md-6 fv-row">
        <!--begin::Label-->
        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
            <span class="required">المدينة</span>
            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
               title=""></i>
        </label>

        <select name="city" id="" class="form-control form-control-solid">
            <option value="غزة">غزة</option>
            <option value="رفح">رفح</option>
            <option value="خانيونس">خانيونس</option>
            <option value="دير البلح">دير البلح</option>
            <option value="بيت لاهيا">بيت لاهيا</option>
            <option value="بيت حانون">بيت حانون</option>
            <option value="بني سهيلا">بني سهيلا</option>
            <option value="جباليا">جباليا</option>
        </select>

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
               name="email" value="{{old("email",$client->email)}}"/>

        <!--end::Label-->


    </div>

    <div class="col-md-6 fv-row">
        <!--begin::Label-->
        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
            <span class="required">تاريخ الميلاد</span>
            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
               title="التاريخ"></i>
        </label>

        <input id="" type="date" class="form-control form-control-solid"
               placeholder="تاريخ الميلاد"
               name="BOD" value="{{old("BOD",$client->BOD)}}"/>

        <!--end::Label-->


    </div>

    <div class="col-md-6 fv-row">
        <!--begin::Label-->
        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
            <span class="required">العمل</span>
            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
               title="العمل"></i>
        </label>

        <input id="" type="text" class="form-control form-control-solid"
               placeholder="العمل"
               name="occupation" value="{{old("occupation",$client->occupation)}}"/>



    </div>
</div>
