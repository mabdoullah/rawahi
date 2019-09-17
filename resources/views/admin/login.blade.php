
@extends('admin.master.app')

@section('content')
	<!--login starts-->
	<div class="list-details-section section-padding add_list pad-top-50">
			<div class="container">
					<div class="row">
							<div class="col-md-12">
									<div class="tab-content mar-tb-30 add_list_content">
											<div class="tab-pane fade show active" id="general_info">
													<h4> <i class="ion-ios-information"></i> تسجيل الدخول</h4>
													<form>
														<div class="row">
															<div class="col-md-6">
																	<div class="form-group">
																			<label>البريد الالكتروني</label>
																			<input required type="text" class="form-control filter-input"
																									placeholder="البريد الالكتروني">
																	</div>
															</div>
															<div class="col-md-6">
																	<div class="form-group">
																			<label> كلمه السر</label>
																			<input required type="text" class="form-control filter-input"
																									placeholder="كلمه السر">
																	</div>
															</div>
															<div class="col-md-4">
																<div class="form-group">
																	<input required type="checkbox">
																	<label> تذكرني </label>
																</div>
															</div>
															<div class="col-md-4">
																	<div class="form-group">
																			<a href="forget-password.html"> نسيت كلمه السر ؟</a>
																	</div>
															</div>
															<div class="col-md-4">
																	<div class="form-group">
																			<a href="login.html">انشئ حساب جديد</a>
																	</div>
															</div>
															<div class="col-md-4">
																	<button type="submit" class="btn v7 mar-top-20">حفظ </button>
															</div>
														</div>
													</form>
											</div>
									</div>

							</div>
					</div>
			</div>
	</div>




@endsection
