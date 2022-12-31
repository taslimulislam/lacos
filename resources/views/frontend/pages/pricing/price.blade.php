@extends('frontend.layouts.app')
@push('css')

@endpush
@section('content')

@php
$assetsurl = asset('public/frontend');
@endphp

    <!--begin::Page-->
    <div class="page d-flex flex-row flex-column-fluid">
      <!--begin::Wrapper-->
      <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
        <!--begin::Header-->
		      @include('frontend.layouts.navber')
        <!--end::Header-->


        <!--begin::Toolbar-->
        <div class="toolbar py-5 py-lg-15" id="kt_toolbar">
          <!--begin::Container-->
          <div id="kt_toolbar_container" class="container d-flex flex-stack flex-wrap">
            <!--begin::Page title-->
            <div class="page-title d-flex flex-column me-3">
              <!--begin::Title-->
              <h1 class="d-flex fs-2hx fw-bolder text-white">Bamboo Investment launches in Ghana.</h1>
              <!--end::Title-->
              <p class="fs-4 text-white">Get access to Africa’s wide range of investors.</p>
            </div>
            <!--end::Page title-->
          </div>
          <!--end::Container-->
        </div>
        <!--end::Toolbar-->

        <!--begin::Container-->
        <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container mb-15">
         <!--begin::Post-->
						<div class="content flex-row-fluid" id="kt_content">
							<!--begin::Pricing card-->
							<div class="card" id="kt_pricing">
								<!--begin::Card body-->
								<div class="card-body p-lg-17">
									<!--begin::Plans-->
									<div class="d-flex flex-column">
										<!--begin::Heading-->
										<div class="mb-13 text-center">
											<h1 class="fs-2hx fw-bolder mb-5">Choose Your Plan</h1>
											<div class="text-gray-400 fw-bold fs-5">If you need more info about our pricing, please check
											<a href="#" class="link-primary fw-bolder">Pricing Guidelines</a>.</div>
										</div>
										<!--end::Heading-->
										<!--begin::Nav group-->
										<div class="nav-group nav-group-outline mx-auto mb-15" data-kt-buttons="true">
											<a href="#" class="btn btn-color-gray-400 btn-active btn-active-secondary px-6 py-3 me-2 active" data-kt-plan="month">Monthly</a>
											<a href="#" class="btn btn-color-gray-400 btn-active btn-active-secondary px-6 py-3" data-kt-plan="annual">Annual</a>
										</div>
										<!--end::Nav group-->
										<!--begin::Row-->
										<div class="row g-10">
											<!--begin::Col-->
											<div class="col-xl-4">
												<div class="d-flex h-100 align-items-center">
													<!--begin::Option-->
													<div class="w-100 d-flex flex-column flex-center rounded-3 bg-light bg-opacity-75 py-15 px-10">
														<!--begin::Heading-->
														<div class="mb-7 text-center">
															<!--begin::Title-->
															<h1 class="text-dark mb-5 fw-boldest">Startup</h1>
															<!--end::Title-->
															<!--begin::Description-->
															<div class="text-gray-400 fw-bold mb-5">Optimal for 10+ team size
															<br />and new startup</div>
															<!--end::Description-->
															<!--begin::Price-->
															<div class="text-center">
																<span class="mb-2 text-primary">$</span>
																<span class="fs-3x fw-bolder text-primary" data-kt-plan-price-month="39" data-kt-plan-price-annual="399">39</span>
																<span class="fs-7 fw-bold opacity-50">/
																<span data-kt-element="period">Mon</span></span>
															</div>
															<!--end::Price-->
														</div>
														<!--end::Heading-->
														<!--begin::Features-->
														<div class="w-100 mb-10">
															<!--begin::Item-->
															<div class="d-flex align-items-center mb-5">
																<span class="fw-bold fs-6 text-gray-800 flex-grow-1 pe-3">Up to 10 Active Users</span>
																<!--begin::Svg Icon | path: icons/duotone/Code/Done-circle.svg-->
																<span class="svg-icon svg-icon-1 svg-icon-success">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																		<circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10" />
																		<path d="M16.7689447,7.81768175 C17.1457787,7.41393107 17.7785676,7.39211077 18.1823183,7.76894473 C18.5860689,8.1457787 18.6078892,8.77856757 18.2310553,9.18231825 L11.2310553,16.6823183 C10.8654446,17.0740439 10.2560456,17.107974 9.84920863,16.7592566 L6.34920863,13.7592566 C5.92988278,13.3998345 5.88132125,12.7685345 6.2407434,12.3492086 C6.60016555,11.9298828 7.23146553,11.8813212 7.65079137,12.2407434 L10.4229928,14.616916 L16.7689447,7.81768175 Z" fill="#000000" fill-rule="nonzero" />
																	</svg>
																</span>
																<!--end::Svg Icon-->
															</div>
															<!--end::Item-->
															<!--begin::Item-->
															<div class="d-flex align-items-center mb-5">
																<span class="fw-bold fs-6 text-gray-800 flex-grow-1 pe-3">Up to 30 Project Integrations</span>
																<!--begin::Svg Icon | path: icons/duotone/Code/Done-circle.svg-->
																<span class="svg-icon svg-icon-1 svg-icon-success">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																		<circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10" />
																		<path d="M16.7689447,7.81768175 C17.1457787,7.41393107 17.7785676,7.39211077 18.1823183,7.76894473 C18.5860689,8.1457787 18.6078892,8.77856757 18.2310553,9.18231825 L11.2310553,16.6823183 C10.8654446,17.0740439 10.2560456,17.107974 9.84920863,16.7592566 L6.34920863,13.7592566 C5.92988278,13.3998345 5.88132125,12.7685345 6.2407434,12.3492086 C6.60016555,11.9298828 7.23146553,11.8813212 7.65079137,12.2407434 L10.4229928,14.616916 L16.7689447,7.81768175 Z" fill="#000000" fill-rule="nonzero" />
																	</svg>
																</span>
																<!--end::Svg Icon-->
															</div>
															<!--end::Item-->
															<!--begin::Item-->
															<div class="d-flex align-items-center mb-5">
																<span class="fw-bold fs-6 text-gray-800 flex-grow-1 pe-3">Analytics Module</span>
																<!--begin::Svg Icon | path: icons/duotone/Code/Done-circle.svg-->
																<span class="svg-icon svg-icon-1 svg-icon-success">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																		<circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10" />
																		<path d="M16.7689447,7.81768175 C17.1457787,7.41393107 17.7785676,7.39211077 18.1823183,7.76894473 C18.5860689,8.1457787 18.6078892,8.77856757 18.2310553,9.18231825 L11.2310553,16.6823183 C10.8654446,17.0740439 10.2560456,17.107974 9.84920863,16.7592566 L6.34920863,13.7592566 C5.92988278,13.3998345 5.88132125,12.7685345 6.2407434,12.3492086 C6.60016555,11.9298828 7.23146553,11.8813212 7.65079137,12.2407434 L10.4229928,14.616916 L16.7689447,7.81768175 Z" fill="#000000" fill-rule="nonzero" />
																	</svg>
																</span>
																<!--end::Svg Icon-->
															</div>
															<!--end::Item-->
															<!--begin::Item-->
															<div class="d-flex align-items-center mb-5">
																<span class="fw-bold fs-6 text-gray-400 flex-grow-1">Finance Module</span>
																<!--begin::Svg Icon | path: icons/duotone/Code/Error-circle.svg-->
																<span class="svg-icon svg-icon-1">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																		<circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10" />
																		<path d="M12.0355339,10.6213203 L14.863961,7.79289322 C15.2544853,7.40236893 15.8876503,7.40236893 16.2781746,7.79289322 C16.6686989,8.18341751 16.6686989,8.81658249 16.2781746,9.20710678 L13.4497475,12.0355339 L16.2781746,14.863961 C16.6686989,15.2544853 16.6686989,15.8876503 16.2781746,16.2781746 C15.8876503,16.6686989 15.2544853,16.6686989 14.863961,16.2781746 L12.0355339,13.4497475 L9.20710678,16.2781746 C8.81658249,16.6686989 8.18341751,16.6686989 7.79289322,16.2781746 C7.40236893,15.8876503 7.40236893,15.2544853 7.79289322,14.863961 L10.6213203,12.0355339 L7.79289322,9.20710678 C7.40236893,8.81658249 7.40236893,8.18341751 7.79289322,7.79289322 C8.18341751,7.40236893 8.81658249,7.40236893 9.20710678,7.79289322 L12.0355339,10.6213203 Z" fill="#000000" />
																	</svg>
																</span>
																<!--end::Svg Icon-->
															</div>
															<!--end::Item-->
															<!--begin::Item-->
															<div class="d-flex align-items-center mb-5">
																<span class="fw-bold fs-6 text-gray-400 flex-grow-1">Accounting Module</span>
																<!--begin::Svg Icon | path: icons/duotone/Code/Error-circle.svg-->
																<span class="svg-icon svg-icon-1">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																		<circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10" />
																		<path d="M12.0355339,10.6213203 L14.863961,7.79289322 C15.2544853,7.40236893 15.8876503,7.40236893 16.2781746,7.79289322 C16.6686989,8.18341751 16.6686989,8.81658249 16.2781746,9.20710678 L13.4497475,12.0355339 L16.2781746,14.863961 C16.6686989,15.2544853 16.6686989,15.8876503 16.2781746,16.2781746 C15.8876503,16.6686989 15.2544853,16.6686989 14.863961,16.2781746 L12.0355339,13.4497475 L9.20710678,16.2781746 C8.81658249,16.6686989 8.18341751,16.6686989 7.79289322,16.2781746 C7.40236893,15.8876503 7.40236893,15.2544853 7.79289322,14.863961 L10.6213203,12.0355339 L7.79289322,9.20710678 C7.40236893,8.81658249 7.40236893,8.18341751 7.79289322,7.79289322 C8.18341751,7.40236893 8.81658249,7.40236893 9.20710678,7.79289322 L12.0355339,10.6213203 Z" fill="#000000" />
																	</svg>
																</span>
																<!--end::Svg Icon-->
															</div>
															<!--end::Item-->
															<!--begin::Item-->
															<div class="d-flex align-items-center mb-5">
																<span class="fw-bold fs-6 text-gray-400 flex-grow-1">Network Platform</span>
																<!--begin::Svg Icon | path: icons/duotone/Code/Error-circle.svg-->
																<span class="svg-icon svg-icon-1">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																		<circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10" />
																		<path d="M12.0355339,10.6213203 L14.863961,7.79289322 C15.2544853,7.40236893 15.8876503,7.40236893 16.2781746,7.79289322 C16.6686989,8.18341751 16.6686989,8.81658249 16.2781746,9.20710678 L13.4497475,12.0355339 L16.2781746,14.863961 C16.6686989,15.2544853 16.6686989,15.8876503 16.2781746,16.2781746 C15.8876503,16.6686989 15.2544853,16.6686989 14.863961,16.2781746 L12.0355339,13.4497475 L9.20710678,16.2781746 C8.81658249,16.6686989 8.18341751,16.6686989 7.79289322,16.2781746 C7.40236893,15.8876503 7.40236893,15.2544853 7.79289322,14.863961 L10.6213203,12.0355339 L7.79289322,9.20710678 C7.40236893,8.81658249 7.40236893,8.18341751 7.79289322,7.79289322 C8.18341751,7.40236893 8.81658249,7.40236893 9.20710678,7.79289322 L12.0355339,10.6213203 Z" fill="#000000" />
																	</svg>
																</span>
																<!--end::Svg Icon-->
															</div>
															<!--end::Item-->
															<!--begin::Item-->
															<div class="d-flex align-items-center">
																<span class="fw-bold fs-6 text-gray-400 flex-grow-1">Unlimited Cloud Space</span>
																<!--begin::Svg Icon | path: icons/duotone/Code/Error-circle.svg-->
																<span class="svg-icon svg-icon-1">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																		<circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10" />
																		<path d="M12.0355339,10.6213203 L14.863961,7.79289322 C15.2544853,7.40236893 15.8876503,7.40236893 16.2781746,7.79289322 C16.6686989,8.18341751 16.6686989,8.81658249 16.2781746,9.20710678 L13.4497475,12.0355339 L16.2781746,14.863961 C16.6686989,15.2544853 16.6686989,15.8876503 16.2781746,16.2781746 C15.8876503,16.6686989 15.2544853,16.6686989 14.863961,16.2781746 L12.0355339,13.4497475 L9.20710678,16.2781746 C8.81658249,16.6686989 8.18341751,16.6686989 7.79289322,16.2781746 C7.40236893,15.8876503 7.40236893,15.2544853 7.79289322,14.863961 L10.6213203,12.0355339 L7.79289322,9.20710678 C7.40236893,8.81658249 7.40236893,8.18341751 7.79289322,7.79289322 C8.18341751,7.40236893 8.81658249,7.40236893 9.20710678,7.79289322 L12.0355339,10.6213203 Z" fill="#000000" />
																	</svg>
																</span>
																<!--end::Svg Icon-->
															</div>
															<!--end::Item-->
														</div>
														<!--end::Features-->
														<!--begin::Select-->
														<a href="#" class="btn btn-sm btn-primary">Select</a>
														<!--end::Select-->
													</div>
													<!--end::Option-->
												</div>
											</div>
											<!--end::Col-->
											<!--begin::Col-->
											<div class="col-xl-4">
												<div class="d-flex h-100 align-items-center">
													<!--begin::Option-->
													<div class="w-100 d-flex flex-column flex-center rounded-3 bg-light bg-opacity-75 py-20 px-10">
														<!--begin::Heading-->
														<div class="mb-7 text-center">
															<!--begin::Title-->
															<h1 class="text-dark mb-5 fw-boldest">Advanced</h1>
															<!--end::Title-->
															<!--begin::Description-->
															<div class="text-gray-400 fw-bold mb-5">Optimal for 100+ team siz
															<br />e and grown company</div>
															<!--end::Description-->
															<!--begin::Price-->
															<div class="text-center">
																<span class="mb-2 text-primary">$</span>
																<span class="fs-3x fw-bolder text-primary" data-kt-plan-price-month="339" data-kt-plan-price-annual="3399">339</span>
																<span class="fs-7 fw-bold opacity-50">/
																<span data-kt-element="period">Mon</span></span>
															</div>
															<!--end::Price-->
														</div>
														<!--end::Heading-->
														<!--begin::Features-->
														<div class="w-100 mb-10">
															<!--begin::Item-->
															<div class="d-flex align-items-center mb-5">
																<span class="fw-bold fs-6 text-gray-800 flex-grow-1 pe-3">Up to 10 Active Users</span>
																<!--begin::Svg Icon | path: icons/duotone/Code/Done-circle.svg-->
																<span class="svg-icon svg-icon-1 svg-icon-success">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																		<circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10" />
																		<path d="M16.7689447,7.81768175 C17.1457787,7.41393107 17.7785676,7.39211077 18.1823183,7.76894473 C18.5860689,8.1457787 18.6078892,8.77856757 18.2310553,9.18231825 L11.2310553,16.6823183 C10.8654446,17.0740439 10.2560456,17.107974 9.84920863,16.7592566 L6.34920863,13.7592566 C5.92988278,13.3998345 5.88132125,12.7685345 6.2407434,12.3492086 C6.60016555,11.9298828 7.23146553,11.8813212 7.65079137,12.2407434 L10.4229928,14.616916 L16.7689447,7.81768175 Z" fill="#000000" fill-rule="nonzero" />
																	</svg>
																</span>
																<!--end::Svg Icon-->
															</div>
															<!--end::Item-->
															<!--begin::Item-->
															<div class="d-flex align-items-center mb-5">
																<span class="fw-bold fs-6 text-gray-800 flex-grow-1 pe-3">Up to 30 Project Integrations</span>
																<!--begin::Svg Icon | path: icons/duotone/Code/Done-circle.svg-->
																<span class="svg-icon svg-icon-1 svg-icon-success">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																		<circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10" />
																		<path d="M16.7689447,7.81768175 C17.1457787,7.41393107 17.7785676,7.39211077 18.1823183,7.76894473 C18.5860689,8.1457787 18.6078892,8.77856757 18.2310553,9.18231825 L11.2310553,16.6823183 C10.8654446,17.0740439 10.2560456,17.107974 9.84920863,16.7592566 L6.34920863,13.7592566 C5.92988278,13.3998345 5.88132125,12.7685345 6.2407434,12.3492086 C6.60016555,11.9298828 7.23146553,11.8813212 7.65079137,12.2407434 L10.4229928,14.616916 L16.7689447,7.81768175 Z" fill="#000000" fill-rule="nonzero" />
																	</svg>
																</span>
																<!--end::Svg Icon-->
															</div>
															<!--end::Item-->
															<!--begin::Item-->
															<div class="d-flex align-items-center mb-5">
																<span class="fw-bold fs-6 text-gray-800 flex-grow-1 pe-3">Analytics Module</span>
																<!--begin::Svg Icon | path: icons/duotone/Code/Done-circle.svg-->
																<span class="svg-icon svg-icon-1 svg-icon-success">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																		<circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10" />
																		<path d="M16.7689447,7.81768175 C17.1457787,7.41393107 17.7785676,7.39211077 18.1823183,7.76894473 C18.5860689,8.1457787 18.6078892,8.77856757 18.2310553,9.18231825 L11.2310553,16.6823183 C10.8654446,17.0740439 10.2560456,17.107974 9.84920863,16.7592566 L6.34920863,13.7592566 C5.92988278,13.3998345 5.88132125,12.7685345 6.2407434,12.3492086 C6.60016555,11.9298828 7.23146553,11.8813212 7.65079137,12.2407434 L10.4229928,14.616916 L16.7689447,7.81768175 Z" fill="#000000" fill-rule="nonzero" />
																	</svg>
																</span>
																<!--end::Svg Icon-->
															</div>
															<!--end::Item-->
															<!--begin::Item-->
															<div class="d-flex align-items-center mb-5">
																<span class="fw-bold fs-6 text-gray-800 flex-grow-1 pe-3">Finance Module</span>
																<!--begin::Svg Icon | path: icons/duotone/Code/Done-circle.svg-->
																<span class="svg-icon svg-icon-1 svg-icon-success">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																		<circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10" />
																		<path d="M16.7689447,7.81768175 C17.1457787,7.41393107 17.7785676,7.39211077 18.1823183,7.76894473 C18.5860689,8.1457787 18.6078892,8.77856757 18.2310553,9.18231825 L11.2310553,16.6823183 C10.8654446,17.0740439 10.2560456,17.107974 9.84920863,16.7592566 L6.34920863,13.7592566 C5.92988278,13.3998345 5.88132125,12.7685345 6.2407434,12.3492086 C6.60016555,11.9298828 7.23146553,11.8813212 7.65079137,12.2407434 L10.4229928,14.616916 L16.7689447,7.81768175 Z" fill="#000000" fill-rule="nonzero" />
																	</svg>
																</span>
																<!--end::Svg Icon-->
															</div>
															<!--end::Item-->
															<!--begin::Item-->
															<div class="d-flex align-items-center mb-5">
																<span class="fw-bold fs-6 text-gray-800 flex-grow-1 pe-3">Accounting Module</span>
																<!--begin::Svg Icon | path: icons/duotone/Code/Done-circle.svg-->
																<span class="svg-icon svg-icon-1 svg-icon-success">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																		<circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10" />
																		<path d="M16.7689447,7.81768175 C17.1457787,7.41393107 17.7785676,7.39211077 18.1823183,7.76894473 C18.5860689,8.1457787 18.6078892,8.77856757 18.2310553,9.18231825 L11.2310553,16.6823183 C10.8654446,17.0740439 10.2560456,17.107974 9.84920863,16.7592566 L6.34920863,13.7592566 C5.92988278,13.3998345 5.88132125,12.7685345 6.2407434,12.3492086 C6.60016555,11.9298828 7.23146553,11.8813212 7.65079137,12.2407434 L10.4229928,14.616916 L16.7689447,7.81768175 Z" fill="#000000" fill-rule="nonzero" />
																	</svg>
																</span>
																<!--end::Svg Icon-->
															</div>
															<!--end::Item-->
															<!--begin::Item-->
															<div class="d-flex align-items-center mb-5">
																<span class="fw-bold fs-6 text-gray-400 flex-grow-1">Network Platform</span>
																<!--begin::Svg Icon | path: icons/duotone/Code/Error-circle.svg-->
																<span class="svg-icon svg-icon-1">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																		<circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10" />
																		<path d="M12.0355339,10.6213203 L14.863961,7.79289322 C15.2544853,7.40236893 15.8876503,7.40236893 16.2781746,7.79289322 C16.6686989,8.18341751 16.6686989,8.81658249 16.2781746,9.20710678 L13.4497475,12.0355339 L16.2781746,14.863961 C16.6686989,15.2544853 16.6686989,15.8876503 16.2781746,16.2781746 C15.8876503,16.6686989 15.2544853,16.6686989 14.863961,16.2781746 L12.0355339,13.4497475 L9.20710678,16.2781746 C8.81658249,16.6686989 8.18341751,16.6686989 7.79289322,16.2781746 C7.40236893,15.8876503 7.40236893,15.2544853 7.79289322,14.863961 L10.6213203,12.0355339 L7.79289322,9.20710678 C7.40236893,8.81658249 7.40236893,8.18341751 7.79289322,7.79289322 C8.18341751,7.40236893 8.81658249,7.40236893 9.20710678,7.79289322 L12.0355339,10.6213203 Z" fill="#000000" />
																	</svg>
																</span>
																<!--end::Svg Icon-->
															</div>
															<!--end::Item-->
															<!--begin::Item-->
															<div class="d-flex align-items-center">
																<span class="fw-bold fs-6 text-gray-400 flex-grow-1">Unlimited Cloud Space</span>
																<!--begin::Svg Icon | path: icons/duotone/Code/Error-circle.svg-->
																<span class="svg-icon svg-icon-1">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																		<circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10" />
																		<path d="M12.0355339,10.6213203 L14.863961,7.79289322 C15.2544853,7.40236893 15.8876503,7.40236893 16.2781746,7.79289322 C16.6686989,8.18341751 16.6686989,8.81658249 16.2781746,9.20710678 L13.4497475,12.0355339 L16.2781746,14.863961 C16.6686989,15.2544853 16.6686989,15.8876503 16.2781746,16.2781746 C15.8876503,16.6686989 15.2544853,16.6686989 14.863961,16.2781746 L12.0355339,13.4497475 L9.20710678,16.2781746 C8.81658249,16.6686989 8.18341751,16.6686989 7.79289322,16.2781746 C7.40236893,15.8876503 7.40236893,15.2544853 7.79289322,14.863961 L10.6213203,12.0355339 L7.79289322,9.20710678 C7.40236893,8.81658249 7.40236893,8.18341751 7.79289322,7.79289322 C8.18341751,7.40236893 8.81658249,7.40236893 9.20710678,7.79289322 L12.0355339,10.6213203 Z" fill="#000000" />
																	</svg>
																</span>
																<!--end::Svg Icon-->
															</div>
															<!--end::Item-->
														</div>
														<!--end::Features-->
														<!--begin::Select-->
														<a href="#" class="btn btn-sm btn-primary">Select</a>
														<!--end::Select-->
													</div>
													<!--end::Option-->
												</div>
											</div>
											<!--end::Col-->
											<!--begin::Col-->
											<div class="col-xl-4">
												<div class="d-flex h-100 align-items-center">
													<!--begin::Option-->
													<div class="w-100 d-flex flex-column flex-center rounded-3 bg-light bg-opacity-75 py-15 px-10">
														<!--begin::Heading-->
														<div class="mb-7 text-center">
															<!--begin::Title-->
															<h1 class="text-dark mb-5 fw-boldest">Enterprise</h1>
															<!--end::Title-->
															<!--begin::Description-->
															<div class="text-gray-400 fw-bold mb-5">Optimal for 1000+ team
															<br />and enterpise</div>
															<!--end::Description-->
															<!--begin::Price-->
															<div class="text-center">
																<span class="mb-2 text-primary">$</span>
																<span class="fs-3x fw-bolder text-primary" data-kt-plan-price-month="999" data-kt-plan-price-annual="9999">999</span>
																<span class="fs-7 fw-bold opacity-50">/
																<span data-kt-element="period">Mon</span></span>
															</div>
															<!--end::Price-->
														</div>
														<!--end::Heading-->
														<!--begin::Features-->
														<div class="w-100 mb-10">
															<!--begin::Item-->
															<div class="d-flex align-items-center mb-5">
																<span class="fw-bold fs-6 text-gray-800 flex-grow-1 pe-3">Up to 10 Active Users</span>
																<!--begin::Svg Icon | path: icons/duotone/Code/Done-circle.svg-->
																<span class="svg-icon svg-icon-1 svg-icon-success">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																		<circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10" />
																		<path d="M16.7689447,7.81768175 C17.1457787,7.41393107 17.7785676,7.39211077 18.1823183,7.76894473 C18.5860689,8.1457787 18.6078892,8.77856757 18.2310553,9.18231825 L11.2310553,16.6823183 C10.8654446,17.0740439 10.2560456,17.107974 9.84920863,16.7592566 L6.34920863,13.7592566 C5.92988278,13.3998345 5.88132125,12.7685345 6.2407434,12.3492086 C6.60016555,11.9298828 7.23146553,11.8813212 7.65079137,12.2407434 L10.4229928,14.616916 L16.7689447,7.81768175 Z" fill="#000000" fill-rule="nonzero" />
																	</svg>
																</span>
																<!--end::Svg Icon-->
															</div>
															<!--end::Item-->
															<!--begin::Item-->
															<div class="d-flex align-items-center mb-5">
																<span class="fw-bold fs-6 text-gray-800 flex-grow-1 pe-3">Up to 30 Project Integrations</span>
																<!--begin::Svg Icon | path: icons/duotone/Code/Done-circle.svg-->
																<span class="svg-icon svg-icon-1 svg-icon-success">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																		<circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10" />
																		<path d="M16.7689447,7.81768175 C17.1457787,7.41393107 17.7785676,7.39211077 18.1823183,7.76894473 C18.5860689,8.1457787 18.6078892,8.77856757 18.2310553,9.18231825 L11.2310553,16.6823183 C10.8654446,17.0740439 10.2560456,17.107974 9.84920863,16.7592566 L6.34920863,13.7592566 C5.92988278,13.3998345 5.88132125,12.7685345 6.2407434,12.3492086 C6.60016555,11.9298828 7.23146553,11.8813212 7.65079137,12.2407434 L10.4229928,14.616916 L16.7689447,7.81768175 Z" fill="#000000" fill-rule="nonzero" />
																	</svg>
																</span>
																<!--end::Svg Icon-->
															</div>
															<!--end::Item-->
															<!--begin::Item-->
															<div class="d-flex align-items-center mb-5">
																<span class="fw-bold fs-6 text-gray-800 flex-grow-1 pe-3">Analytics Module</span>
																<!--begin::Svg Icon | path: icons/duotone/Code/Done-circle.svg-->
																<span class="svg-icon svg-icon-1 svg-icon-success">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																		<circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10" />
																		<path d="M16.7689447,7.81768175 C17.1457787,7.41393107 17.7785676,7.39211077 18.1823183,7.76894473 C18.5860689,8.1457787 18.6078892,8.77856757 18.2310553,9.18231825 L11.2310553,16.6823183 C10.8654446,17.0740439 10.2560456,17.107974 9.84920863,16.7592566 L6.34920863,13.7592566 C5.92988278,13.3998345 5.88132125,12.7685345 6.2407434,12.3492086 C6.60016555,11.9298828 7.23146553,11.8813212 7.65079137,12.2407434 L10.4229928,14.616916 L16.7689447,7.81768175 Z" fill="#000000" fill-rule="nonzero" />
																	</svg>
																</span>
																<!--end::Svg Icon-->
															</div>
															<!--end::Item-->
															<!--begin::Item-->
															<div class="d-flex align-items-center mb-5">
																<span class="fw-bold fs-6 text-gray-800 flex-grow-1 pe-3">Finance Module</span>
																<!--begin::Svg Icon | path: icons/duotone/Code/Done-circle.svg-->
																<span class="svg-icon svg-icon-1 svg-icon-success">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																		<circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10" />
																		<path d="M16.7689447,7.81768175 C17.1457787,7.41393107 17.7785676,7.39211077 18.1823183,7.76894473 C18.5860689,8.1457787 18.6078892,8.77856757 18.2310553,9.18231825 L11.2310553,16.6823183 C10.8654446,17.0740439 10.2560456,17.107974 9.84920863,16.7592566 L6.34920863,13.7592566 C5.92988278,13.3998345 5.88132125,12.7685345 6.2407434,12.3492086 C6.60016555,11.9298828 7.23146553,11.8813212 7.65079137,12.2407434 L10.4229928,14.616916 L16.7689447,7.81768175 Z" fill="#000000" fill-rule="nonzero" />
																	</svg>
																</span>
																<!--end::Svg Icon-->
															</div>
															<!--end::Item-->
															<!--begin::Item-->
															<div class="d-flex align-items-center mb-5">
																<span class="fw-bold fs-6 text-gray-800 flex-grow-1 pe-3">Accounting Module</span>
																<!--begin::Svg Icon | path: icons/duotone/Code/Done-circle.svg-->
																<span class="svg-icon svg-icon-1 svg-icon-success">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																		<circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10" />
																		<path d="M16.7689447,7.81768175 C17.1457787,7.41393107 17.7785676,7.39211077 18.1823183,7.76894473 C18.5860689,8.1457787 18.6078892,8.77856757 18.2310553,9.18231825 L11.2310553,16.6823183 C10.8654446,17.0740439 10.2560456,17.107974 9.84920863,16.7592566 L6.34920863,13.7592566 C5.92988278,13.3998345 5.88132125,12.7685345 6.2407434,12.3492086 C6.60016555,11.9298828 7.23146553,11.8813212 7.65079137,12.2407434 L10.4229928,14.616916 L16.7689447,7.81768175 Z" fill="#000000" fill-rule="nonzero" />
																	</svg>
																</span>
																<!--end::Svg Icon-->
															</div>
															<!--end::Item-->
															<!--begin::Item-->
															<div class="d-flex align-items-center mb-5">
																<span class="fw-bold fs-6 text-gray-800 flex-grow-1 pe-3">Network Platform</span>
																<!--begin::Svg Icon | path: icons/duotone/Code/Done-circle.svg-->
																<span class="svg-icon svg-icon-1 svg-icon-success">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																		<circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10" />
																		<path d="M16.7689447,7.81768175 C17.1457787,7.41393107 17.7785676,7.39211077 18.1823183,7.76894473 C18.5860689,8.1457787 18.6078892,8.77856757 18.2310553,9.18231825 L11.2310553,16.6823183 C10.8654446,17.0740439 10.2560456,17.107974 9.84920863,16.7592566 L6.34920863,13.7592566 C5.92988278,13.3998345 5.88132125,12.7685345 6.2407434,12.3492086 C6.60016555,11.9298828 7.23146553,11.8813212 7.65079137,12.2407434 L10.4229928,14.616916 L16.7689447,7.81768175 Z" fill="#000000" fill-rule="nonzero" />
																	</svg>
																</span>
																<!--end::Svg Icon-->
															</div>
															<!--end::Item-->
															<!--begin::Item-->
															<div class="d-flex align-items-center">
																<span class="fw-bold fs-6 text-gray-800 flex-grow-1 pe-3">Unlimited Cloud Space</span>
																<!--begin::Svg Icon | path: icons/duotone/Code/Done-circle.svg-->
																<span class="svg-icon svg-icon-1 svg-icon-success">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																		<circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10" />
																		<path d="M16.7689447,7.81768175 C17.1457787,7.41393107 17.7785676,7.39211077 18.1823183,7.76894473 C18.5860689,8.1457787 18.6078892,8.77856757 18.2310553,9.18231825 L11.2310553,16.6823183 C10.8654446,17.0740439 10.2560456,17.107974 9.84920863,16.7592566 L6.34920863,13.7592566 C5.92988278,13.3998345 5.88132125,12.7685345 6.2407434,12.3492086 C6.60016555,11.9298828 7.23146553,11.8813212 7.65079137,12.2407434 L10.4229928,14.616916 L16.7689447,7.81768175 Z" fill="#000000" fill-rule="nonzero" />
																	</svg>
																</span>
																<!--end::Svg Icon-->
															</div>
															<!--end::Item-->
														</div>
														<!--end::Features-->
														<!--begin::Select-->
														<a href="#" class="btn btn-sm btn-primary">Select</a>
														<!--end::Select-->
													</div>
													<!--end::Option-->
												</div>
											</div>
											<!--end::Col-->
										</div>
										<!--end::Row-->
									</div>
									<!--end::Plans-->
								</div>
								<!--end::Card body-->
							</div>
							<!--end::Pricing card-->
						</div>
						<!--end::Post-->
        </div>
        <!--end::Container-->
		

      </div>
      <!--end::Wrapper-->
    </div>
    <!--end::Page-->
    

@endsection

