<div class="row g-9 mb-8">
    <div class="col-md-3 fv-row">
        <!--begin::Label-->
        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
            <span class="required">رقم الزبون</span>
            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
               title=" ادخل رقم الزبون "></i>
        </label>
        <!--end::Label-->
        <input id="client_id" type="text" class="form-control form-control-solid"
               placeholder="رقم الزبون"
               name="client_id" value="{{old('client_id',$transaction->client_id)}}"/>

    </div>
    <div class="col-md-3 fv-row">
        <!--begin::Label-->
        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
            <span class="required">الزبون</span>
            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
               title=""></i>
        </label>
        <!--end::Label-->
        <select  name="id2"  class="form-control form-control-solid" id="id2"  >
            @foreach($clients as $client)
                <option {{$transaction->client_id==$client->id?"selected":""}} value="{{$client->id}}">{{$client->full_name}}</option>
            @endforeach
        </select>

    </div>
    <div class="col-md-6 fv-row">
        <!--begin::Label-->
        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
            <span class="">اسم الزبون</span>

        </label>

        <!--end::Label-->
        <input name="name" id="name" type="text" class="form-control form-control-solid"
               placeholder="يظهر الاسم في حال استخدام الباركود" value="{{old("name",$transaction->name)}}"
               readonly

               />

    </div>

    <div class="col-md-6 fv-row">
        <!--begin::Label-->
        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
            <span class="required">karat </span>

        </label>

        <!--end::Label-->
        <input name="karat" id="karat" type="text" class="form-control form-control-solid"
               placeholder="karat" value="{{old("karat",$transaction->karat)}}"



        />

    </div>
    <div class="col-md-6 fv-row">
        <!--begin::Label-->
        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
            <span class="required">نوع الحركة</span>
            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
               title=""></i>
        </label>

        <!--end::Label-->

        <select name="type" id="" class="form-control form-control-solid">
            <option {{$transaction->type=="بيع"?"selected":""}} value="بيع">
                بيع
            </option>
            <option {{$transaction->type=="شراء"?"selected":""}} value="شراء">
                شراء
            </option>
            <option {{$transaction->type=="تبديل"?"selected":""}} value="تبديل">
                تبديل
            </option>
        </select>

    </div>
    <div class="col-md-6 fv-row">
        <!--begin::Label-->
        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
            <span class="required">السعر</span>
            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
               title="ادخل السعر"></i>
        </label>

        <input id="price" type="number" class="form-control form-control-solid"
               placeholder="رقم صحيح"
               name="price" value="{{old("price",$transaction->price)}}"/>

        <!--end::Label-->


    </div>
    <div class="col-md-6 fv-row">
        <!--begin::Label-->
        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
            <span class="required">الوزن</span>
            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
               title="ادخل الوزن"></i>
        </label>
        <input id="weight" type="number" class="form-control form-control-solid"
               placeholder="رقم صحيح"
               name="wight" value="{{old("wight",$transaction->wight)}}"/>
    </div>
</div>
