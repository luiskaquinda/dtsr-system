@extends('admin.layout.admin-app')
@section('title', 'Dashboard')

@section('content')
	<!--begin::Row-->
		<div class="row gx-5 gx-xl-10 mb-5 mb-xl-10 mb-15">
			<!--begin::Col-->
			<div class="col-lg-4 mb-5 mb-lg-0">
				<!--begin::Chart widget 27-->
				<div class="card card-flush h-lg-100">
					<!--begin::Header-->
					<div class="card-header py-7">
						<!--begin::Statistics-->
						<div class="m-0">
							<!--begin::Heading-->
							<div class="d-flex align-items-center mb-2">
								<!--begin::Title-->
								<span class="fs-2hx fw-bold text-gray-800 me-2 lh-1 ls-n2">{{ $totalVeiculos }}</span>
								<!--end::Title-->
							</div>
							<!--end::Heading-->
							<!--begin::Description-->
							<span class="fs-6 fw-semibold text-gray-400">Viaturas cadastradas</span>
							<!--end::Description-->
						</div>
						<!--end::Statistics-->
					</div>
					<!--end::Header-->
					<!--begin::Body-->
					<div class="card-body pt-0 pb-1">
						<div id="kt_charts_widget_27" class="min-h-auto"></div>
					</div>
					<!--end::Body-->
				</div>
				<!--end::Chart widget 27-->
			</div>
			<!--end::Col-->
			<!--begin::Col-->
			<div class="col-lg-4 mb-5 mb-lg-0">
				<!--begin::Chart widget 28-->
				<div class="card card-flush h-lg-100">
					<!--begin::Header-->
					<div class="card-header py-7">
						<!--begin::Statistics-->
						<div class="m-0">
							<!--begin::Heading-->
							<div class="d-flex align-items-center mb-2">
								<!--begin::Title-->
								<span class="fs-2hx fw-bold text-gray-800 me-2 lh-1 ls-n2">{{ $alertasHoje }}</span>
								<!--end::Title-->
							</div>
							<!--end::Heading-->
							<!--begin::Description-->
							<span class="fs-6 fw-semibold text-gray-400">Alertas Hoje</span>
							<!--end::Description-->
						</div>
						<!--end::Statistics-->
					</div>
					<!--end::Header-->
					<!--begin::Body-->
					<div class="card-body d-flex align-items-end ps-4 pe-0 pb-4">
						<!--begin::Chart-->
						<div id="kt_charts_widget_28" class="h-300px w-100 min-h-auto"></div>
						<!--end::Chart-->
					</div>
					<!--end::Body-->
				</div>
				<!--end::Chart widget 28-->
			</div>
			<!--end::Col-->
			<!--begin::Col-->
			<div class="col-lg-4">
				<!--begin::List widget 9-->
				<div class="card card-flush h-lg-100">
					<!--begin::Header-->
					<div class="card-header py-7">
						<!--begin::Statistics-->
						<div class="m-0">
							<!--begin::Heading-->
							<div class="d-flex align-items-center mb-2">
								<!--begin::Title-->
								<span class="fs-2hx fw-bold text-gray-800 me-2 lh-1 ls-n2">{{ $totalDeAlertas }}</span>
								<!--end::Title-->
							</div>
							<!--end::Heading-->
							<!--begin::Description-->
							<span class="fs-6 fw-semibold text-gray-400">Furtos</span>
							<!--end::Description-->
						</div>
						<!--end::Statistics-->
					</div>
					<!--end::Header-->
					@php
						use Illuminate\Support\Str;
					@endphp

					<!--begin::Body-->
					<div class="card-body card-body d-flex justify-content-between flex-column pt-3">
						@forelse ($alertas as $alerta)
							<!--begin::Item-->
							<div class="d-flex flex-stack">
								<!--begin::Flag-->
								@php
									// 1) tenta imagem primária (string)
									$imgPath = null;

									if (!empty($alerta->imagem)) {
										$imgPath = $alerta->imagem;
									} elseif ($alerta->relationLoaded('imagens') && $alerta->imagens->isNotEmpty()) {
										// 2) se relação carregada e tem imagens, tenta campos comuns no model de imagem
										$first = $alerta->imagens->first();
										$imgPath = $first->path ?? $first->url ?? $first->imagem ?? null;
									} elseif (method_exists($alerta, 'imagens') && $alerta->imagens()->exists()) {
										// 3) caso não esteja eager-loaded, pega a primeira do BD (lazy)
										$first = $alerta->imagens()->first();
										if ($first) {
											$imgPath = $first->path ?? $first->url ?? $first->imagem ?? null;
										}
									}

									// 4) normaliza o URL para usar em <img src="">
									if ($imgPath) {
										// se já for URL absoluta (http, https, or data URI) usa direto
										if (Str::startsWith($imgPath, ['http://', 'https://', 'data:'])) {
											$imgUrl = $imgPath;
										} else {
											// se já contém "storage/" ou começa com "/" assume caminho relativo
											if (Str::startsWith($imgPath, ['storage/', '/storage/'])) {
												$imgUrl = asset($imgPath);
											} else {
												// path guardado no storage/app/public (mais comum) tem que colocar pub
												$imgUrl = asset('storage/public/public/' . ltrim($imgPath, '/'));
											}
										}
									} else {
										// fallback — ícone padrão
										$imgUrl = asset('assets/media/svg/brand-logos/dribbble-icon-1.svg');
									}
								@endphp

								<img src="{{ $imgUrl }}"
									class="me-4 w-30px"
									style="border-radius: 4px"
									alt="{{ $alerta->titulo ?? 'ícone' }}"
									loading="lazy" />

								<!--end::Flag-->
								<!--begin::Section-->
								<div class="d-flex align-items-center flex-stack flex-wrap flex-row-fluid d-grid gap-2">
									<!--begin::Content-->
									<div class="me-5">
										<!--begin::Title-->
										<a href="{{ route('alertas.show', $alerta->id) }}" class="text-gray-800 fw-bold text-hover-primary fs-6">{{ $alerta->titulo }}</a>
										<!--end::Title-->
										<!--begin::Desc-->
										<span class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">
											{{ optional($alerta->tipos_notificacoes)->tipo }}
										</span>
										<!--end::Desc-->
									</div>
									<!--end::Content-->
													
									<!--begin::Wrapper-->
									<div class="d-flex align-items-center">
										<!--begin::Number-->
										<span class="text-gray-500 fw-bold fs-4 me-3">{{ $alerta->nome_denuciante ?? 'Anônimo' }}</span>
										<!--end::Number-->
									</div>
									<!--end::Wrapper-->
								</div>
								<!--end::Section-->
							</div>
							<!--end::Item-->
							<!--begin::Separator-->
							<div class="separator separator-dashed my-3"></div>
							<!--end::Separator-->
						@empty
							<div>Sem alertas</div>
						@endforelse
					</div>
					<!--end::Body-->

				</div>
				<!--end::List widget 9-->
			</div>
			<!--end::Col-->
		</div>
	<!--end::Row-->
@endsection

@section('custom_js_pre')

@endsection


