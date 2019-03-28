<form role="form" id="form-edit" method="POST" action="{{ route('tag.update', $data['tag']->id) }}">
    @method('PUT')
    @csrf

    <slug :model="{{ $data['tag'] }}" inline-template>
        <div v-cloak>
            <div class="form-group row my-5">
                <div class="col-lg-12">
                    <input type="text" name="name" v-model="name" value="{{ $data['tag']->name }}"
                           class="form-control-lg form-control border-0 px-0"
                           title="Name" required placeholder="Give your tag a name">
                    @if ($errors->has('name'))
                        <div class="invalid-feedback d-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </div>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <div class="col-lg-12">
                    <p class="lead text-muted" style="cursor: default"><span class="text-primary">@{{ slug }}</span></p>
                    <input type="hidden" name="slug" v-model="slug" readonly>
                    @if ($errors->has('slug'))
                        <div class="invalid-feedback d-block">
                            <strong>{{ $errors->first('slug') }}</strong>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </slug>
</form>