<div class="row g-9 mb-8">
    <div class="col-md-5 fv-row">
        <!--begin::Label-->
        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
            <span class="">اسم  الزبون</span>

        </label>
        <!--end::Label-->
        <input id="client_id" type="text" class="form-control form-control-solid"
              readonly value="{{$pointAward->client->full_name}}"/>

    </div>
    <div class="col-md-3 fv-row">
        <!--begin::Label-->
        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
            <span class=""> عدد النقاط الغير مستهلكه </span>

        </label>
        <!--end::Label-->
        <input id="client_id" type="text" class="form-control form-control-solid"
               placeholder=" عدد التقاط"
               readonly
               name="client_id" value="{{$pointAward->points}}"/>

    </div>
    <div class="col-md-3 fv-row">
        <!--begin::Label-->
        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
            <span class=""> عدد النقاط المستهلكه</span>

        </label>
        <!--end::Label-->
        <input id="client_id" type="text" class="form-control form-control-solid"
               placeholder="عدد التقاط"
               readonly
               name="" value="{{$pointAward->redeemed_points}}"/>

    </div>
    <div class="col-md-6 fv-row">
        <!--begin::Label-->
        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
            <span class="">النقاط المراد استبداله</span>

        </label>

        <!--end::Label-->
        <input name="redeemed_points" id="name" type="text" class="form-control form-control-solid"

               placeholder="النقاط المراد استبداله" value=""


        />

    </div>

    <div class="col-md-6 fv-row">
        <!--begin::Label-->
        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
            <span class="">المكافأة</span>

        </label>

        <!--end::Label-->
        <input name="awards" id="name" type="text" class="form-control form-control-solid"
               placeholder="توضيح المكافأت مقابل النقاط" value=""


        />

    </div>
</div>
