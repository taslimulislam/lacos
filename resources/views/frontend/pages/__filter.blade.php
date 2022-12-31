<form action="" method="GET">
    <div class="me-4">
      <a href="#"
        class="btn btn-custom btn-active-white btn-flex btn-color-white btn-active-color-primary fw-bolder"
        data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-flip="top-end">
        <!--begin::Svg Icon | path: icons/duotone/Text/Filter.svg-->
        <span class="svg-icon svg-icon-5 svg-icon-gray-500 me-1">
          <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
            height="24px" viewBox="0 0 24 24" version="1.1">
            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
              <rect x="0" y="0" width="24" height="24" />
              <path
                d="M5,4 L19,4 C19.2761424,4 19.5,4.22385763 19.5,4.5 C19.5,4.60818511 19.4649111,4.71345191 19.4,4.8 L14,12 L14,20.190983 C14,20.4671254 13.7761424,20.690983 13.5,20.690983 C13.4223775,20.690983 13.3458209,20.6729105 13.2763932,20.6381966 L10,19 L10,12 L4.6,4.8 C4.43431458,4.5790861 4.4790861,4.26568542 4.7,4.1 C4.78654809,4.03508894 4.89181489,4 5,4 Z"
                fill="#000000" />
            </g>
          </svg>
        </span>
        <!--end::Svg Icon-->Filter
      </a>
      <!--begin::Menu 1-->
      <div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px" data-kt-menu="true"
        id="kt_menu_610d4969c756f">
        <!--begin::Header-->
        <div class="px-7 py-5">
          <div class="fs-5 text-dark fw-bolder">Filter Options</div>
        </div>
        <div class="separator border-gray-200"></div>

      


        <div class="px-7 py-5 " >
          
          <div class="mb-10">
            <label class="form-label fw-bold"> Select Country:</label>
            <div>
              <select name="country_id" class="form-select form-select-solid" data-kt-select2="true"
                data-placeholder="Select option" data-dropdown-parent="#kt_menu_610d4969c756f"
                data-allow-clear="true">
                <option></option>
                @foreach($countries as $country)
                    <option value="{{$country->id}}" {{$country->id==request()->get('country_id')?'selected':''}}>{{$country->country_name}}</option>
                @endforeach
              </select>
            </div>
            <!--end::Input-->
          </div>

          <div class="mb-10">
            <label class="form-label fw-bold"> Select Industry:</label>
            <div>
              <select name="industry"  class="form-select form-select-solid" data-kt-select2="true"
                data-placeholder="Select option" data-dropdown-parent="#kt_menu_610d4969c756f"
                data-allow-clear="true">
                <option></option>
                @foreach($industries as $industry)
                    <option value="{{$industry->id}}" {{$industry->id==request()->get('industry')?'selected':''}}>{{$industry->name}}</option>
                @endforeach
              </select>
            </div>
          </div>

          <div class="mb-10" {{request()->segment(1)=='hubs'?'hidden':''}} >
            <label class="form-label fw-bold"> Select Investment Stage:</label>
            <div>
              <select name="funding_stage" class="form-select form-select-solid" data-kt-select2="true"
                data-placeholder="Select option" data-dropdown-parent="#kt_menu_610d4969c756f"
                data-allow-clear="true">
                <option></option>
                @foreach($investstage as $key => $type)
                  <option value="{{ $type->id }}" {{$type->id==request()->get('funding_stage')?'selected':''}}>{{$type->name}}</option>
                  @endforeach
              </select>
            </div>
          </div>
          
          <!--begin::Actions-->
          <div class="d-flex justify-content-end">
            <button type="reset"  class="btn btn-sm btn-light btn-active-light-primary me-2 reset"
              data-kt-menu-dismiss="true">Reset</button>
            <button type="submit" class="btn btn-sm btn-primary" data-kt-menu-dismiss="true">Apply</button>
          </div>
        </div>
      </div>
    </div>
  </form>