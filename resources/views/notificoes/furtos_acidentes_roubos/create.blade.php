<div class="modal fade" tabindex="-1" id="kt_modal_scrollable_2">
    <div class="modal-dialog  modal-dialog-centered">
        <form id="alerta" class="modal-content" action="{{ route('notificacao.alertas.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="modal-header">
                <h5 class="modal-title">Criar alerta</h5>

                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                    <i class="ki-duotone ki-cross fs-2x"><span class="path1"></span><span class="path2"></span></i>
                </div>
                <!--end::Close-->
            </div>

            @if ($errors->any())
                <div class="alert alert-dismissible bg-light-danger border border-danger d-flex flex-column flex-sm-row p-2 mx-2">
                    <ul class="d-flex flex-column pe-0 pe-sm-10">
                        <!--begin::Title-->
                        <h5 class="mb-1">Nota:</h5>
                        <!--end::Title-->
                
                        <!--begin::Content-->
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        <!--end::Content-->
                    </ul>
                     <!--begin::Close-->
                    <button type="button" class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto" data-bs-dismiss="alert">
                        <i class="ki-duotone ki-cross fs-1 text-success"><span class="path1"></span><span class="path2"></span></i>
                    </button>
                    <!--end::Close-->
                </div>
            @endif

            <div class="modal-body">

                <div class="form-check form-switch form-check-custom form-check-solid mb-6">
                    <input class="form-check-input fv-row" type="checkbox" value="1"
                    {{ old('anonima') ? 'checked' : '' }}  id="anonima" name="anonima"/>
                    <label class="form-check-label" for="anonima">
                        Anonima
                    </label>
                </div>

                <div class="mb-6 form-control" id="nomeContainer" style="display: none; margin-top: 0.5rem;">
                    <label for="nome_denuciante" class="form-label">Nome:</label>
                    <input
                        id="nome_denuciante"
                        name="nome_denuciante"
                        type="text"
                        value="{{ old('nome_denuciante') }}"
                        class="form-control form-control-solid @error('nome_denuciante') is-ivalid @enderror"
                        placeholder="Insira seu nome"
                    />
                    @error('nome_denuciante')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Campo Título --}}

                <div class="mb-6 form-control">
                    <label for="titulo" class="required form-label">Título</label>
                    <input
                      type="text"
                      id="titulo"
                      name="titulo"
                      value="{{ old('titulo') }}"
                      class="form-control form-control-solid @error('titulo') is-invalid @enderror"
                      placeholder="Escreva algo para destacar..."
                    />
                    @error('titulo')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Campo Municipio --}}

                <div class="fv-row mb-6 form-control">
                    <label class="required fs-6 fw-semibold mb-2">Município</label>
                    <select
                    id="selectTipoAlertaModal"
                    name="municipio_id" id="municipio_id"
                    class="form-select form-select-solid @error('tipo_alerta') is-ivalid @enderror"
                    >
                    <option value="">Selecione um tipo de alerta...</option>
                    @foreach($municipios as $municipio)
                        <option
                        value="{{ $municipio->id }}"
                        {{ old('municipio_id') == $municipio->id ? 'selected' : '' }}
                        >
                        {{ $municipio->nome_municipio }}
                        </option>
                    @endforeach
                    </select>
                    @error('municipio_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- campo data_ocorrido --}}

                <div class="mb-6 form-control">
                    <label class="required form-label">Data do ocorrido</label>
                    <input
                    type="date"
                    id="data_ocorrido"
                    name="data_ocorrido"
                    value="{{ old('data_ocorrido') }}"
                    class="form-control form-control-solid @error('data_ocorrido') is-ivalid @enderror"
                    />
                    @error('data_ocorrido')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-6 form-control">
                    <label for="hora_ocorrido" class="required form-label">Hora do ocorrido</label>
                    <input type="time" id="hora_ocorrido" name="hora_ocorrido" class="form-control form-control-solid @error('hora_ocorrido') is-ivalid @enderror" value="{{ old('hora_ocorrido') }}"/>
                    @error('hora_ocorrido')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- campo tipo_alerta --}}

                <div class="fv-row mb-6 form-control">
                    <label class="required fs-6 fw-semibold mb-2">Tipo de alerta</label>
                    <select
                    id="tipo_multa"
                    name="tipo_alerta" id="tipo_alerta"
                    class="form-select form-select-solid @error('tipo_alerta') is-ivalid @enderror"
                    data-hide-search="true"
                    >
                    <option value="" selected disabled>Selecione um tipo de alerta...</option>
                    @foreach($tipos_notificacao as $tipo)
                        <option
                        value="{{ $tipo->id }}"
                        {{ old('tipo_alerta') == $tipo->id ? 'selected' : '' }}
                        >
                        {{$tipo->tipo}}
                        </option>
                    @endforeach
                    </select>
                    @error('tipo_alerta')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!--end::Input group-->

                <!--begin::Input group-->
                <div class="fv-row mb-6 form-control">
                    <!--begin::Label-->
                    <label class="required fs-6 fw-semibold mb-2">Descrição</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <textarea value="{{ old('descricao') }}" class="form-control form-control-solid @error('descricao') is-ivalid @enderror" rows="3" id="descricao" placeholder="Digite aqui uma descrição detalhada sobre o que está a acontecer ou aconteceu..." name="descricao"></textarea>
                    <!--end::Input-->

                    @error('descricao')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!--end::Input group-->
                <div class="mb-3 form-control">
                    <label for="formFile" class="form-label">Carregar imagem</label>
                    <input class="form-control form-control-solid" type="file" id="imagem" name="imagem">
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-danger">Notificar</button>
            </div>
        </form>
    </div>
</div>